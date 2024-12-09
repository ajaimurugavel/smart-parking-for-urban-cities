<?php
session_start();
require('../includes/dbconn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehicle_registration = sanitize_input($_POST["vehicle-registration"]);

    $sql = "SELECT * FROM users WHERE vehicle_registration = '$vehicle_registration'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $_SESSION["vehicle_registration"] = $row["vehicle_registration"];
        $_SESSION["username"] = $row["first_name"] . " " . $row["last_name"];
        $_SESSION["email"] = $row["email"];

        header("Location: ../dashboard.php");
        exit();
    } else {
        echo $vehicle_registration;
        echo "Invalid vehicle registration number. Please try again.";
    }

    $conn->close();
}

// Function to sanitize user input
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
