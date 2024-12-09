<?php
require('../includes/dbconn.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = sanitize_input($_POST["first-name"]);
    $last_name = sanitize_input($_POST["last-name"]);
    $vehicle_registration = sanitize_input($_POST["vehicle-registration"]);
    $email = sanitize_input($_POST["email"]);
    $phone_number = sanitize_input($_POST["phone-number"]);
    $pincode = sanitize_input($_POST["pincode"]);
    $confirm_email = sanitize_input($_POST["confirm-email"]);
    $communication_mode = implode(", ", $_POST["communication-mode"]); // If storing as comma-separated values
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password

    $sql = "INSERT INTO users (first_name, last_name, vehicle_registration, email, phone_number, pincode, confirm_email, communication_mode, password)
            VALUES ('$first_name', '$last_name', '$vehicle_registration', '$email', '$phone_number', '$pincode', '$confirm_email', '$communication_mode', '$password')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        $_SESSION["vehicle_registration"] = $vehicle_registration;
        $_SESSION["username"] = $first_name . " " . $last_name;
        $_SESSION["email"] = $email;

        header("Location: ../dashboard.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
