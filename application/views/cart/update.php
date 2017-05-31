<?php
if(empty($cart)){
	echo "Your cart is empty";
	?>
	<br>
	<a href="<?=base_url().'products'?>">Continue Shopping</a>
	<?php
	return;
}
?>


Your cart <br> 
<table border="1">
	<tr><th>Product Name</th><th>Unit Price</th><th>Quantity</th><th>Price</th><th></th></tr>

	<?php
	$total = 0;
	foreach($cart as $productID=>$productQuantity){
		echo "<tr>";
		$currentProduct = $this->product_model->get_products($productID);
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




<?php
if(!empty($cart)){
	?>
	<a href="<?php echo base_url()."cart/checkout"?>">Checkout</a>

	<button type="button" onclick="clear_cart()">Clear cart</button>
	<?php
}
if(isset($_GET['id'])){
	$productID = $_GET['id'];
	if(isset($_GET['quantity'])){
		$quantity = $_GET['quantity'];
		$quantity = round($quantity);
		$cart[$productID] = $quantity;
		$this->session->set_userdata('cart', $cart);
	}else{
		unset($cart[$productID]);
		$this->session->set_userdata('cart', $cart);
	}
	
}

if(isset($_GET['clear'])){
	$cart = array();
	$this->session->set_userdata('cart', $cart);
}
?>
