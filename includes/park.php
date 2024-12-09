<?php
session_start();
require('./dbconn.php');
require 'phpmailer/PHPMailerAutoload.php';

if (!isset($_SESSION["username"])) {
    header("Location: ../index.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $lot_id = $_GET["lot-id"];
    $vehicle_registration = $_SESSION["vehicle_registration"];
    $_SESSION["lot_id"] = $lot_id;
    $username = $_SESSION["username"];
    $email = $_SESSION["email"];
    $sql = "UPDATE lots SET filled = 'Yes', vehicle_registration = '$vehicle_registration' WHERE id = '$lot_id'";
    $mail = new PHPMailer();
    $mail->IsSMTP();
    // $mail->SMTPDebug = 1;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Username = "mailserver0000013@gmail.com";
    $mail->Password = "gikvhuhsayoxwrey";
    $mail->SetFrom("mailserver0000013@gmail.com", "mail server");
    $mail->Subject = "Successful Parking";
    $mail->Body = "Your vehicle with registration number $vehicle_registration has been parked in lot $lot_id <a href='localhost/smartparker/exit.php?username=$username&lot_id=$lot_id&vehicle_registration=$vehicle_registration'>Exit</a>";
    $mail->AddAddress($_SESSION['email']);
    if (!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message has been sent";
    }
    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
