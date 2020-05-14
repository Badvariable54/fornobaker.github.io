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
            <h1>Order</h1>
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
              <th>Customer Name</th>           
              <th>Baker Name</th>
              <th>D.Boy Name</th>
              <th>Order Total</th>
              <th>Action</th>
            </tr>
            <?php
                $i=1;
                $q = $d->select("orders,baker,deliveryboy,customer","orders.cu_id = customer.cu_id and orders.b_id = baker.b_id and orders.db_id = deliveryboy.db_id","");
                while($data = mysqli_fetch_array($q))
                {
                  ?>
                  <tr>
                    <td value=<?php echo $data['cu_id']; ?>>
                      <?php echo $data['cu_fname']; ?></td>
                    <td value=<?php echo $data['b_id']; ?>>
                      <?php echo $data['b_bname']; ?></td>
                    <td value=<?php echo $data['db_id']; ?>>
                      <?php echo $data['db_fname']; ?></td>
                    <td><?php echo $data['o_total']; ?></td>
                    <td><input type="button" name="delete" value="Delete"></td>
                </tr>
              <?php } ?>
          </table>
        </div>
      </div><!--/. container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->
 
</div>
<!-- ./wrapper -->


</body>
</html>
<?php
include 'common/footer.php';
?>