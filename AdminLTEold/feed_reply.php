<?php
include 'common/header.php';
include 'common/sidebar.php';

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="adv_formcss.css">
</head>
<body>
  <div class="wrapper">
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-8">
              <h1>General Form</h1>
            </div>  
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Quick Example</h3>
                </div>
                <?php
                    $f_id=$_POST['f_id'];
                    $i=1;
                    $q = $d->select("feedback,customer","f_id='$f_id' and customer.cu_id=feedback.cu_id","");
                    while($data = mysqli_fetch_array($q))
                    { ?>
                <form action="controller.php" method="post">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                         <div class="inputclass">
                          <input type="hidden" name="f_id" value="<?php echo $data['f_id']; ?>">
                          <input type="text" name="cu_fname" value="<?php echo $data['cu_fname']; ?>" 
                          required ><!--disabled-->
                          <label>Customer</label>
                         </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <div class="inputclass">
                            <input type="text" name="f_feedback" value="<?php echo $data['f_feedback']; ?>" 
                          required >
                            <label>Feedback</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <div class="area">
                            <textarea  rows="3" name="f_reply" required><?php echo $data['f_reply']; ?></textarea>
                            <label>Reply</label>
                          </div>           
                        </div>
                      </div>  
                    </div>
                  </div>
                    <div class="card-footer">
                      <input type="hidden" name="f_id" value="<?php echo $data['f_id']; ?>">
                      <button type="submit" name="feed_update" class="btn btn-primary">Reply</button>
                    </div>
                </form>
                <?php } 
                ?>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</body>
</html>
<?php
include 'common/footer.php';
?>