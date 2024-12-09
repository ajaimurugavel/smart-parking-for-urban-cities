<?php
session_start();
require('includes/dbconn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Message</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Additional styles for the background image */
        body {
            background-image: url('assets/exit.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
<script>
    function runit() {
        window.location.href = "thanks.php?username=<?php echo $_GET['username']; ?>&lot_id=<?php echo $_GET['lot_id']; ?>&vehicle_registration=<?php echo $_GET['vehicle_registration']; ?>";
    }
    </script>
</head>
<body class="h-screen flex flex-col justify-center items-center">
    <div class="bg-white bg-opacity-80 p-12 rounded-lg shadow-lg text-center">
        <h1 class="text-3xl font-semibold text-blue-500 mb-4">Welcome, <span class="text-green-500"><?php echo $_GET['username']; ?></span></h1>
        <p class="text-gray-700">Successfully parked on the Lot: <span class="text-green-500"><?php echo $_GET['lot_id']; ?></span></p>
        <button onclick="runit()" class=" text-blue-500 hover:bg-blue-500 hover:text-white mt-4 py-2 px-4 rounded-lg transition-colors duration-300">Exit</button>
    </div>
</body>
</html>
