<?php ob_start();
session_start();
date_default_timezone_set('Asia/Calcutta');
if (isset($_SESSION["supadmin"]))
{
	header('location:dashboard.php');
}

include "inc/config.php";
$reel="";
if(isset($_POST["submit"]))
{
$name=$_REQUEST["username"];
$pass=$_REQUEST["pass"];
$result=mysqli_query ($con,"select * from supadmin where username='$name' and password='$pass'");
if (mysqli_num_rows($result)>0)
{
 $_SESSION["supadmin"]=$name;
 header('location:dashboard.php');
}
else
 $reel="Your Username Or Password Does Not Match";
}?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Super Admin Login</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="#" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="username" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Mau Bypass Admin Ngab? Hayuk palepale:)
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="pass" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4" name="submit">
                      Login
                    </button>
                  </div>
                </form>
                <div class="text-center mt-4 mb-3">
                  <div class="text-job text-muted">Today: <?php echo date("d.m.Y h:i:s A"); ?></div>
                </div>
                <?php echo $reel; ?>

              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Ip <a href="#"><?php echo $_SERVER['REMOTE_ADDR'];?><br>
						  </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>
</html>
