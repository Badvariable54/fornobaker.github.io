<?php

session_start();

include "lib/dao.php";
include "lib/model.php";

$d = new dao();
$m = new model();
extract($_POST);
extract($_GET);

//login start
if(isset($_POST['l_email'])){
	$q=$d->select("admin","l_email='$l_email' and l_password='$l_password'");
	$data=mysqli_fetch_array($q);
	if($data>0){
		$_SESSION['l_id']=$data['l_id'];
		$_SESSION['l_email']=$data['l_email'];
		$_SESSION['l_name']=$data['l_name'];
		header("location:index.php");
	}
	else
	{
		header("location:login1.php?Wrong_details");
	}
}
//login end

//forgot password start
if(isset($_POST['forgot_btn'])){
	$m->set_data('l_password',$l_password);	
	$a = array(
		'l_password' => $m->get_data('l_password'),		
	);
	$q=$d->update("admin",$a,"l_email='$l_email'");
	if($q>0){
		header("location:login1.php");
	}
	else{
		echo "Error";
	}
}
//forgot password end

/*
if($q>0)
{
	$_SESSION['msgSuccess']="Services Added";
	echo'<script type="text/javascript"> alert("Service added");</script>';
	header("location:add_service.php");
}
*/

//baker add btn start
if(isset($_POST['baker_add'])){
	$file = $_FILES['b_idpro']['tmp_name'];
	if(file_exists($file))
	{
		echo "file exist";
		$errors = array();
		$maxsize = 2097152;
		$acceptable = array(
			'image/jpeg',
			'image/jpg',
			'image/png',
			'image/gif'
		);
		if(($_FILES['b_idpro']['size'] >= $maxsize) || ($_FILES["b_idpro"]["size"] == 0))
		{
			$errors[] = 'File too large. File must be less than 2 megabytes.';
		}
		if(!in_array($_FILES['b_idpro']['type'], $acceptable) && (!empty($_FILES["b_idpro"]["type"])))
		{
			$errors[] = 'Invalid files type. JPEG, JPG, GIF and PNG types are accepted';
		}
		if(count($errors) === 0)
		{
			move_uploaded_file($_FILES['b_idpro']['tmp_name'], 'photo/baker/'.$_FILES['b_idpro']['name']);
			$b_idpro = $_FILES['b_idpro']['name'];
			$m->set_data('b_fname',$b_fname);
			$m->set_data('b_lname',$b_lname);
			$m->set_data('rg_id',$rg_id);
			$m->set_data('b_phone',$b_phone);
			$m->set_data('b_email',$b_email);
			$m->set_data('b_dob',$b_dob);
			$m->set_data('b_gender',$b_gender);
			$m->set_data('b_idpro',$b_idpro);
			$m->set_data('b_address',$b_address);
			$m->set_data('b_city',$b_city);
			$m->set_data('b_pincode',$b_pincode);
			$m->set_data('b_bname',$b_bname);
			
			$a = array(
				'b_fname'=>$m->get_data('b_fname'),
				'b_lname'=>$m->get_data('b_lname'),
				'rg_id'=>$m->get_data('rg_id'),
				'b_phone'=>$m->get_data('b_phone'),
				'b_email'=>$m->get_data('b_email'),
				'b_dob'=>$m->get_data('b_dob'),
				'b_gender'=>$m->get_data('b_gender'),
				'b_idpro'=>$m->get_data('b_idpro'),
				'b_address'=>$m->get_data('b_address'),
				'b_city'=>$m->get_data('b_city'),
				'b_pincode'=>$m->get_data('b_pincode'),
				'b_bname'=>$m->get_data('b_bname'),
			);
			$q=$d->insert("baker",$a);
			if($q>0){
				$_SESSION['msgSuccess']="Baker Added";
				header("location:baker_table.php");
			}
			else{
				echo "Error";
			}
		}
	}
}


//baker add btn end

//customer add btn start
if(isset($_POST['cu_btn'])){
	$file = $_FILES['cu_photo']['tmp_name'];
	if(file_exists($file))
	{
		echo "file exist";
		$errors = array();
		$maxsize = 2097152;
		$acceptable = array(
			'image/jpeg',
			'image/jpg',
			'image/png',
			'image/gif'
		);
		if(($_FILES['cu_photo']['size'] >= $maxsize) || ($_FILES["cu_photo"]["size"] == 0))
		{
			$errors[] = 'File too large. File must be less than 2 megabytes.';
		}
		if(!in_array($_FILES['cu_photo']['type'], $acceptable) && (!empty($_FILES["cu_photo"]["type"])))
		{
			$errors[] = 'Invalid files type. JPEG, JPG, GIF and PNG types are accepted';
		}
		if(count($errors) === 0)
		{
			move_uploaded_file($_FILES['cu_photo']['tmp_name'], 'photo/cu/'.$_FILES['cu_photo']['name']);
			$cu_photo = $_FILES['cu_photo'] ['name'];
			$m->set_data('cu_fname',$cu_fname);
			$m->set_data('cu_lname',$cu_lname);
			$m->set_data('cu_phone',$cu_phone);
			$m->set_data('cu_email',$cu_email);
			$m->set_data('cu_dob',$cu_dob);
			$m->set_data('cu_gender',$cu_gender);
			$m->set_data('cu_photo',$cu_photo);
				
			$a = array(
				'cu_fname'=>$m->get_data('cu_fname'),
				'cu_lname'=>$m->get_data('cu_lname'),
				'cu_phone'=>$m->get_data('cu_phone'),
				'cu_email'=>$m->get_data('cu_email'),
				'cu_dob'=>$m->get_data('cu_dob'),
				'cu_gender'=>$m->get_data('cu_gender'),
				'cu_photo'=>$m->get_data('cu_photo'),
				
			);
			$q=$d->insert("customer",$a);
			if($q>0){
				$_SESSION['msgSuccess']="Customer Added";
				header("location:customer_table.php");
			}
			else{
				echo "Error";
			}
		}
	}
}
//customer add btn end

//dboy add btn start
if(isset($_POST['add_dboy'])){
	$file = $_FILES['db_idpro']['tmp_name'];
	if(file_exists($file))
	{
		echo "file exist";
		$errors = array();
		$maxsize = 2097152;
		$acceptable = array(
			'image/jpeg',
			'image/jpg',
			'image/png',
			'image/gif'
		);
		if(($_FILES['db_idpro']['size'] >= $maxsize) || ($_FILES["db_idpro"]["size"] == 0))
		{
			$errors[] = 'File too large. File must be less than 2 megabytes.';
		}
		if(!in_array($_FILES['db_idpro']['type'], $acceptable) && (!empty($_FILES["db_idpro"]["type"])))
		{
			$errors[] = 'Invalid files type. JPEG, JPG, GIF and PNG types are accepted';
		}
		if(count($errors) === 0)
		{
			move_uploaded_file($_FILES['db_idpro']['tmp_name'], 'photo/db/'.$_FILES['db_idpro']['name']);
			$db_idpro = $_FILES['db_idpro'] ['name'];

			$m->set_data('db_fname',$db_fname);
			$m->set_data('db_lname',$db_lname);
			$m->set_data('db_phone',$db_phone);
			$m->set_data('db_email',$db_email);
			$m->set_data('db_dob',$db_dob);
			$m->set_data('db_gender',$db_gender);
			$m->set_data('db_idpro',$db_idpro);
			
			$a = array(
				'db_fname'=>$m->get_data('db_fname'),
				'db_lname'=>$m->get_data('db_lname'),
				'db_phone'=>$m->get_data('db_phone'),
				'db_email'=>$m->get_data('db_email'),
				'db_dob'=>$m->get_data('db_dob'),
				'db_gender'=>$m->get_data('db_gender'),
				'db_idpro'=>$m->get_data('db_idpro'),
				
			);
			$q=$d->insert("deliveryboy",$a);
			if($q>0){
				$_SESSION['msgSuccess']="Delivery Boy Added";
				header("location:dboy_table.php");
			}
			else{
				echo "Error";
			}
		}
	}
}
//dboy add btn end

//category add btn start
if(isset($_POST['cat_add'])){
	$file = $_FILES['c_photo']['tmp_name'];
	if(file_exists($file))
	{
		echo "file exist";
		$errors = array();
		$maxsize = 2397152;
		$acceptable = array(
			'image/jpeg',
			'image/jpg',
			'image/png',
			'image/gif'
		);
		if(($_FILES['c_photo']['size'] >= $maxsize) || ($_FILES["c_photo"]["size"] == 0))
		{
			$errors[] = 'File too large. File must be less than 2 megabytes.';
		}
		if(!in_array($_FILES['c_photo']['type'], $acceptable) && (!empty($_FILES["c_photo"]["type"])))
		{
			$errors[] = 'Invalid files type. JPEG, JPG, GIF and PNG types are accepted';
		}
		if(count($errors) === 0)
		{
			move_uploaded_file($_FILES['c_photo']['tmp_name'], 'photo/category/'.$_FILES['c_photo']['name']);
			$c_photo = $_FILES['c_photo'] ['name'];

	$m->set_data('c_name',$c_name);
	$m->set_data('c_photo',$c_photo);

	$a = array(
		'c_name'=>$m->get_data('c_name'),
		'c_photo'=>$m->get_data('c_photo'),
	);
	$q=$d->insert("category",$a);
	if($q>0){
		$_SESSION['msgSuccess']="Category Added";
		header("location:category_table.php");
	}
	else{
		echo "Error";
	}
}
}}

//category add btn end

//subcategory add btn start
if(isset($_POST['sub_add'])){
	$file = $_FILES['sub_photo']['tmp_name'];
	if(file_exists($file))
	{
		echo "file exist";
		$errors = array();
		$maxsize = 5297152;
		$acceptable = array(
			'image/jpeg',
			'image/jpg',
			'image/png',
			'image/gif'
		);
		if(($_FILES['sub_photo']['size'] >= $maxsize) || ($_FILES["sub_photo"]["size"] == 0))
		{
			$errors[] = 'File too large. File must be less than 2 megabytes.';
		}
		if(!in_array($_FILES['sub_photo']['type'], $acceptable) && (!empty($_FILES["sub_photo"]["type"])))
		{
			$errors[] = 'Invalid files type. JPEG, JPG, GIF and PNG types are accepted';
		}
		if(count($errors) === 0)
		{
			move_uploaded_file($_FILES['sub_photo']['tmp_name'], 'photo/subcategory/'.$_FILES['sub_photo']['name']);
			$sub_photo = $_FILES['sub_photo'] ['name'];

	$m->set_data('sub_name',$sub_name);
	$m->set_data('sub_description',$sub_description);
	$m->set_data('sub_photo',$sub_photo);
	$m->set_data('c_id',$c_id);
	$a = array(
		'sub_name' => $m->get_data('sub_name'),
		'sub_description' => $m->get_data('sub_description'),
		'sub_photo' => $m->get_data('sub_photo'),
		'c_id' => $m->get_data('c_id'),
	);
	$q = $d->insert('subcategory', $a);
	if($q>0){
		$_SESSION['msgSuccess']="Sub-category added";
		header('location:subcategory_table.php');
	}
	else{
		echo "ERROR";
	}
}
}
}
//subcategory add btn end

//product add btn start
if(isset($_POST['p_add'])){
	$file = $_FILES['p_photo']['tmp_name'];
	if(file_exists($file))
	{
		echo "file exist";
		$errors = array();
		$maxsize = 20097152;
		$acceptable = array(
			'image/jpeg',
			'image/jpg',
			'image/png',
			'image/gif'
		);
		if(($_FILES['p_photo']['size'] >= $maxsize) || ($_FILES["p_photo"]["size"] == 0))
		{
			$errors[] = 'File too large. File must be less than 2 megabytes.';
		}
		if(!in_array($_FILES['p_photo']['type'], $acceptable) && (!empty($_FILES["p_photo"]["type"])))
		{
			$errors[] = 'Invalid files type. JPEG, JPG, GIF and PNG types are accepted';
		}
		if(count($errors) === 0)
		{
			move_uploaded_file($_FILES['p_photo']['tmp_name'], 'photo/product/'.$_FILES['p_photo']['name']);
			$p_photo = $_FILES['p_photo'] ['name'];

	$m->set_data('p_name',$p_name);
	$m->set_data('p_description',$p_description);
	$m->set_data('p_photo',$p_photo);
	$m->set_data('sub_id',$sub_id);
	$m->set_data('b_id',$b_id);
	$m->set_data('p_price',$p_price);
	$a = array(
		'p_name' => $m->get_data('p_name'),
		'p_description' => $m->get_data('p_description'),
		'p_photo' => $m->get_data('p_photo'),
		'sub_id' => $m->get_data('sub_id'),
		'b_id' => $m->get_data('b_id'),
		'p_price' => $m->get_data('p_price')
	);
	$q = $d->insert('product', $a);
	if($q>0){
		$_SESSION['msgSuccess']="Product added";
		header('location:product_table.php');
	}
	else{
		echo "ERROR";
	}
}
}
}
//rg pack add btn start
if(isset($_POST['rg_add'])){
	$m->set_data('rg_name',$rg_name);
	$m->set_data('rg_price',$rg_price);
	$m->set_data('rg_duration',$rg_duration);
	$m->set_data('rg_discription',$rg_discription);
	$a = array(
		'rg_name'=>$m->get_data('rg_name'),
		'rg_price'=>$m->get_data('rg_price'),
		'rg_duration'=>$m->get_data('rg_duration'),
		'rg_discription'=>$m->get_data('rg_discription'),
	);
	$q=$d->insert("registration_package",$a);
	if($q>0){
		$_SESSION['msgSuccess']="Registration Package Added";
		header("location:package_table.php");
	}
	else{
		echo "Error";
	}
}
//rg pack add btn end

//faq add btn start
if(isset($_POST['faq_add'])){
	$m->set_data('faq_question',$faq_question);
	$m->set_data('faq_answer',$faq_answer);
	$a = array(
		'faq_question'=>$m->get_data('faq_question'),
		'faq_answer'=>$m->get_data('faq_answer'),
	);
	$q=$d->insert("faq",$a);
	if($q>0){
		$_SESSION['msgSuccess']="FAQ Added";
		header("location:faq_table.php");
	}
	else{
		echo "Error";
	}
}
//faq add btn end

//faq delete start
if(isset($_POST['faq_del'])){
	$q=$d->delete("faq","faq_id='$faq_id'");
	if($q>0){
		header("location:faq_table.php");
	}else{
		"Error";
	}
}
//faq delete end

//feedback delete start
if(isset($_POST['feed_del'])){
	$q=$d->delete("feedback","f_id='$f_id'");
	if($q>0){
		header("location:feedback_table.php");
	}else{
		"Error";
	}
}
//feedback delete end

//pack delete start
if(isset($_POST['pack_del'])){
	$q=$d->delete("registration_package","rg_id='$rg_id'");
	if($q>0){
		header("location:package_table.php");
	}else{
		"Error";
	}
}
//pack delete end

//product delete start
if(isset($_POST['product_del'])){
	$q=$d->delete("product","p_id='$p_id'");
	if($q>0){
		header("location:product_table.php");
	}else{
		"Error";
	}
}
//product delete end

//subcategory delete start
if(isset($_POST['subcategory_del'])){
	$q=$d->delete("subcategory","sub_id='$sub_id'");
	if($q>0){
		header("location:subcategory_table.php");
	}else{
		"Error";
	}
}
//subcategory delete end

//category delete start
if(isset($_POST['category_del'])){
	$q=$d->delete("category","c_id='$c_id'");
	if($q>0){
		header("location:category_table.php");
	}else{
		"Error";
	}
}
//category delete end

//delivery boy delete start
if(isset($_POST['db_del'])){
	$q=$d->delete("deliveryboy","db_id='$db_id'");
	if($q>0){
		header("location:dboy_table.php");
	}else{
		"Error";
	}
}
//delivery boy delete end

//customer delete start
if(isset($_POST['cu_del'])){
	$q=$d->delete("customer","cu_id='$cu_id'");
	if($q>0){
		header("location:customer_table.php");
	}else{
		"Error";
	}
}
//customer delete end

//baker delete start
if(isset($_POST['baker_del'])){
	$q=$d->delete("baker","b_id='$b_id'");
	if($q>0){
		header("location:baker_table.php");
	}else{
		"Error";
	}
}
//baker delete end

//faq edit start
if(isset($_POST['faq_update'])){
	$m->set_data('faq_question',$faq_question);
	$m->set_data('faq_answer',$faq_answer);
	$a=array(
		'faq_question'=>$m->get_data('faq_question') ,
		'faq_answer'=>$m->get_data('faq_answer'),
	);
	$q=$d->update("faq",$a,"faq_id='$faq_id'");
	if($q>0){
		header("location:faq_table.php");
	}
	else{
		echo "Error";
	}
}
//faq edit end

//pack edit start
if(isset($_POST['pack_update'])){
	$m->set_data('rg_name',$rg_name);
	$m->set_data('rg_price',$rg_price);
	$m->set_data('rg_duration',$rg_duration);
	$m->set_data('rg_discription',$rg_discription);
	$a = array(
		'rg_name'=>$m->get_data('rg_name'),
		'rg_price'=>$m->get_data('rg_price'),
		'rg_duration'=>$m->get_data('rg_duration'),
		'rg_discription'=>$m->get_data('rg_discription')
	);
	$q=$d->update("registration_package",$a,"rg_id='$rg_id'");
	if($q>0){
		header("location:package_table.php");
	}
	else{
		echo "Error";
	}
}
//pack edit end

//subcategory edit start

if(isset($_POST['sub_update'])){
	$file = $_FILES['sub_photo']['tmp_name'];
	if(file_exists($file))
	{
		echo "file exist";
		$errors = array();
		$maxsize = 2097152;
		$acceptable = array(
			'image/jpeg',
			'image/jpg',
			'image/png',
			'image/gif'
		);
		if(($_FILES['sub_photo']['size'] >= $maxsize) || ($_FILES["sub_photo"]["size"] == 0))
		{
			$errors[] = 'File too large. File must be less than 2 megabytes.';
		}
		if(!in_array($_FILES['sub_photo']['type'], $acceptable) && (!empty($_FILES["sub_photo"]["type"])))
		{
			$errors[] = 'Invalid files type. JPEG, JPG, GIF and PNG types are accepted';
		}
		if(count($errors) === 0)
		{
			move_uploaded_file($_FILES['sub_photo']['tmp_name'], 'photo/subcategory/'.$_FILES['sub_photo']['name']);
			$sub_photo = $_FILES['sub_photo'] ['name'];
	$m->set_data('sub_name',$sub_name);
	$m->set_data('sub_description',$sub_description);
	$m->set_data('sub_photo',$sub_photo);
	$a = array(
		'sub_name' => $m->get_data('sub_name'),
		'sub_description' => $m->get_data('sub_description'),
		'sub_photo' => $m->get_data('sub_photo'),
	);
	$q=$d->update("subcategory",$a,"sub_id='$sub_id'");
	if($q>0){
		header("location:subcategory_table.php");
	}
	else{
		echo "Error";
	}
}
}
}
//subcategory edit end

//category update start
if(isset($_POST['category_update'])){
	$file = $_FILES['c_photo']['tmp_name'];
	if(file_exists($file))
	{
		echo "file exist";
		$errors = array();
		$maxsize = 2097152;
		$acceptable = array(
			'image/jpeg',
			'image/jpg',
			'image/png',
			'image/gif'
		);
		if(($_FILES['c_photo']['size'] >= $maxsize) || ($_FILES["c_photo"]["size"] == 0))
		{
			$errors[] = 'File too large. File must be less than 2 megabytes.';
		}
		if(!in_array($_FILES['c_photo']['type'], $acceptable) && (!empty($_FILES["c_photo"]["type"])))
		{
			$errors[] = 'Invalid files type. JPEG, JPG, GIF and PNG types are accepted';
		}
		if(count($errors) === 0)
		{
			move_uploaded_file($_FILES['c_photo']['tmp_name'], 'photo/category/'.$_FILES['c_photo']['name']);
			$c_photo = $_FILES['c_photo'] ['name'];
	$m->set_data('c_name',$c_name);
	$m->set_data('c_photo',$c_photo);
	$a = array(
		'c_name'=>$m->get_data('c_name'),
		'c_photo'=>$m->get_data('c_photo'),
	);
	$q=$d->update("category",$a,"c_id='$c_id'");
	if($q>0){
		header("location:category_table.php");
	}
	else{
		echo "Error";
	}
}
}
}
//category update end

//dboy update start
if(isset($_POST['db_update'])){
	$file = $_FILES['db_idpro']['tmp_name'];
	if(file_exists($file))
	{
		echo "file exist";
		$errors = array();
		$maxsize = 2097152;
		$acceptable = array(
			'image/jpeg',
			'image/jpg',
			'image/png',
			'image/gif'
		);
		if(($_FILES['db_idpro']['size'] >= $maxsize) || ($_FILES["db_idpro"]["size"] == 0))
		{
			$errors[] = 'File too large. File must be less than 2 megabytes.';
		}
		if(!in_array($_FILES['db_idpro']['type'], $acceptable) && (!empty($_FILES["db_idpro"]["type"])))
		{
			$errors[] = 'Invalid files type. JPEG, JPG, GIF and PNG types are accepted';
		}
		if(count($errors) === 0)
		{
			move_uploaded_file($_FILES['db_idpro']['tmp_name'], 'photo/db/'.$_FILES['db_idpro']['name']);
			$db_idpro = $_FILES['db_idpro'] ['name'];

	$m->set_data('db_fname',$db_fname);
	$m->set_data('db_lname',$db_lname);
	$m->set_data('db_phone',$db_phone);
	$m->set_data('db_email',$db_email);
	$m->set_data('db_dob',$db_dob);
	//$m->set_data('db_gender',$db_gender);
	$m->set_data('db_idpro',$db_idpro);
	
	$a = array(
		'db_fname'=>$m->get_data('db_fname'),
		'db_lname'=>$m->get_data('db_lname'),
		'db_phone'=>$m->get_data('db_phone'),
		'db_email'=>$m->get_data('db_email'),
		'db_dob'=>$m->get_data('db_dob'),
		//'db_gender'=>$m->get_data('db_gender'),
		'db_idpro'=>$m->get_data('db_idpro'),
		
	);
	$q=$d->update("deliveryboy",$a,"db_id='$db_id'");
	//$q=$d->update("category",$a,"c_id='$c_id'");
	if($q>0){
		//$_SESSION['msgSuccess']="Delivery Boy Added";
		header("location:dboy_table.php");
	}
	else{
		echo "Error";
	}
}
}
}
//dboy update end

//customer update start
if(isset($_POST['cu_update'])){
	$file = $_FILES['cu_photo']['tmp_name'];
	if(file_exists($file))
	{
		echo "file exist";
		$errors = array();
		$maxsize = 2097152;
		$acceptable = array(
			'image/jpeg',
			'image/jpg',
			'image/png',
			'image/gif'
		);
		if(($_FILES['cu_photo']['size'] >= $maxsize) || ($_FILES["cu_photo"]["size"] == 0))
		{
			$errors[] = 'File too large. File must be less than 2 megabytes.';
		}
		if(!in_array($_FILES['cu_photo']['type'], $acceptable) && (!empty($_FILES["cu_photo"]["type"])))
		{
			$errors[] = 'Invalid files type. JPEG, JPG, GIF and PNG types are accepted';
		}
		if(count($errors) === 0)
		{
			move_uploaded_file($_FILES['cu_photo']['tmp_name'], 'photo/cu/'.$_FILES['cu_photo']['name']);
			$cu_photo = $_FILES['cu_photo'] ['name'];
	$m->set_data('cu_fname',$cu_fname);
	$m->set_data('cu_lname',$cu_lname);
	$m->set_data('cu_phone',$cu_phone);
	$m->set_data('cu_email',$cu_email);
	$m->set_data('cu_dob',$cu_dob);
	//$m->set_data('cu_gender',$cu_gender);
	$m->set_data('cu_photo',$cu_photo);	
	$a = array(
		'cu_fname'=>$m->get_data('cu_fname'),
		'cu_lname'=>$m->get_data('cu_lname'),
		'cu_phone'=>$m->get_data('cu_phone'),
		'cu_email'=>$m->get_data('cu_email'),
		'cu_dob'=>$m->get_data('cu_dob'),
		//'cu_gender'=>$m->get_data('cu_gender'),
		'cu_photo'=>$m->get_data('cu_photo'),
		
	);
	$q=$d->update("customer",$a,"cu_id='$cu_id'");
	//$q=$d->update("category",$a,"c_id='$c_id'");
	if($q>0){
		//$_SESSION['msgSuccess']="Delivery Boy Added";
		header("location:customer_table.php");
	}
	else{
		echo "Error";
	}
}}}
//customer update end

//baker update btn start
if(isset($_POST['baker_update'])){

	$file = $_FILES['b_photo']['tmp_name'];
	if(file_exists($file))
	{
		echo "file exist";
		$errors = array();
		$maxsize = 2097152;
		$acceptable = array(
			'image/jpeg',
			'image/jpg',
			'image/png',
			'image/gif'
		);
		if(($_FILES['b_photo']['size'] >= $maxsize) || ($_FILES["b_photo"]["size"] == 0))
		{
			$errors[] = 'File too large. File must be less than 2 megabytes.';
		}
		if(!in_array($_FILES['b_photo']['type'], $acceptable) && (!empty($_FILES["b_photo"]["type"])))
		{
			$errors[] = 'Invalid files type. JPEG, JPG, GIF and PNG types are accepted';
		}
		if(count($errors) === 0)
		{
			move_uploaded_file($_FILES['b_photo']['tmp_name'], 'photo/baker/'.$_FILES['b_photo']['name']);
			$b_photo = $_FILES['b_photo']['name'];
			$m->set_data('b_fname',$b_fname);
			$m->set_data('b_lname',$b_lname);
			//$m->set_data('rg_id',$rg_id);
			$m->set_data('b_phone',$b_phone);
			$m->set_data('b_email',$b_email);
			$m->set_data('b_dob',$b_dob);
			//$m->set_data('b_gender',$b_gender);
			$m->set_data('b_photo',$b_photo);
			$m->set_data('b_address',$b_address);
			$m->set_data('b_city',$b_city);
			$m->set_data('b_pincode',$b_pincode);
			$m->set_data('b_bname',$b_bname);
			
	$a = array(
		'b_fname'=>$m->get_data('b_fname'),
		'b_lname'=>$m->get_data('b_lname'),
		//'rg_id'=>$m->get_data('rg_id'),
		'b_phone'=>$m->get_data('b_phone'),
		'b_email'=>$m->get_data('b_email'),
		'b_dob'=>$m->get_data('b_dob'),
		//'b_gender'=>$m->get_data('b_gender'),
		'b_photo'=>$m->get_data('b_photo'),
		'b_address'=>$m->get_data('b_address'),
		'b_city'=>$m->get_data('b_city'),
		'b_pincode'=>$m->get_data('b_pincode'),
		'b_bname'=>$m->get_data('b_bname'),
	);
	$q=$d->update("baker",$a,"b_id='$b_id'");
	//$q=$d->update("category",$a,"c_id='$c_id'");
	if($q>0){
		//$_SESSION['msgSuccess']="Delivery Boy Added";
		header("location:baker_table.php");
	}
	else{
		echo "Error";
	}
}
}
}
//baker update btn end

//feedback reply start
if(isset($_POST['feed_update'])){
	$m->set_data('f_reply',$f_reply);
	$a = array(
		'f_reply' => $m->get_data('f_reply'),		
	);
	$q=$d->update("feedback",$a,"f_id='$f_id'");
	if($q>0){
		header("location:feedback_table.php");
	}
	else{
		echo "Error";
	}
}
//feedback reply end




?>