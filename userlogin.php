
<?php 


if(isset($_SESSION['user_username'])){
  session_start();
  $_SESSION['user_username'] = $_COOKIE['user_username'];

  header('location:profile.php');
} 

if(isset($_COOKIE['remember']) && $_COOKIE['remember']==1){
  $_SESSION['user_username'] = $_COOKIE['user_username'];
  header('location:profile.php');
} 

if(isset($_GET['msg']) && $_GET['msg'] ==1){
  echo 'Unathorized Acess';
}

?>

<?php 
if (isset($_POST['btnLogin']))  {
  $err = [];
  if(isset($_POST['username']) && !empty($_POST['username'])){
    $username= $_POST['username'];
  }
  else {
    $err['username'] = 'Enter Username';
  }
  if(isset($_POST['password']) && !empty($_POST['password'])){
    $password=($_POST['password']);
  }
  else {
    $err['password']  = 'Enter Password';
  }
  
  if (count($err) == 0) {
    require_once "connection.php";
    $sql = "select * from users where username='$username' and password='$password'";
    $result = $connect->query($sql);
    if($result->num_rows==1){
      $user = $result->fetch_assoc();
      
      session_start();       
      $_SESSION['user_username'] = $username;
      if(isset($_POST['remember'])){
        setcookie('remember',1,time() + 7*24*60*60);
        setcookie('user_username',$username,time() + 7*24*60*60);
      }
      header("location:profile.php");
    }
    else{
      $err['failed']='Login Failed,Re-Enter Valid Username and Password';
    }
  } 
}
require "header_nav.php";
?>

<style>
 body{
   background-image: url('image/userlogin.jpg');
   background-size: cover;
 }
</style>


<div class="container ">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

      <div class="card-body p-0 bg-gradient-dark  ">
        <!-- Nested Row within Card Body -->
        <div class="row justify-content-center ">
          <div class="col-lg-6">
            <div class="p-5 card o-hidden border-0 shadow-lg my-5 ">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
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
                </span>
              </div>
              <!-- FORM Start -->


              <form class="user" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
                <div class="form-group">
                  <input type="text" name="username" class="form-control form-control-user" id="exampleInputusername"
                  aria-describedby="usernameHelp" placeholder="Enter username ">
                  <span class="text-danger"><?php 
                  if(isset($err['username'])){
                    echo $err['username'];
                  }
                  ?>
                </span>
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword"
                placeholder="Password">
                <span class="text-danger">
                  <?php 
                  if(isset($err['password'])){
                    echo $err['password'];
                  }
                  ?>
                </span>
              </div>
              <div class="form-group">
                <div class="custom-control custom-checkbox small">
                  <input type="checkbox" class="custom-control-input" id="customCheck" name="remember">
                  <label class="custom-control-label" for="customCheck">Remember Me</label>
                </div>
                
              </div>
              <button name="btnLogin" class="btn btn-primary btn-user btn-block">Login</button>
              
            </form>
            <!-- FORM End -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php require "footer.php"?>

