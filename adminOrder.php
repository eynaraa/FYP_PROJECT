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
    padding: 3vh 2%;
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
    padding-left: 1%;
    padding-right: 1%;

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

        .image {

          text-align: center;
          width: 90%;
            height: 100px;
            border: 1px solid black;
            border-radius: 10px;
            align-items: center;
            margin-left: 10px;
        }

        
  
</style>
</head>
<body align="center">

<?php 

    echo '<div class="header">
    <h5 class="h5"> Santan Segar </h5>
    <a href="adminList.php"><input type="button" id="btnBackMenu" value="< Back To List Of Admin"></a>
    </div>
    <div class="emptyBase">
    ';

  //call file to connect server SUMS
  include ("header.php");
?>

<?php 
  //make the query
  $q = "SELECT custID, custName, custPhoneNo, custEmail,custAddress, custItem, custQuantity, custPrice, custWeight, custTotal, custSession, custPayment FROM cust ORDER BY custID";
  
  //run the query and assign it to the variable $result
  $result = @mysqli_query ($connect, $q);
  
  echo '<div class="base">
  <h2 class="h2">List of Order</h2>
  <table border ="2" class="table">
        <tr>
          <th style="width: 150px; height: 50px;" align="center">NAME</th>
          <th style="width: 115px; height: 50px;" align="center">PHONE NO</th>
          <th style="width: 170px; height: 50px;" align="center">EMAIL</th>
          <th style="width: 118px; height: 50px;" align="center">ADDRESS</th>
          <th style="width: 100px; height: 50px;" align="center">ORDER ITEM</th>
          <th style="width: 95px; height: 50px;" align="center">QUANTITY</th>
          <th style="width: 98px; height: 50px;" align="center">PRICE PER UNIT</th>
          <th style="width: 98px; height: 50px;" align="center">WEIGHT</th>
          <th style="width: 100px; height: 50px;" align="center">TOTAL PRICE</th>
          <th style="width: 100px; height: 50px;" align="center">SESSION</th>
          <th style="width: 100px; height: 50px;" align="center">PAYMENT METHOD</th>
          <th style="width: 95px; height: 50px;" align="center">STATUS</th>
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
    
    <td style="width: 150px; height: 80px; padding: 10 15px; text-align: center;">'.$row['custName'].'</td>
    <td style="width: 120px; padding: 0 15px; text-align: center;">'.$row['custPhoneNo'].'</td>
    <td style="width: 100px;  padding: 0 15px; text-align: center;">'.$row['custEmail'].'</td>
    <td style="width: 120px; padding: 0 15px; text-align: center;">'.$row['custAddress'].'</td>
    <td style="width: 100px; padding: 0 15px; text-align: center;">'.$row['custItem'].'</td>
    <td style="width: 100px; padding: 0 15px; text-align: center;">'.$row['custQuantity'].'</td>
    <td style="width: 100px; padding: 0 15px; text-align: center;">RM '.$row['custPrice'].'</td>
    <td style="width: 100px; padding: 0 15px; text-align: center;">'.$row['custWeight'].' g</td>
    <td style="width: 100px; padding: 0 15px; text-align: center;">RM '.$row['custTotal'].'</td>
    <td style="width: 100px; padding: 0 15px; text-align: center;">'.$row['custSession'].'</td>
    <td style="width: 100px; padding: 0 15px; text-align: center;">'.$row['custPayment'].'</td>
    <td style="width: 80px;" align="center" class="delete"><a  href="adminDoneOrder.php?id='.$row['custID'].'">Done</a></td>
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
  <a href="adminHome.html"><input type="button" id="btnBackMenu" value="< Back To Admin Menu"></a>
  ';
?>
</div>
</div>
</div>
</body>
</html>