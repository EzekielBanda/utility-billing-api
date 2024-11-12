using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ApplicationService.Dtos
{
    
    public class PaymentResponseDto
    {
        public string TransactionReference { get; set; } = string.Empty;
        public decimal Balance { get; set; } = decimal.Zero;
    }

}
