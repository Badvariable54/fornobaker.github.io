<?php
include 'common/header.php';
include 'common/sidebar.php';
?>
<!DOCTYPE html>
<html>

<body>
<div class="wrapper">
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <table style="width:100%" border="1" >
            <tr>
              <th>Sub-category Name</th>
              <th>Product Name</th>
              <th>Baker Name</th>
              <th>Description</th>   
              <th>Photo</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
            <?php
                $i=1;
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
                    <td><?php echo $data['p_photo']; ?></td>
                    <td><?php echo $data['p_price']; ?></td>
                    <td><input type="button" name="delete" value="Delete"></td>
                </tr>
              <?php } ?>
          </table>
        </div>
      </div><!--/. container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


</body>
</html>
<?php
include 'common/footer.php';
?>