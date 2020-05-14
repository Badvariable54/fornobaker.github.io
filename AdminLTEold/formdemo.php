<?php
include 'common/header.php';
include 'common/sidebar.php';
?>
<!DOCTYPE html>
<html>
<head>
  <!-- <link rel="stylesheet" type="text/css" href="adv_formcss.css"> -->
  <link rel="stylesheet" type="text/css" href="mailform/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="mailform/default.css">
  <link rel="stylesheet" type="text/css" href="mailform/mailform.css">
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
              <form method="post" action="#" class="mailform">
            <div class="row">
                <div class="col-md-12">
                    <input type="text" name="name" placeholder="Your Name:" data-constraints="@LettersOnly @NotEmpty">
                </div>
                <div class="col-md-6">
                    <input type="text" name="phone" placeholder="Telephone:" data-constraints="@Phone">
                </div>
                <div class="col-md-6">
                    <input type="text" name="email" placeholder="Email:" data-constraints="@Email @NotEmpty">
                </div>
                <div class="col-md-6">
                    <input type="text" placeholder="" data-constraints="@Email @NotEmpty">
                </div>
                <div class="col-md-12">
                    <textarea name="message" rows="5" placeholder="Message:" data-constraints="@NotEmpty"></textarea>
                </div>
                <div class="mfControls col-md-12">
                    <button type="submit" class="butn">Sumbit comment</button>
                </div>
            </div>
        </form>
              <!-- form start -->
              <form role="form" action="#" method="post" enctype="multipart/form-data" class="mailform">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                        <div class="area">
                        <input type="text" name="faq_question" placeholder="" data-constraints="@LettersOnly @NotEmpty" />
                        <label>FAQ Question</label>
                       </div>
                      </div>
                    </div>  
                  </div>
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                        
                        <div class="area">
                        <input  rows="3"  name="faq_answer" />
                        <label>FAQ Answer</label>
                       </div>
                        
                      </div>
                    </div>  
                  </div> 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="faq_add">Submit</button>
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
<script src="mailform/core.min.js"></script>
    <script src="mailform/jquery.form.min.js"></script>
    <script src="mailform/jquery.rd-mailform.min.c.js"></script>
</body>
</html>
<?php
include 'common/footer.php';
?>
<!-- <head>
    <link rel="stylesheet" type="text/css" href="mailform/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="mailform/default.css">
    <link rel="stylesheet" type="text/css" href="mailform/mailform.css">
</head>

<body>
    <div class="main-wrapper">
        <form method="post" action="forms.html" class="mailform">
            <div class="row">
                <div class="col-md-12">
                    <input type="text" name="name" placeholder="Your Name:" data-constraints="@LettersOnly @NotEmpty">
                </div>
                <div class="col-md-6">
                    <input type="text" name="phone" placeholder="Telephone:" data-constraints="@Phone">
                </div>
                <div class="col-md-6">
                    <input type="text" name="email" placeholder="Email:" data-constraints="@Email @NotEmpty">
                </div>
                <div class="col-md-6">
                    <input type="text" placeholder="" data-constraints="@Email @NotEmpty">
                </div>
                <div class="col-md-12">
                    <textarea name="message" rows="5" placeholder="Message:" data-constraints="@NotEmpty"></textarea>
                </div>
                <div class="mfControls col-md-12">
                    <button type="submit" class="butn">Sumbit comment</button>
                </div>
            </div>
        </form>
    </div>
    <script src="mailform/core.min.js"></script>
    <script src="mailform/jquery.form.min.js"></script>
    <script src="mailform/jquery.rd-mailform.min.c.js"></script>
</body> -->