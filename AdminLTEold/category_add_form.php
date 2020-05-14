<?php
include 'common/header.php';
include 'common/sidebar.php';
?>
<!DOCTYPE html>
<html>
<head>
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

      margin-left: 140px;
      
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
  <link rel="stylesheet" type="text/css" href="adv_formcss.css">
  <script type="text/javascript">
function myFunction() {
  var inpObj = document.getElementById("id1");
  if (!inpObj.checkValidity()) {
    document.getElementById("id1").innerHTML = inpObj.validationMessage;
  }
}//first checkvalidity method

</script>
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
          <!-- <div class="col-sm-8">
            <h1>General Form</h1>
          </div> -->  
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
                <h3 class="card-title">Category Add Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start action="controller.php" -->
              <form role="form" action="controller.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-8">
                      <!-- text input -->
                      <div class="form-group">
                      <div class="inputclass"><!-- type="number" min="100" max="300" -->
                        <input type="text" id="id1" name="c_name" required>
                        <label>Category Name</label>
                      </div>
                      </div>
                      <p id="demo"></p>
                    </div>
                  </div>
                  <!-- <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                        
                        <div class="area">
                        <textarea  rows="3"  name="c_description"  required></textarea>
                        <label>Category Description</label>
                       </div>
                        
                      </div>
                    </div>  
                  </div> -->
                  <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">                          
                            <input type="file" name="c_photo">
                            <label>Upload Photo</label>                          
                        </div>
                      </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer" >
                  <div class="middle">
                  <button type="submit" class="btn btn1" name="cat_add" >Submit</button><!-- name="cat_add" -->
                  <div>
                    
                  </div>
                  </div>
                </div>
                <div><pre>                </pre></div>
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