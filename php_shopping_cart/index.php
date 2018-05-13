<?php

// include database configuration file
include 'dbConfig.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
<title>PHP Shopping Cart Tutorial</title>
    
<meta charset="utf-8">
    
<style>
    
.container{padding: 10px;}
    
.cart-link{
width: 100%;
text-align: right;
display: block;
font-size: 22px;
}
    
</style>

</head>
<body bgcolor="#34495E"> 
<marquee direction="right" bgcolor="#c70039"><img src="c.jpg" height="150" width="250"/></marquee>
<h1><center><font color="#D1F2EB">MOBILEPLAZA</font></center></h1>
<hr>
<div class="container">
    
<h4><font color="#D1F2EB">PRODUCTS</font></h4>
    <hr>
<a href="viewCart.php" class="cart-link" title="View Cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
    
<div id="products" class="row list-group">
        
<?php
        //get rows query
       
 $query = $db->query("SELECT * FROM products ORDER BY id DESC LIMIT 10");
       

if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
        ?>
        
<div class="item col-lg-4">
            <div class="thumbnail">
                
<div class="caption">
                    <h4 class="list-group-item-heading">
<?php echo $row["name"]; ?></h4>
                    

<p class="list-group-item-text"><?php echo "Color:".$row["color"]; ?></p>
                    
<div class="row">
                        
<div class="col-md-6">
                            
<p class="lead"><?php echo 'Price:Rs.'.$row["price"]; ?></p>
                        <a href="image.html"><font color="#D1F2EB">Image</font></a>
</div>
                        
<div class="col-md-6">
                            
<a class="btn btn-success" href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>"><font color="#D1F2EB"><h3>Add to cart</h3></font></a>
                        
</div>
                    </div>
                </div>
            </div>
        </div>
        
<?php } }else{ ?>
        <p>Product(s) not found.....</p>
        <?php } ?>
    </div>
</div>


</body>
</html>