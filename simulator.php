<?php
session_start();
require('includes/dbconn.php');
if (!isset($_SESSION["lot_id"])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Please Park Your Vehicle</title>
    <!-- Include the Tailwind CSS stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        /* Additional styles for the background image */
        body {
            background-image: url('assets/login.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        /* Custom CSS to style the rectangle and boxes */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* Center the container vertically in the viewport */
        }

        .rectangle {
            width: 600px;
            /* Adjust the width of the rectangle as needed */
            height: 400px;
            display: flex;
            flex-direction: column;
            /* Divide into two vertical halves */
            background-color: #ccc;
            padding: 5px;
            border: 1px solid #000;
            /* Border thickness of 1.5 pixels */
        }

        .row {
            display: flex;
            justify-content: space-between;
            flex: 1;
        }

        .box {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            height: 191px;
            width: 200px;
            border: 1.8px solid #000;
            /* Border thickness of 1.5 pixels */
        }

        /* Add margin to separate the two halves vertically */
        .row:first-child {
            margin-bottom: 8px;
        }

        .is-filled {
            background-color: #c63f3f;
            color: #fff;
        }

        /* create a blinking animation in green */
        .is-lot {
            background-color: #42a04f;
            color: #fff;
            animation: blinker 2s linear infinite;
        }
        @keyframes blinker {
            50% {
                opacity: 20%;
            }
        }
    </style>
</head>

<body align="center">
    <?php
    $lot_id = $_SESSION["lot_id"];
    $sql = "SELECT * FROM lots";
    $result = $conn->query($sql);
    $num_rows = $result->num_rows;
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    ?>
    <div class="container mx-auto mt-4">
        <div class="rectangle">
            <!-- Create the top half with 5 horizontal rows -->
            <div class="row">
                <a class="box <?php if ($rows[0]["filled"] == "Yes") echo "is-filled"; ?> <?php if ($rows[0]["id"] == $lot_id) echo "is-lot"; ?>" href="./includes/park.php?lot-id=<?php echo $rows[0]["id"]; ?>">
                    <p class="text-2xl font-semibold">1</p>
                </a>
                <a class="box <?php if ($rows[2]["filled"] == "Yes") echo "is-filled"; ?> <?php if ($rows[2]["id"] == $lot_id) echo "is-lot"; ?>" href="./includes/park.php?lot-id=<?php echo $rows[2]["id"]; ?>">
                    <p class="text-2xl font-semibold">3</p>
                </a>
                <a class="box <?php if ($rows[4]["filled"] == "Yes") echo "is-filled"; ?> <?php if ($rows[4]["id"] == $lot_id) echo "is-lot"; ?>"href="./includes/park.php?lot-id=<?php echo $rows[4]["id"]; ?>">
                    <p class="text-2xl font-semibold">5</p>
                </a>
                <a class="box <?php if ($rows[6]["filled"] == "Yes") echo "is-filled"; ?> <?php if ($rows[6]["id"] == $lot_id) echo "is-lot"; ?>"href="./includes/park.php?lot-id=<?php echo $rows[6]["id"]; ?>">
                    <p class="text-2xl font-semibold">7</p>
                </a>
                <a class="box <?php if ($rows[8]["filled"] == "Yes") echo "is-filled"; ?> <?php if ($rows[8]["id"] == $lot_id) echo "is-lot"; ?>"href="./includes/park.php?lot-id=<?php echo $rows[8]["id"]; ?>">
                    <p class="text-2xl font-semibold">9</p>
                </a>
            </div>
            <!-- Create the bottom half with 5 horizontal rows -->
            <div class="row">
                <a class="box <?php if ($rows[1]["filled"] == "Yes") echo "is-filled"; ?> <?php if ($rows[1]["id"] == $lot_id) echo "is-lot"; ?>"href="./includes/park.php?lot-id=<?php echo $rows[1]["id"]; ?>">
                    <p class="text-2xl font-semibold">2</p>
                </a>
                <a class="box <?php if ($rows[3]["filled"] == "Yes") echo "is-filled"; ?> <?php if ($rows[3]["id"] == $lot_id) echo "is-lot"; ?>"href="./includes/park.php?lot-id=<?php echo $rows[3]["id"]; ?>">
                    <p class="text-2xl font-semibold">4</p>
                </a>
                <a class="box <?php if ($rows[5]["filled"] == "Yes") echo "is-filled"; ?> <?php if ($rows[5]["id"] == $lot_id) echo "is-lot"; ?>"href="./includes/park.php?lot-id=<?php echo $rows[5]["id"]; ?>">
                    <p class="text-2xl font-semibold">6</p>
                </a>
                <a class="box <?php if ($rows[7]["filled"] == "Yes") echo "is-filled"; ?> <?php if ($rows[7]["id"] == $lot_id) echo "is-lot"; ?>"href="./includes/park.php?lot-id=<?php echo $rows[7]["id"]; ?>">
                    <p class="text-2xl font-semibold">8</p>
                </a>
                <a class="box <?php if ($rows[9]["filled"] == "Yes") echo "is-filled"; ?> <?php if ($rows[9]["id"] == $lot_id) echo "is-lot"; ?>"href="./includes/park.php?lot-id=<?php echo $rows[9]["id"]; ?>">
                    <p class="text-2xl font-semibold">10</p>
                </a>
            </div>
        </div>
    </div>
</body>

</html>