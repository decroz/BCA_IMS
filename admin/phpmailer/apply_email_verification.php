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
$em=$_REQUEST['email'];
$sql="SELECT * from users where username='$em'";

$result=$connect->query($sql);
$data =[];
if ($result->num_rows > 0) {
    while ($user = $result->fetch_assoc()) {
     array_push($data, $user);
   }
  }
  foreach($data as $index => $d){
    $password=$d['password'];
}
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
$body ="<div>Dear $_REQUEST[name], </div>
<div>The informations and attachments that you have provided has been verified.</div>
Thus, your request for admission has been approved.
<div>Kindly fill the admission form to get enrolled,with the provided credintial.</div>
<div>Usernname = $_REQUEST[email],</div>

<div>Password = $password,</div>

<div>Best Regards,</div>
<div>Admin Admin</div>
<div>Patan Multiple Campus</div>
<div>Tel : 123456789</div>";
$mail->Subject = 'Apply admission form Verification';
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