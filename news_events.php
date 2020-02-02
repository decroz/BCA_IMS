<?php 
include 'header_nav.php';
require 'connection.php';
require "connection.php";

$results_per_page = 10;

if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}
$sql="SELECT * FROM news ORDER BY id DESC";
$result = $connect->query($sql);
$number_of_results = mysqli_num_rows($result);
$number_of_pages = ceil($number_of_results/$results_per_page);

$this_page_first_result = ($page-1)*$results_per_page;

$sql="SELECT * FROM news ORDER BY id DESC LIMIT " . $this_page_first_result . ',' .  $results_per_page;
$result = $connect->query($sql);
$data = [];
if ($result->num_rows > 0) { 
  while ($user = $result->fetch_assoc()) {
   array_push($data, $user);
 }
}

?>
<!-- Main title along image -->
<div style="position: relative;text-align: center;color: white;">
  <img src="image/site/news_events.jpg" class="img-fluid">
  <h1 class="font-weight-bold text-center shadow-lg" style="color:#fff; position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">News & Events</h1>
</div>
<div class="jumbotron px-5  my-1" style="background-color:#000">
  <div class="row">
  
    <div class='col-sm-6 no-gutters  '>
    <div class="" style="background-color:#000">
  <h3 style="color: #ff4232 " class="mb-3 ml-4">News</h3>
  </div>
    <?php foreach ($data as $index=>$n){ ?>
      <a class="btn d-none d-sm-inline-block mb-3 btn-danger " href="news_discription.php?ida=<?php echo $n['created_at']; ?>" style="color:#000;background-color:#ffaaaa;margin:8px;padding:.5rem;width:100%;">
        <table style="width:100%" class="table-hover table-borderless table-sm table-responsive">  
        <tr >
          <th class="h5 pr-2"><?php echo $index+1; ?></th>
          <th class="h5 text-justify"><?php echo $n['titles'];?></th>
          <th style="text-align:right"><?php $a= $n['created_at'];
           $newDate = date("M d, Y", strtotime($a));
           echo "<small class='text-secondary'> $newDate</small>";
        ?></th>
        </tr></table>
      <?php } ?>
    </a>

    </div>

    <?php

    
$sql="SELECT * FROM events ORDER BY id DESC";
$result = $connect->query($sql);
$number_of_results = mysqli_num_rows($result);

$this_page_first_result = ($page-1)*$results_per_page;


    $sql="SELECT * FROM events ORDER BY id DESC LIMIT " . $this_page_first_result . ',' .  $results_per_page;
    $result = $connect->query($sql);
    $data = [];
    if ($result->num_rows > 0) { 
      while ($user = $result->fetch_assoc()) {
       array_push($data, $user);
     }
    }
    ?>

    <div class='col-sm-6 no-gutters  '>
    <div  style="background-color:#000">
  <h3 style="color: #ff4232 " class="mb-3 ml-4">Events</h3>
  </div>
  <?php foreach ($data as $index=>$e){ ?>
      <a class="btn d-none d-sm-inline-block mb-3 btn-danger" href="events_description.php?ida=<?php echo $e['created_at']; ?>" style="color:#000;background-color:#ffaaaa;margin:8px;padding:.5rem;width:100%;">
        <table style="width:100%" class="table-hover table-borderless table-sm table-responsive">  
        <tr >
          <th class="h5 pr-2"><?php echo $index+1; ?></th>
          <th class="h5 text-justify"><?php echo $e['titles'];?></th>
          <th style="text-align:right"><?php $a= $e['created_at'];
           $newDate = date("M d, Y", strtotime($a));
           echo "<small class='text-secondary'> $newDate</small>";
        ?></th>
        </tr></table>
      <?php } ?>
    </a>      
    </div>
  </div>

 <!-- pagination -->
 <ul class="pagination pagination-sm justify-content-center m-3">
    <?php
    if ($page>1) { 
      ?>
      <li class="page-item"><a class="page-link" href="news_events.php?page=<?php echo $page-1 ?>"><i class="fa fa-angle-double-left" aria-hidden="true"></i>
      </a></li>
      <?php
    }
    ?> 

    <?php
    for ($i=1;$i<=$number_of_pages;$i++) { 
      ?>
      <li class="page-item"><a class="page-link" href="news_events.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>

      <?php
    }
    ?> 
    <?php
    if ($page < $number_of_pages) { 
      ?>
      <li class="page-item"><a class="page-link" href="news_events.php?page=<?php echo $page+1 ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i>
      </a></li>
      <?php
    }
    ?> 
  </ul> 

</div>
<?php
include 'footer.php';
?>