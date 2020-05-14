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
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="controller.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-8">
                      <!-- text input -->
                      <div class="form-group">
                      <div class="inputclass">
                        <input type="text" name="db_fname" required>
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
                        <input type="text" name="db_lname" required>
                        <label>Last Name</label>
                      </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                       <div class="inputclass"> 
                        <input type="text" name="db_phone" required>
                        <label>Phone no.</label>
                       </div>
                      </div>
                    </div>  
                  </div>
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                       <div class="inputclass">
                        <input type="email"  id="exampleInputEmail1"  name="db_email" required>
                        <label for="exampleInputEmail1">Email</label>
                       </div>
                      </div>
                    </div>  
                  </div>
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                        <div class="inputclass">
                        <!--<input type="text" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask required name="db_dob">-->
                          <input type="text" name="db_dob" required>
                          <label>DOB</label>
                        </div>
                      </div>
                    </div>  
                  </div>
                  <label>Gender</label>
                  <div class="row">
                    <div class="col-sm-3">
                      <div class="icheck-primary d-inline"> 
                        <input type="radio" id="radioPrimary1" name="db_gender" value="m">
                        <label for="radioPrimary1">Male</label>
                   
                    <div class="col-sm-3">
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary2" name="db_gender" value="f">
                        <label for="radioPrimary2">Female</label>
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
                          <input type="file" class="custom-file-input" id="customFile" name="db_photo">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="add_dboy">Submit</button>
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