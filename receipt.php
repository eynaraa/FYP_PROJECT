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

<?php

include("header.php");


mysqli_close($connect);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .receipt {
            max-width: 400px;
            margin: 10vh auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        .receipt-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .receipt-items {
            border-collapse: collapse;
            width: 100%;
            margin-top: 5vh;
        }
        .receipt-items th, .receipt-items td {
            border: 1px solid #ccc;
            padding: 8px;
        }
        .receipt-items th {
            background-color: #f2f2f2;
        }
        .print-button {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="receipt" id="receipt">
        <div class="receipt-header">
            <h1>Santan Segar <br>Receipt</h1>
            <p>Date: <?php echo date('Y-m-d H:i:s'); ?></p>
        </div>

        <table class="receipt-items">
            <tr>
                <td>Name</td>
                <td></td>
        
            </tr>
            <tr>
                <td>Phone No</td>
                <td></td>
        
            </tr>
            <tr>
                <td>Email</td>
                <td></td>
        
            </tr>
            <tr>
                <td>Address</td>
                <td></td>
            </tr>
            <tr>
                <td>Session</td>
                <td></td>
        
            </tr>
            <tr>
                <th>Item</th>
                <th>Unit</th>
                <th>Price</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Payment Method</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>Total</td>
                <td></td>
            </tr>
        </table>

        <div class="print-button">
            <button onclick="window.print()">Print Receipt</button>
        </div>
    </div>
</body>
</html>