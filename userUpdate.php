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

        table {
            text-align: center;
            position: absolute;
            left: 90px;
            top: 100px;
            color: #c19a6b;
            font-size: 20px;
        }

        table, th, tr, td {
            
            padding: 8px 3%;
        }

        .h2 {
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
            top:465px;
            left: 80px;

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
        

    </style>
</head>
<body>
  <?php

    echo '<div class="header">
        <h5 class="h5"> Santan Segar </h5>
    <a href="userList.php"><input type="button" id="btnBackMenu" value="< Back To List Of User"></a>

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
  if (empty ($_POST ['userName']))
  {
    $error [] = 'You forgot to enter your name.';
  }
  else
  {
    $n = mysqli_real_escape_string ($connect, trim ($_POST ['userName']));
  }
  
  //look for a userPhoneNo
  if (empty ($_POST ['userPhoneNo']))
  {
    $error [] = 'You forgot to enter your phone number.';
  }
  else
  {
    $ph = mysqli_real_escape_string ($connect, trim ($_POST ['userPhoneNo']));
  }
  
  //look for a userEmail
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
    $error [] = 'You forgot to enter your address.';
  }
  else 
  {
    $ad = mysqli_real_escape_string ($connect, trim ($_POST ['userAddress']));
  }

  if (empty ($_POST ['userPassword']))
  {
    $error [] = 'You forgot to enter your password.';
  }
  else 
  {
    $p = mysqli_real_escape_string ($connect, trim ($_POST ['userPassword']));
  }
  
  //check for a user position

  //if no problem occured
  if (empty($error))
  {
    $q = "SELECT userID FROM user WHERE userName= '$n' AND userID !=$id";
    
    $result = @mysqli_query ($connect, $q);//run the query
    
  if (mysqli_num_rows ($result) == 0)
  {
    $q="UPDATE user SET userName = '$n', userPhoneNo = '$ph', userEmail = '$e', userAddress='$ad', userPassword = '$p' WHERE userID = '$id' LIMIT 1";
    
    $result = @mysqli_query($connect, $q);//run the query
    
    if (mysqli_affected_rows($connect) == 1)
    {
      echo '<script>alert("User has been edited");
      window.location.href="userList.php";</script>';
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
  
  $q = "SELECT  userName,userPassword, userPhoneNo, userEmail, userAddress FROM user WHERE userID = $id";
  
  $result = @mysqli_query ($connect, $q); //run the query
  
  if (mysqli_num_rows($result) ==1)
  {
    //get admin information
    $row =mysqli_fetch_array($result, MYSQLI_NUM);
    
    //create the form
        echo'
        <div class="base">
            <h2 class="h2">Edit User Record</h2>
            <table>
                <tr>
                    <th><form action="userUpdate.php" method="post"><label class="label" for="userName">User Name*:</label></th>
                </tr>
                <tr>
                    <td ><input type="text" class="input"id="userName" name="userName" size="30" maxlength="50" value="'.$row[0].'"></td>
                </tr>
                <tr>
                    <th><form action="userUpdate.php" method="post"><label class="label" for="userPassword">Password*:</label></th>
                </tr>
                <tr>
                    <td ><input type="text" class="input"id="userPassword" name="userPassword" size ="15" maxlength="60"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and 
                    lowercase letter, and at least 8 or more characters" value="'.$row[1].'"></td>
                </tr>
                <tr>
                    <th><label class="label" for="userPhoneNo">Phone No.*:</label></th>
                </tr>
                <tr>
                    <td><input type="tel"  class="input" pattern="[0-9]{3}-[0-9]{7}" id="userPhoneNo" name="userPhoneNo" 
                    size="15" maxlength="20" value="'.$row[2].'"></td>
                </tr>
                <tr>
                    <th><label class="label" for="userEmail">Email*:</label></th>
                </tr>
                <tr>

<td><input  class="input" type="text" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
                    id="userEmail" name="userEmail" size="30" maxlength="50" required value="'.$row[3].'"></td>
                </tr>
                <tr>
                    <th><label class="label" for="userAddress">User Address*:</label></th>
                </tr>
                <tr>
                    <td ><input type="text" class="inputAddress" id="userAddress" name="userAddress" size="30" 
                    maxlength="50" value="'.$row[4].'"></textarea></td>
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