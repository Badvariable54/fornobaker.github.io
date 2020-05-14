<?php

session_start();

include "lib/dao.php";
include "lib/model.php";

$d = new dao();
$m = new model();
extract($_POST);
extract($_GET);

if(isset($_POST['l_email']))
{
	$q = $d->select("admin","l_email='$l_email' and l_password='$l_password'");
	$data = mysqli_fetch_array($q);

	if($data>0)
{
	$_SESSION['l_id']=$data['l_id'];
	$_SESSION['l_name']=$data['l_name'];
	$_SESSION['l_email']=$data['l_email'];
	header("location:index.php");
}else
{
	header("location:login.php?msgError=Wrong DEtail");

}
}


?>