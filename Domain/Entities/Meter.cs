using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Domain.Entities
{
    public class Meter
    {
        [Key]
        public long Id { get; set; }
        public long MeterNumber { get; set; }
        public string CustomerName { get; set; } = string.Empty;
        public decimal Balance { get; set; } = decimal.Zero;

    }
}
