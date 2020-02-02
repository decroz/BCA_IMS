<?php 
include 'header_nav.php';
require 'connection.php';
?>
<!-- Main titles along image -->
<div style="position: relative;text-align: center;color: white;">
  <img src="image/site/notice.jpg" class="img-fluid">
  <h1 class="font-weight-bold text-center shadow-lg" style="color:#fff; position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">Notice List</h1>
</div>
<!-- link to database -->
<?php 
require "connection.php";
$results_per_page = 10;

if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}

$sql="SELECT * FROM notice ORDER BY id DESC";
$result = $connect->query($sql);
$number_of_results = mysqli_num_rows($result);
$number_of_pages = ceil($number_of_results/$results_per_page);

$this_page_first_result = ($page-1)*$results_per_page;

$sql='SELECT  titles, image, discription, created_at FROM notice ORDER BY id DESC LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
$result = $connect->query($sql);
$data = [];

if ($result->num_rows > 0) { 
  while ($user = $result->fetch_assoc()) {
   array_push($data, $user);
 }
}

?>
<!-- Main content -->
<div class="jumbotron px-5  my-1" style="background-color:#000">
  <h3 style="color: #ff4232 " class="mb-3 ml-4">Notice</h3>
  
  <div class="col-md-12 " >
    <?php foreach ($data as $index=>$n){ ?>
      <a class="btn d-none d-sm-inline-block row mb-3 p-2 alert btn-danger shadow-sm" href="discription.php?ida=<?php echo $n['created_at']; ?>" style="color:#000;background-color:#ffaaaa;margin:8px;padding:.75rem;width:100%;">
      <table style="width:100%" class=" table-borderless table-sm table-responsive">  
        <tr >
          <th class="h5 pr-2"><?php echo $index+1; ?></th>
          <th class="h5"><?php echo $n['titles'];?></th>
          <th style="text-align:right"><?php $a= $n['created_at'];
           $newDate = date("M d, Y", strtotime($a));
           echo "<small class='text-secondary'> $newDate</small>";
        ?></th>
        </tr></table>
      <?php } ?>
    </a>


  </div>


  <!-- pagination -->
  <ul class="pagination pagination-sm justify-content-center">
    <?php
    if ($page>1) { 
      ?>
      <li class="page-item"><a class="page-link" href="notice.php?page=<?php echo $page-1 ?>"><i class="fa fa-angle-double-left" aria-hidden="true"></i>
      </a></li>
      <?php
    }
    ?> 

    <?php
    for ($i=1;$i<=$number_of_pages;$i++) { 
      ?>
      <li class="page-item"><a class="page-link" href="notice.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>

      <?php
    }
    ?> 
    <?php
    if ($page < $number_of_pages) { 
      ?>
      <li class="page-item"><a class="page-link" href="notice.php?page=<?php echo $page+1 ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i>
      </a></li>
      <?php
    }
    ?> 
  </ul> 
</div>
<?php
include 'footer.php';
?>