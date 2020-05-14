<?php
include 'common/header.php';
include 'common/sidebar.php';

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
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
                  <h3 class="card-title">Sub-category Add Form</h3>
                </div>
                <form action="controller.php" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <!--<input type="text" name="sub_name"><br>
                    <input type="text" name="sub_description"><br>-->
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <label>Category</label>
                          <select name="c_id">
                            <?php
                              $i=1;
                              $q=$d->select("category","","");
                              while($data=mysqli_fetch_array($q)){
                                ?>
                                <option value="<?php echo $data['c_id'] ?>"><?php echo $data['c_name'];         ?></option>
                                <?php } ?>
                          </select>
                         </div>
                      </div>
                    </div>
                    <div class="row">
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
                            <input type="file" name="sub_photo">
                            <label>Upload Photo</label>                          
                        </div>
                      </div>
                    </div>
                  </div>
                    
                <div class="card-footer" >
                  <div class="middle">
                  <button type="submit" class="btn btn1" name="sub_add" >Submit</button><!-- name="cat_add" -->
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
      </section>
    </div>
  </div>
</body>
</html>
<?php
include 'common/footer.php';
?>