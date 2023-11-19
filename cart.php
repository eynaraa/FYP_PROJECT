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

        function toggleDiv() {
            var div = document.getElementById('receipt');
            
            if (div.classList.contains('hidden')) {
                div.classList.remove('hidden');
                alert("scroll down to view receipt");
            } else {
                div.classList.add('hidden');
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



        .header {
            background-color: beige;
            height: 80px;
            border-bottom:10px solid #c19a6b;
            width: 100%;
            
        }

        #menu h2{
            margin: 20px 0;
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
            
            color: black;
        }

        .listOrder h2{
            
            font-size: 80px;
            font-family: 'Courier New', Courier, monospace;
            font-weight: bold;
            color: #66350F;
            padding: 0px 2%;
            border-style: dashed;
            border-color: #c19a6b;
            background-color: beige;
            text-align: center;
        }

        .goBack {
            position: absolute;
            top: 1000px;
            left:300px;
            width: 20%;
            height: 30px;
            
            border: 1px solid white;
            background-color: purple;
            font-size: 20px;
            font-family: 'Courier New', Courier, monospace;
            font-weight: bold;
            transition: .4s;
            color: white;
        }

        .confirm {
            position: absolute;
            top: 930px;
            left:1000px;
            width: 12%;
            height: 30px;
            
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
            margin-top: 3px;
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
            font-size: 50px;
        }

        .payment{
            width: 100%;
            height: 850px;
            align-items: center;
            padding: 18vh 20%;
            background-color: rgba(255, 255, 255, 0.685);
        }

        .paymentTitle{
            width: 100%;
            height: 90px;
            border-style: dashed;
            border-color: beige;
            background-color: #c19a6b;
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
            background-color: beige;
            border-radius: 0 0 20px 20px;
            text-align: center;
            padding: 8vh 10%;
            box-shadow: 20px 20px 20px black;
        }

        .paymentTable h3{
            padding: 20px 0;
            font-size: 60px;
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-style: italic;
            color: black;
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
            color: black;
            font-family: 'Arial';
            font-size: 17px;
            font-style: bold;
            text-align: start;
            padding-top: 2vh;
            padding-left: 5vh;
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
            text-align: start;
        }

        .paymentTable table tr td #orderPhoneNo{
            width: 90%;
            height: 40px;
            border-radius: 5px;
            border: 0;
            font-size: 20px;
            text-align: start;
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
            text-align: start;
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

        #receipt {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        #receipt-header {
            text-align: center;
            margin-bottom: 20px;
        }
        #receipt-items {
            border-collapse: collapse;
            width: 100%;
        }
        #receipt-items th, #receipt-items td {
            border: 1px solid #ccc;
            padding: 8px;
        }
        #receipt-items th {
            background-color: #f2f2f2;
        }
        .print-button {
            text-align: center;
            margin-top: 20px;
        }

        .hidden {
            display: none;
        }

        .remove-item {
            width: 15%;
            height: 30px;
            border: 1px solid white;
            background-color: purple;
            font-size: 20px;
            font-family: 'Courier New', Courier, monospace;
            font-weight: bold;
            transition: .4s;
            color: white;
        }

        .input {
            text-align:center;
            border-color: #7B3F00;
            border-radius: 15px;
            height: 25px;
            width: 50%;
        }

        .select {
            background-color: #c19a6b;
            color: beige;
            border-radius: 20px;
            width: 50%;
            height: 25px;
            text-align:center;
        }

        
    </style>
    
   


  </head>
  <body>
    <div class="header">
      <h5 class="h5"> Santan Segar </h5>
      <a href="userProduct.php"><input type="button" id="btnBackMenu" value="< Back To View Product"></a>
    </div>
    
    
                <?php

include("header.php");


mysqli_close($connect);

?>
    
<div class="listOrder" id="listOrder">
        <h2>CART</h2>
        <button class="confirm" onclick="window.location.href = '#payment';">Checkout</button>
        
        <br><br><br>
        <div class="list">
        <?php

        if(empty($_SESSION["cart"])){
            echo '<div class="top">
                <p>ITEMS : 0</p></p>
                <p>Total Price : 0</p></p>
                </div>';
        }else{
            $total_price = 0;
            $quantity = 0;
            foreach ($_SESSION["cart"] as $key => $value) {
                $product_qty = $value["quantity"];
                $product_price = $value["price"];
                $quantity += $product_qty;
                $product_total = $product_qty * $product_price;
                $total_price += $product_total;
                }
            
                echo '<div class="top">
                <p>ITEMS : '.$quantity.'</p></p>
                <p>Total Price : '.$total_price.'</p></p>
            </div>';
            
        }
        ?>
            
            <div class="listPart">

            <?php

            if (isset($_GET['remove_item'])) {
                $product_key = $_GET['product_key'];
                unset($_SESSION['cart'][$product_key]);
            }


            if (empty($_SESSION["cart"])) {
                echo "<tr><td colspan='5' class='lastRow'>---------------</td></tr>";
            } else {
                $total_price = 0;
                foreach ($_SESSION["cart"] as $key => $value) {
                $product_name = $value["name"];
                $product_qty = $value["quantity"];
                $product_price = $value["price"];
                $product_image = $value["image"];
                $product_weight = $value["weight"];
                $product_total = $product_qty * $product_price;
                $total_price += $product_total;
                            
                echo '
                <form action="cart.php" method="GET">
                <div class="cart-item">
                    <div class="part">
                        <img src="'.$product_image.'" alt="product">
                        <div class="top1">
                            <h4>'.$product_name.'</h4>
                            <h5>RM '.$product_price.'</h5>
                            <h6>'.$product_weight.' g</h6>
                            <button class="remove-item" name="remove_item">remove</button>
                        </div>
                        <div class="bottom1">
                            <i data-id=${item.id} class="fa-sharp fa-solid fa-chevron-up"></i>
                            <input type="hidden" name="product_key" value="'.$key.'" />
                            <p class="item-amount">'.$product_qty.'</p>
                            <i data-id=${item.id} class="fa-sharp fa-solid fa-chevron-down"></i>
                        </div>
                    </div>
                </div>
                </form>';
                }
            } 
    ?>

            </div>
        </div>
    </div>
    <div class="payment" id="payment">
        
        <div class="paymentTitle">
            <h2>PAYMENT</h2>
        </div>
        <div class="paymentTable">
            

            <form action="cart.php" method="POST">
            <table>
                <tr>
                    <td class="col1">Name</td>
                    <td class="col2">:</td>
                    <td class="col3"><input type="text" name="custName" class="input" id="custName"></td>
                    
                </tr>
                <tr>
                    <td>Phone No.</td>
                    <td>:</td>
                    <td><input type="text" name="custPhoneNo" class="input" id="custPhoneNo" maxlength="10"></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Delivery Address</td>
                    <td>:</td>
                    <td><input type="text" name="custAddress" class="input" id="custAddress"></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Session Delivered</td>
                    <td>:</td>
                    <td>
                        <select class="select" id="custSession" name="custSession">
                        <option value="select">--Select Time Session--</option>
                        <option value="Morning">Morning (7 a.m - 12 p.m)</option>
                        <option value="Evening">Evening (1 p.m - 2 p.m)</option>
                        
                    </select></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Payment Method</td>
                    <td>:</td>
                    <td>
                        <select id="custPayment" class="select" name="custPayment" onchange="toggleCreditCardInput()" required>
                        <option value="select">--Select Payment Method--</option>
                        <option value="COD">Cash on Delivery</option>
                        <option value="credit_card">Credit Card</option>
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Credit Card Number:</td>
                    <td>:</td>
                    <td><input type="text" name="custCardCred" id="custCardCred" class="input"  maxlength="16"></td>
                    <td></td>
                </tr>
            
                <tr>
                    <th colspan="4"><button class="confirmBtn" id="confirmBtn"  name="submit">Confirm</button></th>
                </tr>


            </table>
        </form>
        </div>
    </div>
    
    <?php

if(isset($_POST['submit'])){

    include("header.php");
    


    if (empty($_SESSION["cart"])){
        echo '<script> alert ("PLEASE MAKE SOME ORDER BEFORE MAKE A PAYMENT!!!."); 
        window.location.href = "#menu";
        </script>';
    }
    else{

        if(empty($_POST['custName'])){
            echo '<script> alert ("You forget to enter name.");
            window.location.href = "#payment";
            </script>';
        }
        else if(empty($_POST['custPhoneNo'])){
            echo '<script> alert ("You forget to enter your phone number.");
            window.location.href = "#payment";
            </script>';
        }
        else if(empty($_POST['custAddress'])){
            echo '<script> alert ("You forget to enter your delivered address.");
            window.location.href = "#payment";
            </script>';
        }
        else if(empty($_POST['custSession'])){
            echo '<script> alert ("You forget to enter your session delivered.");
            window.location.href = "#payment";
            </script>';

        }
        else if(empty($_POST['custPayment'])){
            echo '<script> alert ("You forget to enter your payment method.");
            window.location.href = "#payment";
            </script>';
        }        
        
        else
        {
        
            $name = $_POST['custName'];
            $no = $_POST['custPhoneNo'];
            $e = $_POST['custEmail'];
            $add = $_POST['custAddress'];
            $ses = $_POST['custSession'];
            $pay = $_POST['custPayment'];
        
            
            foreach ($_SESSION["cart"] as $key => $value) {
                
                $product_name = $value["name"];
                $product_qty = $value["quantity"];
                $product_price = $value["price"];
                $product_weight = $value["weight"];

                $product_total = $product_qty * $product_price;
                $total_price += $product_total;

                foreach($_SESSION["username"] as $k => $v){

                    $user = $v["user"];

                    $q = "INSERT INTO cust (custID, custName, custPhoneNo, custEmail,custAddress, custItem, custQuantity, custPrice, custWeight, custTotal, custSession, custPayment) VALUES ('', '$name', '$no',  '$user', '$add', '$product_name', '$product_qty', '$product_price', '$product_weight', '$product_total', '$ses', '$pay')";

                    $result = @mysqli_query ($connect, $q);
                }
            }
            foreach ($_SESSION["cart"] as $key => $value) {
                $product_name = $value["name"];
                $product_qty = $value["quantity"];
                $product_price = $value["price"];
                $product_weight = $value["weight"];
                $product_total += $product_qty;

                $ql = "UPDATE product SET productQuantity=productQuantity-$product_qty WHERE productName='$product_name'";

                $result = @mysqli_query ($connect, $ql);

            }


        mysqli_close($connect);
        echo '<script> alert ("Thank you for your purchase with us! Your order has been sent. Kindly wait for your order to be delivered :)"); window.location.href = "userProduct.php"; </script>';
        
      }
    }
}

?>



        
</body>