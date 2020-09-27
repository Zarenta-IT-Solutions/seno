<?php

  include '../dbconnection.php';
  $conn = OpenCon();
  session_start();

  if(isset($_SESSION["email"]))
  {
    header("location:stockist_dashboard.php");
  }

if(isset($_POST["login"]))
{
    $query=mysqli_query($conn, "SELECT * FROM tbl_add_stockist WHERE email='".$_POST['email']."' and s_password='".$_POST['s_password']. " ");

  if(empty($_POST["email"]) || empty($_POST["s_password"] ))
  {
    echo '<script>alert("Both Fileds are required")</script>';
  }
  else
  {
    $email=mysqli_real_escape_string($conn,$_POST["email"]);
    $s_password=mysqli_real_escape_string($conn,$_POST["s_password"]);
    $query="SELECT * FROM tbl_add_stockist WHERE email='$email' AND s_password='$s_password'";
    $result=mysqli_query($conn,$query);
    
    if(mysqli_num_rows($result)>0)
    {
      $_SESSION["email"]=$email;
      header("location:stockist_dashboard.php");
    }
    else
    {
      echo '<script>alert("Wrong Credentials")</script>';
    }
  }
}
CloseCon($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login - Stockist</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <img src="img/seno biotech logo.jpeg" height="60" widht="100">
                    <h1 class="h4 text-gray-900 mb-4">SENO BIOTECH</h1>
                  </div>
                  <form action="" method="POST">
                    <div class="form-group">
                      <input type="email" id="email" name="email" class="form-control form-control-user" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <input type="password" id="s_password" name="s_password"  class="form-control form-control-user" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <input name="login" value="Submit"  type="submit" class="btn btn-primary btn-user btn-block">
                    
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.php">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <!--<a class="small" href="register.php">Create an Account!</a>-->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
