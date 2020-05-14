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
            <h1>FAQ</h1>
          </div>
           <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="faq_addbtn.php"><input type="button" name="Add" value="Add"></a>
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
              <th>Sr. No.</th>
              <th>Question</th>
              <th>Answer</th>           
              <th>Action</th>
            </tr>
            <?php
                $i=1;
                $q = $d->select("faq","","");
                while($data = mysqli_fetch_array($q))
                {
                  ?>
                  <tr>
                    <td><?php echo $data['faq_id']; ?></td>
                    <td><?php echo $data['faq_question']; ?></td>
                    <td><?php echo $data['faq_answer']; ?></td>
                    <td><input type="button" name="Edit" value="Edit"><br> <input type="button" name="delete" value="Delete"></td>
                </tr>
              <?php } ?>          
          </table>
        </div>
      </div><!--/. container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->
  
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
</body>
</html>
<?php
include 'common/footer.php';
?>