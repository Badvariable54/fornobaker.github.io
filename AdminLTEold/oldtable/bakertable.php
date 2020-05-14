<?php
include 'common/header.php';
include 'common/sidebar.php';
?>
<!DOCTYPE html>
<html>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Baker Table</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="baker_addbtn.php"><input type="button" name="Add" value="Add"></a>
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
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
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
                </thead>
                <tbody>
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
                </tbody>
            <!--<tfoot>
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
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
<?php
include 'common/footer.php';
?>