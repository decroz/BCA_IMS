<?php
if (isset($_POST['submit']))
{

    $entrance_symbol_no=$_POST['entrance_symbol_no'];
    $rank=$_POST['rank'];
    $emergency_fname=$_POST['emergency_fname'];
    $emergency_mname=$_POST['emergency_mname'];
    $emergency_lname=$_POST['emergency_lname'];
    $relation_contact_no=$_POST['relation_contact_no'];
    $relation=$_POST['relation'];
    $created_by = 2;
    $created_at = date('Y-m-d H:i:s');

    if (isset($_FILES['transcript']['error']) && $_FILES['transcript']['error'] == 0) {
    //file size validation
        if ($_FILES['transcript']['size'] < 2097152) {
            $types = ['image/jpeg','image/gif','image/png','image/jpg', 'image/bmp'];
            $transcript = 'transcript'.uniqid() . '_' . $_FILES['transcript']['name'];
            if (in_array($_FILES['transcript']['type'], $types)) {
            //move file to your folder
                if(move_uploaded_file($_FILES['transcript']['tmp_name'], 
                'admin/img/users/' . $transcript)){
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


require_once "connection.php";
$sql ="SELECT id, ranks, entrance_symbol_no, image_id FROM entrance_form WHERE ranks =' $rank' && entrance_symbol_no='$entrance_symbol_no'";
$result=$connect->query($sql);
$data =[];
if ($result->num_rows > 0) { 
    while ($user = $result->fetch_assoc()) {
     array_push($data, $user);
 }
}
foreach ($data as $index=>$d){
  $sid = $d['id'];
  $srank =$d['ranks'];
  $ssymbol =$d['entrance_symbol_no'];
  $simage_id =$d['image_id'];
}

if (($srank==$rank)&&($ssymbol==$entrance_symbol_no)){
 
    require_once "connection.php";
    
    $sql="INSERT INTO apply_admission (entrance_symbol_no, rank, emergency_contact_fname, relationship, emergency_mobile_no, entrance_form_id, created_by, created_at, emergency_contact_lname, emergency_contact_mname) 
    VALUES ('$entrance_symbol_no','$rank','$emergency_fname','$relation','$relation_contact_no','$sid','$created_by','$created_at','$emergency_lname','$emergency_mname')";
    $connect->query($sql);

    require_once "connection.php";
    $sql = "UPDATE images SET transcript = '$transcript'  WHERE id = $simage_id";

    $connect->query($sql);
    header ('location:index.php');

}else{
    header ('location:applyforaddmission.php');
}

if ($connect->affected_rows == 1 && $connect->insert_id >0) {
    $success =  "Insert Success";
} else {
    $failed =  "Insert Failed";
}

}
?>