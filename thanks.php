<?php
session_start();
require('includes/dbconn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Additional styles for the background image */
        body {
            background-image: url('assets/thanks.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
</head>
<body class="h-screen flex flex-col justify-center items-center">
    <script>
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
            }
        };
        xhttp.open("POST", "includes/bill.php?username=<?php echo $_GET['username']; ?>&lot_id=<?php echo $_GET['lot_id']; ?>&vehicle_registration=<?php echo $_GET['vehicle_registration']; ?>", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send();
    </script>
    <div class="bg-white bg-opacity-80 p-8 rounded-lg shadow-lg text-center">
        <h1 class="text-3xl font-semibold text-blue-500 mb-4">Thanks for visiting our services</h1>
        <p class="text-gray-700">Check your mail for payment & confirmation details.</p>
    </div>
</body>
</html>
