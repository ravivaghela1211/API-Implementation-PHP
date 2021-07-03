<?php
	session_start();
	$id=$_GET['id'];
	$url="http://localhost/rest_api/demo/user/$id";
	
	$apiKey="ravi123";

	$username="admin";
	$password="1234";

	$ch=curl_init($url);
	curl_setopt($ch, CURLOPT_TIMEOUT,30);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_HTTPAUTH,CURLAUTH_ANY);
	curl_setopt($ch, CURLOPT_HTTPHEADER,array("X-API-KEY: " . $apiKey));
	curl_setopt($ch, CURLOPT_USERPWD,"$username:$password");
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'DELETE');
	$result= json_decode(curl_exec($ch)); 
	if($result->status == 1)
	{
		$_SESSION['status']=$result->message;
		$_SESSION['status_code']="success";
		header('Location:index.php');
	}
	curl_close($ch);
?>