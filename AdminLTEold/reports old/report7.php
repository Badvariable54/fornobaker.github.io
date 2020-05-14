<?php
include 'common/header.php';
include 'common/sidebar.php';
?>
<!DOCTYPE html>
<html lang="en">

<body>
<div class="wrapper">
  <!-- Navbar -->
 
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Order Table</h1>
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
                  <th>Baker Name</th>           
                  <th>Customer Name</th>
                  <th>Order total</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $b_id=$_POST['b_id'];
                $i=1;
                //$q = $d->select("orders,order_detail,baker,customer","orders.cu_id=customer.cu_id and  orders.o_id=order_detail.o_id and orders.b_id=baker.b_id and orders.b_id='$b_id'","");
                $q = $d->select("orders,baker,customer","orders.cu_id = customer.cu_id and orders.b_id = baker.b_id and orders.b_id='$b_id'","");

                while($data = mysqli_fetch_array($q))
                {
                  
                  $total=$data['o_total'];
                  ?>
                  <tr>
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
                  <th colspan="3">Total :- <?php echo $total; ?></th>
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
