<?php 
	
	//Constants for database connection
	define('DB_HOST','localhost');
	define('DB_USER','root');
	define('DB_PASS','');
	define('DB_NAME','forno');

	//We will upload files to this folder
	//So one thing don't forget, also create a folder named uploads inside your project folder i.e. MyApi folder
	define('UPLOAD_PATH', 'photo/');
	
	//connecting to database 
	$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME) or die('Unable to connect');
	

	//An array to display the response
	$response = array();

	//if the call is an api call 
	if(isset($_GET['apicall'])){
		
		//switching the api call 
		switch($_GET['apicall']){
			
			//if it is an upload call we will upload the image
			case 'uploadpic':
				
				//first confirming that we have the image and tags in the request parameter
				if(isset($_FILES['pic']['name']) && isset($_POST['tags'])){
					
					//uploading file and storing it to database as well 
					try{
						move_uploaded_file($_FILES['pic']['tmp_name'], UPLOAD_PATH . $_FILES['pic']['name']);
						$stmt = $conn->prepare("INSERT INTO images (image, tags) VALUES (?,?)");
						$stmt->bind_param("ss", $_FILES['pic']['name'],$_POST['tags']);
						if($stmt->execute()){
							$response['error'] = false;
							$response['message'] = 'File uploaded successfully';
						}else{
							throw new Exception("Could not upload file");
						}
					}catch(Exception $e){
						$response['error'] = true;
						$response['message'] = 'Could not upload file';
					}
					
				}else{
					$response['error'] = true;
					$response['message'] = "Required params not available";
				}
			
			break;
			
			//in this call we will fetch all the images 
			case 'getpics':
		
				//getting server ip for building image url 
				$server_ip = gethostbyname(gethostname());
				
				//query to get images from database
				$stmt = $conn->prepare("SELECT id, image, tags FROM images");
				$stmt->execute();
				$stmt->bind_result($id, $image, $tags);
				
				$images = array();

				//fetching all the images from database
				//and pushing it to array 
				while($stmt->fetch()){
					$temp = array();
					$temp['id'] = $id; 
					//$temp['image'] = 'http://' . $server_ip . '/MyApi/'. UPLOAD_PATH . $image; 
					$temp['image'] = 'http://192.168.43.181/AdminLTEold/'. UPLOAD_PATH . $image; 
					//http://192.168.43.181/AdminLTEold/
					$temp['tags'] = $tags; 
					
					array_push($images, $temp);
				}
				
				//pushing the array in response 
				$response['error'] = false;
				$response['images'] = $images; 
			break; 
			
			default: 
				$response['error'] = true;
				$response['message'] = 'Invalid api call';
		}
		
	}else{
		header("HTTP/1.0 404 Not Found");
		echo "<h1>404 Not Found</h1>";
		echo "The page that you have requested could not be found.";
		exit();
	}
	
	//displaying the response in json 
	header('Content-Type: application/json');
	echo json_encode($response);



	/*//baker product add start
if (isset($_GET['baker_addpro'])) {
	if(isset($_POST) && !empty($_POST))
	{
		try{
			if(isset($_POST['p_name']) && isset($_POST['p_description']) &&
				isset($_POST['p_price']) && isset($_POST['sub_id']) && 
				isset($_POST['b_id']) && isset($_POST['p_photo'])) 
			{
				$last_auto_id = $d ->last_auto_id("p_id");
				$res=mysqli_fetch_array($last_auto_id);
				$p_id = $res['Auto_increment'];

				$img = $_POST['p_photo'];
				$img = str_replace('data:img/png;base64,','',$img);
				$img = str_replace('','+',$img);
				$data = base64_decode($img);
				$img_name = $p_name . '.png';
				$file = UPLOAD_DIR . $img_name;
				$success = file_put_contents($file,$data);

				$m->set_data('p_name',$p_name);
				$m->set_data('p_description',$p_description);
				$m->set_data('p_price',$p_price);
				$m->set_data('sub_id',$sub_id);
				$m->set_data('b_id',$b_id);
				$m->set_data('p_photo',$p_photo);

				$a1 = array('p_name' => $m->get_data('p_name'),
							'p_description' => $m->get_data('p_description'),
							'p_price' => $m->get_data('p_price'),
							'sub_id' => $m->get_data('sub_id'),
							'b_id' => $m->get_data('b_id'),
							'p_photo' => $m->get_data('p_photo'),
							);

				$insert = $d-> insert('product',$a1);

				if ($insert>0) {
					$response["p_name"] = $p_name;
					$response["p_description"] = $p_description;
					$response["p_price"] = $p_price;
					$response["sub_id"] = $sub_id;
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
//baker product add end*/