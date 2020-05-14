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
            <h1>General Form</h1>
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
              <?php
                    $cu_id=$_POST['cu_id'];
                    $i=1;
                    $q = $d->select("customer","cu_id='$cu_id'","");
                    while($data = mysqli_fetch_array($q))
                    { ?>
              <form role="form" action="controller.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-8">
                      <!-- text input -->
                      <div class="form-group">
                      <div class="inputclass">
                        <input type="hidden" name="cu_id" value="<?php echo $data['cu_id']; ?>">
                        <input type="text" name="cu_fname" value="<?php echo $data['cu_fname']; ?>" required>
                        <label>First Name</label>
                      </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-8">
                      <!-- text input -->
                      <div class="form-group">
                      <div class="inputclass">
                        <input type="text" name="cu_lname" value="<?php echo $data['cu_lname']; ?>" required>
                        <label>Last Name</label>
                      </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                       <div class="inputclass"> 
                        <input type="text" name="cu_phone" value="<?php echo $data['cu_phone']; ?>" required>
                        <label>Phone no.</label>
                       </div>
                      </div>
                    </div>  
                  </div>
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                       <div class="inputclass">
                        <input type="email" name="cu_email" value="<?php echo $data['cu_email']; ?>" required>
                        <label>Email</label>
                       </div>
                      </div>
                    </div>  
                  </div>
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                        <div class="inputclass">
                        <!--<input type="text" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask required name="cu_dob">-->
                          <input type="text" name="cu_dob" value="<?php echo $data['cu_dob']; ?>" required>
                          <label>DOB</label>
                        </div>
                      </div>
                    </div>  
                  </div>
                  
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                       <div class="inputclass">
                        <input type="text"  name="cu_gender" value="<?php echo $data['cu_gender']; ?>" required >
                        <label>Gender</label>
                       </div>
                      </div>
                    </div>  
                  </div>
                  
                  <!--<div class="row">
                    <div class="col-sm-3">
                      <div class="form-group">
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="customRadio1" name="b_gender" value="m">
                          <label for="customRadio1" class="custom-control-label">Male</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="customRadio2" name="b_gender" value="f">
                          <label for="customRadio2" class="custom-control-label">Female</label>
                        </div>
                      </div>
                    </div>
                  </div>-->
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                        <label for="customFile">Upload Photo</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input"  name="cu_photo">
                          <label class="custom-file-label" >Choose file</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                        
                        <div class="area">
                        <textarea  rows="3" name="cu_address" required><?php echo $data['cu_address']; ?></textarea>
                        <label>Address</label>
                       </div>
                        
                      </div>
                    </div>  
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="cu_update">Update</button>
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