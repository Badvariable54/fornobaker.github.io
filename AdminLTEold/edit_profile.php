<?php
include 'common/header.php';
include 'common/sidebar.php';
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="adv_formcss.css">  
</head>
<body>
<div class="wrapper">
  

  <!-- Main Sidebar Container -->
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1>Edit Profile</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start action="controller.php" -->
              <form action="controller.php"  method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-8">
                      <!-- text input -->
                      <div class="form-group">
                      <div class="inputclass"><!-- type="number" min="100" max="300" -->
                        <input type="text" name="l_name" value="<?php echo $_SESSION['l_name']; ?>" required>
                        <label>Admin Name</label>
                      </div>
                      </div>
                      <p id="demo"></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                        <div class="inputclass">
                        <input type="email" name="l_email" value="<?php echo $_SESSION['l_email']; ?>" required>
                        <label>Admin Email</label>
                       </div>
                      </div>
                    </div>  
                  </div>
                  <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">                          
                            <input type="file" name="l_photo">
                            <label>Upload Admin Photo</label>                          
                        </div>
                      </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="hidden" name="l_id" value="<?php echo $_SESSION['l_id']; ?>"  required>
                  <button type="submit" class="btn btn-primary" name="admin_update">Submit</button>
                </div>
              </form>
            </div>
            
            </div>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
</body>
</html>
<?php
include 'common/footer.php';
?>