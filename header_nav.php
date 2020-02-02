 <!DOCTYPE html>
 <html>
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/error.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <link rel="stylesheet" type="text/css" href="css/overlap.css">


  <!-- for font awesome -->
  <script src="js/3a6f742687.js"></script>
  <script src="js/jquery.min.js"></script>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="0" style="background-color: #515151">
  <!-- header -->
  <section>
    <div class='jumbotron row-sm text-center text-white mb-0 py-3' style='background-color:#070707;'>
      <div class="row">
        <div class="col-sm-2">
          <img src="image\received_207774400126295.PNG"  class="pl-5 img-fluid float-left img-fluid" style="max-width:100%;height:auto">
        </div>
        <div class="col-sm-10">
          <h1>Bachelor in Computer Application</h1>
          <h3>Tribhuvan University</h3>
          <h1>Patan Multiple Campus</h1>
        </div>
      </div>
    </div>
  </section>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure you want to logput?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- navigation bar -->
  <section class="sticky-top"> 
    <nav class='navbar navbar-expand-md navbar-dark' style='background-color: #1f1f1f'>
      <button class='navbar-toggler' data-toggle='collapse' data-target='#collapse_target'>
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class='collapse navbar-collapse' id='collapse_target'>
        <ul class='navbar-nav'>
          <li class='nav-item'>
            <a href="index.php" class='nav-link active'><i class="fas fa-home"></i>Home</a>
          </li>
          
          <li class='nav-item dropdown'>
            <a href="#" class='nav-link dropdown-toggle' data-toggle='dropdown' data-target='#dropdown_target'><i class="fab fa-wpforms"></i>Form
              <span class='caret'></span></a>
              <div class='dropdown-menu' aria-labelledby='dropdown_target'>
                <a href="entrance.php" class="dropdown-item">Entrance</a>
                <a href="applyforaddmission.php" class="dropdown-item">Apply Admission</a>
               <?php include('connection.php');
          
          if(isset($_SESSION['user_username']) ){ ?>

                <a href="admission.php" class="dropdown-item">Admission</a>
                <a href="examination.php" class="dropdown-item">Examination</a>
                <?php } ?>
              </div>
            </li>
            <li class='nav-item'>
              <a href="about.php" class='nav-link'><i class="fas fa-address-card"></i>About Us</a>
            </li>
            <li class='nav-item'>
              <a href="news_events.php" class='nav-link'><i class="fa fa-newspaper-o" aria-hidden="true"></i>
              News & Events</a>
            </li>
            <li class='nav-item'>
              <a href="notice.php" class='nav-link'><i class="fas fa-envelope"></i>Notice</a>
            </li>
            <li class='nav-item '>
              <a href="syllabus.php" class='nav-link'><i class="fas fa-book-open"></i>Syllabus</a>
            </li>
            <li class='nav-item'>
              <a href="teacher_info.php" class='nav-link'><i class="fas fa-chalkboard-teacher"></i>Teacher Info</a>
            </li>
            <li class='nav-item'>
              <a href="contact.php" class='nav-link'><i class="fas fa-phone-alt"></i>Contact Us</a>
            </li>
          </ul>
        </div>
        <div class='collapse navbar-collapse ' id='collapse_target'>
         <ul class='navbar-nav ml-auto'>
          
          <?php
          
          include('connection.php');
          
          if(!isset($_SESSION['user_username']) )
          {
            ?>   
            <li class='nav-item '> 
              <a href="userlogin.php" class='nav-link'>
                <i class="fas fa-sign-in-alt"></i> Login</a>
              </li>
            <?php }else{ ?>
              <li class="nav-item dropdown no-arrow">               
                <a class="nav-link dropdown-toggle pt-1 m-0" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                  <span class=" d-none d-lg-inline text-gray-600 "><?php $_SESSION['user_username']; ?></span>

                  <?php
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
                  where username='$_SESSION[user_username]'
                  ";
                      //execute query and get result object: incase of select
                  $result = $connect->query($sql);
                  $data = [];
                  
                  if ($result->num_rows > 0) {
                    while ($user = $result->fetch_assoc()) {
                     array_push($data, $user);
                   }
                  }
                  foreach($data as $index =>$d)
                  ?>
                  <img class="rounded-circle responsive-img" style="height:30px !important; width=30 px !imporatnt;" src="admin/img/users/<?php echo $d['passport_photo'] ?>">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Request update
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <div  href="logout.php">
                      
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                      Logout
                    </div>
                  </a>
                </div>
              </li>
            <?php } ?>
          </ul> 
        </div>
      </nav>
    </section>


