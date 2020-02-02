<?php
$title='Notice';
require "include/security.php";
require 'include/header.php';
require 'include/navbar.php';
?>
<?php 
require "include/connection.php";
 //sql query to select all  categories from database
$sql = "SELECT * from notice";

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
      <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
      <a type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="add_notice.php"><i class="fas fa-comment-medical"></i> Add Notices</a>
  </div>

<!-- list the notice -->
<div class="row">

    <div class="col-md-12">
        <?php if ( isset($_GET['success']) && $_GET['success'] == 1 )
        {
     // treat the succes case ex:
           $success = "Update Success";?>
           <p class="alert alert-success"><?php echo $success ?></p>
       <?php } ?>

       <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped ">
         <thead>
          <tr class="bg-gray-900 text-light">
           <th>#</th>
           <th>Title</th>
           <th>Image/files</th>
           <th>Action</th>
       </tr>
   </thead>
   <?php foreach($data as $index => $d){ ?>
       <tbody>
           <tr>
            <td><?php echo $index+1; ?></td>
            <td><?php echo $d['titles'] ?></td>
            <td><img src="img/<?php echo $d['image'] ?>" width="75"></td>
            <td>
             <a class="btn d-none d-sm-inline-block  btn-sm btn-info shadow-sm" onclick="return confirm ('Are you sure to edit?')" href="edit_notice.php?id=<?php echo $d['id'] ?>">Edit</a>
             <a class="btn d-none d-sm-inline-block  btn-sm btn-danger shadow-sm" onclick="return confirm ('Are you sure to delete?')" href="delete_notice.php?id=<?php echo $d['id'] ?>">Delete</a>
             <a class="btn d-none d-sm-inline-block  btn-sm btn-success shadow-sm" href="view_notice.php?id=<?php echo $d['id'] ?>">View</a>
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
