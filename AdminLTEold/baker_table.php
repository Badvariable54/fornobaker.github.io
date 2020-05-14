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
    <!-- Content Header (Page header)  -->
    <section  class="content-header" style="height: 60px;">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Baker List &nbsp;&nbsp;
              <!-- <a class="btn btn-primary btn-sm" href="baker_add_form.php" style="width: 90px; text-align: center; font-weight: 700; font-size: medium; text-align: left; padding-left: 12px; margin-left: 1px;">
                <i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Add
              </a> -->
            </h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">              
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active"><a>Baker</a></li>
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
                    <th>Baker Name</th>
                    <th>Pack Name</th>
                    <th>Personal Details</th>
                    <th>Bakery Photo</th>
                    <th>Personal Photo</th>
                    <th>Address</th>
                    <th>Business Name</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $i=1;
                    $imgpath="photo/baker/";
                    $q = $d->select("baker,registration_package","baker.rg_id = registration_package.rg_id ","");
                    while($data = mysqli_fetch_array($q))
                    {
                      ?>
                      <tr>
                        <td><?php echo $data['b_fname']
                                ."<br>".$data['b_lname']; ?></td>
                        <td value=<?php echo $data['rg_id']; ?>>
                          <?php echo $data['rg_name']; ?></td>
                        <td><?php echo $data['b_phone']
                                ."<br>".$data['b_email']
                                ."<br>".$data['b_dob']
                                ."<br>".$data['b_gender']; ?></td>
                        <?php $img=substr($data['b_bphoto'],34) ?>
                        <td><center><img src="<?php echo $img;//$imgpath.$data['b_photo']; ?>" alt="Smiley face" height="50" width="50"></center></td>
                        <?php $img=substr($data['b_photo'],34) ?>
                        <td><center><img src="<?php echo $img;//$imgpath.$data['b_photo']; ?>" alt="Smiley face" height="50" width="50"></center></td>
                        <td><?php echo $data['b_address']
                                ."<br>".$data['b_city']
                                ."<br>".$data['b_pincode']; ?></td>
                        <td><?php echo $data['b_bname']
                                ."<br><b>".$data['b_branch']."</b>"; ?></td>
                                
                        <!-- <td class="project-actions text-right">
                          <form action="baker_edit_form.php" method="post" style="float:left; margin-right:3px;">
                            <input type="hidden" name="b_id" value="<?php echo $data['b_id']; ?>">
                            <button class="btn btn-info btn-sm" name="baker_edit" style="width: 100px; text-align: center; font-weight: 700; font-size: medium; text-align: left;
                            padding-left: 15px; margin-left: 16px; ">
                              <i class="fas fa-pencil-alt"> </i>&nbsp;&nbsp;Edit
                            </button>
                          </form>
                          <br> 
                          <form action="controller.php" method="post" style="float:left; margin-right:3px;">
                            <input type="hidden" name="b_id" value="<?php echo $data['b_id']; ?>">
                            <button name="baker_del" class="btn btn-danger btn-sm" style="width: 100px; font-weight: 700; font-size: medium; margin-top: 3px;text-align: left;
                            padding-left: 15px; margin-left: 16px;">
                              <i class="fas fa-trash"> </i>&nbsp;&nbsp;Delete
                            </button>
                          </form>
                        </td> -->
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
  <!--<aside class="control-sidebar control-sidebar-dark">-->
    <!-- Control sidebar content goes here -->
  <!--</aside>-->
  <!-- /.control-sidebar -->

</body>
</html>
<?php
include 'common/footer.php';
?>
