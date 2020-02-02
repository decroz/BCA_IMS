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
$sql = "SELECT * from notice where id='$id'";

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
<div class="container-fluid">

  <?php foreach($data as $index => $d) ?>
    <!-- Page Heading -->
    <div class="card p-2">
    <?php if(!empty($d['image'])){ ?>
      <img class="mx-auto d-block rounded" src="img/<?php echo $d['image'] ?>" width="100%">
      <div class="card-header text-center text-gray-800">
       <h3><?php echo $d['titles'];?></h3>
     </div>
     <div class="card-body">
      <?php
      $a= $d['created_at'];      
      $newDate = date("M d, Y", strtotime($a));
      ?>
      <div class="text-left small text-secondary">
        <i class="fa fa-calendar " aria-hidden="true"></i>
        <?php echo $newDate;?>
      </div>
      <p><?php echo $d['discription']; ?></p>
      </div>
      </div>


    <?php }else{ ?>

      <div class="card p-2">
      <div class="card-header text-center text-gray-800">
       <h3><?php echo $d['titles'];?></h3>
     </div>
     <div class="card-body">
      <?php
      $a= $d['created_at'];      
      $newDate = date("M d, Y", strtotime($a));
      ?>
      <div class="text-left small text-secondary">
        <i class="fa fa-calendar " aria-hidden="true"></i>
        <?php echo $newDate;?>
      </div>
      <p><?php echo $d['discription']; ?></p>
    <?php } ?>
  </div>
  </div>

  </div>


  <?php
  include('include/script.php');
  include('include/footer.php');
  ?>
