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
            <h3>Reports &nbsp;&nbsp;
              <!-- <a class="btn btn-primary btn-sm" href="feedback_add_form.php" style="width: 90px; text-align: center; font-weight: 700; font-size: medium; text-align: left; padding-left: 12px; margin-left: 1px;">
                <i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Add
              </a> -->
            </h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active"><a>Reports</a></li>
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
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><a href="rppackage.php">Packages and payment report</a></td>
                  </tr>
                  <tr>
                    <td><a href="rpcuorder.php">Customer order report</a></td>
                  </tr>
                  <!--<tr>
                    <td><a href="report3.php">Delivery boy order delivery report</a></td>
                  </tr>-->
                  <tr>
                    <td><a href="rpbakerorder.php">Baker total order and payment report</a></td>
                  </tr>
                  <tr>
                    <td><a href="rpbakerpro.php">Baker total product report</a></td>
                  </tr>
                  <!-- <tr>
                    <td><a href="rpdboyorder.php">Delivery boy order report</a></td>
                  </tr>
                  <tr>
                    <td><a href="rpsubcat.php">Subcategoy from category report</a></td>
                  </tr>
                  <tr>
                    <td><a href="rpprosub.php">Product from Subcategory report</a></td>
                  </tr> -->
                  <tr>
                    <td><a href="rpmostpro.php">Most selling product report</a></td>
                  </tr>
                  <tr>
                    <td><a href="rpmostcust.php">Most ordering customer report</a></td>
                  </tr>
                  <!-- <tr>
                    <td><a href="rpdboyorder.php">Most ordering customer report</a></td>
                  </tr> -->
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
  <!--<aside class="control-sidebar control-sidebar-dark">-->
    <!-- Control sidebar content goes here -->
  <!--</aside>-->
  <!-- /.control-sidebar -->

</body>
</html>
<?php
include 'common/footer.php';
?>
