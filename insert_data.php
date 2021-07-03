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
  <form action="insert_process.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">City</label>
    <input type="text" class="form-control" name="city">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">SPI</label>
    <input type="text" class="form-control" name="spi">
  </div>
 
  <input type="submit" name="submit" class="btn btn-primary">
</form>
  </div>
  </body>
</html>