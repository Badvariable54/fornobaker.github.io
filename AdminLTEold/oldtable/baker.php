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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Baker</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="baker_addbtn.php"><input type="button" name="Add" value="Add"></a>
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
              <th>Pack Name</th>
              <th>Phone</th>
              <th>Email</th>
              <th>DOB</th>
              <th>Gender</th>
              <th>Photo</th>
              <th>Address</th>
              <th>City</th>
              <th>Pincode</th>
              <th>Business Name</th>
              <th>Action</th>
            </tr>
            
           <?php
                $i=1;
                $q = $d->select("baker,registration_package","baker.rg_id = registration_package.rg_id ","");
                while($data = mysqli_fetch_array($q))
                {
                  ?>
                  <tr>
                    <td><?php echo $data['b_fname']; ?></td>
                    <td><?php echo $data['b_lname']; ?></td>
                    <td value=<?php echo $data['rg_id']; ?>>
                      <?php echo $data['rg_name']; ?></td>
                    <td><?php echo $data['b_phone']; ?></td>
                    <td><?php echo $data['b_email']; ?></td>
                    <td><?php echo $data['b_dob']; ?></td>
                    <td><?php echo $data['b_gender']; ?></td>
                    <td><?php echo $data['b_photo']; ?></td>
                    <td><?php echo $data['b_address']; ?></td>
                    <td><?php echo $data['b_city']; ?></td>
                    <td><?php echo $data['b_pincode']; ?></td>
                    <td><?php echo $data['b_bname']; ?></td>
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

</body>
</html>
<?php
include 'common/footer.php';
?>
