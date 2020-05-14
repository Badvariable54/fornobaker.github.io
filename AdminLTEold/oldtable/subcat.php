<?php
include 'common/header.php';
include 'common/sidebar.php';
?>
<!DOCTYPE html>
<html>
<body>
<div class="wrapper">
  <!-- Navbar -->
  

  <!-- Main Sidebar Container -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sub-category</h1>
          </div>
           <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="subcat_addbtn.php"><input type="button" name="Add" value="Add"></a>
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
              <th>Category Name</th>
              <th>Sub-category Name</th>
              <th>Description</th>           
              <th>Action</th>
            </tr>
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