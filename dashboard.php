<?php
session_start();
require('includes/dbconn.php');
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
            <?php
            $vehicle_registration = $_SESSION["vehicle_registration"];
            $sql = "SELECT * FROM lots WHERE filled = 'No' ORDER BY id ASC";
            $result = $conn->query($sql);
            $num_rows = $result->num_rows;
            $rows = $result->fetch_all(MYSQLI_ASSOC);

            if ($num_rows > 0) {
                $_SESSION["lot_id"] = $rows[0]["id"];
            ?>
                <script>
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            console.log(this.responseText);
                        }
                    };
                    xhttp.open("POST", "includes/smtp.php", true);
                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhttp.send("lot_id=<?php echo $rows[0]["id"]; ?>");
                </script>
            <?php
                echo $_SESSION['email'];
                //print current indian time in format hh:mm:ss AM/PM
                date_default_timezone_set("Asia/Kolkata");
                echo "<p class='text-gray-800 text-md font-bold heading tracking-wider mt-2'>Current Time: " . date("h:i:s A") . "</p>";
                echo "<h2 class='text-gray-800 text-3xl font-bold heading tracking-wider underline mt-12'>Available Lot:" . $rows[0]["id"] . "</h2>";
                echo "<p class='text-gray-800 text-md font-bold heading tracking-wider mt-2'>Please Park Your Vehicle</p>";
                echo "<a href='simulator.php' class='btn btn-primary-outline mt-24 px-6 py-2 rounded-md text-blue-600 font-semibold border border-blue-600 hover:text-white hover:bg-blue-600 focus:text-white focus:bg-blue-600'>Park</a>";
                echo "<i class='material-icons mt-3'>mail</i><p class='text-gray-500 text-md font-bold heading tracking-wider mt-2'>Check Your Email</p>";
            } else {
                echo "<h2 class='text-gray-800 text-3xl font-bold heading tracking-wider underline mt-12'>No Lots Available</h2>";
            }
            ?>
        </div>
    </div>
</body>

</html>