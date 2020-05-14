<?php
session_start();
$_SESSION['lockscreen']=1;
if (!isset($_SESSION['lockscreen'])) 
{
  header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
    body{

  margin:0;
  color:#6a6f8c;
  background:url(second.jpg) no-repeat center fixed;
  background-size: cover;
  font:600 16px/18px 'Open Sans',sans-serif;

}
.my{
  margin-left: 140px;
  font-size: 20px;
  color:blue;

}

  </style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Lockscreen</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="body">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a ><b><font color="black" size="60px"> Forno Baker</b></font></a>
  </div>
  <!-- User name -->
  <div class="my"><b><?php echo $_SESSION['l_email']; ?></b></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="<?php $basepath="photo/admin/"; echo $basepath.$_SESSION['l_photo']; ?>" class="img-circle elevation-2" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" action="controller.php" method="post">
      <div class="input-group">
        <input type="password" class="form-control" placeholder="password" name="l_password">

        <div class="input-group-append">
          <button type="submit" class="btn" name="lockscreen"><i class="fas fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Enter your password to retrieve your session
  </div>
  <div class="text-center">
    <a href="#">Or sign in as a different user</a>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy;2019 <b><a href="http://adminlte.io" class="text-black">FornoBaker</a></b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>       

