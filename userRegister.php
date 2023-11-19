<html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
  <title>Santan Segar Ordering System</title>
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

    table, th, td {
            
        padding: 8px 3%;
            
    }

    .table {
        position: absolute;
        top: 100px;
        left: 580px;
        background-color: rgba(255, 255, 255, 0.7);
        border-radius: 20px;
        padding: 30px 3%;
        border-style: dashed;
        border-color: #c19a6b;
        height: 635px;
    }

    .table button {
        background-color: #c19a6b;
        color: beige;
        padding: 8px 8%;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        transition: .4s;
    }

    .table button:hover {
      background-color: green;
            color: white;
    }

    .h1 {
      color: #7B3F00;
            font-size: 30px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

    .h2 {
            
        color: #7B3F00;
        font-size: 30px;
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

    #userPassword {
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

    #userName {
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

    #userPhoneNo {
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
    }

    #userEmail {
      border-radius: 15px;
            width: 80%;
            height: 25px;
            text-align:center;
            border-color: #7B3F00;
    }

    .row9 {
        color: green;
        color: #c19a6b;
        font-size: 20px;
            
    }

    #userAddress {
      border-radius: 15px;
      width: 95%;
      height: 60px;
      text-align:center;
      border-color: #7B3F00;
      
    }

    .row10 {
      padding-bottom: 18px;
      text-align: center;
    }

    .row11 {
      text-align: center;
      color: #c19a6b;
        font-size: 20px;
    }

    .row12 {
      
      text-align: center;
      padding-bottom: 0px;
    }

    .h5 {
      color: #66350F;
      font-size: 50px;
      position: absolute;
      left: 635px;
      top: 10px;
        
    }

    #userIcon {
      padding-right: 20px;
      color: #7B3F00;
    }

    .base {
      border-style:dashed;
      border-radius:10px;
      width: 62%;
      padding: 15px 5%;
      background-color:beige;
      position:absolute;
      top: 250px;
      left: 300px;
      text-align: center;
      
      border-color: #7B3F00;
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
    
  //check for an userPassword
  if (empty ($_POST ['userPassword']))
  {
    $error [] = 'You forgot to the password.';
  }
  else
  {
    $p = mysqli_real_escape_string ($connect, trim ($_POST ['userPassword']));
  }
  //check for an userPhoneNo
  if (empty ($_POST ['userName']))
  {
    $error [] = 'You forgot to enter your name.';
  }
  else
  {
    $n = mysqli_real_escape_string ($connect, trim ($_POST ['userName']));
  }
  
  //check for userEmail
  if (empty ($_POST ['userPhoneNo']))
  {
    $error [] = 'You forgot to enter your phone number.';
  }
  else
  {
    $ph = mysqli_real_escape_string ($connect, trim ($_POST ['userPhoneNo']));
  }
  
  //check for user email
  if (empty ($_POST ['userEmail']))
  {
    $error [] = 'You forgot to enter your email.';
  }
  else 
  {
    $e = mysqli_real_escape_string ($connect, trim ($_POST ['userEmail']));
  }
  
  //check for userAddress
  if (empty ($_POST ['userAddress']))
  {
    $error [] = 'Ypu forgot to enter your address.';
  }
  else
  {
    $ad = mysqli_real_escape_string ($connect, trim ($_POST ['userAddress']));
  }

  
  //register the user in the database
  //make the query:
  $q = "INSERT INTO user (userID, userPassword, userName, userPhoneNo, userEmail, userAddress) 
  VALUES ('', '$p', '$n', '$ph', '$e', '$ad')";
  $result = @mysqli_query ($connect, $q);//run the query
  if ($result) //if it runs
  {
    echo 
    '<div class="header">
      <h5 class="h5"> Santan Segar </h5>
    </div>';
    echo '
    <div class="base">
      <h1 class="h1">Your account have been registered. Please <a href="userLogin.php">login</a> again</h1>
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
  
  
  <form action="userRegister.php" method ="post">
  <div class="header">
        <h5 class="h5"> Santan Segar </h5>
        
    </div>
  <div class="table">
    <table>
      <h2 class="h2"><i class="fa-solid fa-user" id="userIcon"></i>Register User </h2>
      
      <tr>
        <th class="row1"><label for="userPassword">Password:</label></th>
      </tr>
      
      <tr>
        <td class="row2"><input type="password" id="userPassword" name="userPassword" size ="15" maxlength="60"
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and 
        lowercase letter, and at least 8 or more characters" required value="<?php if (isset($_POST['userPassword'])) 
        echo $_POST ['userPassword'];?>"></td>
      </tr>
      
      <tr>
        <th class="row3"><label for="userName">User Name*:</label></th>
      </tr>

      <tr>
        <td class="row4"><input type="text" id="userName" name="userName" size ="30" maxlength="50" 
        required value="<?php if (isset($_POST['userName'])) echo $_POST ['userName'];?>"></td>
      </tr>

      <tr>
        <th class="row5"><label for="userPhoneNo">Phone No.*:</label></th>
      </tr>

      <tr>
        <td class="row6"><input type="tel " pattern = "[0-9]{3}-[0-9]{7}" id="userPhoneNo" name="userPhoneNo" size ="15" maxlength="20" 
        required value="<?php if (isset($_POST['userPhoneNo'])) echo $_POST ['userPhoneNo'];?>"></td>
      </tr>

<tr>
        <th class="row7"><label for="userEmail">User Email*:</label></th>
      </tr>

      <tr>
        <td class="row8"><input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="userEmail" name="userEmail" size="30" 
        maxlength="50" required value="<?php if (isset($_POST['userEmail'])) echo $_POST ['userEmail'];?>"></td>
      </tr>

      <tr>
        <th class="row9"><label for="userAddress">User Address*:</label></th>
      </tr>

      <tr>
        <td class="row10"><textarea id="userAddress" name="userAddress" size ="30" maxlength="50" 
        required value="<?php if (isset($_POST['userAddress'])) echo $_POST ['userAddress'];?>"></textarea></td>
      </tr>
    
      <tr>
        <td class="row12"><button type="submit">Register</button>&nbsp;&nbsp;&nbsp;<button type="reset">Clear All</button></td>
      </tr>
    </table>
    
  </div>
  </form>
</body>
</html>