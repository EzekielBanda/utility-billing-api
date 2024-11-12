using ApplicationService.Dtos;
using ApplicationService.Services;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using System.Reflection;

namespace UtilityBillingApi.Controllers
{
    [Route("api/[controller]")]
    [ApiController]

    public class MeterController(IMeterService meterService) : ControllerBase
    {
        private readonly IMeterService _meterService = meterService;

        [HttpGet]
        [Route("")]
        public async Task<IActionResult> GetAllMeterDetails()
        {
            var meterDetails = await _meterService.GetAllMeterDetails();

            //To Do (Count the number of entries)
            int numberOfRecords = meterDetails.Count;

            return Ok(new {
                code = 200,
                message = $"{numberOfRecords} Meter details Found",
                Data = meterDetails
            });
        }

        [HttpGet]
        [Route("{meterNumber}")]
        public async Task<IActionResult> GetMeterDetailsById(long meterNumber)
        {
            var meterInfo = await _meterService.GetMeterDetailsById(meterNumber);

            if (meterInfo == null)
            {
                return NotFound(new
                {
                    code = 404,
                    message = "Meter Not Found",
                });
            }

            return Ok(new
            {
                code = 200,
                message = "Meter Information Found Successfully",
                Data = new 
                {
                    customerName = meterInfo.CustomerFirstName +" " + meterInfo.CustomerLastName,
                    balance = meterInfo.Balance

                }
            });
        }


        [HttpPost]
        [Route("")]
        public async Task<IActionResult> AddMeterDetails([FromBody] MeterDto meterDto)
        {
            try
            {
                // Attempt to add the meter details
                var meterDetails = await _meterService.AddMeterDetails(meterDto);

                // Check if the meter number already exists
                //if (meterDetails == null)
                //{
                //    return BadRequest(new
                //    {
                //        code = 400,
                //        message = $"Meter with number {meterDto.MeterNumber} already exists."
                //    });
                //}

                // Successfully added the meter details
                return Ok(new
                {
                    code = 201,
                    message = "Meter details added successfully.",
                    Data = meterDetails
                });
            }
            catch (ArgumentException ex)
            {
                // Handle cases where the meter number is invalid (e.g., not 11 digits)
                return BadRequest(new
                {
                    code = 400,
                    message = ex.Message
                });
            }
            catch (InvalidOperationException ex)
            {
                return BadRequest(new
                {
                    code = 400,
                    message = ex.Message
                });

            }
            catch (Exception ex)
            {
                // Handle other unexpected errors
                return StatusCode(500, new
                {
                    code = 500,
                    message = "An error occurred while adding meter details.",
                    Details = ex.Message
                });
            }
        }

    }
}
