<?php
include 'common/header.php';
include 'common/sidebar.php';
?>
<!DOCTYPE html>
<html lang="en">

<body>
<div class="wrapper">
<?php                
  $subid=$_POST['sub_id'];
  $i=1;                

  $qold = $d->select("product,subcategory","product.sub_id=subcategory.sub_id and product.sub_id = '$subid'","");                

  $dataold = mysqli_fetch_array($qold);
  $subcatname = $dataold['sub_name'];
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo "Selected subcategory ".$subcatname." product list"; ?></h1>
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
                  <th>Product name</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Photo</th>                  
                </tr>
                </thead>
                <tbody>
                <?php                
                $sub_id=$_POST['sub_id'];                
                $i=1;                

                $q = $d->select("product,subcategory","product.sub_id=subcategory.sub_id and product.sub_id = '$sub_id'","");
                /*and orders.cu_id=customer.cu_id and product.p_id=order_detail.p_id and orders.o_id=order_detail.o_id and orders.b_id=baker.b_id and orders.b_id='$b_id' and orders.o_total>='$o_total'*/

                while($data = mysqli_fetch_array($q))
                {
                  ?>
                  <tr>
                    <td><?php echo $data['p_name'];?></td>
                    <td><?php echo $data['p_description'];?></td>
                    <td><?php echo $data['p_price'];?></td>
                    <td><?php echo $data['p_photo'];?></td>                    
                  </tr>
                                  
              <?php } ?>
                
              
                </tbody>
                
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
