<?php
$title = 'Entrance Rank Insertion';
require "include/security.php";
require 'include/header.php';
require 'include/navbar.php';
?>
<?php 
$id=$_GET['id'];

if(isset($_POST['submit']))
{
    $err=[];
    if (isset($_POST['rank']) && !empty($_POST['rank']))  {
    $rank =  $_POST['rank'];
  } else {
    $err['rank']='Enter Rank';  
  }
   $entrance_id =  $_POST['id'];

if (count($err) == 0){
require "include/connection.php";
 $sql = "UPDATE entrance_form SET ranks='$rank' where id='$entrance_id' ";
$connect->query($sql);
}
}

require "include/connection.php";
$sql = "SELECT id, ranks, entrance_symbol_no from entrance_form
where batch_id='$id'";
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

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
  </div>

<!-- list the news -->
<div class="row">
    <div class="col-md-12">
       
       <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped ">
         <thead>
          <tr class="bg-gray-900 text-light">
           <th>#</th>
           <th>Symbol no.</th>
           <th>Rank</th>
           <th>Action</th>
       </tr>
   </thead>
   <?php foreach($data as $index => $d){ ?>
       <tbody>
           <tr>
          <?php $symbol= $d['entrance_symbol_no'] ?>
            <td><?php echo $index+1; ?></td>

            <td>
            <?php echo $d['entrance_symbol_no'] ?></td>
            <td><?php echo $d['ranks'] ?></td>
            <td>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id; ?>" >
            <input type='hidden' id='id' name="id" value="<?php echo $d['id'] ?>" >

            <input type='number' id='rank' name="rank" placeholder="Enter rank">
            <?php if (isset($err['rank'])) { ?>
                <div class="text-danger">
                <?php echo $err['rank']; ?> 
                </div>
            <?php  } ?>
            
            <input type="submit" name="submit" class="text-light btn btn-danger" value="Insert/Update Rank">
            </form>
         </td>
     </tr>
 </tbody>
 <?php } ?>
</table>
</div>
</div>

</div>


<?php
include('include/script.php');
include('include/footer.php');
?>
