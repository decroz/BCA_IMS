<?php
$title = 'Admitted Candidate Details';
require "include/security.php";
require 'include/header.php';
require 'include/navbar.php';
?>
<?php 
require "include/connection.php";
    //sql query to select all  categories from database
$sql = "SELECT * from 
images i
inner join entrance_form e on i.id= e.image_id
inner join academic_info a on e.academic_id = a.id
inner join apply_admission aa on aa.entrance_form_id = e.id";

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
  </div>

  <!-- list the registered admins -->

  <div class="card">
     
        <div class="table-responsive ">
          <table class="table table-bordered table-hover table-striped ">
            <div class="card-header text-white d-flex justify-content-center" style="background-color:#232323;">
              Basic Information
            </div>
            <tr>
              <?php foreach ($data as $index => $d) ?>
                <tr>
                <th class="bg-gray-900 text-light"> 
                 <div class="thumbnail">
                   <a href="img/users/<?php echo $d['passport_photo'] ?>" target="_blank">
                     <img src="img/users/<?php echo $d['passport_photo'] ?>" style="width:35%;" ></a>
                     <br><small>Passport Size Photo</small>
                   </div>
                 </th>
                </tr>
             </tr> 
             <tr>
               <th class="bg-gray-900 text-light">Student's Name</th>
               <td><?php echo $d['student_fname'] ?> <?php echo $d['student_mname'] ?> <?php echo $d['student_lname'] ?></td>
             </tr>
             <tr>
               <th class="bg-gray-900 text-light">Father's Name</th>
               <td><?php echo $d['father_fname'] ?> <?php echo $d['father_mname'] ?> <?php echo $d['father_lname'] ?></td>
             </tr>
             <tr>
               <th class="bg-gray-900 text-light">Mother's Name</th>
               <td><?php echo $d['mother_fname'] ?> <?php echo $d['mother_mname'] ?> <?php echo $d['mother_lname'] ?></td>
             </tr>
             <tr>
               <th class="bg-gray-900 text-light">Email</th>
               <td><?php echo $d['email'] ?></td>
             </tr>
             <tr>
               <th class="bg-gray-900 text-light">Mobile no.</th>
               <td><?php echo $d['mobile_no'] ?></td>
             </tr>
             <tr>
               <th class="bg-gray-900 text-light">Gender</th>
               <td><?php echo $d['gender'] ?></td>
             </tr>
             <tr>
               <th class="bg-gray-900 text-light">Emergency Person's Name</th>
               <td><?php echo $d['emergency_contact_fname'] ?> <?php echo $d['emergency_contact_mname'] ?> <?php echo $d['emergency_contact_lname'] ?></td>
             </tr>
             <tr>
               <th class="bg-gray-900 text-light">Emergency Mobile no.</th>
               <td><?php echo $d['emergency_mobile_no'] ?> </td>
             </tr>
         </table>
   </div>


<div class='card'>
  <div class="table-responsive">
    <table class="table table-bordered table-hover table-striped ">
      <div class="card-header text-white d-flex justify-content-center" style="background-color:#232323;">
        Verification 
      </div>
      <tr>
        <td >
         <a class="col-md-7 pt-3">Warning: Check carefully before verification.</a>
         <a class="btn d-none float-right mx-2 col-md-2 d-md-inline-block  btn-md btn-info shadow-sm" href="accept_admission.php?email=<?php echo $d['email']; ?>
                 && name=<?php echo $d['student_fname']?> <?php echo $d['student_mname']?> <?php echo $d['student_lname']; ?>">Accept</a>
         <a class="btn d-none float-right col-md-2 d-md-inline-block  btn-md btn-danger shadow-sm" href="decline_addmission.php?email=<?php echo $d['email']; ?>
                 && name=<?php echo $d['student_fname']?> <?php echo $d['student_mname']?> <?php echo $d['student_lname']; ?>">Decline</a>
       </td>
     </tr>
   </table>
 </div>
</div>



<?php
include('include/script.php');
include('include/footer.php');
?>