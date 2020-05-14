<?php
include 'common/header.php';
include 'common/sidebar.php';
?>
<!DOCTYPE html>
<html lang="en">

<body>
  
<div class="wrapper">  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1><?php //echo $bakerbname." order total grater than ".$ototal." order details"; ?></h1>
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
                  <th>Customer Name</th>           
                  <th>Baker Name</th>
                  <th>Delivery Boy</th>
                  <th>Products</th>
                  <th>Price</th>
                  <th></th>
                  <!-- <th>Total</th> -->
                </tr>
                </thead>
                <tbody>

                <?php

                $b_id=$_POST['b_id'];
                $o_total=$_POST['o_total'];
                $i=1;    
                $grandtotal = 0;

                $q = $d->select("orders,order_detail,baker,customer,product,deliveryboy","orders.db_id=deliveryboy.db_id and orders.cu_id=customer.cu_id and product.p_id=order_detail.p_id and orders.o_id=order_detail.o_id and orders.b_id=baker.b_id and orders.b_id='$b_id' and orders.o_total>='$o_total'","");

                $data = mysqli_fetch_array($q);


                while($data = mysqli_fetch_array($q))
                {
                  $total=$data['o_total'];                

                  ?>
                  <tr>
                    <td value=<?php echo $data['cu_id']; ?>>
                      <?php echo $data['cu_fname']; ?></td>
                    <td value=<?php echo $data['b_id']; ?>>
                      <?php echo $data['b_bname']; ?></td>
                    <td value=<?php echo $data['db_id']; ?>>
                      <?php echo $data['db_fname']; ?></td>
                    <td value="<?php echo $data['p_id']; ?>">
                      <?php echo $data['p_name']; ?>
                      </td>
                    <td><?php echo $data['p_price']."*".$data['od_qty']; ?></td>
                    <td><?php $grandtotal=$grandtotal+$data['p_price']*$data['od_qty']; echo $data['p_price']*$data['od_qty']; ?></td>
                    <!-- <th ><?php echo $data['o_total'] ?></th> -->
                  </tr>
                  
                
              <?php } ?>
                
              
                </tbody>
                <tfoot>
                <tr>
                  <th colspan="7">Order total :- <?php echo $grandtotal; ?></th>
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
