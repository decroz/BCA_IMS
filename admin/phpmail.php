<?php
require_once('PHPMailer/PHPMailerAutoload.php');
$mail = new PHPMailer();
$mail = IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure ='ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->IsHTML();
$mail->Username = '';
$mail->Password = '';
$mail->Setfrom('no-reply@patanbca.edu.np');
$mail->subject = 'Form Verification';
$mail->body = '';
$mail->AddAddress('');
$mail->Send();
?>