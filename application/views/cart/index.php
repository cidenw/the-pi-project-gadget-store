<?php 
//print_r($cart);


$cart = array_count_values($cart);
?>
Your cart <br> 
<table border="1">
<tr><th>Product Name</th><th>Item Price</th><th>Quantities</th><th>Price</th></tr>


<?php
print_r($cart);
$total = 0;


foreach($cart as $productID=>$productQuantity){
	echo "<tr>";
	$currentProduct = $this->product_model->get_products($productID);
	echo "<td>".$currentProduct->productName."</td>";
	echo "<td>".number_format((float)$currentProduct->price)."</td>";
	echo "<td>".$productQuantity."</td>";
	$price = $productQuantity*$currentProduct->price;
	echo "<td>".number_format($price)."</td></tr>";
	$total+= $price;
}
?>
	<tr><td><td><td>total</td><td><?php echo number_format($total)?></td></td></td></tr>
	</table>

	<a href="<?php echo base_url()."cart/checkout"?>">Checkout</a>

	<button type="button" onclick="clearCart()">Clear cart</button>
	

	
</table>