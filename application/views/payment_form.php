<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vas Portal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        /* Header styling */
        .header {
            background-color: #FF0018;
            color: white;
            padding: 5px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .header img {
            height: 40px;
        }
        .header .right-section {
            background-color: #ffffff;
            padding: 5px 15px;
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: -5px;
        }
       
        .header .right-section button {
            background-color: #0000CC;
            color: white;
            padding: 5px 10px;
        }

        .header .right-section span,
        .header .right-section .dropdown-toggle {
            color: #337AB7;
            font-size: 14px;
            cursor: pointer;
        }

        /* Dropdown styling */
        .dropdown-menu a {
            color: #333;
        }
        .dropdown-menu a:hover {
            background-color: #f0f0f0;
        }


        /* Navbar styling */
        .navbar_container {
            display: flex;
            align-items: flex-start;
            padding: 0 30px;
            background-color: #f5f5f5;
        }
        .navbar_container .navbar {
            font-size: 18px;
            background-color: #008000;
            font-weight: bold;
            color: white;
            padding: 3px 7px;
            margin-right: 30px;
            position: absolute;
            top: 51px;
            left: 0;
        }
        .navbar_container .navbar-buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-left: 157px;
        }
        .navbar_container .navbar-buttons button {
            background-color: #ffffff;
            border: 1px solid #ced4da;
            color: #333;
            padding: 3px 10px;
            font-weight: bold;
            width: 150px;
            display: flex;
            align-items: center;
            gap: 5px;
        }
       
        .navbar_container .navbar-buttons .btn-back {
            background-color: #F0F0F0;
            border-radius: 5px 5px 0 0;
        }
        .navbar_container .nav-role {
            font-size: 14px;
            font-weight: bold;
            background-color: #5BC0DE;
            color: #ffffff;
            padding: 1px 15px;
            margin-left: auto;
            margin-top: 3px;
        }

        /* Tabs and content styling */
        .content {
            padding: 20px 40px;
            margin-left: 30px;
            margin-top: 40px;
        }
        .nav-tabs .nav-item .nav-link {
            color: #333;
            font-weight: bold;
            padding: 10px 20px;
        }
        .nav-tabs .nav-item .nav-link.active {
            color: #ffffff;
            background-color: #275D8C;
        }

        /* Form styling */
        .form-section {
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #337AB7;
            border-radius: 5px;
            width: 100%;
            max-width: 400px;
            margin-top: 25px;
            margin-left: 1px; 
        }
        .form-section h4 {
            background-color: #337AB7; 
            color: #ffffff; 
            font-weight: bold;
            padding: 10px;
            margin: -20px -20px 20px -20px;
            border-radius: 5px 5px 0 0;
            text-align: left; 
        }
        .form-section .form-group label {
            font-weight: 600;
        }
        .form-section input {
            margin-bottom: 15px;
            height: 40px;
            font-size: 16px;
        }
        
        /* Button styling */
        .button-container {
            display: flex;
            gap: 10px;
            justify-content: flex-start; 
        }
        .btn-blue {
            background-color: #0000CC;
            border: none;
            color: white;
            font-weight: bold;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
        }
        .btn-red {
            background-color: #FF0018;
            border: none;
            color: white;
            font-weight: bold;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <img src="assets/logo.png" alt="NBS Bank">
        <div class="right-section">
            <span><i class="fa fa-cog" aria-hidden="true"></i></span>
            <div class="dropdown">
                <span class="dropdown-toggle" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    User Menu
                </span>
                <div class="dropdown-menu" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Lee - 1233</a>
                    <a class="dropdown-item" href="#">Alex - 4567</a>
                    <a class="dropdown-item" href="#">Sam - 7890</a>
                </div>
            </div>
            <span><i class="fa fa-envelope" aria-hidden="true"></i> helpdesk@nbs.mw</span>
            <span><i class="fas fa-phone"></i> +265 999 96 70 02</span>
            <button class="btn btn-primary"><i class="fa fa-power-off" aria-hidden="true"></i> Logout</button>
        </div>
    </div>

    <!-- Navbar -->
    <div class="navbar_container">
        <div class="navbar">DemoPayment</div>
        <div class="navbar-buttons">
            <button class="btn btn-light" onclick="location.reload()">
                <i class="fas fa-sync-alt"></i> Refresh Page
            </button>
            <button class="btn btn-light btn-back">
                <i class="fas fa-arrow-left"></i> Go Back
            </button>
        </div>
        <div class="nav-role"><i class="fas fa-user"></i> Teller: Right Mazolo - KMALIMBA</div>
    </div>

    <!-- Tabs -->
    <div class="container content">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#make-payment" data-toggle="tab">Make Payment</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#transactions" data-toggle="tab">Transactions</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content">
            <div class="tab-pane fade show active" id="make-payment">
                <div class="form-section">
                    <h4>Payment Form</h4>
                    <form action="your_action_url" method="POST">
                        <div class="form-group">
                            <label for="meter_number">Meter Number:</label>
                            <input type="text" id="meter_number" name="meter_number" class="form-control" placeholder="Enter meter number">
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount (MWK):</label>
                            <input type="number" id="amount" name="amount" class="form-control" placeholder="Enter Amount">
                        </div>
                        <div class="button-container">
                            <button type="submit" class="btn btn-blue">Make Payment</button>
                            <button type="reset" class="btn btn-red">Clear</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="transactions">
                <!-- Add transaction content here if needed -->
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
