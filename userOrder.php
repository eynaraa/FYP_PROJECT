<html>
<head>
  <title>Santan Segar Smart Order</title>
  <style>
    *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: url("images/bg.jpg");
            background-attachment: fixed;
            background-size:cover;
        }

        .header {
            background-color: white;
            height: 80px;
            border-bottom:10px solid green;
            width: 100%;
        }

        .subwaylogo {
            position: absolute;
            left: 30px;
        }

        .logo {
            width: 13%;
            position: absolute;
            left: 680px;
            top: 10px;
        }

    .base {
            position: absolute;
            top: 130px;
            left: 550px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 20px;
            padding: 50px 3%;
            border-style: dashed;
            border-color: green;
            width: 30%;
            height: 550px;
        }

        table {
            text-align: center;
            position: absolute;
            left: 90px;
            top: 105px;
            color: green;
        }

        table, th, tr, td {
            
            padding: 8px 3%;
        }

    .h2 {
            color: green;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            text-align:center;
        }

    .input {
            background-color:white;
            border-color: yellow;
            text-align: center;
            border-radius: 15px;
            height: 25px;
        }

    #submit {
            background-color: green;
            color: yellow;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 13px;
            width: 100px;
            border: none;
            font-size: 15px;
            position: absolute;
            top: 380px;
            left: 90px;
            font-weight: bold;
        }

    #submit:hover {
      background-color: yellow;
      color: green;
    }

        #btnBackMenu {
            background-color: green;
            color: yellow;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border: 3px solid yellow;
            border-radius: 10px;
            border-style: dashed;
            font-weight: bold;
            position: absolute;
            left: 20px;
            top: 20px;
            width: 200px;
        }

        #btnBackMenu:hover {
            background-color: yellow;
            color: green;
            border-color: green;
        }


    
  </style>
</head>
<body>
  <?php

  echo '<div class="header">
  <img class="logo" src="images/subway.png">
  <a href="stockList.php"><input type="button" id="btnBackMenu" value="< Back To List Of Stock"></a>

</div>';
  //call file to connect server SUMS
  include ("header.php");
  ?>
  
  <?php 
  //look for a valid user id, either through GET or POST
  if ((isset ($_GET['id'])) && (is_numeric($_GET['id'])))
  {
    $id = $_GET['id'];
  }
  else if ((isset ($_POST['id'])) && (is_numeric($_POST['id'])))
  {
    $id = $_POST['id'];
  }
  else 
  {
    echo '<p class="error">This page has been accessed in error.</p>';
    exit();
  }
  
  if ($_SERVER['REQUEST_METHOD']=='POST')
  {
    $error = array ();//initialize an error array
  
  //look for a stockName
  if (empty ($_POST ['productName']))
  {
    $error [] = 'You forgot to enter the product name.';
  }
  else
  {
    $n = mysqli_real_escape_string ($connect, trim ($_POST ['productName']));
  }
  
  //look for a stockTotal
  if (empty ($_POST ['productWeight']))
  {
    $error [] = 'You forgot to enter the weight of product.';
  }
  else
  {
    $ph = mysqli_real_escape_string ($connect, trim ($_POST ['productWeight']));
  }

  if (empty ($_POST ['productPrice']))
  {
    $error [] = 'You forgot to enter the price of product.';
  }
  else
  {
    $p = mysqli_real_escape_string ($connect, trim ($_POST ['productPrice']));
  }
  
  
  //if no problem occured
  if (empty($error))
  {
    $q = "SELECT productID FROM product WHERE productName= '$n' AND productID !=$id";
    
    $result = @mysqli_query ($connect, $q);//run the query
    
  if (mysqli_num_rows ($result) == 0)
  {
    $q = "INSERT INTO product (productID, productName, productWeight, productPrice) VALUES ('', '$n', '$w', '$p')";
    $result = @mysqli_query ($connect, $q);//run the query
    
    if (mysqli_affected_rows($connect) == 1)
    {
      echo '<script>alert("The product has been edited");
      window.location.href="adminEditProduct.php";</script>';
    }
    else
    {
      echo '<p class="error">The user has not been edited due to the system error. We apologize for any inconvenince.</p>';
      echo '<p>'.mysqli_error($connect).'<br/> query:'.$q.'</p>';
    }
  }
  else 
  {
    echo '<p class="error">The product had been registered<p/>';
  }
    }
    else
    {
      echo '<p class="error">The following error (s) occured: <br/>';
      foreach ($error as $msg)
      {
        echo "-msg<br>\n";
      }
      echo '<p><p>Please try again.<p>';
    }
  }
  
  $q = "SELECT productName, productWeight, productPrice FROM product WHERE productID = $id";
  
  $result = @mysqli_query ($connect, $q); //run the query
  
  if (mysqli_num_rows($result) ==1)
  {
    //get admin information
    $row =mysqli_fetch_array($result, MYSQLI_NUM);
    
    //create the form
    echo'
        <div class="base">
            <h2 class="h2">Edit Product Record</h2>
            <table>
                <tr>
                    <th><form action="userOrder.php" method="post"><label class="label" for="productName">Product Name*:</label></th>
                </tr>
                <tr>
                    <td>'.$row[0].'</td>
                </tr>
                <tr>
                    <th><label class="label" for="productWeight">Weight Product*:</label></th>
                </tr>
                <tr>
                    <td >'.$row[1].'></td>
                </tr>
                <tr>
                    <th><label class="label" for="productPrice">Product Price*:</label></th>
                </tr>
                <tr>
                    <td >'.$row[2].'></td>
                </tr>
                <tr>
                    <th><label class="label" for="time">Time delivery*:</label></th>
                </tr>
                <tr>
                    <td ><input type="tel" class="input" id="productPrice" name="productPrice" size="15" maxlength="20" value="'.$row[2].'"></td>
                </tr>
                <tr>
                    <td><input id="submit" type="submit" name="submit" value="Update"><input type="hidden" name="id" value="'.$id.'"/></td>
                </tr>
            </form>
        </div>';
  }
  else
  {//if it didn't run-in
    //message
    echo '<p class="error">This page has been accessed in error<p>';
  }//end of it ($result)
  mysqli_close($connect); //close the database connection_aborted
  ?>
</body>
</html>