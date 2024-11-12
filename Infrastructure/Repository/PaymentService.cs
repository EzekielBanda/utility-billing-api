using ApplicationService.Dtos;
using ApplicationService.Services;
using Domain.Entities;
using Infrastructure.Data;
using Microsoft.EntityFrameworkCore;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Infrastructure.Repository
{
    public class PaymentService(MeterDetailsContext context) : IPaymentService
    {
        private readonly MeterDetailsContext _context = context;

        public async Task<PaymentResponseDto> ProcessPaymentAsync(PaymentDto paymentDto)
        {
            // Retrieve the customer's meter information
            var meterInfo = await _context.Meters.FirstOrDefaultAsync(
                m => m.MeterNumber == paymentDto.MeterNumber) 
                ?? throw new KeyNotFoundException($"Meter number {paymentDto.MeterNumber} not found.");

            // Validate the payment amount
            if (paymentDto.Amount <= 0)
                throw new ArgumentException("Amount must be greater than zero.");

            if (paymentDto.Amount > meterInfo.Balance)
                throw new InvalidOperationException("Payment amount exceeds balance.");

            // Deduct the payment amount from the customer's balance
            meterInfo.Balance -= paymentDto.Amount;

            // Create a new payment transaction with the updated balance
            var payment = new Payment
            {
                MeterNumber = paymentDto.MeterNumber,
                Amount = paymentDto.Amount,
                Balance = meterInfo.Balance,   // Store the updated balance
                TransRef = Guid.NewGuid(),     // Generate unique transaction reference
                DateTime = DateTime.Now
            };

            // Save changes
            _context.Transactions.Add(payment);
            await _context.SaveChangesAsync();

            // Return the transaction reference and updated balance
            return new PaymentResponseDto
            {
                TransactionReference = payment.TransRef.ToString(),
                Balance = meterInfo.Balance
            };
        }


        // Retrieve all transactions
        public async Task<List<Payment>> GetAllTransactionsAsync()
        {
            return await _context.Transactions.ToListAsync();
        }

        // Retrieve a single transaction by transaction reference
        public async Task<Payment> GetTransactionByReferenceAsync(Guid transRef)
        {
            var transaction = await _context.Transactions.FirstOrDefaultAsync(t => t.TransRef == transRef) 
                    ?? throw new KeyNotFoundException("Transaction with the specified reference not found.");
            return transaction;
        }
    }
}
