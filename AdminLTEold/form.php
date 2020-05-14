<?php
include 'common/header.php';
include 'common/sidebar.php';
?>
<!DOCTYPE html>
<html lang="en">

<body>
<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="height: 60px;">

      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Category List &nbsp;&nbsp;
              <a class="btn btn-primary btn-sm" href="category_add_form.php" style="width: 90px; text-align: center; font-weight: 700; font-size: medium; text-align: left; padding-left: 12px; margin-left: 1px;">
                <i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Add
              </a>
            </h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">              
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active"><a>Category</a></li>
            </ol>
          </div>
        </div>
      </div>  
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">            
            <div class="card-body ">
              <div class="card card-white">
                                <div class="card-heading clearfix">
                                    <h4 class="card-title">Custom Form</h4>
                                </div>
                                <div class="card-body">
                                    <form class="needs-validation" novalidate>
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">First name</label>
                                                <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Last name</label>
                                                <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustomUsername">Username</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required>
                                                    <div class="invalid-feedback">
                                                        Please choose a username.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom03">City</label>
                                                <input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="validationCustom04">State</label>
                                                <input type="text" class="form-control" id="validationCustom04" placeholder="State" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid state.
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="validationCustom05">Zip</label>
                                                <input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid zip.
                                                </div>
                                            </div>
                                        </div>                                        
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                                <label class="form-check-label" for="invalidCheck">
                                                    Agree to terms and conditions
                                                </label>
                                                <div class="invalid-feedback">
                                                    You must agree before submitting.
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-danger" type="submit">Submit form</button>
                                    </form>
<form method="post">
	<div class="form-row">
        <div class="col-md-6 mb-3" id="check">
          	<label>City</label>
          	<input id="checkinput" type="text" minlength="4" maxlength="6" title="thi is title" pattern="^([a-zA-Z]\d)$"  />
			<input type="text" placeholder="City2" id="checkinput2" />
        </div>
        <!-- <script type="text/javascript">
        	function thismethod(){
        	//document.getElementsById('checkdiv').willValidate;
        	/*document.getElementsById('checkinput').willValidate;
        	document.getElementsById('checkinput2').willValidate;*/
     		//document.getElementsById('checkinput').validity.customError;
        	
        	}
        	document.getElementsById('checkinput').setCustomValidity('Invalid');
        	document.getElementsById('checkinput').validity.customError;
        </script> -->
        <div class="col-md-6 mb-3">
            <label>City</label>
            <input type="text" placeholder="City">  
        </div>
        <div class="col-md-6 mb-3">
            <label>City</label>
            <input type="text" placeholder="City">  
        </div>
        <div class="col-md-6 mb-3">
            <label>City</label>
            <input type="text" placeholder="City">  
        </div>
        <div class="col-md-6 mb-3">
            <label>City</label>
            <input type="text" placeholder="City">  
        </div>
        <div class="col-md-6 mb-3">
        	<input type="submit" onclick="thismethod()" name="submit" value="submit">
		</div>
    </div>
</form>                                    

                                    <script>
                                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                                        (function() {
                                            'use strict';
                                            window.addEventListener('load', function() {
                                                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                                var forms = document.getElementsByClassName('needs-validation');
                                                // Loop over them and prevent submission
                                                var validation = Array.prototype.filter.call(forms, function(form) {
                                                    form.addEventListener('submit', function(event) {
                                                        if (form.checkValidity() === false) {
                                                            event.preventDefault();
                                                            event.stopPropagation();
                                                        }
                                                        form.classList.add('was-validated');
                                                    }, false);
                                                });
                                            }, false);
                                        })();
                                    </script>
                                </div>
                            </div>
            </div>            
          </div>          
        </div>
      </div>
    </section>           
  </div>

  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

</body>
</html>
<?php
include 'common/footer.php';
?>
