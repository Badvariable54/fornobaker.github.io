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
                <form action="controller.php" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <!--<input type="text" name="sub_name"><br>
                    <input type="text" name="sub_description"><br>-->
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <label>Subcategory</label>
                          <select name="sub_id">
                            <?php
                              $i=1;
                              $q=$d->select("subcategory","","");
                              while($data=mysqli_fetch_array($q)){
                                ?>
                                <option value="<?php echo $data['sub_id'] ?>"><?php echo $data['sub_name'];         ?></option>
                                <?php } ?>
                          </select>
                         </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <div class="inputclass">
                            <label>Baker</label>
                            <select name="b_id">
                            <?php
                              $i=1;
                              $q=$d->select("baker","","");
                              while($data=mysqli_fetch_array($q)){
                                ?>
                                <option value="<?php echo $data['b_id'] ?>"><?php echo $data['b_bname'];         ?></option>
                                <?php } ?>
                          </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <div class="inputclass">
                            <input type="text" name="p_name" required>
                            <label>Product Name</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <div class="area">
                            <textarea  rows="3" name="p_description" required></textarea>
                            <label>Product Description</label>
                          </div>           
                        </div>
                      </div>  
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <div class="inputclass">
                            <input type="text" name="p_price" required>
                            <label>Product Price</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">                          
                            <input type="file" name="p_photo">
                            <label>Upload Photo</label>                          
                        </div>
                      </div>
                    </div>
                  </div>
                    <div class="card-footer">
                      <button type="submit" name="product_add" class="btn btn-primary">Submit</button>
                    </div>
                </form>
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