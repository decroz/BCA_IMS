<?php
$title = 'Teacher Profiles';
require "include/security.php";
require "include/connection.php";
    //sql query to select all  categories from database
$sql = "SELECT * from teacher";
    //execute query and get result object: incase of select
$result = $connect->query($sql);

$data = [];

if ($result->num_rows > 0) {
  while ($user = $result->fetch_assoc()) {
   array_push($data, $user);
}
}
require 'include/header.php';
require 'include/navbar.php';
?>


<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"><?php echo $title; ?></h1>
      <a type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="teacher_reg.php"><i class="fas fa-user-plus"></i> Add Teacher</a>
  </div>

<!-- list the registered admins -->
<div class="row">
    <div class="col-md-12">
       <?php   if ( isset($_GET['success']) && $_GET['success'] == 1 ){
           $success="Teacher added successfully." ?>
        
        <p class="alert alert-success"><?php echo $success ?></p>
    <?php } ?>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped ">
         <thead>
          <tr class="bg-gray-900 text-light">
           <th>#</th>
           <th>Name</th>
           <th>Designation</th>
           <th>Image</th>
           <th>Action</th>
       </tr>
   </thead>
   <tbody>

      <?php foreach($data as $index => $d){ ?> 
       <tr>
        <td><?php echo $index+1; ?></td>
        <td><?php echo $d['first_name'];?> <?php echo $d['middle_name'];?> <?php echo $d['last_name']; ?></td>
        <td><?php echo $d['designation'] ?></td>
        <td><img src="img/<?php echo $d['image'] ?>" width="75"></td>
        <td>
             <a class="btn d-none d-sm-inline-block  btn-sm btn-info shadow-sm" onclick="return confirm ('Are you sure to edit?')" href="edit_teacher_register.php?id=<?php echo $d['id'] ?>">Edit</a>
             <a class="btn d-none d-sm-inline-block  btn-sm btn-danger shadow-sm" onclick="return confirm ('Are you sure to delete?')" href="delete_teacher_register.php?id=<?php echo $d['id'] ?>">Delete</a>
             <a class="btn d-none d-sm-inline-block  btn-sm btn-success shadow-sm" href="view_teacher_details.php?id=<?php echo $d['id'] ?>">View</a>
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