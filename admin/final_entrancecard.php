<?php
$title = 'Examination Card';
require ('include/security.php');
require ('include/header.php');
require ('include/navbar.php');
?>
<?php 

$id=$_GET['id'];

require "include/connection.php";

$sql = "SELECT * from  
entrance_form e 
inner join admission a on e.id=a.entrance_form_id
inner join images i on e.image_id=i.id
where e.image_id=$id";
    //execute query and get result object: incase of select
$result = $connect->query($sql);
$data = [];

if ($result->num_rows > 0) {
  while ($user = $result->fetch_assoc()) {
   array_push($data, $user);
 }
}
foreach($data as $index=>$d) {
  ?>

<!-- Begin Page Content -->

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
  </div>

  <!-- list the registered admins -->

  <div class="row" style='background-color: #123;'>
   
   
    <section class="container text-white">
      <div class= 'jumbotron-fluid text-center mb-0 p-3 row' style='background-color: #123;' >
       <div class='col-3'>
        <img src="img\received_207774400126295.PNG"  class="pl-5 float-left img-fluid" style="height:150px;">
      </div>
      <div class='col-6 center'>
        <h3 >Admission Card for Entrance Test</h3>
        <h3 class="font-weight-bold">TRIBHUVAN UNIVERSITY</h3>
        <h4 >Faculty of Humanities and Social Sciences</h4>
        <h3 class="font-weight-bold"> Bachelor of Computer Application</h3>
      </div>
      <div class='col-3'>
        <img src="img/users/<?php echo $d['passport_photo'] ?>"  class="float-right img-fluid" style="height:45mm;">
      </div>
      <?php $aa = $d['semester_id'] ?>
    </div>
  </section>
  
  <div class="container mx-5">
    <table >

      <tr>
        <th class="p-3">Examination Roll No. </th>
        <td class="p-3 "><?php echo $d['exam_roll_no']?></td>
      </tr>


      <tr>
        <th class="p-3">Applicant's Name</th>
        <td class=" p-3 "><?php echo $d['student_fname'];?> <?php echo $d['student_mname'];?> <?php echo $d['student_lname']; ?></td>
      </tr>
      <tr>
        <th class="p-3">T.U. Registration no</th>
        <td class=" p-3"><?php echo $d['tu_reg_no']?></td>
      </tr>   
    </table>    

    <?php } ?>


    <?php 
require "include/connection.php";

$sql = "SELECT * from  
subject s
inner join semester se on s.sem_id=se.id
where s.sem_id=$aa";
    //execute query and get result object: incase of select
$result = $connect->query($sql);
$data = [];

if ($result->num_rows > 0) {
  while ($user = $result->fetch_assoc()) {
   array_push($data, $user);
 }
}

  ?>

    <table class="col m-3 table-bordered" style="font-size:19px;">

      <tr>
        <th class="p-3">S.N</th>
        <th class="p-3">Subject Code</th>
        <th class="p-3">Course Title</th>
        <th class="p-3">Credit Hours</th>
      </tr>

      <?php foreach($data as $index=>$a) { ?>

      <tr>
        <th class="p-3"><?php echo $index+1; ?></th>
        <td class=" p-3 "><?php echo $a['subject_code'];?> </td>
        <td class=" p-3 "><?php echo $a['subject_name'];?> </td>
        <td class=" p-3 "><?php echo $a['subject_credit_hours'];?> </td>     
      </tr> 
      <?php } ?>
  
    </table>   
    <a class="btn m-2 d-inline-block btn btn-info shadow-sm" href="phpmailer/exam_email_verify.php>">Send Entrance card</a>
  </div>         
  
</div>

<?php require ('include/footer.php'); ?>
