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
                <form action="controller.php" method="post">
                  <div class="card-body">
                    <!--<input type="text" name="sub_name"><br>
                    <input type="text" name="sub_description"><br>-->
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <label>Modules</label>
                          <select>
                            <option>Baker</option>
                            <option>Customer</option>
                            <option>Delivery boy</option>
                            <option>Category</option>
                            <option>Sub-category</option>
                            <option>Product</option>
                            <option>Order</option>
                            <option>Package</option>
                          </select>
                         </div>
                      </div>
                    </div>
                    <!--<div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <div class="inputclass">
                            <input type="text" name="sub_name" required>
                            <label>Sub-category Name</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <div class="area">
                            <textarea  rows="3" name="sub_description" required></textarea>
                            <label>Sub-category Description</label>
                          </div>           
                        </div>
                      </div>  
                    </div>-->
                    <!-- Date range -->
                    <div class="form-group">
                     <label>Date range:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control float-right" id="reservation">
                      </div>
                    </div>
                    <!-- Date and time range -->
                    <div class="form-group">
                      <label>Date and time range:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-clock"></i></span>
                        </div>
                        <input type="text" class="form-control float-right" id="reservationtime">
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- Date and time range -->
                    <div class="form-group">
                      <label>Date range button:</label>
                      <div class="input-group">
                        <button type="button" class="btn btn-default float-right" id="daterange-btn">
                          <i class="far fa-calendar-alt"></i> Date range picker
                          <i class="fas fa-caret-down"></i>
                        </button>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Time picker:</label>
                      <div class="input-group date" id="timepicker" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#timepicker"/>
                        <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="far fa-clock"></i></div>
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