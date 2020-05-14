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
                      <div class="form-group">
                        
                        <div class="area">
                        <textarea  rows="3"  name="f_feedback" required></textarea>
                        <label>Feedback</label>
                       </div>
                        
                      </div>
                    </div>  
                  </div>
                  <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <label>Customer</label>
                          <select name="cu_id" class="form-control">
                            <?php
                              $i=1;
                              $q=$d->select("customer","","");
                              while($data=mysqli_fetch_array($q)){
                                ?>
                                <option value="<?php echo $data['cu_id'] ?>"><?php echo $data['cu_fname'];         ?></option>
                                <?php } ?>
                          </select>
                         </div>
                      </div>
                    </div> 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="feedback_add">Submit</button>
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