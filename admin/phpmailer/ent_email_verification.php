<?php
$id=$_GET['id'];
require_once "../include/connection.php";
require_once '../dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;
$file_name=md5(rand()).'.pdf';
$document = new Dompdf();

$html ="
<style>
td, th{
   padding:10px 80px 10px 20px;
   text-align: left;
}
</style>
<div>
            <div style='float:left;'>
                <img src='../img/received_207774400126295.PNG' style='height:150px;'>
            </div>
            <center style='float:center;'>
                <h3 >Admission Card for Entrance Test</h3>
                <h3 class='font-weight-bold'>TRIBHUVAN UNIVERSITY</h3>
                <h4 >Faculty of Humanities and Social Sciences</h4>
                <h3 class='font-weight-bold'> Bachelor of Computer Application</h3>
            </center>";

            $sql = "SELECT * from  
            entrance_form e 
            inner join images i on e.image_id=i.id
            where image_id=$id";
            $result = $connect->query($sql);
            $data = [];
            
            if($result->num_rows > 0) {
              while ($user = $result->fetch_assoc()) {
                 array_push($data, $user);
             }
            }
            
foreach($data as $index=>$d){ 

            $html .="<div style='float:center;'>
            <img border=2 src='../img/users/$d[passport_photo]' style='height:45mm;float:right;'><br>
        </div>
    </div>
    ";

    $html .="<div >
        <table border='1' style='font-size:19px;border:collapse;padding-top:200px'>
            <tr>
                <th>Entrance Symbol no</th>
                <td>$d[entrance_symbol_no]</td>
            </tr>

            <tr >
                <th>Applicant's Name</th>
                <td>$d[student_fname] $d[student_mname] $d[student_lname]</td>
            </tr>

            <tr>
                <th>Entrance Symbol no</th>
                <td>$d[mobile_no]</td>
            </tr>   
        </table>        
    </div>
";

}

$document->loadHtml($html);

// (Optional) Setup the paper size and orientation
$document->setPaper('A4', 'portrait');

// Render the HTML as PDF
$document->render(); 
$file=$document->output();
file_put_contents($file_name,$file);
// Output the generated PDF to Browser
//$document->stream($file_name, array("Attachment"=>0));

require 'PHPMailerAutoload.php';

$mail = new PHPMailer();

//$mail->SMTPDebug = 4;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'bcapmc2074tu@gmail.com';           // SMTP username
$mail->Password = 'sajilaixa';                        // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('bcapmc2074tu@gmail.com', 'Patan Campus');
foreach($data as $index=>$d){ 
$mail->addAddress($d['email']);     // Add a recipient              // Name is optional

$mail->addReplyTo('bcapmc2074tu@gmail.com');


$mail->addAttachment($file_name);         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
$body ="<div>Dear $d[student_fname], </div>
<div>The informations and attachments that you have provided has been verified.</div>Thus, your entrance form has been accepted.
<div>Please find the attachment of your entrance admit card below.</div>
<div>Best Regards,</div>
<div>Admin Admin</div>
<div>Patan Multiple Campus</div>
<div>Tel : 123456789</div>";
$mail->addAttachment($file_name);
$mail->Subject = 'Entrance form Verification';
$mail->Body    = "$body";
}
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    $failed="Unable to decline";
} else {
    echo 'Message has been sent';
    $success="Decline Successful";
}
unlink($file_name);