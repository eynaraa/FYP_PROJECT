<?php

  session_start();

  if (isset($_GET['add-to-cart'])){
     $product_id = $_GET['add-to-cart'];
     $product_name = $_GET['hidden_name'];
     $product_price = $_GET['hidden_price'];
     $product_image = $_GET['hidden_image'];
     $product_weight = $_GET['hidden_weight'];


     if (isset($_SESSION['cart'][$product_id]))
     {
        $_SESSION['cart'][$product_id]['quantity']++;

     }
     else 
     {
      $_SESSION['cart'][$product_id] = array (
        'name' => $product_name,
        'price' => $product_price,
        'image' => $product_image,
        'weight' => $product_weight,
        'quantity' => 1
      );
     }
  }
?>  
<!Doctype html>
<html lang ="en">
  <head>
    <title>Santan Segar Smart Order</title>
    <script>
        function toggleCreditCardInput() {
            var paymentMethod = document.getElementById("custPayment").value;
            var creditCardInput = document.getElementById("custCardCred");

            if (paymentMethod === "COD") {
                creditCardInput.disabled = true;
            } else {
                creditCardInput.disabled = false;
            }
        }
    </script>
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
            height: auto;

        }

        #contentPart{

            text-align: center;
            width: 100%;
            height: 827px;
            background: red;
            padding-top: 50px;
        }

        .catPart {
            width: 100%;
            height: 100px;
            align-items: center;
            padding: 10px 0;
        }

        .catPart .catPart2 {
            width: 100%;
            height: 80px;
            background-color: yellow;
            text-align: center;
            border-radius: 20px 20px 0 0;
            padding: 10px 0;
        }

        .h5 {
            color: #66350F;
            font-size: 50px;
            position: absolute;
            left: 635px;
            top: 10px;

        }

        .h6 {
            color: #66350F;
            font-size: 50px;
            position: absolute;
            left: 635px;
            top: 10px;

        }



        .header {
            background-color: beige;
            height: 80px;
            border-bottom:10px solid #c19a6b;
            width: 100%;
            margin-bottom: 20px;
            
        }

        #menu h2{
            
            font-size: 80px;
            font-family: 'Courier New', Courier, monospace;
            font-weight: bold;
            color: #66350F;
            padding: 5px 3%;
            border-style: dashed;
            border-color: #c19a6b;
            background-color: beige;
            text-align: center;
            
        }

        #menu .menu{
            width: 100%;
            height: 1100px;
            overflow: hidden;
            background-color: rgb(255, 255, 255, 0.7);
            border-style: dashed;
            border-color: #c19a6b;
            
        }

        #menu .menu .productsPart{
            width: 80%;
            margin: 10vh auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            grid-column-gap: 1.5rem;
            grid-row-gap: 1rem;
            overflow-y:scroll;
            height: 920px;
            
        }

        #menu .productsPart #newCart{
            width: 100%;
            height: 450px;
            background-color: rgb(250, 233, 201);
            padding: 20px 0;
            border: 3px solid #c19a6b;
            border-style: dashed;
            border-radius: 20px;
            transition: transform .4s;
        }

    

        #menu .productsPart #newCart .newTable{
            width: 100%;
            height: 200px;
            
        }

        #menu .productsPart #newCart .newTable img{
            width: 90%;
            height: 250px;
            border: 1px solid black;
            border-radius: 10px;
            align-items: center;
            margin-left: 10px;
            
        }

        #menu .productsPart #newCart .newTable li{
            padding: 5px 0;
            list-style: none;
            text-align: center;
            color: #66350F;
        }

        #menu .productsPart #newCart .newTable .li1{
            font-size: 25px;
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-weight: bold;
            text-align: center;
            color: #66350F;
            
        }

        #menu .productsPart #newCart .newTable .li2{
            font-size: 15px;
            font-family: 'Courier New', Courier, monospace;
            font-weight: bold;
            text-align: center;
            color: #66350F;
        }

        #menu .productsPart #newCart .newTable .li3{
            font-size: 20px;
            font-family: 'Courier New', Courier, monospace;
            font-weight: bold;
            text-align: center;
            color: red;
        }

        #menu .productsPart #newCart p{
            padding: 25vh 0;
            text-align: center;
        }

        #menu .productsPart #newCart p button{
            width: 45%;
            height: 30px;
            border: 3px #66350F;
            border-style: dashed;
            border-radius: 10px;
            background-color: beige;
            color: #66350F;
            transition: .4s;
            
        }

        #menu .productsPart #newCart p button:hover{
            background-color: #66350F;
            color: beige;
            border: 3px beige;
            border-style: dashed;
        
        }

        .listOrder{
            width: 100%;
            height: 1000px;
            padding: 50px 20%;
            background-color: rgba(245, 222, 179, 0.651);
            border-style: dashed;
            color: black;
        }

        .listOrder h2{
            font-size: 80px;
            font-family: 'Courier New', Courier, monospace;
            font-weight: bold;
            color: white;
            padding: 0 20%;
            background-color: rgba(0, 0, 0, 0.514);
            border-radius: 30px 30px 0 0;
        }

        .listOrder button{
            width: 30%;
            height: 30px;
            border-radius: 0 0 30px 30px;
            border: 1px solid white;
            background-color: purple;
            font-size: 20px;
            font-family: 'Courier New', Courier, monospace;
            font-weight: bold;
            transition: .4s;
            color: white;
        }
        .listOrder button:hover{
            background-color: pink;
            color: black;
        }

        .listOrder .list{
            width: 100%;
            height: 700px;
            background-color: rgba(255, 255, 255, 0.644);
            overflow: hidden;
            border: 2px solid black;
        }

        .listOrder .list .top{
            width: 100%;
            height: 50px;
            background-color: black;
            padding: 10px 0;
            padding-left: 100px;
            display: flex;
            justify-content: space-between;
            color: white;
            font-size: 30px;
            font-family: 'Courier New', Courier, monospace;
            font-weight: bold;
        }

        .listOrder .list .listPart{
            width: 100%;
            height: 600px;
            overflow-y: scroll;
            padding: 30px 30px;
        }

        .listOrder .list .listPart .cart-item{
            width: 100%;
            height: 180px;
            padding: 15px 0;
        }

        .listOrder .list .listPart .cart-item .part{
            width: 100%;
            height: 150px;
            display: flex;
            overflow: hidden;
            background-color: rgba(0, 0, 0, 0.452);
            border: 2px solid black;
            border-radius: 20px;
        }

        .listOrder .list .listPart .cart-item .part img{
            width: 200px;
            height: 150px;
        }

        .listOrder .list .listPart .cart-item .part .top1{
            display: flex;
            justify-content: space-between;
            width: 90%;
            height: 100px;
            padding: 50px 30px;
        }

        .listOrder .list .listPart .cart-item .part .top1 h4{
            font-size: 30px;
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: white;
            -webkit-text-stroke: 1px black;
            color: white;
            text-align: center;
        }

        .listOrder .list .listPart .cart-item .part .top1 h5{
            font-size: 20px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            padding: 10px 0;
            color: yellow
        }

        .listOrder .list .listPart .cart-item .part .top1 h6{
            font-size: 20px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            padding: 10px 0;
            color: yellow
        }

        .listOrder .list .listPart .cart-item .part .top1 span{
            width: 100px;
            height: 30px;
            padding: 5px 20px;
            background-color: rgba(255, 0, 0, 0.74);
            color: white;
            border-radius: 10px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        .listOrder .list .listPart .cart-item .part .bottom1{
            width: 100px;
            height: auto;
            padding: 35px 20px;
            background-color: white;
            font-size: 20px;
        }

        .payment{
            width: 100%;
            height: 900px;
            align-items: center;
            padding: 18vh 20%;
            background-color: #0003;
        }

        .paymentTitle{
            width: 100%;
            height: 90px;
            background-color: rgba(128, 0, 128, 0.596);
            text-align: center;
            font-family: 'Courier New', Courier, monospace;
            font-size: 40px;
            color: white;
            font-weight: 600;
            border-radius: 20px 20px 0 0;
            padding: 10px 0;
            box-shadow: 20px 20px 20px black;
        }

        .paymentTable{
            width: 100%;
            height: 450px;
            background-color: rgb(44, 44, 44);
            border-radius: 0 0 20px 20px;
            text-align: center;
            padding: 0 10%;
            box-shadow: 20px 20px 20px black;
        }

        .paymentTable h3{
            padding: 20px 0;
            font-size: 60px;
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-style: italic;
            color: #9D00FF;
            text-decoration: none;
        }

        .paymentTable h3 span{
            font-family:'Times New Roman', Times, serif;
            color: white;
            font-style: normal;
        }

        .paymentTable table{
            width: 100%;
            height: 300px;
            border-style: dashed;
            border-radius: 20px;
            color: white;
            font-family: 'Arial';
            font-size: 17px;
            font-style: italic;
            padding-top: 2vh;
        }

        .paymentTable table img{
            width: 200px;
        }
        .paymentTable table tr .col1{
            width: 40%;
            height: 70px;
        }

        .paymentTable table tr .col2{
            width: 3%;
        }

        .paymentTable table tr .col3{
            width: 57%;
        }

        .paymentTable table tr .col3 #orderName{
            width: 90%;
            height: 40px;
            border-radius: 5px;
            border: 0;
            font-size: 20px;
            text-align: center;
        }

        .paymentTable table tr td #orderPhoneNo{
            width: 90%;
            height: 40px;
            border-radius: 5px;
            border: 0;
            font-size: 20px;
            text-align: center;
        }

        .paymentTable table tr .rc1{
            font-size: 30px;
            padding: 10px 0;
            padding-left: 5%;
            color: yellow;
        }

        .paymentTable table tr .rc1 #date{
            width: 70%;
            height: 30px;
            border-radius: 5px;
            border: 0;
        }

        .paymentTable table tr .rc3{
            color: yellow;
        }

        .paymentTable table tr .rc3 #noPin{
            width: 50%;
            height: 40px;
            border-radius: 5px;
            border: 0;
            font-size: 20px;
            text-align: center;
        }

        .paymentTable table tr th{
            height: 80px;
        }

        .paymentTable table tr th .confirmBtn{
            width: 150px;
            height: 30px;
            border-radius: 10px;
            border: 0;
            color: black;
            background-color: rgb(253, 162, 177);
            font-family: 'Courier New', Courier, monospace;
            font-size: 17px;
            font-weight: 800;
            transition: .4s;
        }

        .paymentTable table tr th .confirmBtn:hover{
            background-color: purple;
            color: white;
            box-shadow: 10px 10px 10px rgb(250, 202, 210);
        }

        .image {

            text-align: center;
        }

        .view {
            position: absolute;
            left: 1300px;
            top: 30px;
           
        }

        #btnLogout {
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
            width: 10%;
            position: absolute;
            left: 1350px;
            top: 20px;
        }

        #btnLogout:hover {
            border-style: dashed;
            border-color: beige;
            background-color: #66350F;
            color: beige;
        }

        #logoutIcon {
            position: absolute;
            left: 1470px;
            top: 30px;
            font-size: 20px;
            color: red;
        }

        #viewCart {
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
            width: 10%;
            position: absolute;
            left: 1180px;
            top: 20px;
        }

        #viewCart:hover {
            border-style: dashed;
            border-color: beige;
            background-color: #66350F;
            color: beige;
        }

        
    </style>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


  </head>
  <body>
    <div class="header">
      <h5 class="h5"> Santan Segar </h5>
      <a href="cart.php"><input type="button" id="viewCart" value="View Cart"></a>
      <a href="startPage.html"><input type="button" id="btnLogout" value="Logout"></a><i class="fa-solid fa-right-from-bracket" id="logoutIcon"></i>
    </div>
    
    <div class="cartPart" id="menu">
            <h2>PRODUCT</h2>
            
            <div class="menu">
                <div class="productsPart">

                <?php

include("header.php");

$q = "SELECT * FROM product ORDER BY productID";

$result = @mysqli_query ($connect, $q);

echo '<script>console.log("'.$q.'");</script>';

if($result){
    while(($row=mysqli_fetch_array($result, MYSQLI_ASSOC))){
        echo '
        <form method="GET" action="userProduct.php">
        <div id="newCart">
        <div class="newTable">
            <img src="'.$row['productImage'].'" class = "image">
            <li class="li1">'.$row['productName'].'</li>';

            if($row['productQuantity']<= 0){
                echo '
                <li class="li2">RM '.$row['productPrice'].'</li>;
                <li class="li2">'.$row['productWeight'].' g</li>
                <li class="li3">SOLD OUT</li></div>';
            }else{
                echo '
                <li class="li2">RM '.$row['productPrice'].'</li>;
                <li class="li2">'.$row['productWeight'].' g</li>';
                echo '
                <input type="hidden" name="hidden_name" value="'.$row['productName'].'" />  
                <input type="hidden" name="hidden_price" value="'.$row['productPrice'].'" />
                <input type="hidden" name="hidden_image" value="'.$row['productImage'].'" /> 
                <input type="hidden" name="hidden_weight" value="'.$row['productWeight'].'" /> 
                </div>
                <p><button name="add-to-cart" class="bag-btn" value="'.$row['productID'].'">ADD</button></p>';
            }
            echo'
            </div>
        </form>
        ';
    }

    mysqli_free_result($result);

}else{
    echo '<p class="error">The current user could not be retrieved. We apologize for any inconvenience.</p>';

    echo '<p>'.mysqli_error($connect).'<br><br/>Query:'.$q.'</p>';

}

mysqli_close($connect);

?>
                </div>
            </div>
        </div>




        
</body>