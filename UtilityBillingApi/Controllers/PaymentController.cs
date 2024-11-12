using ApplicationService.Dtos;
using ApplicationService.Services;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;

namespace UtilityBillingApi.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class PaymentController(IPaymentService paymentService) : ControllerBase
    {
        private readonly IPaymentService _paymentService = paymentService;

        [HttpPost("")]
        public async Task<IActionResult> MakePayment([FromBody] PaymentDto paymentDto)
        {
            try
            {
                // Process the payment
                var paymentResponse = await _paymentService.ProcessPaymentAsync(paymentDto);

                // Return a success response with the transaction reference and updated balance
                return Ok(new
                {
                    code = 201,
                    message = "You have successifully Paid your Bill",
                    Data = paymentResponse

                });
            }
            catch (KeyNotFoundException ex)
            {
                return NotFound(new 
                {
                    code = 404,
                    ex.Message 
                });
            }
            catch (ArgumentException ex)
            {
                return BadRequest(new 
                { 
                    code = 400,
                    ex.Message 
                });
            }
            catch (InvalidOperationException ex)
            {
                return BadRequest(new 
                {
                    code = 400,
                    ex.Message 
                });
            }
            catch (Exception ex)
            {
                // Handle unexpected errors
                return StatusCode(500, new 
                { 
                    Message = "An error occurred while processing the payment.",
                    Details = ex.Message 
                });
            }
        }


        [HttpGet("transactions")]
        public async Task<IActionResult> GetAllTransactions()
        {
            var transactions = await _paymentService.GetAllTransactionsAsync();
            return Ok(transactions);
        }

        [HttpGet("transaction/{transRef}")]
        public async Task<IActionResult> GetTransactionByReference(Guid transRef)
        {
            try
            {
                var transaction = await _paymentService.GetTransactionByReferenceAsync(transRef);
                return Ok(new 
                { 
                    code = 200,
                    message = "Transaction successifully Found",
                    Data = transaction 
                });
            }
            catch (KeyNotFoundException ex)
            {
                return NotFound(new 
                {
                    code = 404,
                    ex.Message 
                });
            }
        }
    }
}
