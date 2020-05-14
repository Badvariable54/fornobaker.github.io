<?php
include 'common/header.php';
include 'common/sidebar.php';
?>
<!DOCTYPE html>
<html lang="en">

<body>
<div class="wrapper">
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-8">
              <h1>Select subcategory to display product list</h1>
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
                  <h3 class="card-title">&nbsp;</h3>
                </div>
                <form action="report11.php" method="post">
                  <div class="card-body">                    
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <label>Subcategory</label>
                          <select name="sub_id" class="form-control">
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
                  </div>
                   <div class="card-footer">
                     <button type="submit" name="report_btn" class="btn btn-primary">Generate report</butto>
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
