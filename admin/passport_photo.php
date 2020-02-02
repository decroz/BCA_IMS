<?php

if(isset($_POST['submit']))
{
    $err=[];
    $image = '';
    //image upload
if (isset($_FILES['passport_photo']['error']) && $_FILES['passport_photo']['error'] == 0) {
        //file size validation
    if ($_FILES['passport_photo']['size'] < 1048576) {
        $types = ['image/jpeg','image/gif','image/png','image/jpg', 'image/pdf','image/bmp'];
        $image = 'Notice'.uniqid() . '_' . $_FILES['passport_photo']['name'];
        if (in_array($_FILES['passport_photo']['type'], $types)) {
                //move file to your folder
            if(move_uploaded_file($_FILES['passport_photo']['tmp_name'], 
                'img/users/' . $image)){
            }else {
                $err['passport_photo'] = 'File Upload Failed!!';
            }
        } else {
            $err['passport_photo'] = 'File type not allowed';
        }
    } else {
        $err['passport_photo'] = 'File size exceed, 1 MB allowed';
    }
}
   $user =  $_POST['id'];

if (count($err) == 0){
require "include/connection.php";
 echo $sql = "UPDATE images i SET i.passport_photo='$image' 
 inner join entrance_form e on i.id=e.image_id
 inner join admission a on e.id=a.entance_form_id
 inner join users u on a.users_id=u.id
  where id='$user' ";
$connect->query($sql);
print_r($connect);
}
}

?>