using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ApplicationService.Dtos
{
    public class MeterDto
    {
        
        public long MeterNumber { get; set; }
        public string CustomerFirstName { get; set; } = string.Empty;
        public string CustomerLastName { get; set; } = string.Empty;
        public decimal Balance { get; set; } = decimal.Zero;
    }
}
