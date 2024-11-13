<?php
// You can use this file to fetch data from your API

// Assuming you're getting the transaction data in a JSON format
// For example, your API URL might look like this: 'http://your-api-url/transactions'

// Fetch data from the API
$api_url = "http://your-api-url/transactions"; // replace with your actual API URL
$response = file_get_contents($api_url);
$transactions = json_decode($response, true); // Decode the JSON response into an associative array

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Add your custom styles here */
        .search-bar {
            margin: 20px 0;
            width: 100%;
            max-width: 300px;
        }
        .table-container {
            margin-top: 20px;
        }
        .table th, .table td {
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- Search Bar -->
    <div class="container">
        <input type="text" id="searchInput" class="form-control search-bar" placeholder="Search by Reference # or Meter Number" onkeyup="searchTable()">
    </div>

    <!-- Table displaying transaction data -->
    <div class="container table-container">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Reference #</th>
                    <th>Meter Number</th>
                    <th>Amount (MWK)</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="transactionTable">
                <?php
                if ($transactions) {
                    foreach ($transactions as $transaction) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($transaction['reference_number']) . "</td>";
                        echo "<td>" . htmlspecialchars($transaction['meter_number']) . "</td>";
                        echo "<td>" . htmlspecialchars($transaction['amount']) . "</td>";
                        echo "<td>" . htmlspecialchars($transaction['date']) . "</td>";
                        echo "<td>" . htmlspecialchars($transaction['status']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No transactions available.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        // Function to filter transactions based on search input
        function searchTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.querySelector("table");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows (except the header) and hide those that don't match the search
            for (i = 1; i < tr.length; i++) {
                td1 = tr[i].getElementsByTagName("td")[0]; // Reference #
                td2 = tr[i].getElementsByTagName("td")[1]; // Meter Number
                if (td1 || td2) {
                    txtValue1 = td1.textContent || td1.innerText;
                    txtValue2 = td2.textContent || td2.innerText;
                    if (txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

    <!-- JavaScript files -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
