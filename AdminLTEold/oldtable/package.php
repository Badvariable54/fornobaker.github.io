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
            <h1>Registration Packages</h1>
          </div>
           <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="package_addbtn.php"><input type="button" name="Add" value="Add"></a>
            </ol>
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
              <th>Package Name</th>
              <th>Duration</th>           
              <th>Price</th>
              <th>Action</th>
            </tr>
            <?php
                $i=1;
                $q = $d->select("registration_package","","");
                while($data = mysqli_fetch_array($q))
                {
                  ?>
                  <tr>
                    <td><?php echo $data['rg_name']; ?></td>
                    <td><?php echo $data['rg_duration']; ?></td>
                    <td><?php echo $data['rg_price']; ?></td>
                    <td><input type="button" name="Edit" value="Edit"><br> <input type="button" name="delete" value="Delete"></td>
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