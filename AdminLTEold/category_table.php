<?php
include 'common/header.php';
include 'common/sidebar.php';
?>
<!DOCTYPE html>
<html lang="en">

<body>
<div class="wrapper">
<script type="text/javascript">
  function deletebtnclick(){    
    if (window.confirm("Are you sure you want to delete")) {
      return true;
    }else{      
      return false;
    }
  }
</script>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="height: 60px;">

      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Category List &nbsp;&nbsp;
              <a class="btn btn-primary btn-sm" href="category_add_form.php" style="width: 90px; text-align: center; font-weight: 700; font-size: medium; text-align: left; padding-left: 12px; margin-left: 1px;">
                <i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Add
              </a>
            </h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">              
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active"><a>Category</a></li>
            </ol>
          </div>
        </div>
      </div>  
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          
          <!-- /.card -->

          <div class="card">
            <!--<div class="card-header">
              <h3 class="card-title">DataTable with default feature</h3>
            </div>-->
            <!-- /.card-header -->
            <div class="card-body table-responsive ">
              
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Photo</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                
                <?php
                $i=1;
                $imgpath="photo/category/";
                $q = $d->select("category","");
                while($data = mysqli_fetch_array($q))
                {
                  ?>
                  <tr>
                    <td><?php echo $data['c_name']; ?></td>
                    <!-- <td><?php// echo $data['c_photo']; ?></td> -->
                    <td><center><img src="<?php echo $imgpath.$data['c_photo']; ?>" alt="Smiley face" height="50" width="50"></center></td>
                    <!-- value="<?php// echo $data['rg_id'] ?>" -->
                    
                    <td class="project-actions text-right">                      
                      <form method="post" action="category_edit_form.php" style="float:left; margin-right:3px;">
                        <input type="hidden" name="c_id" value="<?php echo $data['c_id'];?>">
                        <button class="btn btn-info btn-sm" name="category_edit" style="width: 100px; text-align: center; font-weight: 700; font-size: medium; text-align: center;
                            padding-left: 7px; margin-left: 15px; ">
                          <i class="fas fa-pencil-alt"> </i>&nbsp;&nbsp;Edit
                        </button>
                      </form>
                      <form style="float:left; margin-right:3px;" onsubmit="return deletebtnclick()" action="controller.php" method="post">
                        <input type="hidden" name="c_id" value="<?php echo $data['c_id'];?>">
                        <button class="btn btn-danger btn-sm"  name="category_del" style="width: 100px; font-weight: 700; font-size: medium; text-align: center;
                            padding-left: 10px; margin-left: 15px;">
                          <i class="fas fa-trash"> </i>&nbsp;&nbsp;Delete
                        </button>
                      </form>
                    </td>
                </tr>
              <?php } ?>
                </tbody>
                <!--<tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot>-->
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

</body>
</html>
<?php
include 'common/footer.php';
?>
