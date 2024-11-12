using Domain.Entities;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ApplicationService.Dtos
{
    public class PaymentDto
    {
        public required long MeterNumber { get; set; }
        public decimal Amount { get; set; }
    }
}
