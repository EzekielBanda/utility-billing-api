using ApplicationService.Dtos;
using Domain.Entities;
using Infrastructure.Data;
using System;
using System.Collections.Generic;
using System.Threading.Tasks;
using Microsoft.EntityFrameworkCore;
using ApplicationService.Services;

namespace Infrastructure.Repository
{
    public class MeterService(MeterDetailsContext meterDetailsContext) : IMeterService
    {
        private readonly MeterDetailsContext _meterDetailsContext = meterDetailsContext;

        public async Task<MeterDto> AddMeterDetails(MeterDto meterDto)
        {
            // Validate the MeterNumber is exactly 11 digits
            if (meterDto.MeterNumber.ToString().Length != 11)
            {
                throw new ArgumentException("Meter number must contain exactly 11 digits.");
            }

            // Check if a meter with the same MeterNumber already exists
            bool meterExists = await _meterDetailsContext.Meters
                .AnyAsync(m => m.MeterNumber == meterDto.MeterNumber);
            if (meterExists)
            {
                throw new InvalidOperationException(
                    $"Meter with number {meterDto.MeterNumber} already exists.");
            }

            // Create a new Meter entity with concatenated CustomerName
            var meterInfo = new Meter
            {
                MeterNumber = meterDto.MeterNumber,
                CustomerName = $"{meterDto.CustomerFirstName} {meterDto.CustomerLastName}",
                Balance = meterDto.Balance
            };

            // Add and save changes to the database
            await _meterDetailsContext.Meters.AddAsync(meterInfo);
            await _meterDetailsContext.SaveChangesAsync();

            return meterDto;
        }

        public async Task<List<MeterDto>> GetAllMeterDetails()
        {
            // Retrieve and map Meter entities to MeterDto
            var meters = await _meterDetailsContext.Meters.ToListAsync();
            return meters.ConvertAll(meter => new MeterDto
            {
                MeterNumber = meter.MeterNumber,
                CustomerFirstName = meter.CustomerName.Split(' ')[0],
                CustomerLastName = meter.CustomerName.Split(' ').Length > 1
                    ? meter.CustomerName.Split(' ')[1]
                    : string.Empty,
                Balance = meter.Balance
            });
        }

        public async Task<MeterDto> GetMeterDetailsById(long meterNumber)
        {
            var meterInfo = await _meterDetailsContext.Meters
                .Where(m => m.MeterNumber == meterNumber)
                .FirstOrDefaultAsync() 
                ?? throw new KeyNotFoundException($"Meter with number {meterNumber} was not found.");

            // Map Meter entity to MeterDto
            return new MeterDto
            {
                CustomerFirstName = meterInfo.CustomerName.Split(' ')[0],  // Assuming space between first and last name
                CustomerLastName = meterInfo.CustomerName.Split(' ')
                    .Length > 1 ? meterInfo.CustomerName.Split(' ')[1] : string.Empty,
                Balance = meterInfo.Balance
            };
        }



    }
}
