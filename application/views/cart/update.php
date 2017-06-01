<style>

    h1,h2,h3,h4,h5,table {
		font-family: 'Raleway', sans-serif;
	}
    
	/** TABLE CAR **/
	
	table{
		border-collapse: collapse;
		border: none;
	}
    
    #cart-tr {
    	background-color: #308489; 
    }

    tr{
    	border: none;
        border-bottom: 1px solid #ddd;
        background-color: #efefef;
    }
    
    tr:hover {
      background-color: #e4e4e4;
    }

	td,th{
		text-align: left;
		padding-left: 30px;
		padding-top: 20px;
		padding-right: 30px;
		padding-bottom: 20px;
		border: none;
		font-size: 16px;
	}
    
    th{
    	font-size: 20px;
    }
    table{
      box-shadow: 8px 8px 4px #c7c7c7; 
    } 
    #quantity{
    	border-radius: 10px;
    	padding-left: 10px;
    	padding-top: 8px;
    	padding-bottom: 8px;
    	border: 0.10px solid #333;
    	font-size: 16px;
    	width: 100px;
    }

    input[type=button]{
    	font-family: 'Raleway', sans-serif;
    	font-size: 16px;
    	border: none;
    	padding: 10px 10px 10px 10px;
    	background-color: #308489;
    	color: white;
    	border-radius: 40px;

    }

    button{
    	font-family: 'Raleway', sans-serif;
    	font-size: 30px;
    	border: none;
    	padding: 20px 20px 20px 20px;
    	background-color: #308489;
    	color: white;
    	border-radius: 35px;
    }
</style>

<?php
if(empty($cart)){
	echo "<center><br><br><br><h1 style=\"font-size:50px\"> Your cart is empty </h1>";
	?>
	<br><br>
	<a style="font-family:'Raleway'; font-size:25px; text-decoration: none;" href="<?=base_url().'products'?>">
	Continue Shopping<br>
    <img class="search" src="<?php echo base_url(); ?>assets/images/cart2.png" />
	</a> </center>
	<?php
	return;
}
?>

<!--
<?php
print_r($cart);
?> -->

<center>
<br>
<h1 style="font-size: 50px">Your cart &nbsp; <img class="search" src="<?php echo base_url(); ?>assets/images/cart2.png" height="55px" /> </h1>
<br><b><br>

<table>
	<tr><th>Product Name</th><th>Unit Price</th><th>Quantity</th><th>Price</th><th></th></tr>

	<?php
	$total = 0;
	foreach($cart as $productID=>$productQuantity){
		echo "<tr>";
		$currentProduct = $this->product_model->get_products($productID);
		echo "<td><h3>".$currentProduct->productName."</h3></td>";
		echo "<td><h4> ₱ ".number_format((float)$currentProduct->price)."</h4></td>";
		?>
		<td><input id="quantity" type="number" name="quantity<?=$productID?>" value="<?=$productQuantity?>" min="1" onchange="update_cart(<?=$productID?>,this.value)"></td>
		<?php

		$price = $productQuantity*$currentProduct->price;
		echo "<td><h4>₱ ".number_format($price)."</h4></td>";
		?>
		<td><input type="button" value=" X " id="<?=$productID?>" onclick="remove_item(this.id)"></td></tr>
		<?php
		$total+= $price;
	}
	?>
	<tr>
	   <td></td>
	   <td></td>
	    <td><h3>Total</h3></td>
	    <td><h3>₱<?php echo number_format($total)?></h3></td>
	    <td></td>
	 </tr>
</table>
<br><br>

<?php
if(!empty($cart)){
	?>
	<h1><a href="<?php echo base_url()."cart/checkout"?>" style="text-decoration: none; color: black">Checkout</a></h1>
    <br>
	<button type="button" onclick="clear_cart()">Clear cart</button>
	<?php
}
if(isset($_GET['id'])){
	$productID = $_GET['id'];
	if(isset($_GET['quantity'])){
		$cart = $this->session->userdata('cart');
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
</center>
