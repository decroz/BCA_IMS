<?php
$title = 'Update Teacher Details';
require "include/security.php";
$id = $_GET['id'];
print_r($_GET);

function validateUserData($value) {

    require "include/connection.php";
    //remove space
    $value = trim($value);
    //remove back slash from string
    $value = stripslashes($value);
    //encode special character
    $value = htmlspecialchars($value);
    //escape special character before inserting into database table
    $value = $connect->real_escape_string($value);
    //return value
    return $value;
  }

if (isset($_POST['btnUpdate'])) {

    $err=[];
    //first name check
    if (isset($_POST['first_name']) && !empty($_POST['first_name'])){
        $first_name= $_POST['first_name'];
    } else{
        $err['first_name']='Enter first name...';
    }

    //middle name check
    if (isset($_POST['middle_name'])){
        $middle_name= $_POST['middle_name'];
    } else{
       $err['middle_name']='Enter middle name...';
   }
   

    //last name check
   if (isset($_POST['last_name']) && !empty($_POST['last_name'])){
    $last_name= $_POST['last_name'];
} else{
    $err['last_name']='Enter last name...';
}


    //designation check
if (isset($_POST['designation']) && !empty($_POST['designation'])){
    $designation= $_POST['designation'];
} else{
    $err['designation']='Enter designation...';
}


    //discription check
if (isset($_POST['discription']) && !empty($_POST['discription'])){
    $discription= validateUserData($_POST['discription']);
} else{
    $err['discription']='Enter discription...';
}


$teacher_image="";
//image upload
if (isset($_FILES['photo']['error']) && $_FILES['photo']['error'] == 0) {
    //file size validation
if ($_FILES['photo']['size'] < 1048576) {
    $types = ['image/jpeg','image/png','image/jpg','image/bmp'];
    $teacher_image = 'Teacher'.uniqid() . '_' . $_FILES['photo']['name'];
    if (in_array($_FILES['photo']['type'], $types)) {
            //move file to your folder
        if(move_uploaded_file($_FILES['photo']['tmp_name'], 
            'img/' . $teacher_image)){
        }else {
            $err['photo'] = 'File Upload Failed!!';
        }
    } else {
        $err['photo'] = 'File type not allowed';
    }
} else {
    $err['photo'] = 'File size exceed, 1 MB allowed';
}
}
 //current datetime of server
$updated_at = date('Y-m-d H:i:s');
    //loggedin user id : take from session
$updated_by = 2;

    if (count($err) == 0) {
        require "include/connection.php";
        //make query to insert data
        if(!empty($teacher_image)){
         echo  $sql ="update teacher set first_name='$first_name', middle_name='$middle_name',last_name='$last_name',designation='$designation',description='$discription',image='$teacher_image',updated_by='$updated_by',updated_at='$updated_at' where id=$id ";
     } else {
          echo $sql ="update teacher set first_name='$first_name', middle_name='$middle_name',last_name='$last_name',designation='$designation',description='$discription',updated_by='$updated_by',updated_at='$updated_at'  where id=$id ";
     }
        //execute query
     $connect->query($sql);
     
        //check data insert status\
     if ($connect->affected_rows == 1) {
        header("location:teacher.php?success=1");
    } else {
        echo "Update Failed";
    }
}
}


require 'include/header.php';
require 'include/navbar.php';

?>
<?php

?>

<?php
//database connection
require_once "include/connection.php";

$sql = "SELECT * from teacher where id='$id'";
//execute query
$result = $connect->query($sql);
$user = $result->fetch_assoc();

?>

<div class="container-fluid">

 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
</div>

<div class="card mt-3">

   <div class="card-body">
     <?php require_once "alert_message.php";?>

     <div class="row">
     <form class="user container" action="<?php echo $_SERVER['PHP_SELF']?>?id=<?php echo $id; ?>" enctype="multipart/form-data" method="POST">

                <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user"  id="exampleFirstName" name="first_name" value="<?php echo $user['first_name'] ?>">
                        <div class=" text-danger ">
                        <?php
                        if (isset($err['first_name'])) {
                           echo $err['first_name'];
                       }
                       ?>
                       </div>
                   </div>

                   <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user"  id="exampleLastName" name="middle_name" value="<?php echo $user['middle_name'] ?>">
                    <div class=" text-danger ">
                    <?php
                    if (isset($err['middle_name'])) {
                       echo $err['middle_name'];
                   }
                   ?></div>
               </div>

               <div class=" col-sm-4">
                <input type="text" class="form-control form-control-user"  id="exampleLastName" name="last_name" value="<?php echo $user['last_name'] ?>">
                <div class=" text-danger ">
                <?php
                if (isset($err['last_name'])) {
                   echo $err['last_name'];
               }
               ?>
               </div>
           </div>
           </div>

     
       <div class="form-group row">
    <div class="col-sm-12 mb-3 mb-sm-0">
        <input type="designation" class="form-control form-control-user" id="exampleInputPassword" name="designation" value="<?php echo $user['designation'] ?>">
        <div class=" text-danger ">
        <?php
        if (isset($err['designation'])) {
           echo $err['designation'];
       }
       ?>
       </div>
   </div>
   </div>


       <div class="form-group row">
       <div class="col-sm-12 mb-3 mb-sm-0">
        <textarea type="text" class="form-control form-control-user"  id="summernote" name="discription" ><?php echo $user['description']; ?></textarea>
        <div class=" text-danger ">
        <?php
        if (isset($err['discription'])) {
           echo $err['discription'];
       }
       ?>
       </div>
   </div>
   </div>
   
  

   <label for="image">Image</label>
            <input type="file"  class="form-control-user"  id="image" name="photo" value="img/<?php echo $user['image'] ?>"> 
            <div class=" text-danger ">
                    <?php
                    if (isset($err['photo'])) {
                        echo  "Error!!".' '.$err['photo'];
                    }
                    ?>
                    </div>



<div class="form-group row">
 <button type="submit" name="btnUpdate" class="btn btn-primary btn-user btn-block" value="Update Details">Update Details</button>
</div>

</form>
</div>
</div>
</div>

<?php
include 'include/script.php';
include 'include/footer.php';
?>