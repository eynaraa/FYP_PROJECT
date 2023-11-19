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
        width: 100%;
    }

    .header {
        background-color: beige;
        height: 80px;
        border-bottom:10px solid #c19a6b;
        width: 100%;
    }
    
    .table {
        width: 100%;
    border-collapse: separate;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    left: 50px;
    top: 100px;
    border: 3px solid black;
    border-style: dashed;
    border-radius: 18px;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    font-size: 15px;
    }

  .table th {
    background-color: #7B3F00;
    color:beige;
  }

  .table tr {
    background-color:  beige;
  }

  .table tbody tr {
    border-bottom: 3px beige;
  }


  .table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
  }

  .update a {
    background-color: #7B3F00;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    border-radius: 15px;
  }

  .delete a {
    background-color: red;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    border-radius: 13px;
  }


    .base {
    width: 100%;
    height: 570px;
    border-radius: 15px;
    border: 2px solid white;
    text-align: center;
    background-color: rgba(255, 255, 255, 0.685);
    padding: 3vh 5%;
    overflow: hidden;
    }

  .h2 {
    font-family: cambruCambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    font-weight: bold;
    font-size: 30px;
    color: #7B3F00;
    padding-bottom: 3vh;
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
    top: -100px;
    left: -250px;
    width: 20%;
  }

  #btnBackMenu:hover {
    background-color: yellow;
    color: green;
    border-color: green;
  }

  #btnAddStock {
    background-color: beige;
    color: #66350F;
    font-size: 15px;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    border: 3px solid #c19a6b;
    border-radius: 10px;
    border-style: dashed;
    font-weight: bold;
    position: absolute;
    top: 175px;
    left: 1080px;
    width: 15%;
  }

  #btnAddStock:hover {
    background-color: #66350F;
    color: beige;
    border-color: beige;
  }

  .h5 {
            color: #66350F;
            font-size: 50px;
            position: absolute;
            left: 635px;
            top: 10px;
        
        }

  .emptyBase{
    width: 100%;
    height: auto;
    padding-top: 10vh;
    padding-bottom: 1vh;
    padding-left: 10%;
    padding-right: 10%;

  }

  .scrollPart{
    width: 100%;
    height: 400px;
    overflow: hidden;
  }
  .scrollPart2{
    width: 100%;
    height: 400px;
    overflow-y: scroll;
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
  
</style>
</head>
<body align="center">

<?php 

    echo '<div class="header">
    <h5 class="h5"> Santan Segar </h5>
    <a href="adminHome.html"><input type="button" id="btnBackMenu" value="< Back To Admin Menu"></a>
    </div>
    <div class="emptyBase">
    ';

  //call file to connect server SUMS
  include ("header.php");
?>

<?php 
  //make the query
  $q = "SELECT userID, userPassword, userName, userPhoneNo, userEmail, userAddress FROM user ORDER BY userID";
  
  //run the query and assign it to the variable $result
  $result = @mysqli_query ($connect, $q);
  
  echo '<div class="base">
  <h2 class="h2">List of User</h2>
  <table border ="2" class="table">
        <tr>
          <th style="width: 190px; height: 50px;" align="center">NAME</th>
          <th style="width: 200px; height: 50px;" align="center">PASSWORD</th>
          <th style="width: 140px; height: 50px;" align="center">PHONE NO</th>
          <th style="width: 210px; height: 50px;" align="center">EMAIL</th>
          <th style="width: 220px; height: 50px;" align="center">ADDRESS</th>
          <th style="width: 138px; height: 50px;" align="center">UPDATE</th>
          <th style="width: 138px; height: 50px;" align="center">DELETE</th>
        </tr>
  </table>';

  if ($result)
  {
    //Table heading
        echo '
        <div class="scrollPart">
        <div class="scrollPart2">
      <table border ="2" class="table">
      
    </div>';
  

  //Fetch and print all the records
  while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
  {
    echo '<tr>
    <td style="width: 220px; padding: 10px 15px;" align="center">'.$row['userName'].'</td>
    <td style="width: 230px; padding: 0 15px;">'.$row['userPassword'].'</td>
    <td style="width: 150px; padding: 0 15px; text-align: center;">'.$row['userPhoneNo'].'</td>
    <td style="width: 138px; padding: 0 15px; text-align: center;">'.$row['userEmail'].'</td>
    <td style="width: 250px; padding: 0 15px; text-align: center;">'.$row['userAddress'].'</td>
    <td style="width: 138px;" align="center" class="update" ><a href="userUpdate.php?id='.$row['userID'].'">Update</a></td>
    <td style="width: 138px;" align="center" class="delete"><a  href="userDelete.php?id='.$row['userID'].'">Delete</a></td>
    </tr>
    
    ';
  }
  
  //close the table
  echo '</table>
  </div>
  </div>';
  
  //free up the resources
  mysqli_free_result ($result);
  //if failed to run 
  
  }
  else
  {
    //error message
    echo '<p class="error">The current user could not be retrieved. We apologize for any inconvenience.</p>';
    
    //debugging message
    echo '<p>'.mysqli_error ($connect).'<br><br/>Query:'.$q.'</p>';
  }//end of if ($result)
  //close the database connection
  mysqli_close($connect);

    echo'
  <a href="userRegister.php"><input type="button" id="btnAddStock" value="Add User"></a>
  ';
?>
</div>
</div>
</div>
</body>
</html>