<?php
$title = 'Events';
require "include/security.php";

if (isset($_POST['add_events'])){
    $err=[];
    //titles check
    if (isset($_POST['titles']) && !empty($_POST['titles'])){
        $titles= $_POST['titles'];
    } else{
        $err['titles']='Enter titles...';
    }

    //discreption check
    if (isset($_POST['description']) && !empty($_POST['description'])){
        $description= $_POST['description'];
    } else{
        $err['description']='Enter events content...';
    }

    $event_image = '';
    //image upload
    if (isset($_FILES['photo']['error']) && $_FILES['photo']['error'] == 0) {
		//file size validation
      if ($_FILES['photo']['size'] < 1048576) {
         $types = ['image/jpeg','image/gif','image/png','image/jpg','image/bmp'];
         $event_image = 'events'.uniqid() . '_' . $_FILES['photo']['name'];
         if (in_array($_FILES['photo']['type'], $types)) {
				//move file to your folder
            if(move_uploaded_file($_FILES['photo']['tmp_name'], 
               'img/' . $event_image)){
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
    if(!empty($event_image)){
        $sql = "INSERT INTO events (titles, description, event_image, created_by, created_at) values ('$titles','$description','$event_image','$created_by','$created_at')";    
    } else {
        $sql = "INSERT INTO events (titles, description, created_by, created_at) values ('$titles','$description','$created_by','$created_at')";    
    }
    
            //execute query
    $connect->query($sql);
            //check data insert status
    if ($connect->affected_rows == 1 && $connect->insert_id >0) {
        header("location:events.php?success=1");
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

            <form class="user container" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                <div class="form-group ">
                    <label for="titles" >Title</label>
                    <input type="text" name="titles" id="titles" class="form-control form-control-user" placeholder="Enter title...">
                    <div class=" text-danger ">
                    <?php 
                    if (isset($err['titles'])) {
                     echo $err['titles'];
                 }
                 ?>
     </div>
             </div> 
             
             <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control form-control-user" id="summernote" name="description" placeholder="Enter events here..."></textarea>
                <div class=" text-danger ">
                <?php
                if (isset($err['description'])) {
                   echo $err['description'];
               }
               ?>
     </div>
           </div>

           <div class="form-group ">
            <label for="image">Image</label>
            <input type="file" name="photo" id="image" accept="image/jpeg|image/gif|image/png|image/jpg|image/bmp" class="form-control-user" >
            <div class=" text-danger ">
            <?php 
            if (isset($err['photo'])) {
             echo $err['photo'];
         }
         ?>
     </div>
     </div>

     <div class="form-group row">
         <input type="submit" name="add_events" class="btn btn-primary btn-user btn-block" value="Add Events">
    </div>
</form>

<?php
include('include/script.php');
include('include/footer.php');
?>
