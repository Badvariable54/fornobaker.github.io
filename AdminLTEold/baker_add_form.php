<?php
include 'common/header.php';
include 'common/sidebar.php';

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script type="text/javascript">
    const email = document.getElementById("mail");
    email.addEventListener("input", function (event) {
    if (email.validity.typeMismatch) {
      email.setCustomValidity("I am expecting an e-mail!");
    } else {
      email.setCustomValidity("");
    }
    });
    function myFunction() {
      var inpObj = document.getElementById("id1");
      if (!inpObj.checkValidity()) {
        document.getElementById("id1").innerHTML = inpObj.validationMessage;
      }
    }//first checkvalidity method
    function bakerform(){
      var fnm = document.bform.b_fname;
      /*var lnm = document.forms["bform"]["b_lname"].value;
      var pack = document.forms["bform"]["rgpack"].value;
      var no = document.forms["bform"]["b_phone"].value;
      var email = document.forms["bform"]["b_email"].value;
      var dob = document.forms["bform"]["b_dob"].value;

      var address = document.forms["bform"]["b_address"].value;
      var city = document.forms["bform"]["b_city"].value;
      var pincd = document.forms["bform"]["b_pincode"].value;
      var business = document.forms["bform"]["b_bname"].value;*/

      if( fnm == "" || fnm == null ) {            
        
        window.alert("Please enter first name");
        return false;
      } /*else if( lnm == "" ) {            
        document.getElementById("idlname").innerHTML = inpObj.validationMessage;
        return false;
      } else if( no == "" ) {
        document.getElementById("idphone").innerHTML = inpObj.validationMessage;
        return false;
      }*/

      
    }
    
  </script>
  <link rel="stylesheet" type="text/css" href="adv_formcss.css">
</head>
<body>
  <div class="wrapper">
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-8">
              <h1 style="margin-left: 5px;"><b>Baker Add Form</b></h1>
            </div>  
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card card-primary">
                <div class="card-header">
                  <h1 class="card-title"><b>Baker Details</b></h1>
                </div>
                <form action="controller.php" method="post" name="bform" onsubmit="return bakerform()" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">                          
                          <div class="inputclass">                            
                            <input type="text" name="b_fname" required="" >
                            <label>First Name</label>
                          </div>
                        </div>
                      </div>
                      <p id="idfname">&nbsp;</p>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <div class="inputclass">
                            <input type="text" name="b_lname" required>
                            <label>Last Name</label>
                          </div>
                        </div>
                      </div>
                      <p id="idlname">&nbsp;</p>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <label>Packge</label>
                          <select name="rg_id" class="form-control" name="rgpack">
                            <?php
                              $i=1;
                              $q=$d->select("registration_package","","");
                              while($data=mysqli_fetch_array($q)){
                                ?>
                                <option value="<?php echo $data['rg_id'] ?>"><?php echo $data['rg_name'];         ?></option>
                                <?php } ?>
                          </select>
                         </div>
                      </div><p id="idrgid">&nbsp;</p>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <div class="inputclass">
                            <input type="text" name="b_phone" required>
                            <label>Phone no.</label>
                          </div>
                        </div>
                      </div><p id="idphone">&nbsp;</p>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <div class="inputclass">
                            <input type="email" name="b_email" id="mail" required>
                            <label for="mail">Email</label>
                          </div>
                        </div>
                      </div><p id="idemail">&nbsp;</p>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <div class="inputclass">
                            <input type="text" name="b_dob" pattern="\d{4}-\d{1,2}-\d{1,2}" required>
                            <label>DOB</label><!-- "\d{1,2}/\d{1,2}/\d{4}" -->
                          </div>
                        </div>
                      </div><p id="iddob">&nbsp;</p>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <div class="inputclass">
                            <input type="radio" name="b_gender" value="m">
                            <label>Male</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <div class="inputclass">
                            <input type="radio" name="b_gender" value="f">
                            <label>Female</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          
                            <input type="file" name="b_photo">
                            <label>Upload Photo</label>
                          
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <div class="area">
                            <textarea  rows="3" name="b_address" required></textarea>
                            <label>Address</label>
                          </div>
                        </div>
                      </div><p id="idaddress">&nbsp;</p>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <div class="inputclass">
                            <input type="text"   name="b_city" required>
                            <label>City</label>
                          </div>
                        </div>
                      </div><p id="idcity">&nbsp;</p>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <div class="inputclass">
                            <input type="text"   name="b_pincode" required>
                            <label>Pincode</label>
                          </div>
                        </div>
                      </div><p id="idpincode">&nbsp;</p>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <div class="inputclass">
                            <input type="text"   name="b_bname" required>
                            <label>Business</label>
                          </div>
                        </div>
                      </div><p id="idpincode">&nbsp;</p>
                    </div>
                    
                  </div>
                    <div class="card-footer">
                      <button type="submit" name="baker_add" class="btn btn-primary">Submit</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</body>
</html>
<?php
include 'common/footer.php';
?>