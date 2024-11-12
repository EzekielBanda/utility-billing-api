using ApplicationService.Services;
using Infrastructure.Repository;
using Microsoft.Extensions.DependencyInjection;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace DI.DependencyInj
{
    public class DependencyInj
    {
        public static void InjectRepositories(IServiceCollection services)
        {
            services.AddTransient<IMeterService, MeterService>();
            services.AddTransient<IPaymentService, PaymentService>();
        }
    }
}
