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
                    $b_id=$_POST['b_id'];
                    $i=1;
                    $q = $d->select("baker,registration_package","b_id='$b_id'  and registration_package.rg_id=baker.rg_id","");
                    while($data = mysqli_fetch_array($q))
                    { ?>
                <form action="controller.php" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <!--<input type="text" name="sub_name"><br>
                    <input type="text" name="sub_description"><br>-->
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <div class="inputclass">
                            <input type="hidden" name="b_id" value="<?php echo $data['b_id']; ?>">
                            <input type="text" name="b_fname" value="<?php echo $data['b_fname']; ?>" required>
                            <label>First Name</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <div class="inputclass">
                            <input type="text" name="b_lname" value="<?php echo $data['b_lname']; ?>" required>
                            <label>Last Name</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <label>Pack</label>
                          <input type="text" name="rg_id" value="<?php echo $data['rg_name']; ?>" disabled>
                          
                         </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <div class="inputclass">
                            <input type="text" name="b_phone" value="<?php echo $data['b_phone']; ?>" required>
                            <label>Phone no.</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <div class="inputclass">
                            <input type="email" name="b_email" value="<?php echo $data['b_email']; ?>" required>
                            <label>Email</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <div class="inputclass">
                            <input type="text" name="b_dob" value="<?php echo $data['b_dob']; ?>" required>
                            <label>DOB</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                       <div class="inputclass">
                        <input type="text"  name="b_gender" value="<?php echo $data['b_gender']; ?>" required >
                        <label>Gender</label>
                       </div>
                      </div>
                    </div>  
                  </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          
                            <input type="file" name="b_photo" >
                            <!-- <input type="file" name="b_photo" value=photo/customer/"<?php //echo $data['b_photo']; ?>"> -->
                            <label>Upload Photo</label>
                          
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <div class="area">
                            <textarea  rows="3" name="b_address" required><?php echo $data['b_address']; ?></textarea>
                            <label>Address</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <div class="inputclass">
                            <input type="text"   name="b_city" value="<?php echo $data['b_city']; ?>" required>
                            <label>City</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <div class="inputclass">
                            <input type="text"   name="b_pincode" value="<?php echo $data['b_pincode']; ?>" required>
                            <label>Pincode</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <div class="inputclass">
                            <input type="text"   name="b_bname" value="<?php echo $data['b_bname']; ?>" required>
                            <label>Business</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                    <div class="card-footer">
                      <button type="submit" name="baker_update" class="btn btn-primary">Update</button>
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