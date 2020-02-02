<?php 
include 'header_nav.php';
require 'connection.php';
require "connection.php";
$notice_list=$_REQUEST['ida'];
$sql="SELECT * FROM notice where created_at='$notice_list'";
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
  <img src="image/site/notice.jpg" class="img-fluid">
  <h1 class="font-weight-bold text-center shadow-lg" style="color:#fff; position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">Notice Description</h1>
</div>
<div class="jumbotron px-5  my-1" style="background-color:#070707">
  <div class="row">
    <div class='col-7 mx-4 '>
      <?php foreach($data as $dis){ 
        if ($dis['image']!=''){?>
        <center style="position:relative;" class="m-auto"><img src="admin\img\<?php echo $dis['image']; ?>" alt="" class="img-fluid shadow" style="object-fit:contain;"></center>
        <div class="card p-3" style="background:#E5E5E5;">
          <h4 class="text-left" style="color:#000"><?php echo $dis['titles'];?></h4>
        <?php }
        else{ ?>
        <div class="card p-3" style="background:#E5E5E5;">
          <h4 class="text-center" style="color:#000"><?php echo $dis['titles'];?></h4>
        <?php } ?>

          <?php
          $a= $dis['created_at'];      
          $newDate = date("M d, Y", strtotime($a));
          ?>
          <div class=text-secondary><i class="fa fa-calendar" aria-hidden="true"></i><?php echo $newDate;?></div>
          <p style="color:#71AC9D;font_size:14px"><?php echo $dis['discription'];?></p>
        </div>
      <?php };?>
    </div>
 

    <!-- news -->
    <div class='col-4'>
      <div class="card text-secondary text-justify"style=" background-color: #000">
        <div class="h3 px-3 py-1" style="border-bottom:3px solid #689775;color:#fff;">News</div>
        <?php 
        require "connection.php";
        $sql="SELECT titles, news_image, description, created_at FROM news ORDER BY id DESC LIMIT 3";
        $result = $connect->query($sql);
        $data = [];
        
        if ($result->num_rows > 0) { 
          while ($user = $result->fetch_assoc()) {
           array_push($data, $user);
         }
       }
       foreach ($data as $index=>$n){           
        ?>
          <a  class=" news text-light btn d-flex align-items-start bd-highlight" href="news_discription.php?ida=<?php echo $n['created_at'];?>">
            <img src="admin\img\<?php echo $n['news_image']; ?>" alt="<?php $n['titles']?>" class="col-4 shadow mask m-2 p-2 img-fluid img-thumbnail" style="object-fit:cover;width:135px;height:100px">
            <table class="table-responsive float-left">
              <tr>
                <th class="text-justify pt-2"><?php echo $n['titles'];?></th>
              </tr>
              <tr>
                <td class="text-left"><?php $a= $n['created_at'];
              $newDate = date("M d, Y", strtotime($a));
              echo "<div class='small text-secondary'><i class='fa fa-calendar' aria-hidden='true'></i>
              $newDate</div>";
           ?></td>
              </tr>
            </table>
           
           
             </a>
              <?php } ?>
         <div class="m-3 card-footer">
      <a class=" btn text-light" style="border:2px solid #ff4232;position:absolute;bottom: 14px; right: 14px;" href="news_events.php">View All</a>
      </div>
      </div>
    </div>
  </div>
</div>


</div>
<?php
include 'footer.php';
?>