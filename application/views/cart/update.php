<?php
echo "test<br>";
?>
Your cart <br> 
<table border="1">
<tr><th>Product Name</th><th>Item Price</th><th>Quantities</th><th>Price</th><th></th></tr>

<?php
print_r($cart);
print_r($this->session->userdata('cart'));
$total = 0;
foreach($cart as $productID=>$productQuantity){
	echo "<tr>";
	$currentProduct = $this->product_model->get_products($productID);
	print_r($productID);
	echo "<td>".$currentProduct->productName."</td>";
	echo "<td>".number_format((float)$currentProduct->price)."</td>";
	?>
	<td><input id="quantity" type="number" name="quantity<?=$productID?>" value="<?=$productQuantity?>" min="1" onchange="update_cart(<?=$productID?>,this.value)"></td>
	<?php
	
	$price = $productQuantity*$currentProduct->price;
	echo "<td>".number_format($price)."</td>";
	?>
	 <td><input type="button" value="Remove Item" id="<?=$productID?>" onclick="remove_item(this.id)"></td></tr>
	<?php
	$total+= $price;
}
?>
	<tr><td><td><td>total</td><td><?php echo number_format($total)?></td></td></td></tr>
	</table>

	<a href="<?php echo base_url()."cart/checkout"?>">Checkout</a>

	<button type="button" onclick="clearCart()">Clear cart</button>
</table>

<?php
if(isset($_GET['id'])){
	$productID = $_GET['id'];
	if(isset($_GET['quantity'])){
		$quantity = $_GET['quantity'];
		$cart[$productID] = $quantity;
		$this->session->set_userdata('cart', $cart);
	}else{
		unset($cart[$productID]);
		$this->session->set_userdata('cart', $cart);
	}
	
}
?>
