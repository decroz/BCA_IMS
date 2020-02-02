<?php
$title = 'Login';
require ('include/header.php');
?>

<?php
if (isset($_COOKIE['admin_username'])) {
  session_start();
  $_SESSION['admin_username'] = $_COOKIE['admin_username'];  
  header('location:index.php');
}

 //check button click state
if (isset($_POST['admin_login'])) {
  //create new array to store error
  $err = [];
  if (isset($_POST['email']) && !empty($_POST['email'])) {
    $email =  $_POST['email'];
  } else {
    $err['email']  = "Enter email";
  }

  if (isset($_POST['password']) && !empty($_POST['password'])) {
    $password =  ($_POST['password']);
  } else {
    $err['password'] =  "Enter password";
  }

  if (count($err) == 0) {
    
    require_once "include/connection.php";

    //query to select data form database with user provided username and password
    $sql = "select * from admin where email='$email' and password='$password'";
    //execute
    $result = $connect->query($sql);

    if ($result->num_rows == 1) {
      $user = $result->fetch_assoc();
      
      //print_r($user);
      session_start();
      //store username into session
      $_SESSION['admin_username'] = $email;
      $_SESSION['admin_id'] = $user['id'];
      $_SESSION['admin_name'] = $user['first_name'];
      $_SESSION['admin_role'] = $user['role'];
      //redirect to next page
      header("location:index.php");
    } else {
      $err['failed'] = "Login failed";
    }
  }
}
?>

</div>
<body style ="background-image: url('img/login_page.jpeg'); background-size: cover;">

  <div class="container" >

    <!-- Outer Row -->
    <div class="row justify-content-center my-5">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card bg-gradient-light o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="p-5">
              <div class="text-center">
                <h1 class="h3 text-dark mb-4" style="font-family: 'Aclonica', sans-serif;">PATAN BCA <br>STUDENT INFORMATION MANAGEMENT SYSTEM</h1>
              </div>

              <span class="text-danger">
                <?php 
                if(isset($err['failed'])){
                  echo $err['failed'];
                }
                ?>
                <?php 
                if(isset($_GET['message']) && $_GET['message']==1){
                  echo "Login to Continue";
                }
                ?>
                <?php 
                if(isset($_GET['message']) && $_GET['message'] ==2){
                  echo 'Signup sucess!! Login to continue';
                }
                ?>
                
              </span>
              
              <form class="user" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                
                <div class="form-group">
                  <input type="text" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="EmailHelp" placeholder="Email">
                  <?php if (isset($err['email'])) { ?>
                   <span class="text-danger"><?php echo $err['email']; ?></span>
                 <?php } ?>
                 
                 
               </div>
               <div class="form-group">
                <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                <?php if (isset($err['password'])) { ?>
                 <span class="text-danger"><?php echo $err['password']; ?></span>
               <?php } ?>
               
             </div>

             <hr>

             <button type="submit" name="admin_login" class="btn btn-primary btn-user btn-block">
              Login
            </button>
          </form>
        </div>
      </div>
    </div>

  </div>

</div>
</div>

<?php
include('include/script.php');
?>
</body>
</html>