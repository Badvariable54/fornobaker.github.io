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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category Table</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="cat_addbtn.php"><input type="button" name="Add" value="Add"></a>
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
                  <th>Category Name</th>
                  <th>Sub-category Name</th>
                  <th>Description</th>           
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i=1;
                $q = $d->select("subcategory,category","subcategory.c_id = category.c_id ","");
                while($data = mysqli_fetch_array($q))
                {
                  ?>
                  <tr>
                    <td value=<?php echo $data['c_id']; ?>>
                      <?php echo $data['c_name']; ?></td>
                    <td><?php echo $data['sub_name']; ?></td>
                    <td><?php echo $data['sub_description']; ?></td>
                    <td><input type="button" name="Edit" value="Edit"><br> <input type="button" name="delete" value="Delete"></td>
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
