<?php
  session_start();
	$url="http://localhost/rest_api/demo/user/";
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
  // print_r($result);
	curl_close($ch);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Student_Record</title>
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
  <h2><center><b><u>Student Info!</u></b></center></h2>
  <?php 
    if(empty($result->message))
    {
  ?>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>No.</th>
        <th>Name</th>
        <th>City</th>
        <th>Spi</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $i=null;
        foreach ($result as $row )
        {
         $i++;
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row->name; ?></td>
        <td><?php echo $row->city; ?></td>
        <td><?php echo $row->spi; ?></td>
        <td><a class="btn btn-primary" href="update.php?id=<?php echo $row->id?>">Edit</a></td>
        <td><a class="btn btn-danger" href="delete.php?id=<?php echo $row->id?>">Delete</a></td>
      </tr>
      <?php
        }
       
      ?>
    </tbody>
  </table>
  <?php }
        else{
           echo "<center><h1>".$result->message."</h1></center>";
        }

  ?>
  <a href="insert_data.php"><input type="submit" value="Insert Data" class="btn btn-primary"></a>

</div>
</body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php
    if(isset($_SESSION['status']) && $_SESSION['status'] !="")
    {

     ?>
    <script type="text/javascript">
      swal({
      title: "<?php echo $_SESSION['status']?>",
    
      icon: "<?php echo $_SESSION['status_code']?>",
    });
    </script>
    <?php
      unset($_SESSION['status']);
      unset($_SESSION['status_code']);
    }
    ?>
</html>