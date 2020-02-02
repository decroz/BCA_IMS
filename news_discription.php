<?php 
include 'header_nav.php';
require 'connection.php';
require "connection.php";
$news_list=$_REQUEST['ida'];
$sql="SELECT * FROM news where created_at='$news_list'";
$result = $connect->query($sql);
$data = [];
if ($result->num_rows > 0) { 
  while ($user = $result->fetch_assoc()) {
   array_push($data, $user);
 }
}

?>
<!-- Main titles along image -->
<div style="position: relative;text-align: center;color: white;">
  <img src="image/site/news_events.jpg" class="img-fluid">
  <h1 class="font-weight-bold text-center shadow-lg" style="color:#fff; position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">News Description</h1>
</div>
<div class="jumbotron px-5  my-1" style="background-color:#070707">
  <div class="row">
    <div class='col-7 mx-4 '>
      <?php foreach($data as $dis){ ?>
        <center style="position:relative;" class="m-auto"><img src="admin\img\<?php echo $dis['news_image']; ?>" alt="" class="img-fluid shadow" style="object-fit:contain;"></center>
        <div class="card p-3" style="background:#E5E5E5;position:relative;">
          <h4 class="text-dark"><?php echo $dis['titles'];?></h4>
          <?php
          $a= $dis['created_at'];      
          $newDate = date("M d, Y", strtotime($a));
          ?>
          <div class=text-secondary><i class="fa fa-calendar" aria-hidden="true"></i><?php echo $newDate;?></div>
          <p class="text-justify" style="color:#71AC9D;font_size:14px"><?php echo $dis['description'];?></p>
        </div>
      <?php };?>
    </div>

    <!-- events -->
    <div class='col-4'>
      <div class="card text-secondary text-justify"style=" background-color: #000">
        <div class="h3 px-3 py-1" style="border-bottom:3px solid #689775;color:#fff;">Events</div>
        <?php 
        require "connection.php";
        $sql="SELECT titles, event_image, description, created_at FROM events ORDER BY id DESC LIMIT 3";
        $result = $connect->query($sql);
        $data = [];
        
        if ($result->num_rows > 0) { 
          while ($user = $result->fetch_assoc()) {
           array_push($data, $user);
         }
       }
       
       foreach ($data as $index=>$n){           
        ?>
          <a  class="row news text-light btn d-flex align-items-start bd-highlight" href="events_description.php?ida=<?php echo $n['created_at'];?>">
          <?php if ($n['event_image']!=''){?>
            <img src="admin\img\<?php echo $n['event_image']; ?>" alt="<?php $n['titles']?>" class="col-4 shadow mask m-2 p-2 img-fluid img-thumbnail" style="object-fit:cover;width:135px;height:100px">
          <?php } ?>
            <div class="col-7 p-2 text-justify" ><?php echo $n['titles']; echo "<br/>"; 
              $a= $n['created_at'];
              $newDate = date("M d, Y", strtotime($a));
              echo "<div class='small text-secondary'><i class='fa fa-calendar' aria-hidden='true'></i>
              $newDate</div>";
           ?>
            </div>
             </a>
              <?php } ?>
         
         
      <div class="card-footer m-3">
      <a class="btn text-light" style="border:2px solid #ff4232;position:absolute;bottom: 14px; right: 14px;"href="news_events.php">View All</a>
      </div>
    </div>
  </div>
  
</div>


</div>
</div>
</div>
<?php
include 'footer.php';
?>