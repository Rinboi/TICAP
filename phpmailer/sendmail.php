<?php
include "phpmailer/PHPMailerAutoload.php";

$gmailUsername = "";//Gmail username to be used as sender (make sure gmail setting (Allow less secure apps) is turned ON or enabled)
$gmailPassword = "";//Gmail Password


//////////////////////////////////////
$mail = new PHPMailer(); 
$mail->IsSMTP(); 
$mail->SMTPAuth = true; 
$mail->SMTPSecure = 'ssl'; // 
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
$mail->IsHTML(true);
$mail->Username = $gmailUsername;
$mail->Password = $gmailPassword;
/////////////////////////////////////






$mail->SetFrom($gmailUsername,"FEU-IT Admin");//Name of Sender is user defined


$mail->Subject = ""; //Email Subject:
$mail->Body = "";//Content of Message

$mail->AddAddress("");//Recepient of email: to send whatever email you want to


 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }

 
 
?>
