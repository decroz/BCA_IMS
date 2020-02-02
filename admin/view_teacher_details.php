<?php
$title='Notice';
require "include/security.php";
require 'include/header.php';
require 'include/navbar.php';
?>
<?php 
$id=$_REQUEST['id'];
require "include/connection.php";
//sql query to select particular id from notice from database
 $sql = "SELECT * from teacher where id='$id'";

//execute query and get result object: incase of select
$result = $connect->query($sql);
$data = [];

if ($result->num_rows > 0) {
  while ($user = $result->fetch_assoc()) {
   array_push($data, $user);
 }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid pt-5">
    <div class="pt-5">
    <div  class=" col-12 relative pt-5 mb-5" > 
      <div class="py-5 rounded bg-dark" style="color:#fff;margin-bottom:80px"> 
       <div class="text-center">
         <h4>
         <?php foreach($data as $index => $d){ ?>
            <?php echo $d['first_name'];?> <?php echo $d['middle_name'];?> <?php echo $d['last_name']; ?></h4>
         <small><?php echo $d['designation'] ?></small>
        </div>
      
         <img src="img/<?php echo $d['image'] ?>" class=" shadow rounded-circle  image-overlap" />
      
       <p class="px-4 text-justify more_read" id="more">
       <?php echo $d['description']; ?>
        </p>
        </div> 
        </div> 
        </div>
        <?php }?>



  <?php
  include('include/script.php');
  include('include/footer.php');
  ?>