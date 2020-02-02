<?php
$title = 'Admission Semesters';
require "include/security.php";
require 'include/header.php';
require 'include/navbar.php';
 $batch_id= $_GET['id'];
?>

<?php
require "include/connection.php";
//sql query to select all  categories from database
$sql = "SELECT * from batch b
inner join entrance_form e on b.id=e.batch_id 
inner join admission a on e.id=a.entrance_form_id
inner join semester s on a.semester_id=s.id where b.id='$batch_id'";
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

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
  </div>

  <!-- list the batch -->
  <div class="row">
    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped ">
         <thead>
          <tr class="bg-gray-900 text-light">
          <?php foreach ($data as $index => $d) {?>
          <th>
          <?php echo $d['sem_name']; ?>
         </tr>
          <?php }?>
       </thead>
       <tbody>
        <?php foreach ($data as $index => $d) {?>
         <tr>
          <td>
           <a class="btn d-none d-sm-inline-block  btn-sm btn-info shadow-sm" href="admission_list.php?id=<?php echo $d['id']; ?> && bid=<?php echo $batch_id; ?>">View List</a>
         </td>
       </tr>
     <?php }?>
   </tbody>
 </table>
</div>
</div>

</div>

<?php
include 'include/script.php';
include 'include/footer.php';
?>