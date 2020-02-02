<?php
if (isset($_POST['submit']))
{
   
    $entrance_voucher_no = $_POST['entrance_voucher_no'];
    $student_first_name = $_POST['student_first_name'];
    $student_middle_name = $_POST['student_middle_name'];
    $student_last_name = $_POST['student_last_name'];
    $contact_no = $_POST['contact_no'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $citizenship_no = $_POST['citizenship_no'];
    $nationality = $_POST['nationality'];
    $ward_no = $_POST['ward_no'];
    $school_name = $_POST['school_name'];
    $school_symbol = $_POST['school_symbol'];
    $spassed_year = $_POST['spassed_year'];
    $spercentage_cgpa = $_POST['spercentage_cgpa'];
    $equivalent=$_POST['equivalent'];
    $college=$_POST['college'];
    $cboard=$_POST['cboard'];
    $college_symbol=$_POST['college_symbol'];
    $cpassed_year=$_POST['cpassed_year'];
    $cpercentage_cgpa=$_POST['cpercentage_cgpa'];
    $cboard=$_POST['cboard'];
    $father_first_name=$_POST['father_first_name'];
    $father_middle_name=$_POST['father_middle_name'];
    $father_last_name=$_POST['father_last_name'];
    $mother_first_name=$_POST['mother_first_name'];
    $mother_middle_name=$_POST['mother_middle_name'];
    $mother_last_name=$_POST['mother_last_name'];
    $country = $_POST['country'];
    $sboard = $_POST['sboard'];
    $gender = $_POST['gender'];
    $school_district = $_POST['school_district'];
    $c_district = $_POST['c_district'];
    $vdc = $_POST['vdc'];
    $quota = $_POST['quota'];
    $sqldob = date('y-m-d',strtotime($dob));
    $created_by = 2;
    $created_at = date('Y-m-d H:i:s');
    $entrance_symbol_no = substr(sha1(mt_rand()),26,6);
    
    if (isset($_FILES['pp_photo']['error']) && $_FILES['pp_photo']['error'] == 0) {
        //file size validation
        if ($_FILES['pp_photo']['size'] < 800000) {
            $types = ['image/jpeg','image/gif','image/png','image/jpg','image/bmp'];
            $passport_photo = 'photo'.uniqid() . '_' . $_FILES['pp_photo']['name'];
            if (in_array($_FILES['pp_photo']['type'], $types)) {
                //move file to your folder
                if(move_uploaded_file($_FILES['pp_photo']['tmp_name'], 
                    'admin/img/users/' . $passport_photo)){
                }else {
                    echo "File Upload Failed!!";
                }
            } else {
             echo "File type not allowed";
         }
     } else {
        echo 'File size exceed, 1 MB allowed';
    }
}


if (isset($_FILES['sgradesheet']['error']) && $_FILES['sgradesheet']['error'] == 0) {
    //file size validation
    if ($_FILES['sgradesheet']['size'] < 2097152) {
        $types = ['image/jpeg','image/gif','image/png','image/jpg', 'image/bmp'];
        $school_gradesheet = 'marks_'.uniqid() . '_' . $_FILES['sgradesheet']['name'];
        if (in_array($_FILES['sgradesheet']['type'], $types)) {
            //move file to your folder
            if(move_uploaded_file($_FILES['sgradesheet']['tmp_name'], 
                'admin/img/users/' . $school_gradesheet)){
            }else {
                echo "File Upload Failed!!";
            }
        } else {
         echo "File type not allowed";
     }
 } else {
    echo 'File size exceed, 2 MB allowed';
}
}
else{
    echo"no image";
}

if (isset($_FILES['scharacter_certificate']['error']) && $_FILES['scharacter_certificate']['error'] == 0) {
    //file size validation
    if ($_FILES['scharacter_certificate']['size'] < 2097152) {
        $types = ['image/jpeg','image/gif','image/png','image/jpg', 'image/bmp'];
        $school_character_certificate = 'certificate_'.uniqid() . '_' . $_FILES['scharacter_certificate']['name'];
        if (in_array($_FILES['scharacter_certificate']['type'], $types)) {
            //move file to your folder
            if(move_uploaded_file($_FILES['scharacter_certificate']['tmp_name'], 
                'admin/img/users/' . $school_character_certificate)){
            }else {
                echo "File Upload Failed!!";
            }
        } else {
         echo "File type not allowed";
     }
 } else {
    echo 'File size exceed, 2 MB allowed';
}
}

if (isset($_FILES['cgradesheet']['error']) && $_FILES['cgradesheet']['error'] == 0) {
    //file size validation
    if ($_FILES['cgradesheet']['size'] < 2097152) {
        $types = ['image/jpeg','image/gif','image/png','image/jpg', 'image/bmp'];
        $college_gradesheet = 'marks_'.uniqid() . '_' . $_FILES['cgradesheet']['name'];
        if (in_array($_FILES['cgradesheet']['type'], $types)) {
            //move file to your folder
            if(move_uploaded_file($_FILES['cgradesheet']['tmp_name'], 
                'admin/img/users/' . $college_gradesheet)){
            }else {
                echo "File Upload Failed!!";
            }
        } else {
         echo "File type not allowed";
     }
 } else {
    echo 'File size exceed, 2 MB allowed';
}
}

if (isset($_FILES['ccharacter_certificate']['error']) && $_FILES['ccharacter_certificate']['error'] == 0) {
    //file size validation
    if ($_FILES['ccharacter_certificate']['size'] < 2097152) {
        $types = ['image/jpeg','image/gif','image/png','image/jpg', 'image/bmp'];
        $college_character_certificate = 'certificate_'.uniqid() . '_' . $_FILES['ccharacter_certificate']['name'];
        if (in_array($_FILES['ccharacter_certificate']['type'], $types)) {
            //move file to your folder
            if(move_uploaded_file($_FILES['ccharacter_certificate']['tmp_name'], 
                'admin/img/users/' . $college_character_certificate)){
            }else {
                echo "File Upload Failed!!";
            }
        } else {
         echo "File type not allowed";
     }
 } else {
    echo 'File size exceed, 2 MB allowed';
}
}
}

require_once "connection.php";
$sql="INSERT INTO academic_info(plus_equivalent, school_board, college_board, school_name, college_name, school_symbol_no, college_symbol_no, school_district, college_district, school_passed_year, college_passed_year, created_by, created_at,school_percentage, college_percentage) 
VALUES ('$equivalent','$sboard','$cboard','$school_name','$college','$school_symbol','$college_symbol','$school_district','$c_district','$spassed_year','$cpassed_year','$created_by','$created_at','$spercentage_cgpa','$cpercentage_cgpa')";
$connect->query($sql);

$academic_information_id = $connect->insert_id;

require_once "connection.php";
$sql ="SELECT * FROM batch ORDER BY Id DESC LIMIT 1";
$result = $connect->query($sql);
$data2 = [];

if ($result->num_rows > 0) { 
  while ($user = $result->fetch_assoc()) {
   array_push($data2, $user);
}
}
foreach ($data2 as $index=>$b){
    $batch_id = $b['id'];
}


require_once "connection.php";
$sql="INSERT INTO `images`
(passport_photo, school_gradesheet, college_gradesheet, college_certificate, school_certificate, created_by, created_at)
VALUES ('$passport_photo','$school_gradesheet','$college_gradesheet','$college_character_certificate','$school_character_certificate','$created_by','$created_at')";
$connect->query($sql);

$image_id=$connect->insert_id;

require_once "connection.php";
$sql="INSERT INTO entrance_form
(student_fname,student_mname, student_lname, gender, mobile_no, dob, email, citizenship_no, vdc_id, father_fname, father_mname, father_lname, mother_fname, mother_mname, mother_lname, nationality, country, academic_id, quota, created_by, created_at, ward_no, batch_id, image_id,entrance_symbol_no) 
VALUES 
('$student_first_name','$student_middle_name','$student_last_name','$gender','$contact_no','$sqldob','$email','$citizenship_no','$vdc','$father_first_name','$father_middle_name','$father_last_name','$mother_first_name','$mother_middle_name','$mother_last_name','$nationality','$country','$academic_information_id','$quota','$created_by','$created_at','$ward_no','$batch_id','$image_id','$entrance_symbol_no')";
$connect->query($sql);

$entrance_voucher_id = $connect->insert_id;
if ($connect->affected_rows == 1 && $connect->insert_id >0) {
    $success = "Insert Success";
   
} else {
$failed = "Insert Failed";
}
require_once "connection.php";
$sql="INSERT INTO voucher_no
(id,entrance_voucher) VALUES ('$entrance_voucher_id','$entrance_voucher_no')";
$connect->query($sql);

if (isset($success)){
    echo $success;
    header("location:index.php");
}
if (isset($failed)){
    echo $failed;
    header("location:entrance.php");
}


?>