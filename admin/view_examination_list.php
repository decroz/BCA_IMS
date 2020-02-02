<?php
$title = 'Eamination Candidate Details';
require "include/security.php";
require 'include/header.php';
require 'include/navbar.php';
?>
<?php 
require "include/connection.php";
    //sql query to select all  categories from database

$sql = "SELECT * from 
entrance_form e 
inner join academic_info a on e.academic_id = a.id
inner join images i on e.image_id = i.id
inner join vdc v on e.vdc_id = v.id 
inner join voucher_no vh on e.id = vh.id 
inner join districts d on v.district_id = d.id
inner join zones z on d.zone_id = z.id";
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

  <div class="row">
    <div class="col-md-6 col-xl-12">
      <div class='card'>
        <div class="table-responsive ">
          <table class="table table-bordered table-hover table-striped ">
            <div class="card-header text-white d-flex justify-content-center" style="background-color:#232323;">
              Basic Information
            </div>
            <tr>
             <?php foreach ($data as $index=>$d)?>
             <tr>
               <th class="bg-gray-900 text-light"> 
                 <div class="thumbnail">
                   <a href="img/users/<?php echo $d['passport_photo'] ?>" target="_blank">
                     <img src="img/users/<?php echo $d['passport_photo'] ?>" style="width:35%" ></a>
                     <br><small>Passport Size Photo</small>
                   </div>
                 </th>
               </tr>
               <tr>
                 <th class="bg-gray-900 text-light">Voucher no.</th>
                 <td>
                 <?php if(isset($d['first_exam'])){?>
                 I Sem -<?php echo $d['first_exam'] ?><br>
                 <?php } ?>

                 <?php if(isset($d['second_exam'])){?>
                    II Sem -<?php echo $d['second_exam'] ?><b
                 <?php } ?>

                 <?php if(isset($d['third_exam'])){?>r>
                    III Sem -<?php echo $d['third_exam'] ?><br>
                 <?php } ?>

                 <?php if(isset($d['fourth_exam'])){?>
                    IV Sem -<?php echo $d['fourth_exam'] ?><br>
                 <?php } ?>

                 <?php if(isset($d['fifth_exam'])){?>
                    V Sem -<?php echo $d['fifth_exam'] ?><br>
                 <?php } ?>

                 <?php if(isset($d['sixth_exam'])){?>
                    VI Sem -<?php echo $d['sixth_exam'] ?><br>
                 <?php } ?>

                 <?php if(isset($d['seventh_exam'])){?>
                    VII Sem -<?php echo $d['seventh_exam'] ?><br>
                 <?php } ?>

                 <?php if(isset($d['eight_exam'])){?>
                    VIII Sem -<?php echo $d['eight_exam'] ?><br>
                 <?php }?>
                 </td>
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
               <th class="bg-gray-900 text-light">Citizenship no.</th>
               <td><?php echo $d['citizenship_no'] ?></td>
             </tr>
             <tr>
               <th class="bg-gray-900 text-light">Nationality</th>
               <td><?php echo $d['nationality'] ?></td>
             </tr>
             <tr>
               <th class="bg-gray-900 text-light">Country</th>
               <td><?php echo $d['country'] ?></td>
             </tr>
             <tr>
               <th class="bg-gray-900 text-light">Zone</th>
               <td><?php echo $d['zname'] ?></td>
             </tr>
             <tr>
               <th class="bg-gray-900 text-light">District</th>
               <td><?php echo $d['dname'] ?></td>
             </tr>
             <tr>
               <th class="bg-gray-900 text-light">Municipality/V.D.C</th>
               <td><?php echo $d['vname'] ?></td> 
             </tr>
             <tr>
               <th class="bg-gray-900 text-light">Ward no.</th>
               <td><?php echo $d['ward_no'] ?></td>
             </tr>
             
           </table>
         </div>
       </div>
     

         <div class='card '>
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped ">
              <div class="card-header text-white d-flex justify-content-center" style="background-color:#232323;">
                Verification 
              </div>
              <tr>
                <td >
                 <div class="col pb-2">Warning: Check carefully before verification.</div>
                 <a class="btn d-none float-right mx-2 col-3 d-md-inline-block  btn-md btn-info shadow-sm" href="final_entrancecard.php?id=<?php echo $d['image_id'] ?>">Accept</a>
                 <a class="btn d-none float-right col-3 d-md-inline-block  btn-md btn-danger shadow-sm" 
                 href="decline_entrance.php?email=<?php echo $d['email']; ?>
                 && name=<?php echo $d['student_fname']?> <?php echo $d['student_mname']?> <?php echo $d['student_lname']; ?>">Decline</a>
               </td>
             </tr>

           </table>
         </div>
    </div>
     
   </div>
   </div>

   <?php
   include('include/script.php');
   include('include/footer.php');
   ?>