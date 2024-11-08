<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vas Portal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
            background-color: #e60000;
            color: white;
            padding: 15px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .header img {
            height: 40px;
        }
        .header .right-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .header .right-section span {
            color: blue;
            font-size: 14px;
        }
        .header .right-section button {
            background-color: #007bff;
            border: none;
            color: white;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 4px;
        }

        /* Navbar styling */
        .navbar_container {
            display: flex;
            align-items: center;
            justify-content: space-between; /* Added to align DemoPayment and nav-role */
            padding: 15px 30px;
            background-color: #f5f5f5;
        }
        .navbar_container .navbar {
            font-size: 20px;
            background-color: #28a745;
            font-weight: bold;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            margin-right: 30px;
        }
        .navbar_container .navbar-buttons {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .navbar_container .navbar-buttons button {
            background-color: #ffffff;
            border: 1px solid #ced4da;
            color: #333;
            padding: 8px 15px;
            font-weight: bold;
            border-radius: 5px;
            text-align: left;
        }
        .navbar_container .nav-role {
            font-size: 16px;
            font-weight: bold;
            background-color: #cce5ff;
            color: #004085;
            padding: 8px 15px;
            border-radius: 5px;
        }

        /* Tabs and content styling */
        .content {
            padding: 20px 30px;
        }
        .nav-tabs .nav-item .nav-link {
            color: #333;
            font-weight: bold;
            padding: 10px 20px;
        }
        .nav-tabs .nav-item .nav-link.active {
            color: #ffffff;
            background-color: #3982b8;
            border-radius: 5px 5px 0 0;
        }

        /* Form styling */
        .form-section {
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #007bff;
            border-radius: 5px;
            width: 100%;
            max-width: 400px;
            margin-top: 20px;
        }
        .form-section h4 {
            background-color: #3982b8; 
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
            background-color: #007bff;
            border: none;
            color: white;
            font-weight: bold;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
        }
        .btn-red {
            background-color: #dc3545;
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
            <span>User Menu</span>
            <span>helpdesk@nbs.mw</span>
            <span>+265 999 96 70 02</span>
            <button class="btn btn-primary">Logout</button>
        </div>
    </div>

    <!-- Navbar -->
    <div class="navbar_container">
        <div class="navbar">DemoPayment</div>
        <div class="navbar-buttons">
            <button class="btn btn-light">Refresh Page</button>
            <button class="btn btn-light">Go Back</button>
        </div>
        <div class="nav-role">Teller: Right Mazolo - KMALIMBA</div>
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
                            <input type="text" id="meter_number" name="meter_number" class="form-control" placeholder="Enter Account number">
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
