<?php
if (isset($_POST['submit']))
{
    $voucher_no=$_POST['exam_voucher'];
    $exam_roll=$_POST['exam_roll'];
    $tu_reg_no=$_POST['tu_reg_no'];
    $semester=$_POST['semester'];
 $exam_type=$_POST['exam_type'];
    if($exam_type=='partial'){
    $sub_id=$_POST['subject_list'];
    }
    $created_by = 2;
    $created_at = date('Y-m-d H:i:s');
}

require_once "connection.php";
$sql ="SELECT * FROM admission";
$result=$connect->query($sql);
while($row = $result->fetch_assoc()) {
    $a_id=$row['id'];
 $reg=$row['tu_reg_no'];
 $symbol=$row['exam_roll_no'];
} 

if ($tu_reg_no==$reg && $exam_roll==$symbol) {
    require_once "connection.php";
     $sql ="SELECT * FROM entrance_form e
    inner join admission a on e.id=a.entrance_form_id 
    WHERE tu_reg_no='$reg' && exam_roll_no='$symbol'";
    $result=$connect->query($sql);
    $data =[];
    if ($result->num_rows > 0) { 
        while ($user = $result->fetch_assoc()) {
         array_push($data, $user);
     }
    }
    foreach ($data as $index=>$d){
        $sid = $d['id'];
        $aid = $d['entrance_form_id'];
        $semester_id= $d['semester_id'];
        $aid = $d['admission_id'];
    } 
    
    if ($exam_type='full'){
  
if ($semester='1'){
    require_once "connection.php";
    $sql = "UPDATE voucher_no set first_exam='$voucher_no' where id='$aid'";
    $connect->query($sql);
}elseif ($semester='2'){
    require_once "connection.php";
    $sql = "UPDATE voucher_no set second_exam='$voucher_no' where id='$aid'";
    $connect->query($sql);
}elseif ($semester='3'){
    require_once "connection.php";
    $sql = "UPDATE voucher_no set third_exam='$voucher_no' where id='$aid'";
    $connect->query($sql);
}elseif ($semester='4'){
    require_once "connection.php";
    $sql = "UPDATE voucher_no set fourth_exam='$voucher_no' where id='$aid'";
    $connect->query($sql);
}elseif ($semester='5'){
    require_once "connection.php";
    $sql = "UPDATE voucher_no set fifth_exam='$voucher_no' where id='$aid'";
    $connect->query($sql);
}elseif ($semester='6'){
    require_once "connection.php";
    $sql = "UPDATE voucher_no set sixth_exam='$voucher_no' where id='$aid'";
    $connect->query($sql);
}elseif ($semester='7'){
    require_once "connection.php";
    $sql = "UPDATE voucher_no set seventh_exam='$voucher_no' where id='$aid'";
    $connect->query($sql);
}elseif ($semester='8'){
    require_once "connection.php";
    $sql = "UPDATE voucher_no set eight_exam='$voucher_no' where id='$aid'";
    $connect->query($sql);
}
    require_once "connection.php";
    $sql = "INSERT INTO full_exam (semester_id,admission_id) 
    VALUES ('$semester','$a_id')";
    $connect->query($sql);
    }else{

        
if ($semester='1'){
    require_once "connection.php";
    $sql = "UPDATE voucher_no set p_first_exam='$voucher_no' where id='$aid'";
    $connect->query($sql);
}elseif ($semester='2'){
    require_once "connection.php";
    $sql = "UPDATE voucher_no set p_second_exam='$voucher_no' where id='$aid'";
    $connect->query($sql);
}elseif ($semester='3'){
    require_once "connection.php";
    $sql = "UPDATE voucher_no set p_third_exam='$voucher_no' where id='$aid'";
    $connect->query($sql);
}elseif ($semester='4'){
    require_once "connection.php";
    $sql = "UPDATE voucher_no set p_fourth_exam='$voucher_no' where id='$aid'";
    $connect->query($sql);
}elseif ($semester='5'){
    require_once "connection.php";
    $sql = "UPDATE voucher_no set p_fifth_exam='$voucher_no' where id='$aid'";
    $connect->query($sql);
}elseif ($semester='6'){
    require_once "connection.php";
    $sql = "UPDATE voucher_no set p_sixth_exam='$voucher_no' where id='$aid'";
    $connect->query($sql);
}elseif ($semester='7'){
    require_once "connection.php";
    $sql = "UPDATE voucher_no set p_seventh_exam='$voucher_no' where id='$aid'";
    $connect->query($sql);
}elseif ($semester='8'){
    require_once "connection.php";
    $sql = "UPDATE voucher_no set P_eight_exam='$voucher_no' where id='$aid'";
    $connect->query($sql);
}
        require_once "connection.php";
        $sql = "INSERT INTO partial_exam (sub_id,admission_id) 
        VALUES ('$sub_id','$a_id')";
        $connect->query($sql);
    }
    header("location:index.php");
    }else{
    header("location:examination.php");

    }

    ?>