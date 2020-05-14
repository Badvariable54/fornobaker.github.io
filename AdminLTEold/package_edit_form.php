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
       <!--  <div class="row mb-2">
          <div class="col-sm-8">
            <h1>General Form</h1>
          </div>
          
        </div> -->
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
                <h3 class="card-title">Package Update</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php
                    $rg_id=$_POST['rg_id'];
                    $i=1;
                    $q = $d->select("registration_package","rg_id='$rg_id'","");
                    while($data = mysqli_fetch_array($q))
                    { ?>
              <form role="form" action="controller.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-8">
                      <!-- text input -->
                      <div class="form-group">
                      <div class="inputclass">
                        <input type="hidden" name="rg_id" value="<?php echo $data['rg_id']; ?>">
                        <input type="text" name="rg_name" value="<?php echo $data['rg_name']; ?>" required>
                        <label>Pack Name</label>
                      </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-8">
                      <!-- text input -->
                      <div class="form-group">
                      <div class="inputclass">
                        <input type="text" name="rg_duration" value="<?php echo $data['rg_duration']; ?>" required>
                        <label>Pack Duration</label>
                      </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-8">
                      <!-- text input -->
                      <div class="form-group">
                      <div class="inputclass">
                        <input type="text" name="rg_price" value="<?php echo $data['rg_price']; ?>" required>
                        <label>Pack Price</label>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="pack_update">Update</button>
                </div>
              </form>
              <?php } 
                ?>
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