using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Domain.Entities
{
    public class Payment
    {
        public long Id { get; set; }
        public required long MeterNumber { get; set; } = 0L;
        public decimal Amount { get; set; } = decimal.Zero;
        public decimal Balance { get; set; }
        public Guid TransRef { get; set; } = Guid.Empty;
        public DateTime DateTime { get; set; } = DateTime.Now;


    }
}
