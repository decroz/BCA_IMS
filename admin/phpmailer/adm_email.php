<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer();

//$mail->SMTPDebug = 4;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'bcapmc2074tu@gmail.com';                 // SMTP username
$mail->Password = 'sajilaixa';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('bcapmc2074tu@gmail.com', 'Patan Campus');
$mail->addAddress($_REQUEST['email']);     // Add a recipient              // Name is optional
$mail->addReplyTo('bcapmc2074tu@gmail.com');


//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
$body ="<div>Dear $_REQUEST[name], </div>
<div>The informations that you have provided didn\'t meet requirements as mentioned.</div>
Thus, your request for admission has been rejected.
<div>For more Information visit Patan Multiple Campus.</div>";
$mail->Subject = 'Admission form Verification';
$mail->Body    = "$body";

$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    $failed="Unable to decline";
} else {
    echo 'Message has been sent';
    $success="Decline Successful";
}