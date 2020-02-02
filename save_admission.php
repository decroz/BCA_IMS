<?php
if (isset($_POST['submit']))
{
    $voucher_no=$_POST['voucher_no'];
    $batch=$_POST['batch'];
    $semester=$_POST['semester'];
$email=$_POST['email'];
    $created_by = 2;
    $created_at = date('Y-m-d H:i:s');

    require_once "connection.php";
    $sql ="SELECT * FROM entrance_form where email='$email' ";
    $result=$connect->query($sql);

    if($result->num_rows==1){

require_once "connection.php";

$sql ="SELECT * FROM entrance_form e
inner join apply_admission a on e.id=a.entrance_form_id 
WHERE email='$email'";
$result=$connect->query($sql);
$data =[];
if ($result->num_rows > 0) { 
    while ($user = $result->fetch_assoc()) {
     array_push($data, $user);
 }
}

foreach ($data as $index=>$d){
    $sid = $d['id'];
    $eid = $d['entrance_form_id'];
}
require_once "connection.php";
$sql = "INSERT INTO admission (entrance_form_id,apply_admission_id,semester_id,created_by,created_at) 
VALUES ('$eid','$sid','$semester','$created_by','$created_at')";
$connect->query($sql);

if ($semester='1'){
    require_once "connection.php";
    $sql = "UPDATE voucher_no set first_voucher='$voucher_no' where id='$eid'";
    $connect->query($sql);
}elseif ($semester='2'){
    require_once "connection.php";
    $sql = "UPDATE voucher_no set second_voucher='$voucher_no' where id='$eid'";
    $connect->query($sql);
}elseif ($semester='3'){
    require_once "connection.php";
    $sql = "UPDATE voucher_no set third_voucher='$voucher_no' where id='$eid'";
    $connect->query($sql);
}elseif ($semester='4'){
    require_once "connection.php";
    $sql = "UPDATE voucher_no set fourth_voucher='$voucher_no' where id='$eid'";
    $connect->query($sql);
}elseif ($semester='5'){
    require_once "connection.php";
    $sql = "UPDATE voucher_no set fifth_voucher='$voucher_no' where id='$eid'";
    $connect->query($sql);
}elseif ($semester='6'){
    require_once "connection.php";
    $sql = "UPDATE voucher_no set sixth_voucher='$voucher_no' where id='$eid'";
    $connect->query($sql);
}elseif ($semester='7'){
    require_once "connection.php";
    $sql = "UPDATE voucher_no set seventh_voucher='$voucher_no' where id='$eid'";
    $connect->query($sql);
}elseif ($semester='8'){
    require_once "connection.php";
    $sql = "UPDATE voucher_no set third_voucher='$voucher_no' where id='$eid'";
    $connect->query($sql);
}
header ('location:index.php');
}else{
    header ('location:admission.php');
}
}


?>
