<?php
include 'common/header.php';
include 'common/sidebar.php';
?>
<!DOCTYPE html>
<html lang="en">

<body>
<div class="wrapper">
  <!-- Navbar -->
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Delivery Boy</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="dboy_addbtn.php"><input type="button" name="Add" value="Add"></a>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <table style="width:100%" border="1" >
            <tr>
              <th>Firstname</th>
              <th>Lastname</th>
              <th>Phone</th>
              <th>Email</th>
              <th>DOB</th>
              <th>Gender</th>
              <th>Photo</th>
              <th>Action</th>
            </tr>
            <?php
                $i=1;
                $q = $d->select("deliveryboy","");
                while($data = mysqli_fetch_array($q))
                {
                  ?>
                  <tr>
                    <td><?php echo $data['db_fname']; ?></td>
                    <td><?php echo $data['db_lname']; ?></td>
                    <td><?php echo $data['db_phone']; ?></td>
                    <td><?php echo $data['db_email']; ?></td>
                    <td><?php echo $data['db_dob']; ?></td>
                    <td><?php echo $data['db_gender']; ?></td>
                    <td><?php echo $data['db_photo']; ?></td>
                    <td><input type="button" name="Edit" value="Edit"><br> <input type="button" name="delete" value="Delete"></td>
                </tr>
              <?php } ?>
          </table>
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  
</div>

</body>
</html>
<?php
include 'common/footer.php';
?>
