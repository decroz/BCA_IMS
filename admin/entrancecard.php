<?php
$title = 'Entrance Card';
require ('include/security.php');
require ('include/header.php');
require ('include/navbar.php');
?>
<?php 

$id=$_GET['id'];

require "include/connection.php";

$sql = "SELECT * from  
entrance_form e 
inner join images i on e.image_id=i.id
where image_id=$id";
    //execute query and get result object: incase of select
$result = $connect->query($sql);
$data = [];

if ($result->num_rows > 0) {
  while ($user = $result->fetch_assoc()) {
   array_push($data, $user);
 }
}
foreach($data as $index=>$d) 
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

    </div>
  </section>
  
  <div class="container mx-5">
    <table class="col m-3 table-bordered" style="font-size:19px;">

      <tr>
        <th class="p-3">Entrance Symbol no</th>
        <td class="p-3 "><?php echo $d['entrance_symbol_no']?></td>
      </tr>


      <tr>
        <th class="p-3">Applicant's Name</th>
        <td class=" p-3 "><?php echo $d['student_fname'];?> <?php echo $d['student_mname'];?> <?php echo $d['student_lname']; ?></td>
      </tr>
      <tr>
        <th class="p-3">Entrance Symbol no</th>
        <td class=" p-3"><?php echo $d['mobile_no']?></td>
      </tr>   
    </table>    

    <a class="btn m-2 d-inline-block btn btn-info shadow-sm" href="phpmailer/ent_email_verification.php?id=<?php echo $d['image_id'] ?>">Send Entrance card</a>
  </div>         
  
</div>

<?php require ('include/footer.php'); ?>
