<?php
$title = 'Update Notices';
require "include/security.php";
$id = $_GET['id'];

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
    $err = [];
         //title check
    if (isset($_POST['titles']) && !empty($_POST['titles'])){
        $titles= $_POST['titles'];
    } else{
        $err['titles']='Enter titles...';
    }

        //discreption check
    if (isset($_POST['discription']) && !empty($_POST['discription'])){
        $discription=validateUserData( $_POST['discription']);
    } else{
        $err['discription']='Enter notice content...';
    }
    
    $image = '';
        //image upload
    if (isset($_FILES['photo']['error']) && $_FILES['photo']['error'] == 0) {
            //file size validation
        if ($_FILES['photo']['size'] < 1048576*5) {
            $types = ['image/jpeg','image/png','image/jpg', 'image/pdf','image/bmp'];
            $image = 'Notice'.uniqid() . '_' . $_FILES['photo']['name'];
            if (in_array($_FILES['photo']['type'], $types)) {
                    //move file to your folder
                if(move_uploaded_file($_FILES['photo']['tmp_name'], 
                    'img/'.$image)){
                }else {
                    $err['photo'] = 'File Upload Failed!!';
                }
            } else {
                $err['photo'] = 'File type not allowed';
            }
        } else {
            $err['photo'] = 'File size exceed, 5 MB allowed';
        }
    }
    
         //current datetime of server
    $updated_at = date('Y-m-d H:i:s');
        //loggedin user id : take from session
    $updated_by = 2;

    if (count($err) == 0) {
        require "include/connection.php";
        //make query to insert data
        if(!empty($image)){
          $sql ="update notice set titles='$titles', discription='$discription',image='$image',updated_by='$updated_by',updated_at='$updated_at' where id=$id ";
     } else {
          $sql ="update notice set titles='$titles', discription='$discription',updated_by='$updated_by',updated_at='$updated_at' where id=$id ";
     }
        //execute query
     $connect->query($sql);
     
        //check data insert status\
     if ($connect->affected_rows == 1) {
        header("location:notice.php?success=1");
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

//sql to delete record using id
$sql = "select * from notice where id=$id";

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
            <div class="form-group ">
                <label for="titles" >Title</label>
                <input type="text" name="titles" id="titles" class="form-control form-control-user" value="<?php echo $user['titles'] ?>" >
                <p class="alert-danger">
                <?php 
                if (isset($err['titles'])) {
                 echo $err['titles'];
             }
             ?>
             </p>
         </div>     
         <div class="form-group">
            <label for="discription">Notice</label>
            <textarea  class="form-control form-control-user"  id="summernote" name="discription"><?php echo $user['discription'] ?></textarea>
            <p class="alert-danger">
            <?php
            if (isset($err['discription'])) {
                echo $err['discription'];
            }
            ?>
            </p>
            
            <label for="image">Image</label>
            <input type="file" value="<?php echo $user['image']; ?>" class="form-control-user"  id="image" name="photo">
            <p class="alert-danger">
            <?php
            if (isset($err['photo'])) {
                echo $err['photo'];
            }
            ?>
            </p>
        </div>

        <div class="form-group col bg-white mt-3 ">
            <button type="submit" name="btnUpdate" class="btn btn-info btn-user btn-block" value="update notice">Update Notice
            </button>
        </div>
    </form>
</div>
</div>
</div>

<?php
include 'include/script.php';
include 'include/footer.php';
?>