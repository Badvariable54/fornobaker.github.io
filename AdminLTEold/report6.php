<?php
include 'common/header.php';
include 'common/sidebar.php';
?>
<!DOCTYPE html>
<html lang="en">

<body>
<div class="wrapper">
  <?php
    $bid=$_POST['b_id'];
    $i=1;    
    $qold = $d->select("subcategory,baker,product,category","product.sub_id = subcategory.sub_id and subcategory.c_id = category.c_id and product.b_id = baker.b_id and product.b_id='$bid'","");

    $dataold = mysqli_fetch_array($qold);
    $bakername = $dataold['b_bname'];
  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo "Selected baker "."<b>".$bakername."</b>"." all product list"; ?></h1>
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
                  <!-- <th>Baker</th> -->
                  <th>Product</th>           
                  <th>Sub-category</th>
                  <th>Category</th>
                  <th>Product Price</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $b_id=$_POST['b_id'];
                $i=1;
                $grandtotal = 0;
                $q = $d->select("subcategory,baker,product,category","product.sub_id = subcategory.sub_id and subcategory.c_id = category.c_id and product.b_id = baker.b_id and product.b_id='$b_id'","");

                while($data = mysqli_fetch_array($q))
                { ?>
                <tr>
                  <!-- <td value=<?php echo $data['b_id']; ?>>
                    <?php echo $data['b_bname']; ?></td> -->
                  <td><?php echo $data['p_name']; ?></td>
                  <td value=<?php echo $data['sub_id']; ?>>
                      <?php echo $data['sub_name']; ?></td>
                  <td value=<?php echo $data['c_id']; ?>>
                      <?php echo $data['c_name']; ?></td>
                  <td><?php $grandtotal=$grandtotal+$data['p_price']; echo $data['p_price']; ?></td>   
                </tr>
              <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th colspan="5">Total :- <?php echo $grandtotal; ?></th>
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
