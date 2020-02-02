<?php
  $title = 'Examination Candidate List';
  require "include/security.php";
  require 'include/header.php';
  require 'include/navbar.php';
  ?>
  <?php 
    echo $id=$_GET['id'];
    $bid=$_GET['bid'];
  require "include/connection.php";
    //sql query to select all  categories from database
  $sql = "SELECT * from 
  admission a
  inner join entrance_form e on a.entrance_form_id=e.id
  inner join semester s on a.semester_id=s.id
  inner join full_exam f on a.id=f.admission_id 
  where s.id ='$id' && e.batch_id='$bid'
  union
  SELECT * from 
  admission a
  inner join entrance_form e on a.entrance_form_id=e.id
  inner join semester s on a.semester_id=s.id
  inner join partial_exam p on a.id=p.admission_id
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
           <th>Registration no.</th>
           <th>Symbol no.</th>
           <th>Action</th>
         </tr>
       </thead>
       <tbody>
        <?php foreach($data as $index => $d){ ?>
         <tr>
          <td><?php echo $index+1; ?></td>
          <td><?php echo $d['student_fname'] ?></td>
          <td><?php echo $d['student_mname'] ?></td>
          <td><?php echo $d['student_lname'] ?></td>
          <td><?php echo $d['tu_reg_no'] ?></td>
          <td><?php echo $d['exam_roll_no'] ?></td>
          <td>
           <a class="btn d-none d-sm-inline-block  btn-sm btn-info shadow-sm" href="view_examination_list.php?id=<?php echo $d['id'] ?>">View Details</a>
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