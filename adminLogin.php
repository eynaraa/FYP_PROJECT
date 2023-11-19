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


        table, th, tr, td {
            
            padding: 8px 3%;
        }

        .table {
            position: absolute;
            top: 170px;
            left: 580px;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 20px;
            padding: 50px 3%;
            border-style: dashed;
            border-color: #c19a6b;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        .table button {
            background-color: #c19a6b;
            color: beige;
            padding: 8px 8%;
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

        .h2 {
            
            color: #7B3F00;
            font-size: 33px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            
        }

        .row1 {
            width: 300px;
            text-align: center;
            color:#c19a6b;
            padding-top: 30px;
            font-size: 20px;
        }

        .row2 {
            text-align: center;

        }

        #adminEmail {
            border-radius: 15px;
            width: 80%;
            height: 25px;
            text-align:center;
            border-color: #7B3F00;
        }

        #adminPassword {
            border-radius: 15px;
            width: 80%;
            height: 25px;
            text-align:center;
            border-color: #7B3F00;
        }

        .row3 {
            width: 300px;
            font-size: 20px;
            text-align: center;
            color: #c19a6b;
            padding-top: 30px;
        }

        .row4 {
            text-align: center;
            padding-bottom: 30px;
        }

        .row5 {
            text-align: center;
        }

        .row6 {
            padding-top:20px;
            text-align: center;
            font-family: caCambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            color: #c19a6b;
            font-size: 18px;
        }

        .logo {
            width: 13%;
            position: absolute;
            left: 680px;
            top: 10px;
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

        .error {
            position: absolute;
            top: 600px;
            left: 530px;
            text-align: center;
        }

        
    </style>
</head>
<body>
  <?php
  //call file to connect server SUMS
  include ("header.php");
  ?>
  
  <?php
  //This section processes submission from the login form
  //Check if the form has been submitted
  if ($_SERVER['REQUEST_METHOD']=='POST')
  {
  
    //validate the adminID
    if (!empty($_POST['adminEmail']))
    {
      $e = mysqli_real_escape_string($connect, $_POST['adminEmail']);
    }
    else
    {
      $e = FAlSE;
      echo '<p class = "error" You forgot to enter your ID.</p>';
    }
    
    //validate the adminPassword
    if (!empty($_POST['adminPassword']))
    {
      $p = mysqli_real_escape_string($connect, $_POST['adminPassword']);
    }
    else
    {
      $p = FALSE;
      echo '<p class = "error"> You forgot to enter your password.</p>';
    }
    
    //if no problem
    if ($e && $p)
    {
      //Retrieve the adminID, adminPassword, adminName, adminPhoneNo, adminEmail
      $q = "SELECT adminId, adminPassword, adminName, adminPhoneNo, adminEmail FROM admin WHERE (adminEmail = '$e' AND adminPassword = '$p')";
      
      //run the query and assign it to the variable $result
      $result = mysqli_query ($connect, $q);
      
      //count the number of rows that match the adminID/adminPassword combination 
      //if one database row (record) matches the input:
      if(@mysqli_num_rows ($result) == 1)
      {
        //start the session, fetch and record and insert the three values in an array
        session_start();
        $_SESSION = mysqli_fetch_array($result, MYSQLI_ASSOC);
        
        header( 'Location:adminHome.html');
        //cancel the rest of the script
        exit();
        
        mysqli_free_result ($result);
        mysqli_close ($connect);
        //no match was made
        
      }
      else
      {
        echo '<p class ="error"> The adminEmail and adminPassword entered do not match our records <br> perhaps you need to register, just click the Register button </p>';
      }
      
    //if there was a problem
    }
    else
    {
      echo '<p class ="error"> Please try again. </p>';
    }
    mysqli_close($connect);
}//end of submit conditional

  ?>
  
  
  <form action="adminLogin.php" method="post">
    <div class="header">
        <h5 class="h5"> Santan Segar </h5>
    </div>
  <div class="table">
        <table>
            <h2 class="h2" align ="center"><i class="fa-solid fa-user" id="userIcon"></i>ADMIN LOGIN </h2>
  
            <tr>
                <th class="row1"><label for="adminEmail">Admin Email:</label></th>  
            </tr>
            
            <tr>
                <td class="row2"><input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="adminEmail" name="adminEmail" size="30" 
        maxlength="50" required value="<?php if (isset($_POST['adminEmail'])) echo $_POST ['adminEmail'];?>"></td>
            </tr>
            
            <tr>
                <th class="row3"><label for="adminPassword">Password:</label></th>
                
            </tr>
            
            <tr>
                <td class="row4"><input type="password" id="adminPassword" name="adminPassword" size="15" maxlength="60" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" 
                required value="<?php if (isset($_POST['adminPassword'])) echo $_POST ['adminPassword'];?>"></td>
            </tr>

            <tr>
                <td class="row5"><button type="submit" class="submit">Login</button>&nbsp;&nbsp;&nbsp;<button type="reset" class="reset">Reset</button></td>
                
            </tr>

            
        </table>
  </div>
</form>
</body>
</html>