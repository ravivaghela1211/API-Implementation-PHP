<?php

	session_start();
	$id=$_POST['id'];
	$url="http://localhost/rest_api/demo/user/$id";
	$apiKey="ravi123";

	$username="admin";
	$password="1234";

	$data=array(
		'name'=>$_POST['name'],
		'city'=>$_POST['city'],
		'spi'=>$_POST['spi']
	);
	if(!empty($data['name']) && !empty($data['city']) && !empty($data['spi'])){ 
	$ch=curl_init($url);
	curl_setopt($ch, CURLOPT_TIMEOUT,30);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_HTTPAUTH,CURLAUTH_ANY);
	curl_setopt($ch, CURLOPT_HTTPHEADER,array("X-API-KEY: " . $apiKey,'Content-Type: application/x-www-form-urlencoded'));
	curl_setopt($ch, CURLOPT_USERPWD,"$username:$password");
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'PUT');
	curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
	
	$result= json_decode(curl_exec($ch)); 
	if($result->status == 1)
	{
		$_SESSION['status']=$result->message;
		$_SESSION['status_code']="success";
		header('Location:index.php');
	}
	curl_close($ch);
	}
	else{
		header('Location:index.php');
	}
?>