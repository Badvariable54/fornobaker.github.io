<?php
include 'common/header.php';
include 'common/sidebar.php';
?>
<!DOCTYPE html>
<html lang="en">

<body>
  <?php
    $rg_id=$_POST['rg_id'];
    $i=1;
    $qold = $d->select("registration_package,baker","baker.rg_id = registration_package.rg_id and registration_package.rg_id='$rg_id' ","");
    $dataold = mysqli_fetch_array($qold);
    $packagename = $dataold['rg_name'];
  ?>
<div class="wrapper">
  <!-- Navbar -->
 
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $packagename; ?> selected bakers details</h1>
          </div>
          <div class="col-sm-6">
            
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
                  <th>Package Name</th>
                  <th>Baker Name</th>
                  <th>Duration</th>           
                  <th>Payment</th>
                </tr>
                </thead>
                <tbody>
                <?php

                $rg_id=$_POST['rg_id'];
                $i=1;
                $q = $d->select("registration_package,baker","baker.rg_id = registration_package.rg_id and registration_package.rg_id='$rg_id' ","");
                $data = mysqli_fetch_array($q);                
                
                while($data = mysqli_fetch_array($q))
                {
                  ?>
                  <tr>
                    <td><?php echo $data['rg_name']; ?></td>
                    <td value=<?php echo $data['rg_id']; ?>>
                      <?php echo $data['b_bname']; ?></td>
                    <td><?php echo $data['rg_duration']; ?></td>
                    <td><?php echo $data['rg_price']; ?></td>
                    
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
  <!--<aside class="control-sidebar control-sidebar-dark">-->
    <!-- Control sidebar content goes here -->
  <!--</aside>-->
  <!-- /.control-sidebar -->

</body>
</html>
<?php
include 'common/footer.php';
?>
