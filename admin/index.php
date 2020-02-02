<?php
require "include/security.php";
$title = 'Home Page';
include('include/header.php');
include('include/navbar.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>

  <!-- Content Row -->
  <div class="row">

   <!-- Earnings (Monthly) Card Example -->
   <div class="col-xl-6 col-md-12 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Batch</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                  <?php
              require "include/connection.php";
              $sql="select count(id) as total from batch ";
            
               $result = $connect->query($sql);
               $user = $result->fetch_assoc();
               echo $count = $user['total'];
              ?>
                  </div>
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </div>
    </div>

    <!-- Totaal no of entrance candidate this year Card Example -->
    <div class="col-xl-6 col-md-12 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Entrance candidate this year</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
               require "include/connection.php";
              $sql="select max(id) from batch ";
              $result = $connect->query($sql);
              $user = $result->fetch_assoc();
              $id = $user['max(id)'];

              $sql="SELECT COUNT(*) as total from entrance_form e
               inner join batch b on e.batch_id=b.id
               where b.id='$id'"; 
                $result = $connect->query($sql);
                $user = $result->fetch_assoc();
                echo $count = $user['total'];
              ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-12 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">New students enrolled this year</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
              require "include/connection.php";
              $sql="select max(id) from batch ";
              $result = $connect->query($sql);
              $user = $result->fetch_assoc();
              $id = $user['max(id)'];

              $sql="SELECT COUNT(*) as total from admission a
              inner join entrance_form e on a.entrance_form_id=e.id
              inner join batch b on e.batch_id=b.id
              where b.id='$id'"; 
               $result = $connect->query($sql);
               $user = $result->fetch_assoc();
               echo $count = $user['total'];
              ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-12 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total students</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                  <?php
              require "include/connection.php";
            

              $sql="SELECT COUNT(*) as total from admission a
              inner join entrance_form e on a.entrance_form_id=e.id
              inner join batch b on e.batch_id=b.id
              group by batch_id DESC LIMIT 4"; 
               $result = $connect->query($sql);
               $user = $result->fetch_assoc();
               echo $count = $user['total'];
              ?>
                  </div>
                </div>
              </div>
            </div>
          
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-6 col-md-12 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Teachers</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
              require "include/connection.php";
          
              $sql="SELECT COUNT(*) as total from teacher"; 
               $result = $connect->query($sql);
               $user = $result->fetch_assoc();
               echo $count = $user['total'];
              ?>
              </div>
            </div>
         
          </div>
        </div>
      </div>
    </div>
  </div>

  

  <?php
  include('include/script.php');
  include('include/footer.php');
  ?>