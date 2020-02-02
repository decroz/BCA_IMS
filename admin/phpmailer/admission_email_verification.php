<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer();

//$mail->SMTPDebug = 4;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'bcapmc2074tu@gmail.com';           // SMTP username
$mail->Password = 'sajilaixa';                        // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('bcapmc2074tu@gmail.com', 'Patan Campus');
$mail->addAddress($_REQUEST['email']);     // Add a recipient              // Name is optional
$mail->addReplyTo('bcapmc2074tu@gmail.com');

$em=$_REQUEST['email'];
$sql ="SELECT * from admission a
inner join entrance_form e on a.entrance_form_id=e.id
 where email='$em'";

$result=$connect->query($sql);
$data =[];
if ($result->num_rows > 0) {
    while ($user = $result->fetch_assoc()) {
     array_push($data, $user);
   }
  }
  foreach($data as $index => $d){
    $reg=$d['tu_reg_no'];
    $roll=$d['exam_roll_no'];
    $sem=$d['semester_id'];

}
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
$body ="<div>Dear $_REQUEST[name], </div>
<div>The information that you have provided has been verified.</div>
Thus, your request for admission has been approved.";
if($sem==1){
$body .="
<div></div> Please find your registration no. and exam symbol no.</div>
<div>Registration no. = $reg</div>
<div>Exam Roll no. = $roll</div>";
}
$body .="
<div>Best Regards,</div>
<div>Admin Admin</div>
<div>Patan Multiple Campus</div>
<div>Tel : 123456789</div>";
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