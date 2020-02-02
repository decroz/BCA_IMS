<?php
$title = 'Add Registration';
require "include/security.php";
require "include/connection.php";

if (isset($_POST['add_admin'])){
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


    //email check
if (isset($_POST['email']) && !empty($_POST['email'])){
    $email= $_POST['email'];
} else{
    $err['email']='Enter email...';
}


    //password check
if (isset($_POST['password']) && !empty($_POST['password'])){
    $password= $_POST['password'];
} else{
    $err['password']='Enter password...';
}

    //confirm password check
if (isset($_POST['confirm_password']) && !empty($_POST['confirm_password'])){
    $confirm_password= ($_POST['confirm_password']);
} else{
    $err['confirm_passwoord']='Enter confirmation password...';
}

     // match password and confirm password 
if (($_POST["password"]) === ($_POST["confirm_password"])) {
    $password= $_POST['confirm_password'];
}
else {
    $err['confirm_passwoord']='Password and confirmation password do not match...';
}
     //current datetime of server
$created_at = date('Y-m-d H:i:s');
    //loggedin user id : take from session
$created_by = 2;

if (count($err) == 0) {
            //make query to insert data
    $sql = "INSERT INTO admin (first_name, middle_name, last_name, email, password, created_by,created_at) values ('$first_name','$middle_name','$last_name','$email','$password',$created_by,'$created_at')";
            //execute query
    $connect->query($sql);
            //check data insert status
    if ($connect->affected_rows == 1 && $connect->insert_id >0) {
        header("location:admin_register.php?success=1");
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
      <h1 class="h3 mb-0 text-gray-800">Admin Registration</h1>
  </div>

  <!-- Modal -->
           <form class="user container" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
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
       <div class="form-group">
        <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" placeholder="Email Address">
        <div class=" text-danger ">
        <?php
        if (isset($err['email'])) {
           echo $err['email'];
       }
       ?>
       </div>
   </div>
   <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password">
        <div class=" text-danger ">
        <?php
        if (isset($err['password'])) {
           echo $err['password'];
       }
       ?>
       </div>
   </div>
   <div class="col-sm-6">
    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" name="confirm_password" placeholder="Confirm Password">
    <div class=" text-danger ">
    <?php
    if (isset($err['confirm_password'])) {
       echo $err['confirm_password'];
   }
   ?>
   </div>
</div>
</div>
<div class="form-group row">
 <input type="submit" name="add_admin" class="btn btn-primary btn-user btn-block" href="admin_register.php" value="add admin">
</div>
<hr>
</form>

<?php
include('include/script.php');
include('include/footer.php');
?>