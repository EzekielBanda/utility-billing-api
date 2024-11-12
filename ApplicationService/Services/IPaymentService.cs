using ApplicationService.Dtos;
using Domain.Entities;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ApplicationService.Services
{
    public interface IPaymentService
    {
        Task<PaymentResponseDto> ProcessPaymentAsync(PaymentDto paymentDto);
        Task<List<Payment>> GetAllTransactionsAsync();
        Task<Payment> GetTransactionByReferenceAsync(Guid transRef);
    }
}
