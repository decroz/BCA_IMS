<?php
$title = 'Student Details';
require "include/security.php";
require 'include/header.php';
require 'include/navbar.php';
?>
<?php 
$id=$_GET['id'];
require "include/connection.php";
    //sql query to select all  categories from database

$sql = "SELECT * from 
entrance_form e 
inner join academic_info a on e.academic_id = a.id
inner join images i on e.image_id = i.id
inner join vdc v on e.vdc_id = v.id 
inner join voucher_no vh on e.id = vh.id 
inner join districts d on v.district_id = d.id
inner join zones z on d.zone_id = z.id
inner join admission m on e.id = m.entrance_form_id
inner join users u on m.users_id=u.id
where batch_id='$id'";
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
    <div class="col-md-12">
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
                 <td></td>
                 <td>
                 <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id; ?>" >
                    <input type='hidden' id='id' name="id" value="<?php echo $d['id'] ?>" >

                     <input type='file' id='passport_photo' name="passport_photo" placeholder="Enter rank">
                     <?php if (isset($err['passport_photo'])) { ?>
                         <div class="text-danger">
                         <?php echo $err['passport_photo']; ?> 
                         </div>
                     <?php  } ?>
            
                    <input type="submit" name="submit" class="text-light btn btn-danger" value="Update">
                </form>
                 </td>

               </tr>
               <tr>
                 <th class="bg-gray-900 text-light">Voucher no.</th>
                 <td><?php echo $d['entrance_voucher'] ?></td>
                 <td>     <form method="POST" action="entrance_voucher.php" >
                    <input type='hidden' id='id' name="id" value="<?php echo $d['id'] ?>" >

                     <input type='text' id='entrance_voucher' name="entrance_voucher" placeholder="Enter voucher no">
                     <?php if (isset($err['entrance_voucher'])) { ?>
                         <div class="text-danger">
                         <?php echo $err['entrance_voucher']; ?> 
                         </div>
                     <?php  } ?>
            
                    <input type="submit" name="submit" class="text-light btn btn-danger" value="Update">
                </form>
                </td>
               </tr>
             </tr>
             <tr>
               <th class="bg-gray-900 text-light">Student's Name</th>
               <td><?php echo $d['student_fname'] ?> <?php echo $d['student_mname'] ?> <?php echo $d['student_lname'] ?></td>
               <td>     <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id; ?>" >
                    <input type='hidden' id='id' name="id" value="<?php echo $d['id'] ?>" >

                     <input type='text' id='student_fname' name="student_fname" placeholder="Enter rank">
                     <?php if (isset($err['rank'])) { ?>
                         <div class="text-danger">
                         <?php echo $err['rank']; ?> 
                         </div>
                     <?php  } ?>
            
                    <input type="submit" name="submit" class="text-light btn btn-danger" value="Update">
                </form>
                </td>
             </tr>
             <tr>
               <th class="bg-gray-900 text-light">Father's Name</th>
               <td><?php echo $d['father_fname'] ?> <?php echo $d['father_mname'] ?> <?php echo $d['father_lname'] ?></td>
               <td>     <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id; ?>" >
                    <input type='hidden' id='id' name="id" value="<?php echo $d['id'] ?>" >

                     <input type='text' id='passport_photo' name="passport_photo" placeholder="Enter rank">
                     <?php if (isset($err['rank'])) { ?>
                         <div class="text-danger">
                         <?php echo $err['rank']; ?> 
                         </div>
                     <?php  } ?>
            
                    <input type="submit" name="submit" class="text-light btn btn-danger" value="Update">
                </form>
                </td>
             </tr>
             <tr>
               <th class="bg-gray-900 text-light">Mother's Name</th>
               <td><?php echo $d['mother_fname'] ?> <?php echo $d['mother_mname'] ?> <?php echo $d['mother_lname'] ?></td>
               <td>     <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id; ?>" >
                    <input type='hidden' id='passport_photo' name="passport_photo" value="<?php echo $d['id'] ?>" >

                     <input type='text' id='id' name="id" placeholder="Enter rank">
                     <?php if (isset($err['rank'])) { ?>
                         <div class="text-danger">
                         <?php echo $err['rank']; ?> 
                         </div>
                     <?php  } ?>
            
                    <input type="submit" name="submit" class="text-light btn btn-danger" value="Update">
                </form>
                </td>
             </tr>
             <tr>
               <th class="bg-gray-900 text-light">Email</th>
               <td><?php echo $d['email'] ?></td>
               <td>     <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id; ?>" >
                    <input type='hidden' id='id' name="id" value="<?php echo $d['id'] ?>" >

                     <input type='text' id='passport_photo' name="passport_photo" placeholder="Enter rank">
                     <?php if (isset($err['rank'])) { ?>
                         <div class="text-danger">
                         <?php echo $err['rank']; ?> 
                         </div>
                     <?php  } ?>
            
                    <input type="submit" name="submit" class="text-light btn btn-danger" value="Update">
                </form>
                </td>
             </tr>
             <tr>
               <th class="bg-gray-900 text-light">Mobile no.</th>
               <td><?php echo $d['mobile_no'] ?></td>
               <td>     <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id; ?>" >
                    <input type='hidden' id='id' name="id" value="<?php echo $d['id'] ?>" >

                     <input type='text' id='passport_photo' name="passport_photo" placeholder="Enter rank">
                     <?php if (isset($err['rank'])) { ?>
                         <div class="text-danger">
                         <?php echo $err['rank']; ?> 
                         </div>
                     <?php  } ?>
            
                    <input type="submit" name="submit" class="text-light btn btn-danger" value="Update">
                </form>
                </td>
             </tr>
             <tr>
               <th class="bg-gray-900 text-light">Gender</th>
               <td><?php echo $d['gender'] ?></td>
               <td>     <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id; ?>" >
                    <input type='hidden' id='id' name="id" value="<?php echo $d['id'] ?>" >

                     <input type='text' id='passport_photo' name="passport_photo" placeholder="Enter rank">
                     <?php if (isset($err['rank'])) { ?>
                         <div class="text-danger">
                         <?php echo $err['rank']; ?> 
                         </div>
                     <?php  } ?>
            
                    <input type="submit" name="submit" class="text-light btn btn-danger" value="Update">
                </form>
                </td>
             </tr>
             <tr>
               <th class="bg-gray-900 text-light">Citizenship no.</th>
               <td><?php echo $d['citizenship_no'] ?></td>
               <td>     <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id; ?>" >
                    <input type='hidden' id='id' name="id" value="<?php echo $d['id'] ?>" >

                     <input type='text' id='passport_photo' name="passport_photo" placeholder="Enter rank">
                     <?php if (isset($err['rank'])) { ?>
                         <div class="text-danger">
                         <?php echo $err['rank']; ?> 
                         </div>
                     <?php  } ?>
            
                    <input type="submit" name="submit" class="text-light btn btn-danger" value="Update">
                </form>
                </td>
             </tr>
             <tr>
               <th class="bg-gray-900 text-light">Nationality</th>
               <td><?php echo $d['nationality'] ?></td>
               <td>     <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id; ?>" >
                    <input type='hidden' id='id' name="id" value="<?php echo $d['id'] ?>" >

                     <input type='text' id='passport_photo' name="passport_photo" placeholder="Enter rank">
                     <?php if (isset($err['rank'])) { ?>
                         <div class="text-danger">
                         <?php echo $err['rank']; ?> 
                         </div>
                     <?php  } ?>
            
                    <input type="submit" name="submit" class="text-light btn btn-danger" value="Update">
                </form>
                </td>
             </tr>
             <tr>
               <th class="bg-gray-900 text-light">Country</th>
               <td><?php echo $d['country'] ?></td>
               <td>     <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id; ?>" >
                    <input type='hidden' id='id' name="id" value="<?php echo $d['id'] ?>" >

                     <input type='text' id='passport_photo' name="passport_photo" placeholder="Enter rank">
                     <?php if (isset($err['rank'])) { ?>
                         <div class="text-danger">
                         <?php echo $err['rank']; ?> 
                         </div>
                     <?php  } ?>
            
                    <input type="submit" name="submit" class="text-light btn btn-danger" value="Update">
                </form>
                </td>
             </tr>
             <tr>
               <th class="bg-gray-900 text-light">Zone</th>
               <td><?php echo $d['zname'] ?></td>
               <td>     <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id; ?>" >
                    <input type='hidden' id='id' name="id" value="<?php echo $d['id'] ?>" >

                     <input type='text' id='passport_photo' name="passport_photo" placeholder="Enter rank">
                     <?php if (isset($err['rank'])) { ?>
                         <div class="text-danger">
                         <?php echo $err['rank']; ?> 
                         </div>
                     <?php  } ?>
            
                    <input type="submit" name="submit" class="text-light btn btn-danger" value="Update">
                </form>
                </td>
             </tr>
             <tr>
               <th class="bg-gray-900 text-light">District</th>
               <td><?php echo $d['dname'] ?></td>
               <td>     <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id; ?>" >
                    <input type='hidden' id='id' name="id" value="<?php echo $d['id'] ?>" >

                     <input type='text' id='passport_photo' name="passport_photo" placeholder="Enter rank">
                     <?php if (isset($err['rank'])) { ?>
                         <div class="text-danger">
                         <?php echo $err['rank']; ?> 
                         </div>
                     <?php  } ?>
            
                    <input type="submit" name="submit" class="text-light btn btn-danger" value="Update">
                </form>
                </td>
             </tr>
             <tr>
               <th class="bg-gray-900 text-light">Municipality/V.D.C</th>
               <td><?php echo $d['vname'] ?></td> 
               <td>     <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id; ?>" >
                    <input type='hidden' id='id' name="id" value="<?php echo $d['id'] ?>" >

                     <input type='text' id='passport_photo' name="passport_photo" placeholder="Enter rank">
                     <?php if (isset($err['rank'])) { ?>
                         <div class="text-danger">
                         <?php echo $err['rank']; ?> 
                         </div>
                     <?php  } ?>
            
                    <input type="submit" name="submit" class="text-light btn btn-danger" value="Update">
                </form>
                </td>
             </tr>
             <tr>
               <th class="bg-gray-900 text-light">Ward no.</th>
               <td><?php echo $d['ward_no'] ?></td>
               <td>     <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id; ?>" >
                    <input type='hidden' id='id' name="id" value="<?php echo $d['id'] ?>" >

                     <input type='text' id='passport_photo' name="passport_photo" placeholder="Enter rank">
                     <?php if (isset($err['rank'])) { ?>
                         <div class="text-danger">
                         <?php echo $err['rank']; ?> 
                         </div>
                     <?php  } ?>
            
                    <input type="submit" name="submit" class="text-light btn btn-danger" value="Update">
                </form>
                </td>
             </tr>
             
           </table>
         </div>
       </div>
     </div>

     <div class="col-md-12">
      <div class='card mb-3'>
        <div class="table-responsive ">
          <table class="table table-bordered table-hover table-striped ">
            <div class="card-header text-white d-flex justify-content-center" style="background-color:#232323;">
              School Information
            </div>
            <tr>
              
            </tr>
            <tr>
             <th class="bg-gray-900 text-light">Board</th>
             <td><?php echo $d['school_board'] ?> </td>
             <td>     <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id; ?>" >
                    <input type='hidden' id='id' name="id" value="<?php echo $d['id'] ?>" >

                     <input type='text' id='passport_photo' name="passport_photo" placeholder="Enter rank">
                     <?php if (isset($err['rank'])) { ?>
                         <div class="text-danger">
                         <?php echo $err['rank']; ?> 
                         </div>
                     <?php  } ?>
            
                    <input type="submit" name="submit" class="text-light btn btn-danger" value="Update">
                </form>
                </td>
           </tr>
           <tr>
             <th class="bg-gray-900 text-light">School name</th>
             <td><?php echo $d['school_name'] ?></td>
             <td>     <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id; ?>" >
                    <input type='hidden' id='id' name="id" value="<?php echo $d['id'] ?>" >

                     <input type='text' id='passport_photo' name="passport_photo" placeholder="Enter rank">
                     <?php if (isset($err['rank'])) { ?>
                         <div class="text-danger">
                         <?php echo $err['rank']; ?> 
                         </div>
                     <?php  } ?>
            
                    <input type="submit" name="submit" class="text-light btn btn-danger" value="Update">
                </form>
                </td>
           </tr>
           <tr>
             <th class="bg-gray-900 text-light">Percentage</th>
             <td><?php echo $d['school_percentage'] ?></td>
             <td>     <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id; ?>" >
                    <input type='hidden' id='id' name="id" value="<?php echo $d['id'] ?>" >

                     <input type='text' id='passport_photo' name="passport_photo" placeholder="Enter rank">
                     <?php if (isset($err['rank'])) { ?>
                         <div class="text-danger">
                         <?php echo $err['rank']; ?> 
                         </div>
                     <?php  } ?>
            
                    <input type="submit" name="submit" class="text-light btn btn-danger" value="Update">
                </form>
                </td>
           </tr>
           <tr>
             <th class="bg-gray-900 text-light">Passed Year</th>
             <td><?php echo $d['school_passed_year'] ?></td>

             <td>    
              <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id; ?>" >
                    <input type='hidden' id='id' name="id" value="<?php echo $d['id'] ?>" >

                     <input type='text' id='passport_photo' name="passport_photo" placeholder="Enter rank">
                     <?php if (isset($err['rank'])) { ?>
                         <div class="text-danger">
                         <?php echo $err['rank']; ?> 
                         </div>
                     <?php  } ?>
            
                    <input type="submit" name="submit" class="text-light btn btn-danger" value="Update">
                </form>
                </td>
           </tr>
           
           <tr>
             <th class="bg-gray-900 text-light">Gradesheet</th>
             <td>
               <div class="thumbnail">
                 <a href="img/users/<?php echo $d['school_gradesheet'] ?>" target="_blank">
                   <?php $d['school_gradesheet'] ?>View <i class="fas fa-eye"></i></a>
                 </div>
               </td>
               <td>     <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id; ?>" >
                    <input type='hidden' id='id' name="id" value="<?php echo $d['id'] ?>" >

                     <input type='text' id='passport_photo' name="passport_photo" placeholder="Enter rank">
                     <?php if (isset($err['rank'])) { ?>
                         <div class="text-danger">
                         <?php echo $err['rank']; ?> 
                         </div>
                     <?php  } ?>
            
                    <input type="submit" name="submit" class="text-light btn btn-danger" value="Update">
                </form>
                </td>
             </tr>
             <tr>
               <th class="bg-gray-900 text-light">Characer Certificate</th>
               <td>
                 <div class="thumbnail">
                   <a href="img/users/<?php echo $d['school_certificate'] ?>" target="_blank">
                     <?php $d['school_certificate'] ?>View <i class="fas fa-eye"></i></a>
                   </div>
                 </td>
                 <td>     <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id; ?>" >
                    <input type='hidden' id='id' name="id" value="<?php echo $d['id'] ?>" >

                     <input type='text' id='passport_photo' name="passport_photo" placeholder="Enter rank">
                     <?php if (isset($err['rank'])) { ?>
                         <div class="text-danger">
                         <?php echo $err['rank']; ?> 
                         </div>
                     <?php  } ?>
            
                    <input type="submit" name="submit" class="text-light btn btn-danger" value="Update">
                </form>
                </td>
               </tr>
             </table>
           </div>
         </div>


         <div class='card  mb-3'>
          <div class="table-responsive ">
            <table class="table table-bordered table-hover table-striped ">
              <div class="card-header text-white d-flex justify-content-center" style="background-color:#232323;">
                College Information
              </div>
              <tr>
              </tr>
              <tr>
               <th class="bg-gray-900 text-light">Board</th>
               <td><?php echo $d['college_board'] ?> </td>
               <td>     <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id; ?>" >
                    <input type='hidden' id='id' name="id" value="<?php echo $d['id'] ?>" >

                     <input type='text' id='passport_photo' name="passport_photo" placeholder="Enter rank">
                     <?php if (isset($err['rank'])) { ?>
                         <div class="text-danger">
                         <?php echo $err['rank']; ?> 
                         </div>
                     <?php  } ?>
            
                    <input type="submit" name="submit" class="text-light btn btn-danger" value="Update">
                </form>
                </td>
             </tr>
             <tr>
               <th class="bg-gray-900 text-light">School name</th>
               <td><?php echo $d['college_name'] ?></td>
               <td>     <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id; ?>" >
                    <input type='hidden' id='id' name="id" value="<?php echo $d['id'] ?>" >

                     <input type='text' id='passport_photo' name="passport_photo" placeholder="Enter rank">
                     <?php if (isset($err['rank'])) { ?>
                         <div class="text-danger">
                         <?php echo $err['rank']; ?> 
                         </div>
                     <?php  } ?>
            
                    <input type="submit" name="submit" class="text-light btn btn-danger" value="Update">
                </form>
                </td>
             </tr>
             <tr>
               <th class="bg-gray-900 text-light">Percentage</th>
               <td><?php echo $d['college_percentage'] ?> </td>
               <td>     <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id; ?>" >
                    <input type='hidden' id='passport_photo' name="passport_photo" value="<?php echo $d['id'] ?>" >

                     <input type='text' id='id' name="id" placeholder="Enter rank">
                     <?php if (isset($err['rank'])) { ?>
                         <div class="text-danger">
                         <?php echo $err['rank']; ?> 
                         </div>
                     <?php  } ?>
            
                    <input type="submit" name="submit" class="text-light btn btn-danger" value="Update">
                </form>
                </td>
             </tr>
             <tr>
               <th class="bg-gray-900 text-light">Passed Year</th>
               <td><?php echo $d['college_passed_year'] ?></td>
               <td>     <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id; ?>" >
                    <input type='hidden' id='id' name="id" value="<?php echo $d['id'] ?>" >

                     <input type='text' id='passport_photo' name="passport_photo" placeholder="Enter rank">
                     <?php if (isset($err['rank'])) { ?>
                         <div class="text-danger">
                         <?php echo $err['rank']; ?> 
                         </div>
                     <?php  } ?>
            
                    <input type="submit" name="submit" class="text-light btn btn-danger" value="Update">
                </form>
                </td>
             </tr>
             
             <tr>
               <th class="bg-gray-900 text-light">Gradesheet</th>
               <td>
                 <div class="thumbnail">
                   <a href="img/users/<?php echo $d['college_gradesheet'] ?>" target="_blank">
                     <?php $d['college_gradesheet'] ?>View <i class="fas fa-eye"></i></a>
                     <td>     <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id; ?>" >
                    <input type='hidden' id='id' name="id" value="<?php echo $d['id'] ?>" >

                     <input type='text' id='passport_photo' name="passport_photo" placeholder="Enter rank">
                     <?php if (isset($err['rank'])) { ?>
                         <div class="text-danger">
                         <?php echo $err['rank']; ?> 
                         </div>
                     <?php  } ?>
            
                    <input type="submit" name="submit" class="text-light btn btn-danger" value="Update">
                </form>
                </td>
                   </div>
                 </td>
               </tr>
               <tr>
                 <th class="bg-gray-900 text-light">Characer Certificate</th>
                 <td>
                   <div class="thumbnail">
                    <a href="img/users/<?php echo $d['college_certificate'] ?>" target="_blank"  id="college_certificate">
                     <?php $d['college_certificate'] ?>View <i class="fas fa-eye"></i></a>
                   </div>                     
                 </td>
                 <td>     <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id; ?>" >
                    <input type='hidden' id='id' name="id" value="<?php echo $d['id'] ?>" >

                     <input type='text' id='passport_photo' name="passport_photo" placeholder="Enter rank">
                     <?php if (isset($err['rank'])) { ?>
                         <div class="text-danger">
                         <?php echo $err['rank']; ?> 
                         </div>
                     <?php  } ?>
            
                    <input type="submit" name="submit" class="text-light btn btn-danger" value="Update">
                </form>
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