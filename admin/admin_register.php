<?php
$title = 'Admin Profiles';
require "include/security.php";
require "include/connection.php";
    //sql query to select all  categories from database
$sql = "SELECT * from admin";
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
      <h1 class="h3 mb-0 text-gray-800">Admin Profiles</h1>
      <a type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="admin_reg.php"><i class="fas fa-user-plus"></i> Add Admin</a>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content bg-gradient-light">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Register Admin Account!</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <form class="user container" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        
                        <input type="text" class="form-control form-control-user"  id="exampleFirstName" name="first_name" placeholder="First Name">
                        <?php
                        if (isset($err['first_name'])) {
                           echo $err['first_name'];
                       }
                       ?>
                   </div>
                   <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user"  id="exampleLastName" name="middle_name" placeholder="Middle Name">
                    <?php
                    if (isset($err['middle_name'])) {
                       echo $err['middle_name'];
                   }
                   ?>
               </div>
               <div class=" col-sm-4">
                <input type="text" class="form-control form-control-user"  id="exampleLastName" name="last_name" placeholder="Last Name">
                <?php
                if (isset($err['last_name'])) {
                   echo $err['last_name'];
               }
               ?>
           </div>
       </div>
       <div class="form-group">
        <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" placeholder="Email Address">
        <?php
        if (isset($err['email'])) {
           echo $err['email'];
       }
       ?>
   </div>
   <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password">
        <?php
        if (isset($err['password'])) {
           echo $err['password'];
       }
       ?>
   </div>
   <div class="col-sm-6">
    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" name="confirm_password" placeholder="Confirm Password">
    <?php
    if (isset($err['confirm_password'])) {
       echo $err['confirm_password'];
   }
   ?>
</div>
</div>
<div class="form-group row">
 <button type="submit" name="add_admin" class="btn btn-primary btn-user btn-block" value="add admin">
    Add Admin
</button>
</div>
<hr>
</div>

</form>
</div>
</div>
</div>
</div>

<!-- list the registered admins -->
<div class="row">
    <div class="col-md-12">
       <?php   if ( isset($_GET['success']) && $_GET['success'] == 1 ){
           $success="Admin added successfully." ?>
        
        <p class="alert alert-success"><?php echo $success ?></p>
    <?php } ?>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped ">
         <thead>
          <tr class="bg-gray-900 text-light">
           <th>#</th>
           <th>First Name</th>
           <th>Middle Name</th>
           <th>Last Name</th>
           <th>Email</th>
           <th>Password</th>
           <th>Action</th>
       </tr>
   </thead>
   <tbody>
      <?php foreach($data as $index => $d){ ?> 
       <tr>
        <td><?php echo $index+1; ?></td>
        <td><?php echo $d['first_name'] ?></td>
        <td><?php echo $d['middle_name'] ?></td>
        <td><?php echo $d['last_name'] ?></td>
        <td><?php echo $d['email'] ?></td>
        <td><?php echo $d['password'] ?></td>
        <td>
            <?php  if( $role =='admin'){ ?>
             <a class="btn d-none d-sm-inline-block  btn-sm btn-info shadow-sm" onclick="return confirm ('Are you sure to edit?')" href="edit_admin_register.php?id=<?php echo $d['id'] ?>">Edit</a>
             <a class="btn d-none d-sm-inline-block  btn-sm btn-danger shadow-sm" onclick="return confirm ('Are you sure to delete?')" href="delete_admin_register.php?id=<?php echo $d['id'] ?>">Delete</a>
         <?php }else{ ?>
             <a class="btn d-none d-sm-inline-block  btn-sm btn-info shadow-sm" onclick="return confirm ('Are you sure to edit?')" href="edit_admin_register.php?id=<?php echo $d['id'] ?>">Edit</a>
         <?php } ?>
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