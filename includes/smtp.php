<?php
require 'dbconn.php';
require 'phpmailer/PHPMailerAutoload.php';
session_start();

$vehicle_registration = $_SESSION["vehicle_registration"];
$lot_id = $_POST["lot_id"];
$sql = "SELECT * FROM lots WHERE filled = 'No' ORDER BY id ASC";
$result = $conn->query($sql);
$num_rows = $result->num_rows;
$rows = $result->fetch_all(MYSQLI_ASSOC);

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
$mail->SetFrom("mailserver0000013@gmail.com","mail server");
$mail->Subject = "SmartPark";
$mail->Body = "Your vehicle with registration number $vehicle_registration needs to be parked in lot $lot_id";
$mail->AddAddress($_SESSION['email']);
if(!$mail->Send()){
    echo "Mailer Error: " . $mail->ErrorInfo;
}else{
    echo "Message has been sent";
}

?>