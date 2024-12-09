<?php
session_start();
require('includes/dbconn.php');

// if (!isset($_SESSION["username"])) {
//     header("Location: index.php");
//     exit();
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Gateway</title>
    <link rel="stylesheet" href="./imports/tailwind.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

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
    <div class="container mx-auto">
        <div class="flex flex-col items-center">
            <h1 class="text-gray-800 text-5xl font-bold heading tracking-wider underline mt-12">Welcome, <?php echo $_SESSION["username"]; ?></h1>
            <p class="text-gray-800 text-md font-bold heading tracking-wider mt-2">
                <?php
                echo "Rs." . $_GET['amount'];
                ?>
            </p>
            <a href="upi://pay?pa=ajaim518@okhdfcbank&pn=Ajai Murugavel&aid=uGICAgICfxvbhYA&am=<?php echo $_GET['amount'] ?>.00&cu=INR" class="btn btn-primary-outline mt-4 px-4 py-2 rounded-md text-blue-600 font-semibold border border-blue-600 hover:text-white hover:bg-blue-600 focus:text-white focus:bg-blue-600">Pay</a>
</body>

</html>