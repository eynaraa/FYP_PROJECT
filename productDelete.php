
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

        

        .base {
            position: absolute;
            top: 200px;
            left: 380px;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 20px;
            padding: 50px 3%;
            border-style: dashed;
            border-color: #c19a6b;
            width: 50%;
            height: 300px;
        }

        .h2 {
            text-align: center;
            color: #c19a6b;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-size: 30px;
        }

        .h3 {
            position: absolute;
            left: 450px;
            top: 320px;
            color:red;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-size: 23px;
        }

        #submit-yes {
            background-color: green;
            color: yellow;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 13px;
            width: 100px;
            border: none;
            position: absolute;
            left: 660px;
            top: 400px;
            font-size: 20px;
        }

        #submit-no {
            background-color: red;
            color: yellow;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 13px;
            width: 100px;
            border: none;
            position: absolute;
            left: 780px;
            top: 400px;
            font-size: 20px;
        }
        .h5 {
            color: #66350F;
            font-size: 50px;
            position: absolute;
            left: 635px;
            top: 10px;

        }

    </style>
</head>
<body>
  <?php

echo '<div class="header">
      <h5 class="h5"> Santan Segar </h5>
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
    if ($_POST['sure']=='Yes')//Delete the record
    {
      //make the query
      $q = "DELETE FROM product WHERE productID = $id LIMIT 1";
      $result = @mysqli_query ($connect, $q); //run the query
      
      if (mysqli_affected_rows($connect)==1)//if there was a problem
      //display message
      {
        echo'<script>alert("The product has been deleted");
        window.location.href="adminEditProduct.php";</script>';
      }
      else
      {
        //display error message
        echo '<p class="error">The record could not be deleted.<br>Probably 
        because it does not exist or due to system error.</p>';
        
        echo '<p>'.mysqli_error($connect).'<br/> Query:'.$q.'</p>';
        //debugging message
      }
    }
    else
    {
      echo '<script>alert("The product has NOT been deleted");
      window.location.href="adminEditProduct.php";</script>';
    }
  }
  else
  {
    //display the form
    //retrieve the member's data
    
    $q = "SELECT productName FROM product WHERE productID = $id";
    $result = @mysqli_query ($connect, $q);
    
    if (mysqli_num_rows($result) ==1)
    {
      //get admin information
      $row =  mysqli_fetch_array($result, MYSQLI_NUM);
            echo'
            <div class="base">
                <h2 class="h2">Delete Product Record</h2>
            </div>';
      echo "<h3 class=h3>Are you sure you want to permanently delete $row[0]? </h3>";
      echo '<form action="productDelete.php" method="post">
      <input id="submit-yes" type="submit" name="sure" value="Yes">
      <input id="submit-no" type="submit" name="sure" value="No">
      <input type="hidden" name="id" value="'.$id.'">
  </form>';
    }
    else
    {//if it didn't run
      //message
      echo '<p class="error">This page has been accessed in error<p>';
      echo '<p>&nbsp;</p>';
    }//end of it (result)
  }
  mysqli_close($connect);//close the database connection aborted

    
    
  ?>

    
      
</body>
</html>