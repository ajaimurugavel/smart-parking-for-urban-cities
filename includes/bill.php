<?php
require 'dbconn.php';
require 'phpmailer/PHPMailerAutoload.php';
session_start();

$vehicle_registration = $_GET["vehicle_registration"];
$lot_id = $_GET["lot_id"];
$sql = "SELECT * FROM lots WHERE vehicle_registration = '$vehicle_registration'";
$result = $conn->query($sql);
$num_rows = $result->num_rows;
if ($num_rows == 0) {
    exit();
}
$rows = $result->fetch_all(MYSQLI_ASSOC);
$enterTime = $rows[0]['updated_at'];
$sql = "SELECT * FROM users WHERE vehicle_registration = '$vehicle_registration'";
$result = $conn->query($sql);
$num_rows = $result->num_rows;
if ($num_rows == 0) {
    exit();
}
$rows = $result->fetch_all(MYSQLI_ASSOC);
$email = $rows[0]["email"];

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
$mail->Subject = "Parking Bill";
//set exit time to current indian time
date_default_timezone_set("Asia/Kolkata");
$exitTime = date("Y-m-d H:i:s");
$enterTime = strtotime($enterTime);
$exitTime = strtotime($exitTime);
$diff = $exitTime - $enterTime;
$diff = $diff/60;
$diff = round($diff);
$diff = $diff/60;
$diff = round($diff);
$diff = $diff*10;
//if diff is 0 make it 1
if($diff == 0){
    $diff = 1;
}
//add 50$ for every hour
$pay = $diff + 50;
//create bill with button to pay
$mail->Body = "Your vehicle with registration number $vehicle_registration has been parked in lot $lot_id for $diff hours. Please pay the bill of <b>Rs.$pay</b> <a href='localhost/smartparker/pay.php?amount=$pay'>here</a>\n\nThank you for using our services";
$mail->AddAddress($email);
$sql = "UPDATE lots SET filled = 'No', vehicle_registration = NULL WHERE vehicle_registration = '$vehicle_registration'";
$result = $conn->query($sql);
//destroy session
session_unset();
session_destroy();
if(!$mail->Send()){
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message has been sent";
}
?>