<?php
require "include/security.php";
require "alert_message.php";
$email = $_GET['email'];
$name =$_GET['name'];

//database connection
require_once "include/connection.php";
$sql ="SELECT * from admission a
inner join entrance_form e on a.entrance_form_id=e.id
 where email='$email'";
 
$result=$connect->query($sql);
$data =[];
if ($result->num_rows > 0) {
    while ($user = $result->fetch_assoc()) {
     array_push($data, $user);
   }
  }
  foreach($data as $index => $d){
    $a_id=$d['apply_admission_id'];
    $sem=$d['semester_id'];
}

if($sem==1){
function generateCode($limit){
    $code = 0;
    for($i = 0; $i < $limit; $i++) { $code .= mt_rand(0, 9); }
    return $code;
}
$reg = generateCode(14);

$permitted_chars = '0123456789abcdef';
 
function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
 
    return $random_string;
}
$roll = generate_string($permitted_chars, 7);

require_once "include/connection.php";
$sql="Update admission set tu_reg_no='$reg', exam_roll_no='$roll'  where apply_admission_id='$a_id'";
$connect->query($sql);
}
require_once "include/connection.php";
 require "phpmailer/admission_email_verification.php";
 header('location:index.php');

?>