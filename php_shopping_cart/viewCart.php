<?php

// initializ shopping cart class
include 'Cart.php';

$cart = new Cart;

?>

<!DOCTYPE html>

<html lang="en">

<head>
    
<title>View Cart - PHP Shopping Cart Tutorial</title>
    
<meta charset="utf-8">
    

<style>
    
.container{padding: 100px;}
    
input[type="number"]{width: 20%;}
    
</style>
    
<script>
    
function updateCartItem(obj,id){
        
$.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, 
function(data){
            
if(data == 'ok'){
                
location.reload();
            
}else{
                
alert('Cart update failed, please try again.');
            }
        });
    }
    
</script>
</head>
</head>
<body bgcolor="#73C6B6">




<div class="container">
    
<h1><font color="white">SHOPPING CART</font></h1>
    
<table class="table">
    
<thead>
        <tr>
            
<th>Product</th>
            
<th>Price</th>
            
<th>Quantity</th>
            
<th>Subtotal</th>
            
<th>&nbsp;</th>
        
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
            <td>
<?php echo $item["name"]; 
?></td>
            
<td><?php echo 'Rs.'.$item["price"]; ?></td>
            
<td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; 
?>
" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
            
<td><?php echo 'Rs.'.$item["subtotal"]; ?></td>
            <td>
                
<!--<a href="cartAction.php?action=updateCartItem&id=" class="btn btn-info">
<i class="glyphicon glyphicon-refresh"></i></a>-->
               
 <a href="cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; 
?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">
<i class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>
        <?php } }
else{ ?>
        
<tr><td colspan="5"><p>Your cart is empty.....</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            
<td><a href="index.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left">
</i><font color="#D1F2EB"><h3>Continue Shopping</h3></font></a></td>
            
<td colspan="2"></td>
            <?php if($cart->total_items() > 0){ ?>
            
<td class="text-center"><strong>Total 
<?php echo 'Rs.'.$cart->total(); ?></strong></td>
            
<td><a href="index1.php" class="login-link" title="Login"><font color="#D1F2EB"><h3>Buy Now</h3></font><i class="glyphicon glyphicon-shopping-login"></i></a></td>
           
 <?php } ?>
        </tr>
    </tfoot>
    
</table>
</div>
</body>
</html>