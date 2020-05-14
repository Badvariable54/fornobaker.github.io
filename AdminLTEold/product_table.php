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
    <section class="content-header" style="height: 60px;">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Product List &nbsp;&nbsp;
              <a class="btn btn-primary btn-sm" href="product_add_form.php" style="width: 90px; text-align: center; font-weight: 700; font-size: medium; text-align: left; padding-left: 12px; margin-left: 1px;">
                <i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Add
              </a>
            </h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active"><a>Product</a></li>
            </ol>
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
                  <th>Sub-category Name</th>
                  <th>Product Name</th>
                  <th>Baker Name</th>
                  <th>Description</th>   
                  <th>Photo</th>
                  <th>Price</th>
                  <th>Offer Percentage</th>
                  <!--<th>Action</th>-->
                </tr>
                </thead>
                <tbody>
                <?php
                $i=1;
                $ofid;
                $ppirce;
                $ofper;
                $q = $d->select("subcategory,product,baker","product.sub_id = subcategory.sub_id and product.b_id = baker.b_id","");
                while($data = mysqli_fetch_array($q))
                {
                  ?>
                  <tr>
                    <td value=<?php echo $data['sub_id']; ?>>
                      <?php echo $data['sub_name']; ?></td>
                    <td><?php echo $data['p_name']; ?></td>
                    <td value=<?php echo $data['b_id']; ?>>
                      <?php echo $data['b_bname']; ?></td>
                    <td><?php echo $data['p_description']; ?></td>
                    <?php $img=substr($data['p_photo'],34) ?>
                    <td><center><img src="<?php echo $img ?>" alt="Smiley face" height="50" width="50"></center></td>
                    <td><?php echo $data['p_price']; $ppirce = $data['p_price']; ?></td>
                    <td>
                      <?php $ofid = $data['of_id'];
                        if ($ofid != null) {
                          $que = $d->select("offer","offer.of_id = '$ofid'","");
                          $data2 = mysqli_fetch_array($que);
                          $ofper = $data2['of_percentage'];
                          $final = $ppirce - ($ppirce * $ofper / 100) ;
                          echo $data2['of_percentage']." % discount"."<br><b>".$final."</b>";
                        } else{
                          echo "No offer";
                        }
                       ?>
                    </td>
                    <!--<td>
                      <form action="controller.php" method="post">
                        <input type="hidden" name="p_id" value="<?php// echo $data['p_id']; ?>">
                        <button name="product_del" class="btn btn-danger">Delete</button>
                      </form>
                    </td>-->
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
