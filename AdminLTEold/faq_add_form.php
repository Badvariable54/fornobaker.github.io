<?php
include 'common/header.php';
include 'common/sidebar.php';
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="adv_formcss.css">
  <style type="text/css">
        .middle{
      position: absolute;
      transform: translate(-50%,-50%);
      text-align: center;
    }
    .btn{
      background: none;
      border:1px solid #000;
      font-family: "montserrat",sans-serif;
      text-transform: uppercase;
   
      min-width: 150px;
      min-height: 10px;

      margin-left: 180px;
      
      cursor: pointer;
      transition: color 0.4s linear;
      position: relative;
    }
    .btn:hover{
      color: #fff;

    }
    .btn::before{
      content: "";
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background: green;
      z-index: -1;
      transition:transform 0.7s;
      transform-origin: 0 0;
      transition-timing-function: cubic-bezier(0.5,1.6,0.4,0.7);
    }
    .btn1::before{
      transform: scaleX(0);
    }
    .btn2::before{
      transform: scaleY(0);
    }
    .btn1:hover::before{
      transform: scaleX(1);
    }

    .btn2:hover::before{
      transform: scaleY(1);
    }
  </style>
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
                <h3 class="card-title">FAQ Add</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="controller.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                        
                        <div class="area">
                        <textarea  rows="3"  name="faq_question" required></textarea>
                        <label>FAQ Question</label>
                       </div>
                        
                      </div>
                    </div>  
                  </div>
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                        
                        <div class="area">
                        <textarea  rows="3"  name="faq_answer" required></textarea>
                        <label>FAQ Answer</label>
                       </div>
                        
                      </div>
                    </div>  
                  </div> 
                </div>
                <!-- /.card-body -->
                <div class="middle">
                <div class="card-footer">
                  <button type="submit" class="btn btn1" name="faq_add">Submit</button>
                </div>
              </div>
              <div><pre>    </pre></div>
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