<?php
  $id=$_GET['id'];
  if(!empty($id)){
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

  
  $result=json_decode($response=curl_exec($ch));
  
  curl_close($ch);
  }else{
    header('Location:index.php');
  }
?>
<html lang="en">
  <head>
    <!-- Required meta tags --> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>USER DATA</title>
    <style type="text/css">
      body {
  background: #dd5e89;
  background: -webkit-linear-gradient(to left, #dd5e89, #f7bb97);
  background: linear-gradient(to left, #dd5e89, #f7bb97);
  min-height: 100vh;
}
    </style>
  </head>
  <body>
    <div class="container">
  <h2>ADD DATA</h2>
  <form action="update_process.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="hidden" name="id" value="<?php echo $result[0]->id?>">
    <input type="text" class="form-control" name="name" aria-describedby="emailHelp" value="<?php echo $result[0]->name?>">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">City</label>
    <input type="text" class="form-control" name="city" value="<?php echo $result[0]->city?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">SPI</label>
    <input type="text" class="form-control" name="spi" value="<?php echo $result[0]->spi?>">
  </div>
 
  <input type="submit" name="submit" class="btn btn-primary">
</form>
  </div>
  </body>
</html>