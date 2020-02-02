<?php
$title = 'Teacher Registration';
require "include/security.php";
require "include/connection.php";

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
if (isset($_POST['add_teacher'])){
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
    $discription=validateUserData($_POST['discription']);
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
$created_at = date('Y-m-d H:i:s');
    //loggedin user id : take from session
$created_by = 2;

if (count($err) == 0) {
    
            //make query to insert data
            require "include/connection.php";

    $sql = "INSERT INTO teacher (first_name, middle_name, last_name, designation, description, image, created_by, created_at) values ('$first_name','$middle_name','$last_name','$designation','$discription','$teacher_image',$created_by,'$created_at')";
            //execute query
    $connect->query($sql);
            //check data insert status
    if ($connect->affected_rows == 1 && $connect->insert_id >0) {
        header("location:teacher.php?success=1");
    } else {
       $failed =  "Insert Failed";
   }
}
}
require 'include/header.php';
require 'include/navbar.php';
?>

<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"> <?php echo $title;?></h1>
  </div>

  <!-- Modal -->
           <form class="user container" action="<?php echo $_SERVER['PHP_SELF']?>" enctype="multipart/form-data"
 method="POST">

                <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user"  id="exampleFirstName" name="first_name" placeholder="First Name">
                        <div class=" text-danger ">
                        <?php
                        if (isset($err['first_name'])) {
                           echo $err['first_name'];
                       }
                       ?>
                       </div>
                   </div>

                   <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user"  id="exampleLastName" name="middle_name" placeholder="Middle Name">
                    <div class=" text-danger ">
                    <?php
                    if (isset($err['middle_name'])) {
                       echo $err['middle_name'];
                   }
                   ?></div>
               </div>

               <div class=" col-sm-4">
                <input type="text" class="form-control form-control-user"  id="exampleLastName" name="last_name" placeholder="Last Name">
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
        <input type="designation" class="form-control form-control-user" id="exampleInputPassword" name="designation" placeholder="Designation">
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
        <input type="text" class="form-control form-control-user" id="summernote" name="discription" placeholder="Description">
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
            <input type="file"  class="form-control-user"  id="image" name="photo"> 
            <div class=" text-danger ">
                    <?php
                    if (isset($err['photo'])) {
                        echo  "Error!!".' '.$err['photo'];
                    }
                    ?>
                    </div>

   

<div class="form-group row">
 <input type="submit" name="add_teacher" class="btn btn-primary btn-user btn-block" value="add teacher">
</div>

</form>

<?php
include('include/script.php');
include('include/footer.php');
?>