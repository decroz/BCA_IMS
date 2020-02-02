<?php
  $title = 'Admission Candidate List';
  require "include/security.php";
  require 'include/header.php';
  require 'include/navbar.php';
  ?>
  <?php 
  $id=$_GET['id'];
  $bid=$_GET['bid'];
  require "include/connection.php";
    //sql query to select all  categories from database
  $sql = "SELECT * from 
  admission a
  inner join entrance_form e on a.entrance_form_id=e.id
  inner join semester s on a.semester_id=s.id
  where s.id ='$id' && e.batch_id='$bid'";

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
  <?php foreach($data as $index => $d){ 
    $q=$d['semester_id'];
    } ?>
  <!-- list the registered admins -->
  <div class="row">
    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped ">
         <thead>
          <tr class="bg-gray-900 text-light">
           <th>#</th>
           <th>First Name</th>
           <th>Middle Name</th>
           <th>Last Name</th>
           <?php if($q<=1){ ?>
           <th>Symbol no.</th>
           <th>Rank</th>
           <?php }else{ ?>
            <th>Registration no.</th>
            <th>Symbol no.</th>
            <?php } ?>
            <th>Action</th>

         </tr>
       </thead>
       <tbody>
        <?php foreach($data as $index => $d){ ?>
         <tr>
          <td><?php echo $index+1; ?></td>
          <td><?php echo $d['student_fname']; ?></td>
          <td><?php echo $d['student_mname']; ?></td>
          <td><?php echo $d['student_lname']; ?></td>
          <?php if($q<=1){ ?>
          <td><?php echo $d['entrance_symbol_no'] ?></td>
          <td><?php echo $d['ranks']; ?></td>
          <?php }else{ ?>
            <td><?php echo $d['tu_reg_no']; ?></td>
          <td><?php echo $d['exam_roll_no']; ?></td>
          <?php } ?>
          <td>
           <a class="btn d-none d-sm-inline-block  btn-sm btn-info shadow-sm" href="view_admission_list.php?id=<?php echo $d['id'] ?>">View Details</a>
         </td>
       </tr>
     <?php } ?>
   </tbody>
 </table>
</div>
</div>

</div>

<?php
include('include/script.php');
include('include/footer.php');
?>