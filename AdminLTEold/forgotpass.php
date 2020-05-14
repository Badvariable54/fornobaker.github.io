
<?php
session_start();
if(isset($_SESSION['l_id'])){
  header("location:login1.php");
}
include "lib/dao.php";
include "lib/model.php";
$d = new dao();
$m = new model();
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script type="text/javascript" src="jquery-3.4.1.min.js"></script>
  <script type="text/javascript">


  </script>

  <style type="text/css">
            .middle{
      position: absolute;
      transform: translate(-50%,-50%);
      text-align: center;
    }
    .btn{
      background: none;
      border:1px solid #000;
      font-family: "montserrat",sans-serif;
      text-transform: uppercase;
   
      min-width: 150px;
      min-height: 10px;

      margin-left: 140px;
      margin-top: 10px;
      cursor: pointer;
      transition: color 0.4s linear;
      position: relative;
    }
    .btn:hover{
      color: #fff;

    }
    .btn::before{
      content: "";
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background: #000;
      z-index: -1;
      transition:transform 0.5s;
      transform-origin: 0 0;
      transition-timing-function: cubic-bezier(0.5,1.6,0.4,0.7);
    }
    .btn1::before{
      transform: scaleX(0);
    }
    .btn2::before{
      transform: scaleY(0);
    }
    .btn1:hover::before{
      transform: scaleX(1);
    }

    .btn2:hover::before{
      transform: scaleY(1);
    }

  body{
  margin:0;
  color:#6a6f8c;
  background:url(second.jpg) no-repeat center fixed;
  background-size: cover;
  font:600 16px/18px 'Open Sans',sans-serif;

}
*,:after,:before{box-sizing:border-box}
.clearfix:after,.clearfix:before{content:'';display:table}
.clearfix:after{clear:both;display:block}
a{color:inherit;text-decoration:none}

.login-wrap{
  width:100%;
  margin:auto;

  max-width:525px;
  min-height:670px;
  position:relative;
  /*background:url(back1.jpg) no-repeat center;*/
  box-shadow:0 12px 15px 0 rgba(0,0,0,.20),0 17px 50px 0 rgba(0,0,0,.19);

}
.login-html{
  width:100%;
  height:100%;
  position:absolute;
  padding:90px 70px 50px 70px;
  background:rgba(40,57,101,.9);
  
}
.login-html .sign-in-htm,
.login-html .sign-up-htm{
  top:0;
  left:0;
  right:0;
  bottom:0;
  position:absolute;
  transform:rotateY(180deg);
  backface-visibility:hidden;
  transition:all .4s linear;
}
.login-html .sign-in,
.login-html .sign-up,
.login-form .group .check{
  display:none;
}
.login-html .tab,
.login-form .group .label,
.login-form .group .button{
  
}
.login-html .tab{
  font-size:22px;
  margin-right:15px;
  padding-bottom:5px;
  margin:0 15px 10px 0;
  display:inline-block;
  border-bottom:2px solid transparent;
}
.login-html .sign-in:checked + .tab,
.login-html .sign-up:checked + .tab{
  color:#fff;
  border-color:#1161ee;
}
.login-form{
  min-height:345px;
  position:relative;
  perspective:1000px;
  transform-style:preserve-3d;
}
.login-form .group{
  margin-bottom:15px;
}
.login-form .group .label,
.login-form .group .input,
.login-form .group .button{
  width:100%;
  color:#fff;
  display:block;
}
.login-form .group .input,
.login-form .group .button{
  border:none;
  padding:15px 20px;
  border-radius:25px;
  background:rgba(255,255,255,.1);
}
.login-form .group input[data-type="password"]{
  text-security:circle;
  -webkit-text-security:circle;
}
.login-form .group .label{
  color:#aaa;
  font-size:12px;
}
.login-form .group .button{
  background:#1161ee;
}
.login-form .group label .icon{
  width:15px;
  height:15px;
  border-radius:2px;
  position:relative;
  display:inline-block;
  background:rgba(255,255,255,.1);
}
.login-form .group label .icon:before,
.login-form .group label .icon:after{
  content:'';
  width:10px;
  height:2px;
  background:#fff;
  position:absolute;
  transition:all .2s ease-in-out 0s;
}
.login-form .group label .icon:before{
  left:3px;
  width:5px;
  bottom:6px;
  transform:scale(0) rotate(0);
}
.login-form .group label .icon:after{
  top:6px;
  right:0;
  transform:scale(0) rotate(0);
}
.login-form .group .check:checked + label{
  color:#fff;
}
.login-form .group .check:checked + label .icon{
  background:#1161ee;
}
.login-form .group .check:checked + label .icon:before{
  transform:scale(1) rotate(45deg);
}
.login-form .group .check:checked + label .icon:after{
  transform:scale(1) rotate(-45deg);
}
.login-html .sign-in:checked + .tab + .sign-up + .tab + .login-form .sign-in-htm{
  transform:rotate(0);
}
.login-html .sign-up:checked + .tab + .login-form .sign-up-htm{
  transform:rotate(0);
}

.hr{
  height:2px;
  margin:60px 0 50px 0;
  background:rgba(255,255,255,.2);
}
.foot-lnk{
  text-align:center;
}
</style>
</head>
<body  >
  <form action="controller.php" id="login_validater" class="login_validater" method="post">
<div class="login-wrap">
  <div class="login-html">
    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Forgot  Password</label>
    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
    <div class="login-form">
      <div class="sign-in-htm">
        <div class="group">
          <label for="user" class="label">Email</label>
          <input id="user" type="text" class="input" name="l_email">
        </div>
        <div class="group">
          <label for="pass" class="label">New Password</label>
          <input id="pass" type="password" class="input" data-type="password" name="l_password">
        </div>
        <br/>
        <div class="group">
          <input type="submit" class="button" value="Sign In" name="forgot_btn">
        </div>
        <div class="hr"></div>
      
       
      </div>
      </form>
      
    </div>
  </div>
</div>
</body>
</html>
