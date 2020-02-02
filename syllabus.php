<?php 
include 'header_nav.php';
require 'connection.php';
?>
<!-- Main titles along image -->
<div style="position: relative;text-align: center;color: white;">
  <img src="image/site/syllabus.jpg" class="img-fluid">
  <h1 class="font-weight-bold text-center shadow-lg" style="color:#fff; position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">Syllabus</h1>
</div>

<!-- Main content -->
<div class="jumbotron px-5  my-1" style="background-color:#000">

  <div class="row mb-3">
  <!-- first sem -->
  <!-- link to database -->
<?php 
require "connection.php";
$sql = "SELECT * from 
semester s
inner join subject t on s.id= t.sem_id
where t.sem_id=1";
$result = $connect->query($sql);
$data = [];

if ($result->num_rows > 0) { 
  while ($user = $result->fetch_assoc()) {
   array_push($data, $user);
 }
}

?>
  <div class="col-md-6 " >
  <h3 style="color: #ff4232 " class="mb-3">I sem</h3>

      <table style="width:100%;background-color:#689775;"class="table-bordered table-sm text-center table-hover table-responsive-md h5">  
        <tr >
          <th >S.N</th>
          <th >Course Code</th>
          <th >Course Title</th>
          <th >Credit Hours</th>
        </tr>
        
        <?php 
        foreach ($data as $index=>$s){ ?>
        <tr>
        <td><?php echo $index+1; ?></td>
        <td><?php echo $s['subject_code']; ?></td>
        <td><?php echo $s['subject_name']; ?></td>
        <td><?php echo $s['subject_credit_hours']; ?></td>
        </tr>
        <?php } ?>
        </table>
  </div>

     <!-- second sem -->
     <!-- link to database -->
<?php 
require "connection.php";
$sql = "SELECT * from 
semester s
inner join subject t on s.id= t.sem_id
where t.sem_id=2";
$result = $connect->query($sql);
$data = [];

if ($result->num_rows > 0) { 
  while ($user = $result->fetch_assoc()) {
   array_push($data, $user);
 }
}

?>
  <div class="col-md-6 " >
  <h3 style="color: #ff4232 " class="mb-3">II sem</h3>

      <table style="width:100%;background-color:#689775;"class="table-bordered table-sm text-center table-hover table-responsive-md h5">  
        <tr >
          <th >S.N</th>
          <th >Course Code</th>
          <th >Course Title</th>
          <th >Credit Hours</th>
        </tr>
        
        <?php 
        foreach ($data as $index=>$s){ ?>
        <tr>
        <td><?php echo $index+1; ?></td>
        <td><?php echo $s['subject_code']; ?></td>
        <td><?php echo $s['subject_name']; ?></td>
        <td><?php echo $s['subject_credit_hours']; ?></td>
        </tr>
        <?php } ?>
        </table>
  </div>
  </div>

  <div class="row mb-3">
  <!-- third sem -->
  <!-- link to database -->
<?php 
require "connection.php";
$sql = "SELECT * from 
semester s
inner join subject t on s.id= t.sem_id
where t.sem_id=3";
$result = $connect->query($sql);
$data = [];

if ($result->num_rows > 0) { 
  while ($user = $result->fetch_assoc()) {
   array_push($data, $user);
 }
}

?>
  <div class="col-md-6 " >
  <h3 style="color: #ff4232" class="mb-3">III sem</h3>

      <table style="width:100%;height:230px;background-color:#689775;"class="table-bordered table-sm text-center table-hover table-responsive-md h5">  
        <tr >
          <th >S.N</th>
          <th >Course Code</th>
          <th >Course Title</th>
          <th >Credit Hours</th>
        </tr>
        
        <?php 
        foreach ($data as $index=>$s){ ?>
        <tr>
        <td><?php echo $index+1; ?></td>
        <td><?php echo $s['subject_code']; ?></td>
        <td><?php echo $s['subject_name']; ?></td>
        <td><?php echo $s['subject_credit_hours']; ?></td>
        </tr>
        <?php } ?>
        </table>
  </div>

     <!-- fourth sem -->
     <!-- link to database -->
<?php 
require "connection.php";
$sql = "SELECT * from 
semester s
inner join subject t on s.id= t.sem_id
where t.sem_id=4";
$result = $connect->query($sql);
$data = [];

if ($result->num_rows > 0) { 
  while ($user = $result->fetch_assoc()) {
   array_push($data, $user);
 }
}

?>
  <div class="col-md-6 " >
  <h3 style="color: #ff4232 " class="mb-3">IV sem</h3>

      <table style="width:100%;background-color:#689775;"class="table-bordered table-sm text-center table-hover table-responsive-md h5">  
        <tr >
          <th >S.N</th>
          <th >Course Code</th>
          <th >Course Title</th>
          <th >Credit Hours</th>
        </tr>
        
        <?php 
        foreach ($data as $index=>$s){ ?>
        <tr>
        <td><?php echo $index+1; ?></td>
        <td><?php echo $s['subject_code']; ?></td>
        <td><?php echo $s['subject_name']; ?></td>
        <td><?php echo $s['subject_credit_hours']; ?></td>
        </tr>
        <?php } ?>
        </table>
  </div>
  </div>

  <div class="row mb-3">
  <!-- seventh sem -->
  <!-- link to database -->
<?php 
require "connection.php";
$sql = "SELECT * from 
semester s
inner join subject t on s.id= t.sem_id
where t.sem_id=5";
$result = $connect->query($sql);
$data = [];

if ($result->num_rows > 0) { 
  while ($user = $result->fetch_assoc()) {
   array_push($data, $user);
 }
}

?>
  <div class="col-md-6 " >
  <h3 style="color: #ff4232" class="mb-3">V sem</h3>

      <table style="width:100%;height:232px;background-color:#689775;"class="table-bordered table-sm text-center table-hover table-responsive-md h5">  
        <tr >
          <th >S.N</th>
          <th >Course Code</th>
          <th >Course Title</th>
          <th >Credit Hours</th>
        </tr>
        
        <?php 
        foreach ($data as $index=>$s){ ?>
        <tr>
        <td><?php echo $index+1; ?></td>
        <td><?php echo $s['subject_code']; ?></td>
        <td><?php echo $s['subject_name']; ?></td>
        <td><?php echo $s['subject_credit_hours']; ?></td>
        </tr>
        <?php } ?>
        </table>
  </div>

     <!-- sixth sem -->
     <!-- link to database -->
<?php 
require "connection.php";
$sql = "SELECT * from 
semester s
inner join subject t on s.id= t.sem_id
where t.sem_id=6";
$result = $connect->query($sql);
$data = [];

if ($result->num_rows > 0) { 
  while ($user = $result->fetch_assoc()) {
   array_push($data, $user);
 }
}

?>
  <div class="col-md-6 " >
  <h3 style="color: #ff4232 " class="mb-3">VI sem</h3>

      <table style="width:100%;background-color:#689775;"class="table-bordered table-sm text-center table-hover table-responsive-md h5">  
        <tr >
          <th >S.N</th>
          <th >Course Code</th>
          <th >Course Title</th>
          <th >Credit Hours</th>
        </tr>
        
        <?php 
        foreach ($data as $index=>$s){ ?>
        <tr>
        <td><?php echo $index+1; ?></td>
        <td><?php echo $s['subject_code']; ?></td>
        <td><?php echo $s['subject_name']; ?></td>
        <td><?php echo $s['subject_credit_hours']; ?></td>
        </tr>
        <?php } ?>
        </table>
  </div>
  </div>

  <div class="row mb-3">
  <!-- seventh sem -->
  <!-- link to database -->
<?php 
require "connection.php";
$sql = "SELECT * from 
semester s
inner join subject t on s.id= t.sem_id
where t.sem_id=7";
$result = $connect->query($sql);
$data = [];

if ($result->num_rows > 0) { 
  while ($user = $result->fetch_assoc()) {
   array_push($data, $user);
 }
}

?>
  <div class="col-md-6 " >
  <h3 style="color: #ff4232" class="mb-3">VII sem</h3>

      <table style="width:100%;background-color:#689775;"class="table-bordered table-sm text-center table-hover table-responsive-md h5">  
        <tr >
          <th >S.N</th>
          <th >Course Code</th>
          <th >Course Title</th>
          <th >Credit Hours</th>
        </tr>
        
        <?php 
        foreach ($data as $index=>$s){ ?>
        <tr>
        <td><?php echo $index+1; ?></td>
        <td><?php echo $s['subject_code']; ?></td>
        <td><?php echo $s['subject_name']; ?></td>
        <td><?php echo $s['subject_credit_hours']; ?></td>
        </tr>
        <?php } ?>
        </table>
  </div>

     <!-- eight sem -->
     <!-- link to database -->
<?php 
require "connection.php";
$sql = "SELECT * from 
semester s
inner join subject t on s.id= t.sem_id
where t.sem_id=8";
$result = $connect->query($sql);
$data = [];

if ($result->num_rows > 0) { 
  while ($user = $result->fetch_assoc()) {
   array_push($data, $user);
 }
}

?>
  <div class="col-md-6 " >
  <h3 style="color: #ff4232 " class="mb-3">VIII sem</h3>

      <table style="width:100%;height:197px;background-color:#689775;"class="table-bordered table-sm text-center table-hover table-responsive-md h5">  
        <tr >
          <th >S.N</th>
          <th >Course Code</th>
          <th >Course Title</th>
          <th >Credit Hours</th>
        </tr>
        
        <?php 
        foreach ($data as $index=>$s){ ?>
        <tr>
        <td><?php echo $index+1; ?></td>
        <td><?php echo $s['subject_code']; ?></td>
        <td><?php echo $s['subject_name']; ?></td>
        <td><?php echo $s['subject_credit_hours']; ?></td>
        </tr>
        <?php } ?>
        </table>
  </div>
  </div>
  <div class="text-center ">
  <a class=" btn d-none d-inline-block font-weight-bold btn-danger p-2 shadow-sm"  href="document/Syllabus-BCA.pdf" style="color:#000;background-color:#689775;margin:8px;padding:.75rem; width:50%;">
 ... Detail Syallabus ... </a>
 </div>


  




</div>

<?php
include 'footer.php';
?>