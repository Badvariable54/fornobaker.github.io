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
              <?php
                    $faq_id=$_POST['faq_id'];
                    $i=1;
                    $q = $d->select("faq","faq_id='$faq_id'","");
                    while($data = mysqli_fetch_array($q))
                    { ?>
              <form role="form" action="controller.php" method="post">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                        <div class="area">
                          <input type="hidden" name="faq_id" value="<?php echo $data['faq_id']; ?>">
                          <textarea rows="3" name="faq_question" required><?php echo $data['faq_question']; ?></textarea>
                          <label>FAQ Question</label>
                       </div>
                      </div>
                    </div>  
                  </div>
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                        <div class="area">
                          <textarea  rows="3"  name="faq_answer" required><?php echo $data['faq_answer']; ?></textarea>
                          <label>FAQ Answer</label>
                       </div>
                      </div>
                    </div>  
                  </div>
                   
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="faq_update">Update</button>
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