<html>
<head>
  <title>Subway Management System</title>
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
            background-color: beige;
            height: 80px;
            border-bottom:10px solid #c19a6b;
            width: 100%;
        }

        .base {
            position: absolute;
            top: 80px;
            left: 550px;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 20px;
            margin-top: 20px;
            padding: 35px 3%;
            border-style: dashed;
            border-color: #c19a6b;
            width: 30%;
            height: 620px;
        }

        .base table {
            text-align: center;
            color: #c19a6b;
            font-size: 20px;
            width:100%
        }

        table, th, tr, td {
            
            margin-top: 15px;
            padding: 8px 10%;
        }

        .base h2 {
            color: #7B3F00;
            font-size: 33px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            text-align: center;
        }

        .input {
            background-color:white;
            border-color: black;
            text-align: center;
            border-radius: 15px;
            height: 25px;
        }

        .inputAddress {
            background-color:white;
            border-color: black;
            text-align: center;
            border-radius: 15px;
            height: 60px;
            width: 100%;
        }

        #submit {
            background-color: beige;
            color: #66350F;
            font-size: 15px;
            padding: 5px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border: 3px solid #c19a6b;
            border-radius: 10px;
            border-style: dashed;
            font-weight: bold;
            width: 100px;
            position: absolute;
            top:568px;
            left: 178px;

        }

        #submit:hover {
            background-color: #66350F;
            color: beige;
            border-style: dashed;
            border-color: beige;
        }


        #btnBackMenu {
            background-color: #c19a6b;
            color: beige;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border: 3px solid #66350F;
            border-radius: 10px;
            border-style: dashed;
            font-weight: bold;
            position: absolute;
            left: 20px;
            top: 20px;
            width: 200px;
        }

        #btnBackMenu:hover {
            
            border-style: dashed;
            border-color: beige;
            background-color: #66350F;
            color: beige;
        }

        .h5 {
            color: #66350F;
            font-size: 50px;
            position: absolute;
            left: 635px;
            top: 10px;
        
        }

        .instruction {
          color: #66350F;
          font-size: 10px;
          text-align: center;
          padding-top: 0px;
         
        }
        

    </style>
</head>
<body>
  <?php

    echo '<div class="header">
        <h5 class="h5"> Santan Segar </h5>
    <a href="adminEditProduct.php"><input type="button" id="btnBackMenu" value="< Back To List Of Admin"></a>

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
  
  //look for a userName
  if (empty ($_POST ['productName']))
  {
    $error [] = 'You forgot to enter your product name.';
  }
  else
  {
    $name = mysqli_real_escape_string ($connect, trim ($_POST ['productName']));
  }
  
  //look for a userPhoneNo
  if (empty ($_POST ['productPrice']))
  {
    $error [] = 'You forgot to enter your product price.';
  }
  else
  {
    $price = mysqli_real_escape_string ($connect, trim ($_POST ['productPrice']));
  }
  
  //look for a userEmail
  if (empty ($_POST ['productWeight']))
  {
    $error [] = 'You forgot to enter your product weight.';
  }
  else 
  {
    $weight = mysqli_real_escape_string ($connect, trim ($_POST ['productWeight']));
  }
  
  //check for userAddress
  if (empty ($_POST ['productQuantity']))
  {
    $error [] = 'You forgot to enter your product quantity.';
  }
  else 
  {
    $qty = mysqli_real_escape_string ($connect, trim ($_POST ['productQuantity']));
  }

  if (empty ($_POST ['productImage']))
  {
    $error [] = 'You forgot to enter your product quantity.';
  }
  else 
  {
    $image = mysqli_real_escape_string ($connect, trim ($_POST ['productImage']));
  }


  
  //check for a user position

  //if no problem occured
  if (empty($error))
  {
    $q = "SELECT productID FROM product WHERE productName= '$n' AND productID != $id";
    
    $result = @mysqli_query ($connect, $q);//run the query
    
  if (mysqli_num_rows ($result) == 0)
  {
    $q="UPDATE product SET productImage = '$image', productName = '$name', productPrice = '$price', productWeight = '$weight', productQuantity='$qty' WHERE productID = $id LIMIT 1";
    
    $result = @mysqli_query($connect, $q);//run the query
    
    if (mysqli_affected_rows($connect) == 1)
    {
      echo '<script>alert("Product has been edited");
      window.location.href="adminEditProduct.php";</script>';
    }
    else
    {
      echo '<p class="error">The user has not been edited due to the system error. 
      We apologize for any inconvenince.</p>';
      echo '<p>'.mysqli_error($connect).'<br/> query:'.$q.'</p>';
    }
  }
  else 
  {
    echo '<p class="error">The id had been registered<p/>';
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
  
  $q = "SELECT productName,productPrice, productWeight,productQuantity, productImage FROM product WHERE productID = $id";
  
  $result = @mysqli_query ($connect, $q); //run the query
  
  if (mysqli_num_rows($result) ==1)
  {
    //get admin information
    $row =mysqli_fetch_array($result, MYSQLI_NUM);
    
    //create the form
        echo'
        <div class="base">
            <h2>Edit Product Record</h2>
            <table>
                <tr>
                    <th><form action="productUpdate.php" method="post"><label class="label" for="productName">Product Name*:</label></th>
                </tr>
                <tr>
                    <td ><input type="text" class="input" id="productName" name="productName" size="30" maxlength="70" required value="'.$row[0].'"></td>
                </tr>
                <tr>
                    <th><label class="label" for="productPrice">Product Price*:</label></th>
                </tr>
                <tr>
                    <td ><input type="tel" class="input" id="productPrice" name="productPrice" size ="5" maxlength="5"
                    required value="'.$row[1].'"></td>
                </tr>
                <tr>
                    <th><label class="label" for="productWeight">Product Weight*:</label></th>
                </tr>
                <tr>
                    <td><input type="tel"  class="input" id="productWeight" name="productWeight" 
                    size="5" maxlength="5" required value="'. $row[2].'"></td>
                </tr>
                <tr>
                    <th><label class="label" for="productQuantity">Product Quantity*:</label></th>
                </tr>
                <tr>
                  <td><input  class="input" type="tel" id="productQuantity" name="productQuantity" size="5" maxlength="5" required value="'.$row[3].'"></td>
                </tr>
                <tr>
                    <th><label class="label" for="productImage">Product Image*:</label></th>
                </tr>
                <tr>
                  <td class="instruction">*./Your Folder Name/Image Name.png/jpg/jpeg</td>
                </tr>
                <tr>
                  <td><input class="input" type="text" name="productImage" size="30" maxlength="80" required value="'.$row[4].'" /></td>
                </tr>
                <tr>
                    <td><input id="submit" type="submit" name="submit" value="Update">
                    <input type="hidden" name="id" value="'.$id.'"/></td>
                </tr>
            </table>    
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