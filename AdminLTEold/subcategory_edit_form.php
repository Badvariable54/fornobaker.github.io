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
            <!-- <div class="col-sm-8">
              <h1>General Form</h1>
            </div> -->  
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Sub-category Edit Form</h3>
                </div>
                <?php
                    $sub_id=$_POST['sub_id'];
                    $i=1;
                    $q = $d->select("subcategory,category","sub_id='$sub_id' and category.c_id=subcategory.c_id","");
                    while($data = mysqli_fetch_array($q))
                    { ?>
                <form action="controller.php" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <label>Category</label>
                          <input type="text" name="c_id" value="<?php echo $data['c_name']; ?>" disabled>
                         </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <div class="inputclass">
                            <input type="text" name="sub_name" value="<?php echo $data['sub_name']; ?>" required>
                            <label>Sub-category Name</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <div class="inputclass">
                            <input type="file" name="sub_photo">
                            <label>Upload Photo</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                    <div class="card-footer">
                      <input type="hidden" name="sub_id" value="<?php echo $data['sub_id']; ?>">
                      <button type="submit" name="sub_update" class="btn btn-primary">Update</button>
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