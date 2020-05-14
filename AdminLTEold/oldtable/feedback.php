<?php
include 'common/header.php';
include 'common/sidebar.php';
?>
<!DOCTYPE html>
<html>

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
            <h1>Feedback</h1>
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
              <th>Sr. No.</th>
              <th>Customer Name</th>
              <th>Feedback</th>           
              <th>Action</th>
            </tr>
            <?php
                $i=1;
                $q = $d->select("feedback,customer","feedback.cu_id = customer.cu_id","");
                while($data = mysqli_fetch_array($q))
                {
                  ?>
                  <tr>
                    <td><?php echo $data['f_id']; ?></td>
                    <td value=<?php echo $data['cu_id']; ?>>
                      <?php echo $data['cu_fname']; ?></td>
                    <td><?php echo $data['f_feedback']; ?></td>
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