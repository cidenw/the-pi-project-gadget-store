<?php 
//print_r($cart);



?>
<div id="display_cart">


	<script type="text/javascript">
		display_cart();
		function display_cart(){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET","<?=base_url()?>cart/update",false);
			xmlhttp.send(null);
			document.getElementById("display_cart").innerHTML=xmlhttp.responseText;
		}

		function update_cart(index, quantity){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET", "<?=base_url()?>cart/update?id="+index+"&quantity="+quantity,false);
			xmlhttp.send(null);
			display_cart();
		}
		function remove_item(index){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET", "<?=base_url()?>cart/update?id="+index,false);
			xmlhttp.send(null);
			display_cart();
		}		
		function clear_cart(){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET", "<?=base_url()?>cart/update?clear=true",false);
			xmlhttp.send(null);
			display_cart();
		}

	</script>


</div>

<a href="<?php echo base_url()."cart/checkout"?>">Checkout</a>

<button type="button" onclick="clear_cart()">Clear cart</button>
