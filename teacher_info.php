<?php 
include 'header_nav.php';
require 'connection.php';
?>
<!-- Main titles along image -->
<div style="position: relative;text-align: center;color: white;">
  <img src="image/site/teachers.jpg" class="img-fluid">
  <h1 class="font-weight-bold text-center shadow-lg" style="color:#fff; position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">Teachers Info</h1>
</div>

<!-- Main content -->
<div class="jumbotron px-5 my-1 row" style="background-color:#000">
<?php 
require 'connection.php';
$sql="select * from teacher";
$result = $connect->query($sql);
$data = [];
if ($result->num_rows > 0) {
  while ($user = $result->fetch_assoc()) {
   array_push($data, $user);
}
}
foreach($data as $index => $d){
?>
    <div  class=" col-4 relative pt-5 mb-5" > 
      <div class="pt-5 rounded" style="color:#fff; background-color:#021558;height:21em;margin-bottom:80px"> 
       <div class="text-center">
         <h5><?php echo $d['first_name'];?> <?php echo $d['middle_name'];?> <?php echo $d['last_name']; ?></h5>
         <small><?php echo $d['designation'] ?></small>
        </div>
      
       <center>
         <img src="admin/img/<?php echo $d['image'] ?>" class="rounded-circle px-auto image-overlap" />
       </center>
       <p class=" px-2 text-justify more_read" id="more">
       <?php echo $d['description'] ?>
        </p>
      </div> 
    </div>
<?php } ?>
</div>

<?php
include 'footer.php';
?>