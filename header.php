<html>
<head>
  <title>Database Connection</title>
</head>
<body>
  <?php
  
  //connect to server
  $connect = mysqli_connect("localhost","root", "", "ssos");
  
  if (!$connect)
  {
    die ('ERROR:' .mysqli_connect_error());
  }
  
  ?>
</body>
</html>