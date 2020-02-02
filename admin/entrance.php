<?php
$title = 'Entrance Batch';
require "include/security.php";
require 'include/header.php';
require 'include/navbar.php';
?>
<?php
require "include/connection.php";
//sql query to select all  categories from database
$sql = "
SELECT * from batch";

//execute query and get result object: incase of select
$result = $connect->query($sql);
$data = [];

if ($result->num_rows > 0) { 
  while ($user = $result->fetch_assoc()) {
    array_push($data, $user);
  }
}

if (isset($_POST['add_batch'])){
  $err=[];
    //first name check
  if (isset($_POST['batch_name']) && !empty($_POST['batch_name'])){
    $batch_name= $_POST['batch_name'];
  } else{
    $err['batch_name']='Enter batch name...';
  }

    //middle name check
  if (isset($_POST['batch_year']) && !empty($_POST['batch_year'])){
    $batch_year= $_POST['batch_year'];
  } else{
   $err['batch_year']='Enter batch year...';
 }
 

 if (count($err) == 0) {
    //make query to insert data
  $sql = "INSERT INTO batch (name,years)values('$batch_name','$batch_year')";

//execute query
  $connect->multi_query($sql);
    //check data insert status
  if ($connect->affected_rows == 1 && $connect->insert_id >0) {
    $success =  "Insert Success";
  } else {
    $failed =  "Insert Failed";
  }
}
}
?>

<!-- Begin Page Content -->

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Entrance Batch Lists</h1>
    <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-user-plus"></i> Add New Batch</button>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content bg-gradient-light">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Assign Batch</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <form class="user container" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
              <div class="form-group">                      
                <input type="text" class="form-control form-control-user"  id="exampleFirstName" name="batch_name" placeholder="Batch Name">
                <?php
                if (isset($err['batch_name'])) {
                 echo $err['batch_name'];
               }
               ?>
             </div>

             <div class="form-group">
              <input type="number" class="form-control form-control-user" id="exampleInputEmail" name="batch_year" placeholder="Batch Year in A.D.">
              <?php
              if (isset($err['batch_year'])) {
               echo $err['batch_year'];
             }
             ?>

           </div>

           <div class="form-group row">
             <button type="submit" name="add_batch" class="btn btn-primary btn-user btn-block" value="add admin">
              Assign New Batch
            </button>
          </div>
          <hr>
        </div>

      </form>
    </div>
  </div>
</div>
</div>

<!-- list the batch -->
<div class="row">
  <div class="col-md-12">
    <div class="table-responsive">
      <table class="table table-bordered table-hover table-striped ">
       <thead>
        <tr class="bg-gray-900 text-light">
         <th>#</th>
         <th>Batch name</th>
         <th>Year</th>
         <th>Action</th>
       </tr>
     </thead>
     <tbody>
      <?php foreach ($data as $index => $d) {?>
       <tr>
        <td><?php echo $index + 1; ?></td>
        <td><?php echo $d['name'] ?></td>
        <td><?php echo $d['years'] ?></td>
        <td>
         <a class="btn d-none d-sm-inline-block  btn-sm btn-info shadow-sm" href="entrance_list.php?id=<?php echo $d['id'];?>">View List</a>
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