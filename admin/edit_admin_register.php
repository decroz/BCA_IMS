<?php
$title = 'Update Admin Info';
require "include/security.php";
$id = $_GET['id'];

if (isset($_POST['btnUpdate'])) {
    $err = [];
    //first name check
    if (isset($_POST['first_name']) && !empty($_POST['first_name'])) {
        $first_name = $_POST['first_name'];
    } else {
        $err['first_name'] = 'Enter first name...';
    }

    //middle name check
    if (isset($_POST['middle_name'])) {
        $middle_name = $_POST['middle_name'];
    } else {
        $err['middle_name'] = 'Enter middle name...';
    }

    //last name check
    if (isset($_POST['last_name']) && !empty($_POST['last_name'])) {
        $last_name = $_POST['last_name'];
    } else {
        $err['last_name'] = 'Enter last name...';
    }

    //email check
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $err['email'] = 'Enter email...';
    }

    //password check
    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $err['password'] = 'Enter password...';
    }

    //confirm password check
    if (isset($_POST['confirm_password']) && !empty($_POST['confirm_password'])) {
        $confirm_password =$_POST['confirm_password'];
    } else {
        $err['confirm_passwoord'] = 'Enter confirmation password...';
    }

    // match password and confirm password
    if ($_POST["password"] !== $_POST["confirm_password"]) {
        $err['confirm_passwoord'] = 'Password and confirmation password do not match...';
    }

    //current datetime of server
    $updated_at = date('Y-m-d H:i:s');
    //loggedin user id : take from session
    $updated_by = 2;

    if (count($err) == 0) {
        require "include/connection.php";
        //make query to insert data
        $sql = "update admin set first_name='$first_name',middle_name='$middle_name',last_name='$last_name',email='$email',password='$password',updated_by='$updated_by',updated_at='$updated_at' where id=$id ";
        //execute query
        $connect->query($sql);

        //check data insert status\
        if ($connect->affected_rows == 1) {
            $success = "Update Success";
            header("location: admin_register.php?success=1");
        } else {
            $failed = "Update Failed";
        }
    }
}
require 'include/header.php';
require 'include/navbar.php';

?>

<?php
//database connection
require_once "include/connection.php";

//sql to delete record using id
$sql = "select * from admin where id=$id";

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
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id ?>" enctype="multipart/form-data" method="post" class="user container">
            <div class="form-group row">
             <div class="col-sm-4 mb-3 mb-sm-0">
                 <input type="text"  value="<?php echo $user['first_name'] ?>" class="form-control form-control-user"  id="exampleFirstName" name="first_name">First Name...
                 <?php
                 if (isset($err['first_name'])) {
                    echo $err['first_name'];
                }
                ?>
            </div>
            <div class="col-sm-4">
                <input type="text" value="<?php echo $user['middle_name'] ?>" class="form-control form-control-user"  id="exampleLastName" name="middle_name">Middle Name...
                <?php
                if (isset($err['middle_name'])) {
                    echo $err['middle_name'];
                }
                ?>
            </div>
            <div class=" col-sm-4">
                <input type="text" value="<?php echo $user['last_name'] ?>" class="form-control form-control-user"  id="exampleLastName" name="last_name">Last Name...
                <?php
                if (isset($err['last_name'])) {
                    echo $err['last_name'];
                }
                ?>
            </div>
        </div>
        <div class="form-group">
            <input type="email" value="<?php echo $user['email'] ?>"class="form-control form-control-user" id="exampleInputEmail" name="email">Email Address...
            <?php
            if (isset($err['email'])) {
                echo $err['email'];
            }
            ?>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="password" value="<?php echo $user['password'] ?>"class="form-control form-control-user" id="exampleInputPassword" name="password">Password...
                <?php
                if (isset($err['password'])) {
                    echo $err['password'];
                }
                ?>
            </div>
            <div class="col-sm-6">
                <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" name="confirm_password">Confirm Password...
                <?php
                if (isset($err['confirm_password'])) {
                    echo $err['confirm_password'];
                }
                ?>
            </div>

            <div class="form-group col bg-white mt-3 ">
                <button type="submit" name="btnUpdate" class="btn btn-info btn-user btn-block"  value="update admin info">Update Admin Info
                </button>
            </div>
        </form>
    </div>
</div>
</div>
</div>


<?php
include 'include/script.php';
include 'include/footer.php';
?>