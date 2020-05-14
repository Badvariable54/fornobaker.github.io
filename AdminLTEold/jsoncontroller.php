<?php
session_start();
require('PHPMailer-master/src/PHPMailer.php');
require('PHPMailer-master/src/SMTP.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include "lib/dao.php";
include "lib/model.php";

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methos:GET,PUT,POST,DELETE,OPTIONS');
header('Access-Control-Max-Age: 1000');
header('content-type:application/json; charset=utf-8');
header('Access-Control-Allow-Headers: Content-type, Content-Range,Content_Disposition,Content-Description');

define('UPLOAD_DIR','photo/product/');
define('UPLOAD_DIR1','photo/customer/');
define('UPLOAD_DIR2','photo/baker/');
define('UPLOAD_DIR3','photo/dboy/');

$mail = new PHPMailer(TRUE);
$mail->IsSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPDebug=1;
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Port = 587;
$mail->Username = "rajeshree161268@gmail.com";
$mail->Password = "shahmnp418";//password
$mail->setFrom("rejeshree161268@gmail.com","name/title");

$d = new dao();
$m = new model();
extract($_POST);
extract($_GET);

//customer Login/signin start
if(isset($_GET['cust_signin'])){
	if(isset($_POST) && !empty($_POST)){
		$cu_email= $_POST['cu_email'];
		$cu_password = $_POST['cu_password'];
		$q=$d->select("customer","cu_email='$cu_email' AND cu_password='$cu_password'");		
		$data = mysqli_fetch_array($q);
		if($data>0)
		{
			$cu_id = $data['cu_id'];
			$cu_fname = $data['cu_fname'];
			$cu_lname = $data['cu_lname'];
			$cu_email = $data['cu_email'];
			$cu_phone = $data['cu_phone'];
			$cu_dob = $data['cu_dob'];
			$cu_photo = $data['cu_photo'];
			$response["success"] = 1;
			$response["cu_id"]= $cu_id;
			$response["cu_fname"] = $cu_fname;
			$response["cu_lname"] = $cu_lname;
			$response["cu_email"] = $cu_email;
			$response["cu_phone"] = $cu_phone;
			$response["cu_dob"] = $cu_dob;
			$response["cu_photo"] = $cu_photo;
			$response["message"] = "Login sucessfully";
			echo json_encode($response);
		}else{
				$response["success"]=0;
				$response["message"]="oops ! an Error Occurred";
				echo json_encode($response);
			}	
	}	
}
//customer Logoin/signin end

//customer Signup/register start
if (isset($_GET['cust_signup'])) {
	if(isset($_POST) && !empty($_POST)){
		try{
			if(isset($_POST['cu_fname']) && isset($_POST['cu_lname']) &&
				isset($_POST['cu_email']) && isset($_POST['cu_phone']) &&
				isset($_POST['cu_dob']) && isset($_POST['cu_password']) &&
				isset($_POST['cu_gender']) && isset($_POST['cu_photo'])){
				extract($_POST);
				$q = $d -> select("customer","cu_email='$cu_email'");
				$data = mysqli_fetch_array($q);
				if($data>0){
					$response["success"]=0;
					$response["message"]="Email is alread register";
					echo json_encode($response);
				}else{
					$last_auto_id = $d->last_auto_id("cu_id");
					$res = mysqli_fetch_array($last_auto_id);
					$cu_id=$res['Auto_increment'];

					$basepath="http://192.168.43.181/AdminLTEold/";

					$img = $_POST['cu_photo'];
					$img = str_replace('data:img/png;base64,','',$img);
					$img = str_replace('','+',$img);
					$data = base64_decode($img);
					$img_name = $cu_fname . '.png';
					$file = UPLOAD_DIR1 . $img_name;
					$success = file_put_contents($file,$data);
					move_uploaded_file($file,'/photo/customer/'.$file);

					$m->set_data('cu_fname',$cu_fname);
					$m->set_data('cu_lname',$cu_lname);
					$m->set_data('cu_email',$cu_email);
					$m->set_data('cu_phone',$cu_phone);
					$m->set_data('cu_dob',$cu_dob);					
					$m->set_data('cu_password',$cu_password);
					$m->set_data('cu_gender',$cu_gender);
					$m->set_data('cu_photo',$basepath.$file);

					$a1 = array('cu_fname' => $m->get_data('cu_fname'),
								'cu_lname' => $m->get_data('cu_lname'),
								'cu_email' => $m->get_data('cu_email'),
								'cu_phone' => $m->get_data('cu_phone'),
								'cu_dob' => $m->get_data('cu_dob'),								
								'cu_password' => $m->get_data('cu_password'),
								'cu_gender' => $m->get_data('cu_gender'),
								'cu_photo' => $m->get_data('cu_photo'),
								);

					$insert = $d -> insert('customer',$a1);
					if($insert>0){
						$response["cu_fname"]=$cu_fname;
						$response["cu_lname"]=$cu_lname;
						$response["cu_email"]=$cu_email;
						$response["cu_phone"]=$cu_phone;
						$response["cu_dob"]=$cu_dob;						
						$response["cu_password"]=$cu_password;
						$response["cu_gender"]=$cu_gender;
						$response["cu_photo"]=$cu_photo;
						$response["success"]=1;
						$response["message"]="Registered successfully";
						echo json_encode($response);
					}else{
						$response["success"]=0;
						$response["message"]="Opps! an Error Occurred";
						echo json_encode($response);
					}
				}
			}else{
				$response["success"]=0;
				$response["message"]="Reqired fild(s) is missing";
				echo json_encode($response);
			}
		}catch(Exception $e){
			$response["exception"] = $e->getMessage();
			echo json_encode($response);
		}
	}
}
//customer Signup/register end

//customer edit profile start
if (isset($_GET['cust_updateprofile'])) {
	if(isset($_POST) && !empty($_POST))
	{
		try{
			if(isset($_POST['cu_id']) && isset($_POST['cu_fname'])
				&& isset($_POST['cu_lname']) && isset($_POST['cu_phone'])
				&& isset($_POST['cu_dob']) && isset($_POST['cu_photo']))
			{				
				$basepath="http://192.168.43.181/AdminLTEold/";

				$img = $_POST['cu_photo'];
				$img = str_replace('data:img/png;base64,','',$img);
				$img = str_replace('','+',$img);
				$data = base64_decode($img);
				$img_name =$cu_id . $cu_fname . '.png';
				$file = UPLOAD_DIR1 . $img_name;
				$success = file_put_contents($file,$data);
				move_uploaded_file($file,'/photo/customer/'.$file);

				$m->set_data('cu_id',$cu_id);
				$m->set_data('cu_fname',$cu_fname);
				$m->set_data('cu_lname',$cu_lname);				
				$m->set_data('cu_phone',$cu_phone);
				$m->set_data('cu_dob',$cu_dob);
				$m->set_data('cu_photo',$basepath.$file);

				$a1 = array('cu_id' => $m->get_data('cu_id'),
							'cu_fname' => $m->get_data('cu_fname'),
							'cu_lname' => $m->get_data('cu_lname'),
							'cu_phone' => $m->get_data('cu_phone'),
							'cu_dob' => $m->get_data('cu_dob'),
							'cu_photo' => $m->get_data('cu_photo'),
						);

				$update = $d-> update('customer',$a1,"cu_id='$cu_id'");

				if ($update>0) {
					$response["cu_id"] = $cu_id;
					$response["cu_fname"] = $cu_fname;
					$response["cu_lname"] = $cu_lname;
					$response["cu_phone"] = $cu_phone;
					$response["cu_dob"] = $cu_dob;
					$response["cu_photo"] = $cu_photo;
					$response["success"]=1;
					$response["message"]="customer edit profile successfully";
					echo json_encode($response);
				} else{
					$response["success"]=0;
					$response["message"]="Oops! an Error Occurred";
					echo json_encode($response);
				}
			} else{
				$response["success"] = 0;
				$response["message"] = "Reqired fild(s) is missing";
				echo json_encode($response);
			}
		}catch(Exception $e){
			$response["exception"] = $e->getMessage();
			echo json_encode($response);
		}
	}
}
//customer edit profile end

//customer forgot password start
if(isset($_GET['cust_forgotpassword'])){
	if(isset($_POST)&& !empty($_POST)){
		$cu_email = $_POST['cu_email'];

		$q = $d->select("customer","cu_email='$cu_email'");
		$data= mysqli_fetch_array($q);
		if($data>0){
			$cu_email = $data['cu_email'];
			//$cu_fname = $data['cu_fname'];
			$cu_id = $data['cu_id'];
			$cu_password = $data['cu_password'];

			$mail->Subject = "Documet Added";
			$body = "Dear Sir/Ma'am, <br> &nbsp;&nbsp;&nbsp;&nbsp; The document: has been submitted 		successfully. <br> Thank you for using Trincsoft.com";
			$mail->msgHTML($body);
			$address = $cu_email;
			$mail->addAddress($address);
			$mail->send();
		
			$response["success"]=1;
			$response["message"]="Documet Uploaded successfully";
			echo json_encode($response);

			/*$subject = "Forgot passoword";
			$txt = "Hello $cu_fname , your account password is : $cu_password";
			$headers = "From: shahmeeto1o82o@gmail.com";
			if(mail($cu_email,$subject,$txt,$headers)){
				$response['success']="success";
				$response['cu_fname']=$cu_fname;
				$response['cu_email']=$cu_email;
				$response['cu_password']=$cu_password;
				echo json_encode($response);
			} else{
				$response['fail']="fail";
				echo json_encode($response);
			}
		} else{
			$response["success"]=0;
			$response["message"]="Your account is not register";
			echo json_encode($response);
		}*/
	}
}
}
//customer forgot password end

//customer display all category start
if(isset($_GET['cust_category'])){
	//http://192.168.43.117/AdminLTEold/photo/product/1ChocoChippastry.png
	$basepath="http://192.168.43.117/AdminLTEold/photo/category/";
	$q = $d->select("category","");
	if(mysqli_num_rows($q)>0){
		$response["category"]= array();
		while ($row = mysqli_fetch_array($q)) {
			$category = array();
			$category["c_id"]=$row["c_id"];
			$category["c_name"]=$row["c_name"];
			$category["c_photo"]=$basepath.$row["c_photo"];
			array_push($response["category"],$category);
		}$response["success"]=1;
		echo json_encode($response);
	}else{
		$response["success"]=0;
		$response["message"]="no category available";
		echo json_encode($response);
	}
}
//category diplay all category end

//customer display subcategory from category start
if(isset($_GET['cust_subcategory'])){
	if(isset($_POST) && !empty($_POST)){
		$c_id= $_POST['c_id'];			
		$q=$d->select("subcategory","c_id='$c_id'");
		$basepath="http://192.168.43.117/AdminLTEold/photo/subcategory/";
		if(mysqli_num_rows($q)>0){
		$response["subcategory"]= array();
		while ($row = mysqli_fetch_array($q)) {
			$subcategory = array();		
			$subcategory["sub_id"]=$row["sub_id"];
			$subcategory["sub_name"]=$row["sub_name"];
			$subcategory["sub_description"]=$row["sub_description"];
			$subcategory["sub_photo"]=$basepath.$row["sub_photo"];
			array_push($response["subcategory"],$subcategory);
		}	$response["success"]=1;
		echo json_encode($response);
		}else{
			$response["success"]=0;
			$response["message"]="no subcategory available";
			echo json_encode($response);
		}
	}
}
//customer display subcategory from category end

//customer display product from subcategory start
if(isset($_GET['cust_product'])){
	if(isset($_POST) && !empty($_POST)){
		$offerid;
		$sub_id= $_POST['sub_id'];
		$q=$d->select("product,subcategory","product.sub_id='$sub_id' AND product.sub_id = subcategory.sub_id  ");
		if(mysqli_num_rows($q)>0){
		$response["product"]= array();
		while ($row = mysqli_fetch_array($q)) {
			$product = array();			
			$product["p_id"]=$row["p_id"];
			$product["p_name"]=$row["p_name"];
			$product["p_description"]=$row["p_description"];
			$product["p_price"]=$row["p_price"];
			$product["p_photo"]=$row["p_photo"];
			$product["sub_id"]=$row["sub_id"];
			$product["b_id"]=$row["b_id"];
			$product["sub_name"]=$row["sub_name"];
			$product["of_id"]=$row["of_id"];
			$offerid=$row["of_id"];
			if ($offerid==null) {
				array_push($response["product"],$product);				
			}else{
				$que = $d->select("offer","of_id='$offerid'");
				if(mysqli_num_rows($que)>0){
					while ($row = mysqli_fetch_array($que)) {
						$product["of_description"]=$row["of_description"];
						$product["of_start"]=$row["of_start"];
						$product["of_end"]=$row["of_end"];
						$product["of_percentage"]=$row["of_percentage"];
					}
				}
				array_push($response["product"],$product);
			}			
		}	$response["success"]=1;
		echo json_encode($response);
		}else{
			$response["success"]=0;
			$response["message"]="no product available";
			echo json_encode($response);
		}
	}
}
//customer display product from subcategory end

//customer give feedback to baker and admin start
if (isset($_GET['cust_givefeedback'])) {
	if(isset($_POST) && !empty($_POST)){
		$m -> set_data('cu_id',$cu_id);
		$m -> set_data('f_feedback',$f_feedback);

		$a = array('cu_id'=>$m->get_data('cu_id'),
				'f_feedback'=>$m->get_data('f_feedback'),);
		$q=$d->insert("feedback",$a);
		if($q>0){
			$response["success"]=1;
			$response["message"]="feedback added";
			echo json_encode($response);
		}else{
			$response["success"]=0;
			$response["message"]="Error";
			echo json_encode($response);
		}
	}
}
//customer give feedback to baker and admin end

//customer display feedback and reply start
if(isset($_GET['cust_displayfeedback'])){
	if(isset($_POST) && !empty($_POST)){
		$cu_id= $_POST['cu_id'];			
		$q=$d->select("feedback","cu_id='$cu_id'");

		if(mysqli_num_rows($q)>0){
		$response["feedback"]= array();
		while ($row = mysqli_fetch_array($q)) {
			$feedback = array();		
			$feedback["f_id"]=$row["f_id"];
			$feedback["cu_id"]=$row["cu_id"];
			$feedback["f_feedback"]=$row["f_feedback"];
			$feedback["f_reply"]=$row["f_reply"];			
			array_push($response["feedback"],$feedback);
		}	$response["success"]=1;
		echo json_encode($response);
		}else{
			$response["success"]=0;
			$response["message"]="no feedback available";
			echo json_encode($response);
		}
	}
}
//customer display feedback and reply end

//customer display all baker start
if(isset($_GET['cust_baker'])){
	//$basepath="http://192.168.43.181/AdminLTEold/photo/baker/";
	$q = $d->select("baker","");
	if(mysqli_num_rows($q)>0){
		$response["baker"]= array();
		while ($row = mysqli_fetch_array($q)) {
			$baker = array();
			$baker["b_id"]=$row["b_id"];
			$baker["b_bname"]=$row["b_bname"];
			$baker["b_photo"]=$row["b_photo"];
			//$baker["c_photo"]=$basepath.$row["c_photo"];
			array_push($response["baker"],$baker);
		}$response["success"]=1;
		echo json_encode($response);
	}else{
		$response["success"]=0;
		$response["message"]="no baker available";
		echo json_encode($response);
	}
}
//category diplay all baker end

//customer give order start
if (isset($_GET['cust_giveorder'])) {
	if(isset($_POST) && !empty($_POST))
	{
		$last_auto_id = $d ->last_auto_id("o_id");
		$res=mysqli_fetch_array($last_auto_id);
		$o_id = $res['Auto_increment'];

		$m -> set_data('cu_id',$cu_id);
		//$m -> set_data('b_id',$b_id);
		$m -> set_data('o_total',$o_total);
		$m -> set_data('o_date',$o_date);
		$m -> set_data('o_time',$o_time);

		$a1 = array('cu_id'=>$m->get_data('cu_id'),
					//'b_id'=>$m->get_data('b_id'),
					'o_total'=>$m->get_data('o_total'),
					'o_date'=>$m->get_data('o_date'),
					'o_time'=>$m->get_data('o_time'),
					);

		$insert = $d-> insert('orders',$a1);

		if ($insert>0) {
			$response["cu_id"] = $cu_id;
			$response["o_total"] = $o_total;
			$response["o_date"] = $o_date;
			$response["o_time"] = $o_time;
			$response["success"]=1;
			$response["message"]="order added";
			echo json_encode($response);
		} else{
			$response["success"]=0;
			$response["message"]="Oops! an Error Occurred";
			echo json_encode($response);
		}
	}
}
//customer give order end

//customer display orders data
if(isset($_GET['cust_displayorderdata'])){
	if(isset($_POST) && !empty($_POST)){
		$cu_id= $_POST['cu_id'];
		$o_date = $_POST['o_date'];
		$o_time = $_POST['o_time'];
		$q=$d->select("orders","cu_id='$cu_id' AND o_date='$o_date' AND o_time = '$o_time'");
		$data = mysqli_fetch_array($q);
		if($data>0)
		{
			$o_id = $data['o_id'];
			$o_total = $data['o_total'];
			$response["success"] = 1;
			$response["o_id"]= $o_id;
			$response["o_total"] = $o_total;
			$response["message"] = "Order data";
			echo json_encode($response);
		}else{
				$response["success"]=0;
				$response["message"]="oops ! an Error Occurred";
				echo json_encode($response);
			}	
	}	
}
//customer display orders data

//customer give order details start
if (isset($_GET['cust_orderdetail'])) {
	if(isset($_POST) && !empty($_POST)){
		$m -> set_data('o_id',$o_id);
		$m -> set_data('p_id',$p_id);
		$m -> set_data('od_qty',$od_qty);
		$m -> set_data('od_price',$od_price);

		$a1 = array('o_id'=>$m->get_data('o_id'),
					'p_id'=>$m->get_data('p_id'),
					'od_qty'=>$m->get_data('od_qty'),
					'od_price'=>$m->get_data('od_price'),
					);
		$q=$d->insert("order_detail",$a1);
		if($q>0){
			$response["o_id"] = $o_id;
			$response["p_id"] = $p_id;
			$response["od_qty"] = $od_qty;
			$response["od_price"] = $od_price;
			$response["success"]=1;
			$response["message"]="orders details added";
			echo json_encode($response);
		}else{
			$response["success"]=0;
			$response["message"]="Error";
			echo json_encode($response);
		}
	}
}
//customer give order details end

//cusotmer delivery details start
if (isset($_GET['cust_deliverydetail'])) {
	if(isset($_POST) && !empty($_POST)){
		//$m -> set_data('cu_id',$cu_id);
		$m -> set_data('o_id',$o_id);
		$m -> set_data('cu_name',$cu_name);
		$m -> set_data('d_address',$d_address);
		$m -> set_data('d_city',$d_city);
		$m -> set_data('d_pincode',$d_pincode);
		$m -> set_data('d_paymethod',$d_paymethod);

		$a1 = array(//'cu_id'=>$m->get_data('cu_id'),
					'o_id'=>$m->get_data('o_id'),
					'cu_name'=>$m->get_data('cu_name'),
					'd_address'=>$m->get_data('d_address'),
					'd_city'=>$m->get_data('d_city'),
					'd_pincode'=>$m->get_data('d_pincode'),
					'd_paymethod'=>$m->get_data('d_paymethod'),
					);
		$q=$d->insert("delivery",$a1);
		if($q>0){
			//$response["cu_id"] = $cu_id;
			$response["o_id"] = $o_id;
			$response["cu_name"] = $cu_name;
			$response["d_address"] = $d_address;
			$response["d_city"] = $d_city;
			$response["d_pincode"] = $d_pincode;
			$response["d_paymethod"] = $d_paymethod;
			$response["success"]=1;
			$response["message"]="customer delivery details added";
			echo json_encode($response);
		}else{
			$response["success"]=0;
			$response["message"]="Error";
			echo json_encode($response);
		}
	}
}
//cusotmer delivery details end

//customer past orders order id start
if(isset($_GET['cust_pastorderid'])){
	if(isset($_POST) && !empty($_POST)){
		$cu_id= $_POST['cu_id'];
		$s_id = 3;
		$o_preparation_time = 0;
		$q = $d->select("orders,baker,deliveryboy,status","orders.db_id = deliveryboy.db_id AND
			orders.b_id = baker.b_id AND orders.cu_id='$cu_id' AND orders.s_id = '$s_id'
			AND orders.o_preparation_time = '$o_preparation_time' AND orders.s_id = status.s_id");
		if(mysqli_num_rows($q)>0){
			$response["order"]= array();
			while ($row = mysqli_fetch_array($q)) {
				$order = array();
				
					$order["o_id"]=$row["o_id"];
									
					array_push($response["order"],$order);
			}$response["success"]=1;
			echo json_encode($response);
		}else{
			$response["success"]=0;
			$response["message"]="no orders available";
			echo json_encode($response);
		}
	}
}
//customer past orders order id end

//customer past orders start
if(isset($_GET['cust_pastorders'])){
	if(isset($_POST) && !empty($_POST)){
		$cu_id= $_POST['cu_id'];
		$s_id = 3;
		$o_preparation_time = 0;
		$q = $d->select("orders,baker,deliveryboy,status","orders.db_id = deliveryboy.db_id AND
			orders.b_id = baker.b_id AND orders.cu_id='$cu_id' AND orders.s_id = '$s_id'
			AND orders.o_preparation_time = '$o_preparation_time' AND orders.s_id = status.s_id");
		if(mysqli_num_rows($q)>0){
			$response["orders"]= array();
			while ($row = mysqli_fetch_array($q)) {
				$orders = array();
				$prod = array();
					
					$orders["o_id"]=$row["o_id"];
					$orders["b_id"]=$row["b_id"];
					$orders["b_bname"]=$row["b_bname"];
					$orders["db_id"]=$row["db_id"];
					$orders["db_fname"]=$row["db_fname"];
					$orders["db_lname"]=$row["db_lname"];
					$orders["s_id"]=$row["s_id"];
					$orders["s_details"]=$row["s_details"];
					$orders["o_total"]=$row["o_total"];
					$orders["o_time"]=$row["o_time"];
					$orders["o_date"]=$row["o_date"];
					$orders["o_preparation_time"]=$row["o_preparation_time"];
					
					array_push($response["orders"],$orders);
			}$response["success"]=1;
			echo json_encode($response);
		}else{
			$response["success"]=0;
			$response["message"]="no orders available";
			echo json_encode($response);
		}
	}
}
//customer past orders end

//customer and baker display past order data start
if(isset($_GET['cust_pastodetails'])){ 
	if(isset($_POST) && !empty($_POST)){
		
		$o_id= $_POST['o_id'];
		$offer_idcheck;
		$q = $d->select("order_detail,product"," o_id='$o_id' AND order_detail.p_id = product.p_id ");
		if(mysqli_num_rows($q)>0){
			$response["order_detail"]= array();
			while ($row = mysqli_fetch_array($q)) {
				$order_detail = array();
				
					$order_detail["od_id"]=$row["od_id"];
					$order_detail["o_id"]=$row["o_id"];
					$order_detail["p_id"]=$row["p_id"];
					$order_detail["p_photo"]=$row["p_photo"];
					$order_detail["p_name"]=$row["p_name"];
					$order_detail["p_price"]=$row["p_price"];
					$order_detail["od_qty"]=$row["od_qty"];
					$order_detail["od_price"]=$row["od_price"];
					$order_detail["of_id"]=$row["of_id"];
					$offer_idcheck=$row["of_id"];
					if ($offer_idcheck==null) {
						array_push($response["order_detail"],$order_detail);
					}else{
						$que = $d->select("offer","of_id='$offer_idcheck'");
						if(mysqli_num_rows($que)>0){
							while ($row = mysqli_fetch_array($que)) {
								$order_detail["of_desc"]=$row["of_description"];
								$order_detail["of_per"]=$row["of_percentage"];
							}
						}
						array_push($response["order_detail"],$order_detail);
					}
					//array_push($response["order_detail"],$order_detail);
			}$response["success"]=1;
			echo json_encode($response);
		}else{
			$response["success"]=0;
			$response["message"]="no orders available";
			echo json_encode($response);
		}
	}
}
//customer order id to display order details end

//customer current orders order id start
if(isset($_GET['cust_currorderid'])){
	if(isset($_POST) && !empty($_POST)){
		$dbid;
		$sid;
		$cu_id= $_POST['cu_id'];
		$s_ids = 3;
		$o_preparation_time = 0;
		$q = $d->select("orders","orders.cu_id='$cu_id'
			AND orders.o_preparation_time != '$o_preparation_time'");
		if(mysqli_num_rows($q)>0){
			$response["curr_orderid"]= array();
			while ($row = mysqli_fetch_array($q)) {
				$curr_orderid = array();
				$prod = array();
					
					$curr_orderid["o_id"]=$row["o_id"];
					$curr_orderid["s_id"]=$row["s_id"];
					$curr_orderid["db_id"]=$row["db_id"];
					$dbid = $row["db_id"];
					$sid = $row["s_id"];

					if ($dbid == null && $sid == null ) {
						array_push($response["curr_orderid"],$curr_orderid);
					}
					else {
						if ($sid != $s_ids) {
							$que1 = $d->select("deliveryboy","db_id='$dbid'");
							if(mysqli_num_rows($que1)>0){
								while ($row = mysqli_fetch_array($que1)) {
									$curr_orderid["db_fname"]=$row["db_fname"];
									$curr_orderid["db_lname"]=$row["db_lname"];
								}
							}
							$que2 = $d->select("status","s_id='$sid'");
							if(mysqli_num_rows($que2)>0){
								while ($row = mysqli_fetch_array($que2)) {
									$curr_orderid["s_details"]=$row["s_details"];
								}
							}
							array_push($response["curr_orderid"],$curr_orderid);	
						}
					}
					
					//array_push($response["orders"],$orders);
			}$response["success"]=1;
			echo json_encode($response);
		}else{
			$response["success"]=0;
			$response["message"]="no orders available";
			echo json_encode($response);
		}
	}
}
//customer current orders order id end

//customer current orders start
if(isset($_GET['cust_currorders'])){
	if(isset($_POST) && !empty($_POST)){
		$dbid;
		$sid;
		$cu_id= $_POST['cu_id'];
		$s_ids = 3;
		$o_preparation_time = 0;
		$q = $d->select("orders,baker","orders.b_id = baker.b_id AND orders.cu_id='$cu_id'
			AND orders.o_preparation_time != '$o_preparation_time'");
		if(mysqli_num_rows($q)>0){
			$response["curr_orders"]= array();
			while ($row = mysqli_fetch_array($q)) {
				$curr_orders = array();
				$prod = array();
					
					$curr_orders["o_id"]=$row["o_id"];
					$curr_orders["b_id"]=$row["b_id"];
					$curr_orders["b_bname"]=$row["b_bname"];
					$curr_orders["s_id"]=$row["s_id"];
					$curr_orders["o_total"]=$row["o_total"];
					$curr_orders["o_time"]=$row["o_time"];
					$curr_orders["o_date"]=$row["o_date"];
					$curr_orders["o_preparation_time"]=$row["o_preparation_time"];
					$curr_orders["db_id"]=$row["db_id"];
					$dbid = $row["db_id"];
					$sid = $row["s_id"];

					if ($dbid == null && $sid == null ) {
						array_push($response["curr_orders"],$curr_orders);
					}
					else {
						if ($sid != $s_ids) {
							$que1 = $d->select("deliveryboy","db_id='$dbid'");
							if(mysqli_num_rows($que1)>0){
								while ($row = mysqli_fetch_array($que1)) {
									$curr_orders["db_fname"]=$row["db_fname"];
									$curr_orders["db_lname"]=$row["db_lname"];
								}
							}
							$que2 = $d->select("status","s_id='$sid'");
							if(mysqli_num_rows($que2)>0){
								while ($row = mysqli_fetch_array($que2)) {
									$curr_orders["s_details"]=$row["s_details"];
								}
							}
							array_push($response["curr_orders"],$curr_orders);	
						}
					}
					
					//array_push($response["curr_orders"],$curr_orders);
			}$response["success"]=1;
			echo json_encode($response);
		}else{
			$response["success"]=0;
			$response["message"]="no orders available";
			echo json_encode($response);
		}
	}
}
//customer current orders end

//customer and baker display current order data start
if(isset($_GET['cust_currodetails'])){
	if(isset($_POST) && !empty($_POST)){
		
		$o_id= $_POST['o_id'];
		$offer_idcheck;
		$q = $d->select("order_detail,product"," o_id='$o_id' AND order_detail.p_id = product.p_id ");
		if(mysqli_num_rows($q)>0){
			$response["curr_order_detail"]= array();
			while ($row = mysqli_fetch_array($q)) {
				$curr_order_detail = array();
				
					$curr_order_detail["od_id"]=$row["od_id"];
					$curr_order_detail["o_id"]=$row["o_id"];
					$curr_order_detail["p_id"]=$row["p_id"];
					$curr_order_detail["p_photo"]=$row["p_photo"];
					$curr_order_detail["p_name"]=$row["p_name"];
					$curr_order_detail["p_price"]=$row["p_price"];
					$curr_order_detail["od_qty"]=$row["od_qty"];
					$curr_order_detail["od_price"]=$row["od_price"];
					$curr_order_detail["of_id"]=$row["of_id"];
					$offer_idcheck=$row["of_id"];
					if ($offer_idcheck==null) {
						array_push($response["curr_order_detail"],$curr_order_detail);
					}else{
						$que = $d->select("offer","of_id='$offer_idcheck'");
						if(mysqli_num_rows($que)>0){
							while ($row = mysqli_fetch_array($que)) {
								$curr_order_detail["of_desc"]=$row["of_description"];
								$curr_order_detail["of_per"]=$row["of_percentage"];
							}
						}
						array_push($response["curr_order_detail"],$curr_order_detail);
					}
					//array_push($response["curr_order_detail"],$curr_order_detail);
			}$response["success"]=1;
			echo json_encode($response);
		}else{
			$response["success"]=0;
			$response["message"]="no orders available";
			echo json_encode($response);
		}
	}
}
//customer order id to display current order details end

//customer order to baker start
if(isset($_GET['cust_ordertobaker'])){
	if(isset($_POST) && !empty($_POST)){
		$m -> set_data('o_id',$o_id);
		$m -> set_data('b_id',$b_id);

		$a1 = array('o_id'=>$m->get_data('o_id'),
					'b_id'=>$m->get_data('b_id'),
					);
		$q=$d->update("orders",$a1,"o_id = '$o_id'");
		if($q>0){
			$response["o_id"] = $o_id;
			$response["b_id"] = $b_id;
			$response["success"]=1;
			$response["message"]="orders to baker update";
			echo json_encode($response);
		}else{
			$response["success"]=0;
			$response["message"]="Error";
			echo json_encode($response);
		}
	}
}
//customer order to baker end

//			BBBBBB       A      KK  KKK  EEEEEEE  RRRRRR
//			BB   BB     A A     KK KK    EE       RR   RR
//			BBBBBB     AAAAA    KKKK     EEEEE    RRRRRR
//			BB   BB   A     A   KK KK    EE       RR   RR
//			BBBBBB   A       A  KK  KKK  EEEEEEE  RR    RR



//baker display package data start
if(isset($_GET['baker_rgpackage'])){
	$q = $d->select("registration_package","");
	if(mysqli_num_rows($q)>0){
		$response["registration_package"]= array();
		while ($row = mysqli_fetch_array($q)) {
			$registration_package = array();
			$registration_package["rg_id"]=$row["rg_id"];
			$registration_package["rg_name"]=$row["rg_name"];
			$registration_package["rg_price"]=$row["rg_price"];
			$registration_package["rg_duration"]=$row["rg_duration"];
			array_push($response["registration_package"],$registration_package);
		}$response["success"]=1;
		echo json_encode($response);
	}else{
		$response["success"]=0;
		$response["message"]="no registration package available";
		echo json_encode($response);
	}
}
//baker display package data end

//baker Login/signin start
if(isset($_GET['baker_signin'])){
	if(isset($_POST) && !empty($_POST)){
		$b_email= $_POST['b_email'];
		$b_password = $_POST['b_password'];
		$basepath="http://192.168.43.181/AdminLTEold/photo/baker/";
		$q=$d->select("baker","b_email='$b_email' AND b_password='$b_password'");
		// $q=$d->select("admin","");
		$data = mysqli_fetch_array($q);
		if($data>0)
		{
			$b_id = $data['b_id'];
			$b_fname = $data['b_fname'];
			$b_lname = $data['b_lname'];
			$b_email = $data['b_email'];
			$b_phone = $data['b_phone'];
			$b_dob = $data['b_dob'];
			$b_photo = $data['b_photo'];
			$b_bname = $data['b_bname'];
			$rg_id = $data['rg_id'];
			$b_branch = $data['b_branch'];
			
			$response["success"] = 1;
			$response["b_id"]= $b_id;
			$response["b_fname"] = $b_fname;
			$response["b_lname"] = $b_lname;			
			$response["b_email"] = $b_email;			
			$response["b_phone"] = $b_phone;
			$response["b_dob"] = $b_dob;
			$response["b_photo"] = $b_photo;
			$response["b_bname"] = $b_bname;
			$response["rg_id"] = $rg_id;
			$response["b_branch"] = $b_branch;
			$response["message"] = "Login sucessfully";
			echo json_encode($response);
		}else{
				$response["success"]=0;
				$response["message"]="oops ! an Error Occurred";
				echo json_encode($response);
			}	
	}	
}
//baker Login/signin end

//baker product add start
if (isset($_GET['baker_addpro'])) {
	if(isset($_POST) && !empty($_POST))
	{
		try{
			if(isset($_POST['p_name']) && isset($_POST['p_description']) &&
				isset($_POST['p_price']) && isset($_POST['sub_id']) && //isset($_POST['of_id']) &&
				isset($_POST['b_id']) && isset($_POST['p_photo'])) 
			{
				$last_auto_id = $d ->last_auto_id("p_id");
				$res=mysqli_fetch_array($last_auto_id);
				$p_id = $res['Auto_increment'];

				$basepath="http://192.168.43.181/AdminLTEold/";

				$img = $_POST['p_photo'];
				$img = str_replace('data:img/png;base64,','',$img);
				$img = str_replace('','+',$img);
				$data = base64_decode($img);
				$img_name = $b_id . $p_name . '.png';
				$file = UPLOAD_DIR . $img_name;
				$success = file_put_contents($file,$data);
				move_uploaded_file($file,'/photo/product/'.$file);

				$m->set_data('p_name',$p_name);
				$m->set_data('p_description',$p_description);
				$m->set_data('p_price',$p_price);
				$m->set_data('sub_id',$sub_id);
				//$m->set_data('of_id',$of_id);
				$m->set_data('b_id',$b_id);
				$m->set_data('p_photo',$basepath.$file);

				$a1 = array('p_name' => $m->get_data('p_name'),
							'p_description' => $m->get_data('p_description'),
							'p_price' => $m->get_data('p_price'),
							'sub_id' => $m->get_data('sub_id'),
							//'of_id' => $m->get_data('of_id'),
							'b_id' => $m->get_data('b_id'),
							'p_photo' => $m->get_data('p_photo'),
							);

				$insert = $d-> insert('product',$a1);

				if ($insert>0) {
					$response["p_name"] = $p_name;
					$response["p_description"] = $p_description;
					$response["p_price"] = $p_price;
					$response["sub_id"] = $sub_id;
					//$response["of_id"] = $of_id;
					$response["b_id"] = $b_id;
					$response["p_photo"] = $p_photo;
					$response["success"]=1;
					$response["message"]="Product added successfully";
					echo json_encode($response);
				} else{
					$response["success"]=0;
					$response["message"]="Oops! an Error Occurred";
					echo json_encode($response);
				}
			} else{
				$response["success"] = 0;
				$response["message"] = "Reqired fild(s) is missing";
				echo json_encode($response);
			}
		}catch(Exception $e){
			$response["exception"] = $e->getMessage();
			echo json_encode($response);
		}
	}
}
//baker product add end

//baker display all subcategory list in spinner/dropdown start
if(isset($_GET['baker_subcatspin'])){	
	$q = $d->select("subcategory");
	if(mysqli_num_rows($q)>0){
		$response["subcategory"]= array();
		while ($row = mysqli_fetch_array($q)) {
			$subcategory = array();			
			$subcategory["sub_id"]=$row["sub_id"];
			$subcategory["sub_name"]=$row["sub_name"];			
			array_push($response["subcategory"],$subcategory);
		}$response["success"]=1;
		echo json_encode($response);
	}else{
		$response["success"]=0;
		$response["message"]="no subcategory available";
		echo json_encode($response);
	}
}
//baker display all subcategory list in spinner/dropdown end

//baker product edit / update start
if (isset($_GET['baker_updateproduct'])) {
	if(isset($_POST) && !empty($_POST))
	{
		try{
			if(isset($_POST['p_id']) && isset($_POST['p_name']) &&
				isset($_POST['p_description']) && isset($_POST['p_price']) &&
				isset($_POST['of_id']) && isset($_POST['p_photo']) && isset($_POST['b_id']))
			{				
				$basepath="http://192.168.43.181/AdminLTEold/";

				$img = $_POST['p_photo'];
				$img = str_replace('data:img/png;base64,','',$img);
				$img = str_replace('','+',$img);
				$data = base64_decode($img);
				$img_name =$b_id . $p_name . '.png';
				$file = UPLOAD_DIR . $img_name;
				$success = file_put_contents($file,$data);
				move_uploaded_file($file,'/photo/product/'.$file);

				$m->set_data('p_id',$p_id);
				$m->set_data('p_name',$p_name);
				$m->set_data('p_description',$p_description);
				$m->set_data('p_price',$p_price);
				$m->set_data('of_id',$of_id);
				$m->set_data('p_photo',$basepath.$file);
				$m->set_data('b_id',$b_id);

				$a1 = array('p_id' => $m->get_data('p_id'),
							'p_name' => $m->get_data('p_name'),
							'p_description' => $m->get_data('p_description'),
							'p_price' => $m->get_data('p_price'),
							'of_id' => $m->get_data('of_id'),
							'p_photo' => $m->get_data('p_photo'),
							'b_id' => $m->get_data('b_id'),
						);

				$update = $d-> update('product',$a1,"p_id='$p_id'");

				if ($update>0) {
					$response["p_id"] = $p_id;
					$response["p_name"] = $p_name;
					$response["p_description"] = $p_description;
					$response["p_price"] = $p_price;
					$response["of_id"] = $of_id;
					$response["p_photo"] = $p_photo;
					$response["b_id"] = $b_id;
					$response["success"]=1;
					$response["message"]="product edit profile successfully";
					echo json_encode($response);
				} else{
					$response["success"]=0;
					$response["message"]="Oops! an Error Occurred";
					echo json_encode($response);
				}
			} else{
				$response["success"] = 0;
				$response["message"] = "Reqired fild(s) is missing";
				echo json_encode($response);
			}
		}catch(Exception $e){
			$response["exception"] = $e->getMessage();
			echo json_encode($response);
		}
	}
}
//baker product edit / update end

//baker delete product
if(isset($_GET['baker_delproduct'])){
	if(isset($_POST) && !empty($_POST)){
		$p_id= $_POST['p_id'];		
		$delete = $d-> delete('product',"p_id='$p_id'");
		if($delete>0){
			$response["success"]=1;
			$response["message"]="Product deleted  successfully";
			echo json_encode($response);
		} else{
			$response["success"]=0;
			$response["message"]="Oops! an Error Occurred";
			echo json_encode($response);
		}
	}
}
//baker delete product

//baker edit profile start
if (isset($_GET['baker_updateprofile'])) {
	if(isset($_POST) && !empty($_POST))
	{
		try{
			if(isset($_POST['b_id']) && isset($_POST['b_fname'])
				&& isset($_POST['b_lname']) && isset($_POST['b_phone'])
				&& isset($_POST['b_dob']) && isset($_POST['b_photo'])
				&& isset($_POST['b_bname']))
			{				
				$basepath="http://192.168.43.181/AdminLTEold/";

				$img = $_POST['b_photo'];
				$img = str_replace('data:img/png;base64,','',$img);
				$img = str_replace('','+',$img);
				$data = base64_decode($img);
				$img_name = $b_bname . '.png';
				$file = UPLOAD_DIR2 . $img_name;
				$success = file_put_contents($file,$data);
				move_uploaded_file($file,'/photo/baker/'.$file);

				$m->set_data('b_id',$b_id);
				$m->set_data('b_fname',$b_fname);
				$m->set_data('b_lname',$b_lname);				
				$m->set_data('b_phone',$b_phone);
				$m->set_data('b_dob',$b_dob);
				$m->set_data('b_photo',$basepath.$file);
				$m->set_data('b_bname',$b_bname);

				$a1 = array('b_id' => $m->get_data('b_id'),
							'b_fname' => $m->get_data('b_fname'),
							'b_lname' => $m->get_data('b_lname'),
							'b_phone' => $m->get_data('b_phone'),
							'b_dob' => $m->get_data('b_dob'),
							'b_photo' => $m->get_data('b_photo'),
							'b_bname' => $m->get_data('b_bname'),
						);

				$update = $d-> update('baker',$a1,"b_id='$b_id'");

				if ($update>0) {
					$response["b_id"] = $b_id;
					$response["b_fname"] = $b_fname;
					$response["b_lname"] = $b_lname;
					$response["b_phone"] = $b_phone;
					$response["b_dob"] = $b_dob;
					$response["b_photo"] = $b_photo;
					$response["b_bname"] = $b_bname;
					$response["success"]=1;
					$response["message"]="baker edit profile successfully";
					echo json_encode($response);
				} else{
					$response["success"]=0;
					$response["message"]="Oops! an Error Occurred";
					echo json_encode($response);
				}
			} else{
				$response["success"] = 0;
				$response["message"] = "Reqired fild(s) is missing";
				echo json_encode($response);
			}
		}catch(Exception $e){
			$response["exception"] = $e->getMessage();
			echo json_encode($response);
		}
	}
}
//baker edit profile end

//baker display all feedback start
if(isset($_GET['baker_allfeedback'])){	
	$q = $d->select("feedback,customer","feedback.cu_id = customer.cu_id");
	if(mysqli_num_rows($q)>0){
		$response["feedback"]= array();
		while ($row = mysqli_fetch_array($q)) {
			$feedback = array();
			$feedback["cu_id"]=$row["cu_id"];
			$feedback["cu_fname"]=$row["cu_fname"];
			$feedback["cu_lname"]=$row["cu_lname"];
			$feedback["cu_email"]=$row["cu_email"];
			$feedback["f_feedback"]=$row["f_feedback"];
			$feedback["f_reply"]=$row["f_reply"];
			$feedback["f_id"]=$row["f_id"];
			array_push($response["feedback"],$feedback);
		}$response["success"]=1;
		echo json_encode($response);
	}else{
		$response["success"]=0;
		$response["message"]="no feedback available";
		echo json_encode($response);
	}
}
//baker display all feedback end

//baker feedback reply start
if (isset($_GET['baker_feedbackreply'])) {
	if(isset($_POST) && !empty($_POST)){
		$m -> set_data('f_id',$f_id);
		$m -> set_data('f_reply',$f_reply);		

		$a = array('f_reply'=>$m->get_data('f_reply'));
		$q=$d->update("feedback",$a,"f_id='$f_id'");
		if($q>0){
			$response["success"]=1;
			$response["message"]="feedback reply added";
			echo json_encode($response);
		}else{
			$response["success"]=0;
			$response["message"]="Error";
			echo json_encode($response);
		}
	}
}
//baker feedback reply end

//baker feedback delete start
if (isset($_GET['baker_feedbackdelete'])) {
	if(isset($_POST) && !empty($_POST)){
		$m -> set_data('f_id',$f_id);		
		
		$q=$d->delete("feedback","f_id='$f_id'");
		if($q>0){
			$response["success"]=1;
			$response["message"]="feedback deleted";
			echo json_encode($response);
		}else{
			$response["success"]=0;
			$response["message"]="Error";
			echo json_encode($response);
		}
	}
}
//baker feedback delete end

//baker display product from subcategory and baker id start
if(isset($_GET['baker_subproduct'])){
	if(isset($_POST) && !empty($_POST)){
		$offerid;
		$sub_id= $_POST['sub_id'];
		$b_id= $_POST['b_id'];
		$q=$d->select("product,subcategory","product.b_id='$b_id' AND product.sub_id='$sub_id' AND product.sub_id = subcategory.sub_id ");//AND product.of_id=offer.of_id 
				
		if(mysqli_num_rows($q)>0){
		$response["product"]= array();
		while ($row = mysqli_fetch_array($q)) {
				$product = array();
				$product["sub_id"]=$row["sub_id"];
				$product["sub_name"]=$row["sub_name"];
				$product["b_id"]=$row["b_id"];
				$product["p_id"]=$row["p_id"];
				$product["p_name"]=$row["p_name"];
				$product["p_description"]=$row["p_description"];
				$product["p_price"]=$row["p_price"];
				$product["p_photo"]=$row["p_photo"];
				$product["of_id"]=$row["of_id"];
				$offerid=$row["of_id"];
				if ($offerid==null) {
					array_push($response["product"],$product);				
				}else{
					$que = $d->select("offer","of_id='$offerid'");
					if(mysqli_num_rows($que)>0){
						while ($row = mysqli_fetch_array($que)) {
							$product["of_description"]=$row["of_description"];
							$product["of_start"]=$row["of_start"];
							$product["of_end"]=$row["of_end"];
							$product["of_percentage"]=$row["of_percentage"];
						}
					}
					array_push($response["product"],$product);
				}
			}	$response["success"]=1;
		echo json_encode($response);
		} else{
			$response["success"]=0;
			$response["message"]="no product available";
			echo json_encode($response);
		}
	}
}
//baker display product from subcategory and baker id  end

//baker display all product from baker id start
if(isset($_GET['baker_allproduct'])){
	if(isset($_POST) && !empty($_POST)){		
		$offerid;
		$b_id= $_POST['b_id'];
		$q=$d->select("product,subcategory","product.b_id='$b_id' AND product.sub_id = subcategory.sub_id");// AND product.of_id=offer.of_id 
		
		if(mysqli_num_rows($q)>0){
		$response["product"]= array();
		while ($row = mysqli_fetch_array($q)) {
			$product = array();
			$product["p_photo"]=$row["p_photo"];
			$product["p_name"]=$row["p_name"];
			$product["p_price"]=$row["p_price"];
			$product["p_description"]=$row["p_description"];
			$product["b_id"]=$row["b_id"];
			$product["p_id"]=$row["p_id"];
			$product["sub_id"]=$row["sub_id"];
			$product["sub_name"]=$row["sub_name"];
			$product["of_id"]=$row["of_id"];
				$offerid=$row["of_id"];
				if ($offerid==null) {
					array_push($response["product"],$product);				
				}else{
					$que = $d->select("offer","of_id='$offerid'");
					if(mysqli_num_rows($que)>0){
						while ($row = mysqli_fetch_array($que)) {
							$product["of_description"]=$row["of_description"];
							$product["of_start"]=$row["of_start"];
							$product["of_end"]=$row["of_end"];
							$product["of_percentage"]=$row["of_percentage"];
						}
					}
					array_push($response["product"],$product);
				}
		}	$response["success"]=1;
		echo json_encode($response);
		}else{
			$response["success"]=0;
			$response["message"]="no product available";
			echo json_encode($response);
		}
	}
}
//baker display all product from baker id end

//baker display delivey boy from baker id start
if(isset($_GET['baker_dboy'])){
	if(isset($_POST) && !empty($_POST)){		
		$b_id= $_POST['b_id'];
		$q=$d->select("deliveryboy","b_id='$b_id'");
		
		if(mysqli_num_rows($q)>0){
		$response["deliveryboy"]= array();
		while ($row = mysqli_fetch_array($q)) {
			$deliveryboy = array();
			$deliveryboy["db_id"]=$row["db_id"];
			$deliveryboy["db_fname"]=$row["db_fname"];
			$deliveryboy["db_lname"]=$row["db_lname"];
			$deliveryboy["db_phone"]=$row["db_phone"];
			$deliveryboy["db_dob"]=$row["db_dob"];
			$deliveryboy["db_gender"]=$row["db_gender"];
			$deliveryboy["db_email"]=$row["db_email"];
			$deliveryboy["db_password"]=$row["db_password"];
			$deliveryboy["db_photo"]=$row["db_photo"];
			$deliveryboy["b_id"]=$row["b_id"];
			array_push($response["deliveryboy"],$deliveryboy);
		}	$response["success"]=1;
		echo json_encode($response);
		}else{
			$response["success"]=0;
			$response["message"]="no dboy available";
			echo json_encode($response);
		}
	}
}
//baker display delivey boy from baker id end

//baker delivery boy add start
if (isset($_GET['baker_addboy'])) {
	if(isset($_POST) && !empty($_POST))
	{
		try{
			if(isset($_POST['db_fname']) && isset($_POST['db_lname']) &&
				isset($_POST['db_email']) && isset($_POST['db_gender']) &&
				isset($_POST['db_dob']) && isset($_POST['db_phone']) && isset($_POST['b_id']) &&
				isset($_POST['db_password']) && isset($_POST['db_photo'])) 
			{
				$last_auto_id = $d ->last_auto_id("db_id");
				$res=mysqli_fetch_array($last_auto_id);
				$db_id = $res['Auto_increment'];

				$basepath="http://192.168.43.181/AdminLTEold/";

				$img = $_POST['db_photo'];
				$img = str_replace('data:img/png;base64,','',$img);
				$img = str_replace('','+',$img);
				$data = base64_decode($img);
				$img_name = $db_id . $db_fname . '.png';
				$file = UPLOAD_DIR3 . $img_name;
				$success = file_put_contents($file,$data);
				move_uploaded_file($file,'/photo/dboy/'.$file);

				$m->set_data('db_fname',$db_fname);
				$m->set_data('db_lname',$db_lname);
				$m->set_data('db_email',$db_email);
				$m->set_data('db_gender',$db_gender);
				$m->set_data('db_dob',$db_dob);
				$m->set_data('db_phone',$db_phone);
				$m->set_data('b_id',$b_id);
				$m->set_data('db_password',$db_password);
				$m->set_data('db_photo',$basepath.$file);

				$a1 = array('db_fname' => $m->get_data('db_fname'),
							'db_lname' => $m->get_data('db_lname'),
							'db_email' => $m->get_data('db_email'),
							'db_gender' => $m->get_data('db_gender'),
							'db_dob' => $m->get_data('db_dob'),
							'db_phone' => $m->get_data('db_phone'),
							'b_id' => $m->get_data('b_id'),
							'db_password' => $m->get_data('db_password'),
							'db_photo' => $m->get_data('db_photo'),
							);

				$insert = $d-> insert('deliveryboy',$a1);

				if ($insert>0) {
					$response["db_fname"] = $db_fname;
					$response["db_lname"] = $db_lname;
					$response["db_email"] = $db_email;
					$response["db_gender"] = $db_gender;
					$response["db_dob"] = $db_dob;
					$response["db_phone"] = $db_phone;
					$response["b_id"] = $b_id;
					$response["db_password"] = $db_password;
					$response["db_photo"] = $db_photo;
					$response["success"]=1;
					$response["message"]="dboy added successfully";
					echo json_encode($response);
				} else{
					$response["success"]=0;
					$response["message"]="Oops! an Error Occurred";
					echo json_encode($response);
				}
			} else{
				$response["success"] = 0;
				$response["message"] = "Reqired fild(s) is missing";
				echo json_encode($response);
			}
		}catch(Exception $e){
			$response["exception"] = $e->getMessage();
			echo json_encode($response);
		}
	}
}
//baker delivery boy add end

//baker delivery boy edit / update start
if (isset($_GET['baker_updatedboy'])) {
	if(isset($_POST) && !empty($_POST))
	{
		try{
			if(isset($_POST['db_id']) && isset($_POST['db_fname']) && isset($_POST['db_lname']) &&
				isset($_POST['db_email']) && isset($_POST['db_gender']) &&
				isset($_POST['db_dob']) && isset($_POST['db_phone']) && isset($_POST['b_id']) &&
				isset($_POST['db_password']) && isset($_POST['db_photo'])) 
			{				
				$basepath="http://192.168.43.181/AdminLTEold/";

				$img = $_POST['db_photo'];
				$img = str_replace('data:img/png;base64,','',$img);
				$img = str_replace('','+',$img);
				$data = base64_decode($img);
				$img_name =$db_id . $db_fname . '.png';
				$file = UPLOAD_DIR3 . $img_name;
				$success = file_put_contents($file,$data);
				move_uploaded_file($file,'/photo/dboy/'.$file);

				$m->set_data('db_id',$db_id);
				$m->set_data('db_fname',$db_fname);
				$m->set_data('db_lname',$db_lname);
				$m->set_data('db_email',$db_email);
				$m->set_data('db_gender',$db_gender);
				$m->set_data('db_dob',$db_dob);
				$m->set_data('db_phone',$db_phone);
				$m->set_data('b_id',$b_id);
				$m->set_data('db_password',$db_password);
				$m->set_data('db_photo',$basepath.$file);

				$a1 = array('db_id' => $m->get_data('db_id'),
							'db_fname' => $m->get_data('db_fname'),
							'db_lname' => $m->get_data('db_lname'),
							'db_email' => $m->get_data('db_email'),
							'db_gender' => $m->get_data('db_gender'),
							'db_dob' => $m->get_data('db_dob'),
							'db_phone' => $m->get_data('db_phone'),
							'b_id' => $m->get_data('b_id'),
							'db_password' => $m->get_data('db_password'),
							'db_photo' => $m->get_data('db_photo'),
							);

				$update = $d-> update('deliveryboy',$a1,"db_id='$db_id'");

				if ($update>0) {
					$response["db_id"] = $db_id;
					$response["db_fname"] = $db_fname;
					$response["db_lname"] = $db_lname;
					$response["db_email"] = $db_email;
					$response["db_gender"] = $db_gender;
					$response["db_dob"] = $db_dob;
					$response["db_phone"] = $db_phone;
					$response["b_id"] = $b_id;
					$response["db_password"] = $db_password;
					$response["db_photo"] = $db_photo;
					$response["success"]=1;
					$response["message"]="dboy update successfully";
					echo json_encode($response);
				} else{
					$response["success"]=0;
					$response["message"]="Oops! an Error Occurred";
					echo json_encode($response);
				}
			} else{
				$response["success"] = 0;
				$response["message"] = "Reqired fild(s) is missing";
				echo json_encode($response);
			}
		}catch(Exception $e){
			$response["exception"] = $e->getMessage();
			echo json_encode($response);
		}
	}
}
//baker delivery boy edit / update end

//baker delete delivery boy
if(isset($_GET['baker_deldboy'])){
	if(isset($_POST) && !empty($_POST)){
		$p_id= $_POST['db_id'];		
		$delete = $d-> delete('deliveryboy',"db_id='$db_id'");
		if($delete>0){
			$response["success"]=1;
			$response["message"]="Delivery boy deleted successfully";
			echo json_encode($response);
		} else{
			$response["success"]=0;
			$response["message"]="Oops! an Error Occurred";
			echo json_encode($response);
		}
	}
}
//baker delete delivery boy

//baker delete offer
if(isset($_GET['baker_deloffer'])){
	if(isset($_POST) && !empty($_POST)){
		$p_id= $_POST['o_id'];		
		$delete = $d-> delete('offer',"o_id='$o_id'");
		if($delete>0){
			$response["success"]=1;
			$response["message"]="Offer deleted successfully";
			echo json_encode($response);
		} else{
			$response["success"]=0;
			$response["message"]="Oops! an Error Occurred";
			echo json_encode($response);
		}
	}
}
//baker delete offer

//baker display all offer start
if(isset($_GET['baker_alloffer'])){
	if(isset($_POST) && !empty($_POST)){		
		$b_id= $_POST['b_id'];
		$q=$d->select("offer","b_id='$b_id'");
		
		if(mysqli_num_rows($q)>0){
		$response["offer"]= array();
		while ($row = mysqli_fetch_array($q)) {
			$offer = array();
			$offer["of_id"]=$row["of_id"];
			$offer["of_description"]=$row["of_description"];
			$offer["of_start"]=$row["of_start"];
			$offer["of_end"]=$row["of_end"];
			$offer["b_id"]=$row["b_id"];
			$offer["of_percentage"]=$row["of_percentage"];
			array_push($response["offer"],$offer);
		}	$response["success"]=1;
		echo json_encode($response);
		}else{
			$response["success"]=0;
			$response["message"]="no offers available";
			echo json_encode($response);
		}
	}
}
//baker diplay all offer end

//baker offer add start
if (isset($_GET['baker_addoffer'])) {
	if(isset($_POST) && !empty($_POST))
	{
		try{
			if(isset($_POST['of_description']) && isset($_POST['b_id']) &&
				isset($_POST['of_start']) && isset($_POST['of_end']) && isset($_POST['of_percentage'])) 
			{
				$last_auto_id = $d ->last_auto_id("of_id");
				$res=mysqli_fetch_array($last_auto_id);
				$of_id = $res['Auto_increment'];

				$m->set_data('of_description',$of_description);
				$m->set_data('b_id',$b_id);
				$m->set_data('of_start',$of_start);
				$m->set_data('of_end',$of_end);
				$m->set_data('of_percentage',$of_percentage);

				$a1 = array('of_description' => $m->get_data('of_description'),
							'b_id' => $m->get_data('b_id'),
							'of_start' => $m->get_data('of_start'),
							'of_end' => $m->get_data('of_end'),
							'of_percentage' => $m->get_data('of_percentage'),
							);

				$insert = $d-> insert('offer',$a1);

				if ($insert>0) {
					$response["of_description"] = $of_description;
					$response["b_id"] = $b_id;
					$response["of_start"] = $of_start;
					$response["of_end"] = $of_end;
					$response["of_percentage"] = $of_percentage;
					$response["success"]=1;
					$response["message"]="offer added successfully";
					echo json_encode($response);
				} else{
					$response["success"]=0;
					$response["message"]="Oops! an Error Occurred";
					echo json_encode($response);
				}
			} else{
				$response["success"] = 0;
				$response["message"] = "Reqired fild(s) is missing";
				echo json_encode($response);
			}
		}catch(Exception $e){
			$response["exception"] = $e->getMessage();
			echo json_encode($response);
		}
	}
}
//baker offer add end

//baker ofer edit / update start
if (isset($_GET['baker_updateoffer'])) {
	if(isset($_POST) && !empty($_POST))
	{
		try{
			if(isset($_POST['of_id']) && isset($_POST['of_description']) && isset($_POST['b_id']) &&
				isset($_POST['of_start']) && isset($_POST['of_end']) && isset($_POST['of_percentage'])) 
			{				

				$m->set_data('of_id',$of_id);
				$m->set_data('of_description',$of_description);
				$m->set_data('b_id',$b_id);
				$m->set_data('of_start',$of_start);
				$m->set_data('of_end',$of_end);
				$m->set_data('of_percentage',$of_percentage);

				$a1 = array('of_id' => $m->get_data('of_id'),
							'of_description' => $m->get_data('of_description'),
							'b_id' => $m->get_data('b_id'),
							'of_start' => $m->get_data('of_start'),
							'of_end' => $m->get_data('of_end'),
							'of_percentage' => $m->get_data('of_percentage'),
							);

				$update = $d-> update('offer',$a1,"of_id='$of_id'");

				if ($update>0) {
					$response["of_id"] = $of_id;
					$response["of_description"] = $of_description;
					$response["b_id"] = $b_id;
					$response["of_start"] = $of_start;
					$response["of_end"] = $of_end;
					$response["of_percentage"] = $of_percentage;
					$response["success"]=1;
					$response["message"]="offer update successfully";
					echo json_encode($response);
				} else{
					$response["success"]=0;
					$response["message"]="Oops! an Error Occurred";
					echo json_encode($response);
				}
			} else{
				$response["success"] = 0;
				$response["message"] = "Reqired fild(s) is missing";
				echo json_encode($response);
			}
		}catch(Exception $e){
			$response["exception"] = $e->getMessage();
			echo json_encode($response);
		}
	}
}
//baker offer edit / update end

//baker Signup/register start
if (isset($_GET['baker_signup'])) {
	if(isset($_POST) && !empty($_POST)){
		try{
			if(isset($_POST['b_fname']) && isset($_POST['b_lname']) &&
				isset($_POST['b_email']) && isset($_POST['b_phone']) &&
				isset($_POST['b_dob']) && isset($_POST['b_password']) &&
				isset($_POST['b_gender']) && isset($_POST['b_photo']) &&
				isset($_POST['b_address']) && isset($_POST['b_pincode']) &&
				isset($_POST['b_city']) && isset($_POST['b_bname']) &&
				isset($_POST['b_bphoto']) && isset($_POST['b_branch'])){
				extract($_POST);
				$q = $d -> select("baker","b_email='$b_email'");
				$bsubstr = substr($b_phone,8);
				$data = mysqli_fetch_array($q);
				if($data>0){
					$response["success"]=0;
					$response["message"]="Email is alread register";
					echo json_encode($response);
				}else{
					$last_auto_id = $d->last_auto_id("b_id");
					$res = mysqli_fetch_array($last_auto_id);
					$b_id=$res['Auto_increment'];
					//substr($data['b_photo'],34)
					$basepath="http://192.168.43.181/AdminLTEold/";

					$img = $_POST['b_photo'];
					$img = str_replace('data:img/png;base64,','',$img);
					$img = str_replace('','+',$img);
					$data = base64_decode($img);
					$img_name = $bsubstr . $b_fname . '.png';
					$file = UPLOAD_DIR2 . $img_name;
					$success = file_put_contents($file,$data);
					move_uploaded_file($file,'/photo/baker/'.$file);

					$imgb = $_POST['b_bphoto'];
					$imgb = str_replace('data:img/png;base64,','',$imgb);
					$imgb = str_replace('','+',$imgb);
					$data = base64_decode($imgb);
					$img_nameb = $bsubstr . $b_bname . '.png';
					$fileb = UPLOAD_DIR2 . $img_nameb;
					$success = file_put_contents($fileb,$data);
					move_uploaded_file($fileb,'/photo/baker/'.$fileb);

					$m->set_data('b_fname',$b_fname);
					$m->set_data('b_lname',$b_lname);
					$m->set_data('b_email',$b_email);
					$m->set_data('b_phone',$b_phone);
					$m->set_data('b_dob',$b_dob);					
					$m->set_data('b_password',$b_password);
					$m->set_data('b_gender',$b_gender);
					$m->set_data('b_photo',$basepath.$file);
					$m->set_data('b_address',$b_address);
					$m->set_data('b_pincode',$b_pincode);
					$m->set_data('b_city',$b_city);
					$m->set_data('b_bname',$b_bname);
					$m->set_data('b_branch',$b_branch);
					$m->set_data('b_bphoto',$basepath.$fileb);

					$a1 = array('b_fname' => $m->get_data('b_fname'),
								'b_lname' => $m->get_data('b_lname'),
								'b_email' => $m->get_data('b_email'),
								'b_phone' => $m->get_data('b_phone'),
								'b_dob' => $m->get_data('b_dob'),								
								'b_password' => $m->get_data('b_password'),
								'b_gender' => $m->get_data('b_gender'),
								'b_photo' => $m->get_data('b_photo'),
								'b_address' => $m->get_data('b_address'),
								'b_pincode' => $m->get_data('b_pincode'),
								'b_city' => $m->get_data('b_city'),
								'b_bname' => $m->get_data('b_bname'),
								'b_branch' => $m->get_data('b_branch'),
								'b_bphoto' => $m->get_data('b_bphoto'),
								);

					$insert = $d -> insert('baker',$a1);
					if($insert>0){
						$response["b_fname"]=$b_fname;
						$response["b_lname"]=$b_lname;
						$response["b_email"]=$b_email;
						$response["b_phone"]=$b_phone;
						$response["b_dob"]=$b_dob;						
						$response["b_password"]=$b_password;
						$response["b_gender"]=$b_gender;
						$response["b_photo"]=$b_photo;
						$response["b_address"]=$b_address;
						$response["b_pincode"]=$b_pincode;
						$response["b_city"]=$b_city;
						$response["b_bname"]=$b_bname;
						$response["b_branch"]=$b_branch;
						$response["b_bphoto"]=$b_bphoto;
						$response["success"]=1;
						$response["message"]="Registered successfully";
						echo json_encode($response);
					}else{
						$response["success"]=0;
						$response["message"]="Opps! an Error Occurred";
						echo json_encode($response);
					}
				}
			}else{
				$response["success"]=0;
				$response["message"]="Reqired fild(s) is missing";
				echo json_encode($response);
			}
		}catch(Exception $e){
			$response["exception"] = $e->getMessage();
			echo json_encode($response);
		}
	}
}
//baker Signup/register end

//baker display all offer start
if(isset($_GET['baker_offerspin'])){	
	if(isset($_POST) && !empty($_POST)){		
		$b_id= $_POST['b_id'];
		$q=$d->select("offer","b_id='$b_id'");
		
		if(mysqli_num_rows($q)>0){
		$response["offer"]= array();
		while ($row = mysqli_fetch_array($q)) {
			$offer = array();
			$offer["of_id"]=$row["of_id"];
			$offer["of_description"]=$row["of_description"];
			$offer["of_start"]=$row["of_start"];
			$offer["of_end"]=$row["of_end"];
			$offer["b_id"]=$row["b_id"];
			$offer["of_percentage"]=$row["of_percentage"];
			array_push($response["offer"],$offer);
		}	$response["success"]=1;
		echo json_encode($response);
		}else{
			$response["success"]=0;
			$response["message"]="no offers available";
			echo json_encode($response);
		}
	}
}
//baker diplay all offer end baker_offerspin

//Baker past orders order id start
if(isset($_GET['baker_pastorderid'])){
	if(isset($_POST) && !empty($_POST)){
		$b_id= $_POST['b_id'];
		$s_id = 3;
		$o_preparation_time = 0;
		$q = $d->select("orders,baker,deliveryboy,status,delivery","orders.db_id = deliveryboy.db_id AND
			orders.b_id = baker.b_id AND orders.b_id='$b_id' AND orders.s_id = '$s_id'
			AND orders.o_preparation_time = '$o_preparation_time' AND orders.s_id = status.s_id
			AND orders.o_id = delivery.o_id AND orders.b_id = deliveryboy.b_id");
		if(mysqli_num_rows($q)>0){
			$response["order"]= array();
			while ($row = mysqli_fetch_array($q)) {
				$order = array();
				
					$order["o_id"]=$row["o_id"];
									
					array_push($response["order"],$order);
			}$response["success"]=1;
			echo json_encode($response);
		}else{
			$response["success"]=0;
			$response["message"]="no orders available";
			echo json_encode($response);
		}
	}
}
//Baker past orders order id end

//Baker past orders start
if(isset($_GET['baker_pastorders'])){
	if(isset($_POST) && !empty($_POST)){
		$b_id= $_POST['b_id'];
		$s_id = 3;
		$o_preparation_time = 0;
		$q = $d->select("orders,baker,deliveryboy,status,delivery","orders.db_id = deliveryboy.db_id AND
			orders.b_id = baker.b_id AND orders.b_id='$b_id' AND orders.s_id = '$s_id'
			AND orders.o_preparation_time = '$o_preparation_time' AND orders.s_id = status.s_id
			AND orders.o_id = delivery.o_id AND orders.b_id = deliveryboy.b_id");
		if(mysqli_num_rows($q)>0){
			$response["orders"]= array();
			while ($row = mysqli_fetch_array($q)) {
				$orders = array();
					//$orders["check"]=$b_id;
					$orders["o_id"]=$row["o_id"];
					$orders["d_id"]=$row["d_id"];
					$orders["b_id"]=$row["b_id"];
					$orders["b_bname"]=$row["b_bname"];
					$orders["db_id"]=$row["db_id"];
					$orders["db_fname"]=$row["db_fname"];
					$orders["db_lname"]=$row["db_lname"];
					$orders["s_id"]=$row["s_id"];
					$orders["s_details"]=$row["s_details"];
					$orders["o_total"]=$row["o_total"];
					$orders["o_time"]=$row["o_time"];
					$orders["o_date"]=$row["o_date"];
					$orders["o_preparation_time"]=$row["o_preparation_time"];
					$orders["d_address"]=$row["d_address"];
					$orders["d_city"]=$row["d_city"];
					$orders["d_pincode"]=$row["d_pincode"];
					$orders["d_paymethod"]=$row["d_paymethod"];
					
					array_push($response["orders"],$orders);
			}$response["success"]=1;
			echo json_encode($response);
		}else{
			$response["success"]=0;
			$response["message"]="no orders available";
			echo json_encode($response);
		}
	}
}
//Baker past orders end

//Baker and baker display past order data start
if(isset($_GET['baker_pastodetails'])){ 
	if(isset($_POST) && !empty($_POST)){
		
		$o_id= $_POST['o_id'];
		$offer_idcheck;
		$q = $d->select("order_detail,product"," o_id='$o_id' AND order_detail.p_id = product.p_id ");
		if(mysqli_num_rows($q)>0){
			$response["order_detail"]= array();
			while ($row = mysqli_fetch_array($q)) {
				$order_detail = array();
				
					$order_detail["od_id"]=$row["od_id"];
					$order_detail["o_id"]=$row["o_id"];
					$order_detail["p_id"]=$row["p_id"];
					$order_detail["p_photo"]=$row["p_photo"];
					$order_detail["p_name"]=$row["p_name"];
					$order_detail["p_price"]=$row["p_price"];
					$order_detail["od_qty"]=$row["od_qty"];
					$order_detail["od_price"]=$row["od_price"];
					$order_detail["of_id"]=$row["of_id"];
					$offer_idcheck=$row["of_id"];
					if ($offer_idcheck==null) {
						array_push($response["order_detail"],$order_detail);
					}else{
						$que = $d->select("offer","of_id='$offer_idcheck'");
						if(mysqli_num_rows($que)>0){
							while ($row = mysqli_fetch_array($que)) {
								$order_detail["of_desc"]=$row["of_description"];
								$order_detail["of_per"]=$row["of_percentage"];
							}
						}
						array_push($response["order_detail"],$order_detail);
					}
					//array_push($response["order_detail"],$order_detail);
			}$response["success"]=1;
			echo json_encode($response);
		}else{
			$response["success"]=0;
			$response["message"]="no orders available";
			echo json_encode($response);
		}
	}
}
//Baker order id to display order details end

//Baker current orders order id start
if(isset($_GET['baker_currorderid'])){
	if(isset($_POST) && !empty($_POST)){
		$dbid;
		$sid;
		$b_id= $_POST['b_id'];
		$s_ids = 3;
		$o_preparation_time = 0;
		$q = $d->select("orders","orders.b_id='$b_id'
			AND orders.o_preparation_time != '$o_preparation_time'");
		if(mysqli_num_rows($q)>0){
			$response["curr_orderid"]= array();
			while ($row = mysqli_fetch_array($q)) {
				$curr_orderid = array();
					
					$curr_orderid["o_id"]=$row["o_id"];
					$curr_orderid["s_id"]=$row["s_id"];
					$curr_orderid["db_id"]=$row["db_id"];
					$dbid = $row["db_id"];
					$sid = $row["s_id"];

					if ($dbid == null && $sid == null ) {
						array_push($response["curr_orderid"],$curr_orderid);
					}
					else {
						if ($sid != $s_ids) {
							$que1 = $d->select("deliveryboy","db_id='$dbid'");
							if(mysqli_num_rows($que1)>0){
								while ($row = mysqli_fetch_array($que1)) {
									$curr_orderid["db_fname"]=$row["db_fname"];
									$curr_orderid["db_lname"]=$row["db_lname"];
								}
							}
							$que2 = $d->select("status","s_id='$sid'");
							if(mysqli_num_rows($que2)>0){
								while ($row = mysqli_fetch_array($que2)) {
									$curr_orderid["s_details"]=$row["s_details"];
								}
							}
							array_push($response["curr_orderid"],$curr_orderid);	
						}
					}
					
					//array_push($response["orders"],$orders);
			}$response["success"]=1;
			echo json_encode($response);
		}else{
			$response["success"]=0;
			$response["message"]="no orders available";
			echo json_encode($response);
		}
	}
}
//Baker current orders order id end

//Baker current orders start
if(isset($_GET['baker_currorders'])){
	if(isset($_POST) && !empty($_POST)){
		$dbid;
		$sid;
		$b_id= $_POST['b_id'];
		$s_ids = 3;
		$o_preparation_time = 0;
		$q = $d->select("orders,baker,delivery","orders.b_id = baker.b_id AND orders.b_id='$b_id'
			AND orders.o_preparation_time != '$o_preparation_time' AND orders.o_id = delivery.o_id");
		if(mysqli_num_rows($q)>0){
			$response["curr_orders"]= array();
			while ($row = mysqli_fetch_array($q)) {
				$curr_orders = array();
				$prod = array();
					
					$curr_orders["o_id"]=$row["o_id"];
					$curr_orders["b_id"]=$row["b_id"];
					$curr_orders["b_bname"]=$row["b_bname"];
					$curr_orders["s_id"]=$row["s_id"];
					$curr_orders["o_total"]=$row["o_total"];
					$curr_orders["o_time"]=$row["o_time"];
					$curr_orders["o_date"]=$row["o_date"];
					$curr_orders["o_preparation_time"]=$row["o_preparation_time"];
					$orders["d_address"]=$row["d_address"];
					$orders["d_city"]=$row["d_city"];
					$orders["d_pincode"]=$row["d_pincode"];
					$orders["d_paymethod"]=$row["d_paymethod"];
					$curr_orders["db_id"]=$row["db_id"];
					$dbid = $row["db_id"];
					$sid = $row["s_id"];

					if ($dbid == null && $sid == null ) {
						array_push($response["curr_orders"],$curr_orders);
					}
					else {
						if ($sid != $s_ids) {
							$que1 = $d->select("deliveryboy","db_id='$dbid'");
							if(mysqli_num_rows($que1)>0){
								while ($row = mysqli_fetch_array($que1)) {
									$curr_orders["db_fname"]=$row["db_fname"];
									$curr_orders["db_lname"]=$row["db_lname"];
								}
							}
							$que2 = $d->select("status","s_id='$sid'");
							if(mysqli_num_rows($que2)>0){
								while ($row = mysqli_fetch_array($que2)) {
									$curr_orders["s_details"]=$row["s_details"];
								}
							}
							array_push($response["curr_orders"],$curr_orders);	
						}
					}
					
					//array_push($response["curr_orders"],$curr_orders);
			}$response["success"]=1;
			echo json_encode($response);
		}else{
			$response["success"]=0;
			$response["message"]="no orders available";
			echo json_encode($response);
		}
	}
}
//Baker current orders end

//Baker and baker display current order data start
if(isset($_GET['baker_currodetails'])){
	if(isset($_POST) && !empty($_POST)){
		
		$o_id= $_POST['o_id'];
		$offer_idcheck;
		$q = $d->select("order_detail,product"," o_id='$o_id' AND order_detail.p_id = product.p_id ");
		if(mysqli_num_rows($q)>0){
			$response["curr_order_detail"]= array();
			while ($row = mysqli_fetch_array($q)) {
				$curr_order_detail = array();
				
					$curr_order_detail["od_id"]=$row["od_id"];
					$curr_order_detail["o_id"]=$row["o_id"];
					$curr_order_detail["p_id"]=$row["p_id"];
					$curr_order_detail["p_photo"]=$row["p_photo"];
					$curr_order_detail["p_name"]=$row["p_name"];
					$curr_order_detail["p_price"]=$row["p_price"];
					$curr_order_detail["od_qty"]=$row["od_qty"];
					$curr_order_detail["od_price"]=$row["od_price"];
					$curr_order_detail["of_id"]=$row["of_id"];
					$offer_idcheck=$row["of_id"];
					if ($offer_idcheck==null) {
						array_push($response["curr_order_detail"],$curr_order_detail);
					}else{
						$que = $d->select("offer","of_id='$offer_idcheck'");
						if(mysqli_num_rows($que)>0){
							while ($row = mysqli_fetch_array($que)) {
								$curr_order_detail["of_desc"]=$row["of_description"];
								$curr_order_detail["of_per"]=$row["of_percentage"];
							}
						}
						array_push($response["curr_order_detail"],$curr_order_detail);
					}
					//array_push($response["curr_order_detail"],$curr_order_detail);
			}$response["success"]=1;
			echo json_encode($response);
		}else{
			$response["success"]=0;
			$response["message"]="no orders available";
			echo json_encode($response);
		}
	}
}
//Baker order id to display current order details end


?>

<?php
/*if ($insert>0 && $ins>0) {
	$mail->Subject = "Documet Added";
	$body = "Dear Sir/Ma'am, <br> &nbsp;&nbsp;&nbsp;&nbsp; The document: ".$docname." has been submitted successfully. <br> Thank you for using Trincsoft.com";
	$mail->msgHTML($body);
	$address = $email;
	$mail->addAddress($address);
	$address1 = $email1;
	$mail->addAddress($address1);
	$mail->send();

	$response["success"]=1;
	$response["message"]="Documet Uploaded successfully";
	echo json_encode($response);
}*/

/*//baker display all product from baker id start
if(isset($_GET['custbaker_allproduct'])){
	if(isset($_POST) && !empty($_POST)){
		$offerid;
		$b_id= $_POST['b_id'];
		$q=$d->select("product,subcategory","product.b_id='$b_id' AND product.sub_id = subcategory.sub_id  ");//AND product.of_id=offer.of_id
		
		if(mysqli_num_rows($q)>0){
		$response["product"]= array();
		while ($row = mysqli_fetch_array($q)) {
			$product = array();
			$product["p_photo"]=$row["p_photo"];
			$product["p_name"]=$row["p_name"];
			$product["p_price"]=$row["p_price"];
			$product["p_description"]=$row["p_description"];
			$product["b_id"]=$row["b_id"];
			$product["p_id"]=$row["p_id"];
			$product["sub_id"]=$row["sub_id"];
			$product["sub_name"]=$row["sub_name"];
			$product["of_id"]=$row["of_id"];
			$offerid=$row["of_id"];
			if ($offerid==null) {
				array_push($response["product"],$product);				
			}else{
				$que = $d->select("offer","of_id='$offerid'");
				if(mysqli_num_rows($que)>0){
					while ($row = mysqli_fetch_array($que)) {
						$product["of_description"]=$row["of_description"];
						$product["of_start"]=$row["of_start"];
						$product["of_end"]=$row["of_end"];
						$product["of_percentage"]=$row["of_percentage"];
					}
				}
				array_push($response["product"],$product);
			}
		}	$response["success"]=1;
		echo json_encode($response);
		}else{
			$response["success"]=0;
			$response["message"]="no product available";
			echo json_encode($response);
		}
	}
}
//baker display all product from baker id end*/

/*//customer display single product form subcategory product start
if(isset($_GET['cust_oneproduct'])){
	if(isset($_POST) && !empty($_POST)){
		$p_id= $_POST['p_id'];
		$q=$d->select("product","p_id='$p_id'");
		$basepath="http://192.168.43.181/AdminLTEold/photo/product/";
		if(mysqli_num_rows($q)>0){
		$response["product"]= array();
		while ($row = mysqli_fetch_array($q)) {
			$product = array();
			$product["sub_id"]=$row["sub_id"];
			$product["p_id"]=$row["p_id"];
			$product["p_name"]=$row["p_name"];			
			$product["p_price"]=$row["p_price"];
			$product["p_description"]=$row["p_description"];
			$product["p_photo"]=$basepath.$row["p_photo"];
			array_push($response["product"],$product);
		}	$response["success"]=1;
		echo json_encode($response);
		}else{
			$response["success"]=0;
			$response["message"]="no product available";
			echo json_encode($response);
		}
	}
}
//customer display single product form subcategory product end*/
?>