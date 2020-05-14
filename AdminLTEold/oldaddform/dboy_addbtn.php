
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Forno </b>baker
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Delivery boy registration form</p>

      <form action="controller.php" id="login_validater" class="login_validater" method="post"  enctype="multipart/form-data">
        <div class="input-group mb-3">
          First Name <input type="text" placeholder="First Name" size="30" name="db_fname">
        </div>
        <div class="input-group mb-3">
          Last Name <input type="text" placeholder="Last Name" size="30" name="db_lname">
        </div>
        <div class="input-group mb-3">
          Phone No. <input type="text" placeholder="" size="30" name="db_phone">
        </div>
        <div class="input-group mb-3">
          Email <input type="Email" placeholder="" size="30" name="db_email">
        </div>
        <div class="input-group mb-3">
          DOB <input type="text" placeholder="" size="30" name="db_dob">
        </div>
        <div class="input-group mb-3">
          Gender <input type="radio" name="db_gender" value="m">Male
          <input type="radio" name="db_gender" value="f">Female
        </div>
        <div class="input-group mb-3">
          Photo <input type="file" placeholder="Enter First Name" size="30" name="db_photo">
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat" name="add_dboy">Add</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!--<div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>-->
      <!-- /.social-auth-links -->

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
