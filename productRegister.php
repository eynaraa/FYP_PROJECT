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
            background-color: beige;
            height: 80px;
            border-bottom:10px solid #c19a6b;
            width: 100%;
        }

        .h5 {
            color: #66350F;
            font-size: 50px;
            position: absolute;
            left: 635px;
            top: 10px;
        
        }

        table, th, td {
            
            padding: 8px 3%;
        }

        .table {
            position: absolute;
            top: 110px;
            left: 580px;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 20px;
            padding: 5px 3%;
            border-style: dashed;
            border-color: #c19a6b;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            
        }

        .table button {
            background-color: #c19a6b;
            color: beige;
            padding: 5px 5%;
            border: 3px solid beige;
            border-style: dashed;
            border-radius: 10px;
            font-weight: 600;
            transition: .4s;
        }

        .table button:hover {
            background-color: beige;
            color: #7B3F00;
            transition: .4s;
            border-color: #c19a6b;
            font-weight: bold;
        }

        .h1 {
            color: #7B3F00;
            font-size: 30px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        .h2 {
            color: #7B3F00;
            font-size: 35px;
            text-align: center;
        }

        .h4 {
            color: black;
            font-size: 15px;
            text-align: center;
        }

        .row1 {
            font-size: 20px;
            width: 300px;
            text-align: center;
            color: #c19a6b;
            padding-top: 30px;
        }

        .row2 {
            text-align: center;
        }

        #productName {
            border-radius: 15px;
            width: 80%;
            height: 25px;
            text-align:center;
            border-color: #7B3F00;
        }

        .row3 {
            text-align: center;
            color: #c19a6b;
            font-size: 20px;
        }

        .row4 {
            text-align: center;
        }

        #productWeight {
            border-radius: 15px;
            width: 80%;
            height: 25px;
            text-align:center;
            border-color: #7B3F00;
        }

        .row5 {
            text-align: center;
            color: #c19a6b;
            font-size: 20px;
        }

        .row6 {
            text-align: center;
        }

        #productPrice {
            border-radius: 15px;
            width: 80%;
            height: 25px;
            text-align:center;
            border-color: #7B3F00;
        }

        .row7 {
            text-align: center;
            color: #c19a6b;
            font-size: 20px;
        }

        .row8 {
            text-align: center;
            padding-bottom: 15px;
        }

        #productQuantity {
            border-radius: 15px;
            width: 80%;
            height: 25px;
            text-align:center;
            border-color: #7B3F00;
        }

        #productImage {
            border-radius: 15px;
            width: 110%;
            height: 25px;
            text-align:center;
            border-color: #7B3F00;
        }

        .row9 {
            text-align: center;
            color: #c19a6b;
            font-size: 20px;
        }

        .row10 {
            text-align: center;
            padding-top: 30px;
        }


        .logo {
            width: 13%;
            position: absolute;
            left: 680px;
            top: 10px;
        }

        .instruction {
          color: #66350F;
          font-size: 10px;
          text-align: center;
          padding-top: 0px;
         
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

        .base {
            position: absolute;
            top: 200px;
            left: 380px;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 20px;
            padding: 50px 3%;
            border-style: dashed;
            border-color: #c19a6b;
            width: 55%;
            height: 150px;
        }

        


</style>
</head>
<body>
  <?php
  //call file to connect server SUMS
  include ("header.php");
  ?>
  <?php
  //This query inserts record in the SUMS table
  //has form been submitted?
  if ($_SERVER['REQUEST_METHOD']== 'POST')
  {
    $error = array ();//initialize an error array
    
  
    //check for an adminPassword
  if (empty ($_POST ['productName']))
  {
    $error [] = 'You forgot to the product name.';
  }
  else
  {
    $n = mysqli_real_escape_string ($connect, trim ($_POST ['productName']));
  }

  if (empty ($_POST ['productWeight']))
  {
    $error [] = 'You forgot to the weight of product.';
  }
  else
  {
    $w = mysqli_real_escape_string ($connect, trim ($_POST ['productWeight']));
  }

  if (empty ($_POST ['productPrice']))
  {
    $error [] = 'You forgot to the price of product.';
  }
  else
  {
    $p = mysqli_real_escape_string ($connect, trim ($_POST ['productPrice']));
  }

  if (empty ($_POST ['productImage']))
  {
    $error [] = 'You forgot to the input image of product.';
  }
  else
  {
    $i = mysqli_real_escape_string ($connect, trim ($_POST ['productImage']));
  }

  if (empty ($_POST ['productQuantity']))
  {
    $error [] = 'You forgot to the enter quantity of product.';
  }
  else
  {
    $qty = mysqli_real_escape_string ($connect, trim ($_POST ['productQuantity']));
  }
  
  
  //register the admin in the database
  //make the query:
  $q = "INSERT INTO product (productID, productName, productPrice, productImage, productWeight, productQuantity ) VALUES ('', '$n', '$p', '$i', '$w', '$qty')";
  $result = @mysqli_query ($connect, $q);//run the query
  if ($result) //if it runs
  {
        echo 
        '<div class="header">
            <h5 class="h5"> Santan Segar </h5>
        </div>';
    echo '
        <div class="base">
            <h1 class="h1">You have added new product. See the <a href="adminEditProduct.php">list</a> of product?</h1>
            
        </div>';
        exit();
  }
  else
  { //if it didn't run
    //message 
    echo '<h1>System error</h1>';
    
    //debugging message 
    echo '<p>' .mysqli_error($connect). '<br><br>Query: '.$q. '</p>';
  } //end of it (result)
  mysqli_close($connect); //close the database connection_aborted
  exit();
  } //end of the main submit conditional
  ?>
  
  
  <form action="productRegister.php" method ="post">
        <div class="header">
            <h5 class="h5"> Santan Segar </h5>
            <a href="adminEditProduct.php"><input type="button" id="btnBackMenu" value="< Back To List Of Product"></a>
        </div>
  <div class="table">
        <h2 class="h2"> Register Stock </h2>
      <h4 class="h4"> *required field </h4>
        <table>
            <tr>
                <th class="row1"><label for="productName">Product Name:</label></th>
            </tr>

            <tr>
                <td class="row2"><input type="text" id="productName" name="productName" size ="15" maxlength="60" 
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" 
                required value="<?php if (isset($_POST['productName'])) echo $_POST ['productName'];?>"></td>
            </tr>

            <tr>
                <th class="row3"><label for="productWeight">Product Weight*:</label></th>
            </tr>
            
            <tr>
                <td class="row4"><input type="text" id="productWeight" name="productWeight" size ="3" maxlength="4" 
                required value="<?php if (isset($_POST['productWeight'])) echo $_POST ['productWeight'];?>"></td>
            </tr>

            <tr>
                <th class="row5"><label for="productPrice">Product Price*:</label></th>
            </tr>
            
            <tr>
                <td class="row6"><input type="text" id="productPrice" name="productPrice" size ="3" maxlength="4" 
                required value="<?php if (isset($_POST['productPrice'])) echo $_POST ['productPrice'];?>"></td>
            </tr>

            <tr>
                <th class="row7"><label for="productQuantity">Product Quantity*:</label></th>
            </tr>
            
            <tr>
                <td class="row8"><input type="text" id="productQuantity" name="productQuantity" size ="4" maxlength="5" 
                required value="<?php if (isset($_POST['productQuantity'])) echo $_POST ['productQuantity'];?>"></td>
            </tr>

            <tr>
                <th class="row9"><label for="productImage">Product Image*:</label></th>
            </tr>

            <tr>
                <td class="row9"><input type="text" id="productImage" name="productImage" size ="255" maxlength="255" placeholder="./Your Folder Name/Image Name.png/jpg/jpeg"
                required value="<?php if (isset($_POST['productImage'])) echo $_POST ['productImage'];?>"></td>
            </tr>

            <tr>
                <td class="row10"><button type="submit" class="submit">Register</button>&nbsp;&nbsp;&nbsp;<button type="reset" class="reset">Clear All</button></td>
            </tr>
        </table>
    </div>
  </form>
</body>
</html>