<?php
$total_count = count($_FILES['user_files']['name']);


include 'conn.php'; 
try{
	$post_data = $_POST;
	$company_name = (array_key_exists("company_name",$post_data))?$post_data['company_name']:'';
	$email = (array_key_exists("email",$post_data))?$post_data['email']:'';
	$mobile = (array_key_exists("mobile",$post_data))?$post_data['mobile']:'';
	$hr_name = (array_key_exists("hr_name",$post_data))?$post_data['hr_name']:'';
	$address = (array_key_exists("address",$post_data))?$post_data['address']:'';
	$user_password = (array_key_exists("user_password",$post_data))?$post_data['user_password']:'';
	$user_password = md5($user_password);
	if(!isset($company_name) && !isset($email) && !isset($mobile) && !isset($hr_name) && !isset($user_password)){
		throw new Exception('Something went wrong...!');
	}

	$sql = "INSERT INTO `users`(`company_name`, `email`, `mobile`, `hr_name`, `address`, `password`) VALUES ('$company_name','$email','$mobile','$hr_name','$address','$user_password')";
	if ($conn->query($sql) !== TRUE) {
		throw new Exception('Something went wrong...!');
	}
 	$user_id = $conn->insert_id;
	for( $i=0 ; $i < $total_count ; $i++ ) {
	   $tmpFilePath = $_FILES['user_files']['tmp_name'][$i];
	   if ($tmpFilePath != ""){
	   	$name = time(). $_FILES['user_files']['name'][$i];
	      $newFilePath = "./uploads/" .$name;
	      //File is uploaded to temp dir
	      if(move_uploaded_file($tmpFilePath, $newFilePath)) {
	        $sql = "INSERT INTO `user_imgs`(`user_id`, `image_name`) VALUES ('$user_id','$name')";
			if ($conn->query($sql) !== TRUE) {
				throw new Exception('Something went wrong...!');
			}
	      }
	   }
	}
	
}catch(Exception $e){
	$message = $e->getMessage();
}

header("Location: ".$path."display.php");
die();

?>