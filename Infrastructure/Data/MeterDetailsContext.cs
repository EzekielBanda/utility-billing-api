using Domain.Entities;
using Microsoft.EntityFrameworkCore;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Infrastructure.Data
{
    public class MeterDetailsContext(DbContextOptions options) : DbContext(options)
    {

        public virtual DbSet<Meter> Meters { get; set; }
        public virtual DbSet<Payment> Transactions { get; set; }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            modelBuilder.Entity<Meter>()
             .Property(m => m.Id)
              .ValueGeneratedOnAdd();

        }

    }
}
