 <?php  
 session_start();
 $username=$_SESSION['user_username'];
 $title = 'Welcome';
 include 'header_nav.php';
 ?>
 
<?php 
require "connection.php";
    //sql query to select all  categories from database

$sql = "SELECT * from 
entrance_form e 
inner join academic_info a on e.academic_id = a.id
inner join images i on e.image_id = i.id
inner join vdc v on e.vdc_id = v.id 
inner join voucher_no vh on e.id = vh.id 
inner join districts d on v.district_id = d.id
inner join zones z on d.zone_id = z.id
inner join admission m on e.id=m.entrance_form_id
inner join users u on m.users_id=u.id
where username='$username'
";
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

<div class="jumbotron px-5  my-1" style="background-color:#000">

  <!-- Page Heading -->
  <?php foreach ($data as $index=>$d)?>
  <div class="d-sm-flex text-center mb-4">
    <h3 class="mb-0 text-center" style="color:#ff4232;">Welcome <?php echo $d['student_fname'] ?></h3>
  </div> 


  <!-- list the registered admins -->

  <div class="row">
    <div class="col-md-6">
      <div class='card'>
        <div class="table-responsive ">
          <table class="table table-bordered table-hover table-striped table-warning">
            <div class="card-header text-white d-flex justify-content-center" style="background-color:#232323;">
              Basic Information
            </div>
            <tr>
             <tr>
               <th class="bg-gray-900 "> 
                 <div class="thumbnail">
                   <a href="admin/img/users/<?php echo $d['passport_photo'] ?>" target="_blank">
                     <img src="admin/img/users/<?php echo $d['passport_photo'] ?>" style="width:35%" ></a>
                     <br><small>Passport Size Photo</small>
                   </div>
                 </th>
               </tr>
               <tr>
                 <th class="bg-gray-900 ">Voucher no.</th>
                 <td><?php echo $d['entrance_voucher'] ?></td>
               </tr>
             </tr>
             <tr>
               <th class="bg-gray-900 ">Student's Name</th>
               <td><?php echo $d['student_fname'] ?> <?php echo $d['student_mname'] ?> <?php echo $d['student_lname'] ?></td>
             </tr>
             <tr>
               <th class="bg-gray-900 ">Father's Name</th>
               <td><?php echo $d['father_fname'] ?> <?php echo $d['father_mname'] ?> <?php echo $d['father_lname'] ?></td>
             </tr>
             <tr>
               <th class="bg-gray-900 ">Mother's Name</th>
               <td><?php echo $d['mother_fname'] ?> <?php echo $d['mother_mname'] ?> <?php echo $d['mother_lname'] ?></td>
             </tr>
             <tr>
               <th class="bg-gray-900 ">Email</th>
               <td><?php echo $d['email'] ?></td>
             </tr>
             <tr>
               <th class="bg-gray-900 ">Mobile no.</th>
               <td><?php echo $d['mobile_no'] ?></td>
             </tr>
             <tr>
               <th class="bg-gray-900 ">Gender</th>
               <td><?php echo $d['gender'] ?></td>
             </tr>
             <tr>
               <th class="bg-gray-900 ">Citizenship no.</th>
               <td><?php echo $d['citizenship_no'] ?></td>
             </tr>
             <tr>
               <th class="bg-gray-900 ">Nationality</th>
               <td><?php echo $d['nationality'] ?></td>
             </tr>
             <tr>
               <th class="bg-gray-900 ">Country</th>
               <td><?php echo $d['country'] ?></td>
             </tr>
             <tr>
               <th class="bg-gray-900 ">Zone</th>
               <td><?php echo $d['zname'] ?></td>
             </tr>
             <tr>
               <th class="bg-gray-900 ">District</th>
               <td><?php echo $d['dname'] ?></td>
             </tr>
             <tr>
               <th class="bg-gray-900 ">Municipality/V.D.C</th>
               <td><?php echo $d['vname'] ?></td> 
             </tr>
             <tr>
               <th class="bg-gray-900 ">Ward no.</th>
               <td><?php echo $d['ward_no'] ?></td>
             </tr>
             
           </table>
         </div>
       </div>
     </div>

     <div class="col-md-6">
      <div class='card mb-3'>
        <div class="table-responsive ">
          <table class="table table-bordered table-hover table-striped table-warning ">
            <div class="card-header text-white d-flex justify-content-center" style="background-color:#232323;">
              School Information
            </div>
            <tr>
              
            </tr>
            <tr>
             <th class="bg-gray-900 ">Board</th>
             <td><?php echo $d['school_board'] ?> </td>
           </tr>
           <tr>
             <th class="bg-gray-900 ">School name</th>
             <td><?php echo $d['school_name'] ?></td>
           </tr>
           <tr>
             <th class="bg-gray-900 ">Percentage</th>
             <td><?php echo $d['school_percentage'] ?></td>
           </tr>
           <tr>
             <th class="bg-gray-900 ">Passed Year</th>
             <td><?php echo $d['school_passed_year'] ?></td>
           </tr>
           
           <tr>
             <th class="bg-gray-900 ">Gradesheet</th>
             <td>
               <div class="thumbnail">
                 <a href="admin/img/users/<?php echo $d['school_gradesheet'] ?>" target="_blank">
                   <?php $d['school_gradesheet'] ?>View <i class="fas fa-eye"></i></a>
                 </div>
               </td>
             </tr>
             <tr>
               <th class="bg-gray-900 ">Characer Certificate</th>
               <td>
                 <div class="thumbnail">
                   <a href="admin/img/users/<?php echo $d['school_certificate'] ?>" target="_blank">
                     <?php $d['school_certificate'] ?>View <i class="fas fa-eye"></i></a>
                   </div>
                 </td>
               </tr>
             </table>
           </div>
         </div>


         <div class='card  mb-3'>
          <div class="table-responsive ">
            <table class="table table-bordered table-hover table-striped table-warning ">
              <div class="card-header text-white d-flex justify-content-center" style="background-color:#232323;">
                College Information
              </div>
              <tr>
              </tr>
              <tr>
               <th class="bg-gray-900 ">Board</th>
               <td><?php echo $d['college_board'] ?> </td>
             </tr>
             <tr>
               <th class="bg-gray-900 ">School name</th>
               <td><?php echo $d['college_name'] ?></td>
             </tr>
             <tr>
               <th class="bg-gray-900 ">Percentage</th>
               <td><?php echo $d['college_percentage'] ?> </td>
             </tr>
             <tr>
               <th class="bg-gray-900 ">Passed Year</th>
               <td><?php echo $d['college_passed_year'] ?></td>
             </tr>
             
             <tr>
               <th class="bg-gray-900 ">Gradesheet</th>
               <td>
                 <div class="thumbnail">
                   <a href="admin/img/users/<?php echo $d['college_gradesheet'] ?>" target="_blank">
                     <?php $d['college_gradesheet'] ?>View <i class="fas fa-eye"></i></a>
                   </div>
                 </td>
               </tr>
               <tr>
                 <th class="bg-gray-900 ">Characer Certificate</th>
                 <td>
                   <div class="thumbnail">
                    <a href="admin/img/users/<?php echo $d['college_certificate'] ?>" target="_blank"  id="college_certificate">
                     <?php $d['college_certificate'] ?>View <i class="fas fa-eye"></i></a>
                   </div>                     
                 </td>
               </tr>
             </table>
           </div>
         </div>

     </div>
   </div>
   </div>

<?php include 'footer.php';?>

