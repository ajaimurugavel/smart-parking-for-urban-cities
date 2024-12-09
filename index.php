<?php
session_start();
require('includes/dbconn.php');
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Parking Login</title>
    <link rel="stylesheet" href="./imports/tailwind.min.css">
    <script src="./imports/script.js"></script>
    <style>
        @font-face {
            font-family: 'FH-Oscar';
            src: url('./assets/fonts/FH-Oscar.otf');
        }

        .heading {
            font-family: 'FH-Oscar';
        }
    </style>
</head>

<body>
    <div class="min-h-screen flex flex-row items-center">
        <!-- Left Side -->
        <div class="w-1/2 relative">
            <img src="./assets/login.jpg" alt="Car Parking" class="w-full h-full object-cover">
            <div class="absolute top-0 left-0 w-full h-full flex flex-col justify-start items-center bg-black bg-opacity-50 mt-12 p-12">
                <h2 class="text-white text-5xl font-bold heading tracking-wider underline">
                    Smart Car Parking
                </h2>
                <p class="text-white text-xl font-medium">Login to Your Account</p>
            </div>
        </div>
        <div class="bg-white w-1/2">
            <div class="flex px-12 items-center justify-between">
                <br>
                <h1 class="text-3xl font-semibold text-gray-700 ml-16">Login</h1>
                <a href="register.php" class="btn btn-primary-outline px-4 py-2 rounded-md text-blue-600 font-semibold border border-blue-600 hover:text-white hover:bg-blue-600 focus:text-white focus:bg-blue-600">Register</a>
            </div>
            <small class="text-red-500" id="error-message"></small>
            <form action="auth/login.php" method="POST" id="login-form" class="p-12">
                <div class="mb-4">
                    <label for="vehicle-registration" class="block text-gray-600 font-semibold">Vehicle Registration Number*</label>
                    <input type="text" id="vehicle-registration" name="vehicle-registration" class="w-full px-4 py-2 border border-1 border-black border-opacity-20 rounded focus:outline-none focus:border-blue-500" required autofocus placeholder="TN-01-AB-1234" maxlength="13" minlength="13" oninput="addHyphens(this)">
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="rounded-md text-white font-semibold bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 focus:text-white focus:bg-blue-700">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>