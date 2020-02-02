<?php
$title = 'Add Notice';
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
if (isset($_POST['add_notice'])){
    $err=[];
    //titles check
    if (isset($_POST['titles']) && !empty($_POST['titles'])){
        $titles= $_POST['titles'];
    } else{
        $err['titles']='Enter title...';
    }

    //discreption check
    if (isset($_POST['discription']) && !empty($_POST['discription'])){
        $discription= validateUserData($_POST['discription']);
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
                'img/' . $image)){
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
$created_at = date('Y-m-d H:i:s');
	//loggedin user id : take from session
$created_by = 2;


if (count($err) == 0) {
    require "include/connection.php";
      //make query to insert data
    if(!empty($image)){
     $sql = "INSERT INTO notice (titles, discription, image, created_by, created_at) values ('$titles','$discription','$image','$created_by','$created_at')";    
    } else {
     $sql = "INSERT INTO notice (titles, discription, created_by, created_at) values ('$titles','$discription','$created_by','$created_at')";    
    }
    
            //execute query
    $connect->query($sql);
            //check data insert status
    if ($connect->affected_rows == 1 && $connect->insert_id >0) {
       header("location:notice.php?success=1");
    } else {
       $failed =  "Insert Failed";
       echo $failed;
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
      <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

  <!-- Modal -->
            <form class="user container" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                <div class="form-group ">
                    <label for="titles" >Title</label>
                    <input type="text" name="titles" id="titles" class="form-control form-control-user" placeholder="Enter titles...">
                    <div class=" text-danger ">
                    <?php
                    if (isset($err['titles'])) {
                        echo  "Error!!".' '.$err['titles'];
                    }
                    ?>
                    </div>
             </div> 
             
             <div class="form-group">
                <label for="discription">Discription</label>
                <textarea class="form-control form-control-user" id="summernote" name="discription" placeholder="Enter notice here..."></textarea>
                <div class="text-danger ">
                    <?php
                    if (isset($err['discription'])) {
                        echo  "Error!!".' '.$err['discription'];
                    }
                    ?>
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
         <input type="submit" name="add_notice" class="btn btn-primary btn-user btn-block"  value="Add Notice">
    </div>
</form>

<?php
include('include/script.php');
include('include/footer.php');
?>
