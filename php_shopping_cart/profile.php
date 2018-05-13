<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
<title>Your Home Page</title><meta charset="utf-8">
   
<link href="style.css" rel="stylesheet" type="text/css">

    
<style>
    .container{width: 100%;padding: 50px;}
    .table{width: 65%;float: left;}
    .shipAddr{width: 30%;float: left;margin-left: 30px;}
    
.footBtn{width: 95%;float: left;}
    .orderBtn {float: right;}
    </style>
</head>
<body bgcolor="#E6B0AA">
<div id="profile">
<b id="welcome">Welcome : <i><font color="#D1F2EB"><?php echo $login_session; ?></font></i></b>
<b id="logout"><a href="logout.php"><font color="#D1F2EB">Log Out</font></a></b>
</div>

<?php

// include database configuration file
include 'dbConfig.php';


// initializ shopping cart class
include 'Cart.php';

$cart = new Cart;


// redirect to home if cart is empty
if($cart->total_items() <= 0){
    header("Location: index.php");

}


// set customer ID in session

$_SESSION['sessCustomerID'] =  1;


// get customer details by session customer ID
$query = $db->query("SELECT * FROM customers WHERE id = ".$_SESSION['sessCustomerID']);

$custRow = $query->fetch_assoc();

?>


<div class="container">
    
<h1><font color="#D1F2EB">ORDER PREVIEW</font></h1>
    <table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            
<th>Quantity</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
           
 //get cart items from session
            $cartItems = $cart->contents();
            
foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["name"]; ?></td>
            <td>
<?php echo 'Rs.'.$item["price"]; ?></td>
            <td>
<?php echo $item["qty"]; ?></td>
            <td><?php echo 'Rs.'.$item["subtotal"]; ?>
</td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="4"><p>No items in your cart......</p></td>
        
<?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            
<?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total 
<?php echo 'Rs.'.$cart->total(); ?></strong></td>
            <?php } ?>
        </tr>
    
</tfoot>
    </table>
    <div class="shipAddr">
<h4>Shipping Details</h4>
        <p>
<?php echo $custRow['name']; ?></p>
        <p><?php echo $custRow['email']; ?></p>
        <p>
<?php echo $custRow['phone']; ?></p>
        <p>
<?php echo $custRow['address']; ?></p>
    </div>
    <div class="footBtn">
        <a href="index.php" class="btn btn-warning">
<i class="glyphicon glyphicon-menu-left"></i><font color="#D1F2EB"><h3>Continue Shopping</h3></font></a>
        
<a href="cartAction.php?action=placeOrder" class="btn btn-success orderBtn"><font color="#D1F2EB"><h3>Place Order</h3></font><i class="glyphicon glyphicon-menu-right"></i></a>
    
</div>
</div>




</body>
</html>
