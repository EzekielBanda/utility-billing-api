using ApplicationService.Dtos;
using Domain.Entities;

namespace ApplicationService.Services
{
    public interface IMeterService
    {
        Task<List<MeterDto>> GetAllMeterDetails();

        Task<MeterDto> AddMeterDetails(MeterDto meterDto);

        Task<MeterDto> GetMeterDetailsById(long meterId);
    }
}