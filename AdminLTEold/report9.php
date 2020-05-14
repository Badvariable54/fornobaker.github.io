<?php
include 'common/header.php';
include 'common/sidebar.php';
?>
<!DOCTYPE html>
<html lang="en">

<body>
<div class="wrapper">
  <?php
    $dbid=$_POST['db_id'];
    $i=1;                
    $qold = $d->select("orders,baker,customer,deliveryboy","orders.db_id=deliveryboy.db_id and orders.cu_id=customer.cu_id and orders.b_id=baker.b_id and orders.db_id='$dbid'","");

    $dataold = mysqli_fetch_array($qold);
    $fnm=$dataold['db_fname'];
    $lnm=$dataold['db_lname'];    

  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1><?php echo "Selected deliveryboy ".$fnm." ".$lnm." orders list"; ?></h1>
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
                  <th>Delivery Boy</th>           
                  <th>Baker name</th>
                  <th>Customer name</th>
                  <th>Order price</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $db_id=$_POST['db_id'];
                $i=1;                
                $q = $d->select("orders,baker,customer,deliveryboy","orders.db_id=deliveryboy.db_id and orders.cu_id=customer.cu_id and orders.b_id=baker.b_id and orders.db_id='$db_id'","");

                while($data = mysqli_fetch_array($q))
                {
                  $total=$data['o_total'];

                  ?>
                  <tr>
                    <td value=<?php echo $data['db_id']; ?>>
                      <?php echo $data['db_fname']; ?></td>
                    <td value=<?php echo $data['b_id']; ?>>
                      <?php echo $data['b_bname']; ?></td>
                    <td value=<?php echo $data['cu_id']; ?>>
                      <?php echo $data['cu_fname']; ?></td>
                    <td><?php echo $data['o_total']; ?></td>
                  </tr>
                  
                
              <?php } ?>
                
              
                </tbody>
                <tfoot>
                <tr>
                  <th colspan="7">Order total :- <?php echo $total; ?></th>
                </tr>
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
