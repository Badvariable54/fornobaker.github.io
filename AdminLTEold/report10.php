<?php
include 'common/header.php';
include 'common/sidebar.php';
?>
<!DOCTYPE html>
<html lang="en">

<body>
<div class="wrapper">
<?php                
  $cid=$_POST['c_id'];                
  $i=1;                

  $qold = $d->select("category,subcategory","subcategory.c_id=category.c_id and subcategory.c_id = '$cid'","");

  $dataold = mysqli_fetch_array($qold);
  $categoryname = $dataold['c_name'];
?>
  <div class="content-wrapper">    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1><?php echo "Selected category ".$categoryname." subcategory list"; ?></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
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
            <div class="card-body">
              
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Subcategory Name</th>           
                  <th>Photo</th>                  
                </tr>
                </thead>
                <tbody>
                <?php                
                $c_id=$_POST['c_id'];                
                $i=1;                

                $q = $d->select("category,subcategory","subcategory.c_id=category.c_id and subcategory.c_id = '$c_id'","");                

                while($data = mysqli_fetch_array($q))
                {
                  ?>
                  <tr>
                    <td><?php echo $data['sub_name'];?></td>
                    <td><?php echo $data['sub_photo'];?></td>                    
                  </tr>
                                  
              <?php } ?>
                
              
                </tbody>
                <tfoot>
                <!-- <tr>
                  <th colspan="2">Order total :- <?php echo $c_id; ?></th>
                </tr> -->
                </tfoot>
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
