<html>

<body>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Forno Baker</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img   src=" <?php $basepath="photo/admin/"; echo $basepath.$_SESSION['l_photo']; ?>"  class="img-circle elevation-2"  alt="User Image"
           >
        </div>
        <div class="info">
          <a href="#" class="d-block"><b><?php echo $_SESSION['l_name']; ?></b></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" class="middle">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./baker_table.php" class="nav-link">
                  <p>Baker</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./customer_table.php" class="nav-link">
                  <p>Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./dboy_table.php" class="nav-link">
                  <p>Delivery Boy</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fa fa-list-alt fa-lg" ></i>
              <p>&nbsp;Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./category_table.php" class="nav-link">
                  <!--<i class="far fa-circle nav-icon"></i>-->
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./subcategory_table.php" class="nav-link">
                  <!--<i class="far fa-circle nav-icon"></i>-->
                  <p>Sub-Category</p>
                </a>
              </li>              
            </ul>
          </li>          
          <li class="nav-item has-treeview">
            <a href="./product_table.php" class="nav-link">
              <i class="fa fa-archive fa-lg"></i>
              <!-- <img src="./photo/icon/proimg.png" height="20px" width="20px"></img> --> 
              <p>&nbsp;Product</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="./order_table.php" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>Order</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="./package_table.php" class="nav-link">
              <i class="fa fa-briefcase fa-lg"></i>              
              <p>&nbsp;Package</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="./feedback_table.php" class="nav-link">
              <!-- <i class="fas fa-comments fa-lg"></i> -->
              <i class="far fa-comments fa-lg"></i>
              <p>&nbsp;Feedback</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="./faq_table.php" class="nav-link">
              <i class="fa fa-question-circle fa-lg"></i>
              <p>&nbsp;FAQ</p>
            </a>
          </li>
          <!-- <li class="nav-item has-treeview">
            <a href="./reportnew.php" class="nav-link">              
              <i class="fas fa-file-alt fa-lg"></i>
              <p>&nbsp;Generate Report</p>
            </a>
          </li> -->
          <li class="nav-item has-treeview">
            <a href="./reportnew.php" class="nav-link">              
              <i class="fas fa-file-alt fa-lg"></i>
              <p>&nbsp;Generate Report</p>
            </a>
          </li>
          <!-- <li class="nav-item has-treeview">
            <a href="./formdemo.php" class="nav-link">
              <i class="fas fa-file-alt fa-lg"></i>
              <p>&nbsp;Validation Form</p>
            </a>
          </li> -->         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</body>




</html>
