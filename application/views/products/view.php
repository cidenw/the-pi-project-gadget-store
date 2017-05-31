<h2><?php echo $product->productName?></h2>
<div class="post-body">
	<img src="<?php echo base_url()."assets/images/products/".$product['productID'].".jpg" ?>"/>

	<br>
	<div>
		<table border="1">
			<tr>
				<td>Name</td><td><?=$product->productName?></td>
			</tr>
			<?php
				if(isset($product->display)){
					?>
					
					<tr>
						<td>Display</td><td><?=$product->display." inch"?></td>
					</tr>
					<?php
				}
			?>
			<?php
				if(isset($product->camera)){
					?>
					
					<tr>
						<td>Camera</td><td><?=$product->camera." MP"?></td>
					</tr>
					<?php
				}
			?>
			<?php
				if(isset($product->storage)){
					?>
					<tr>
					<td>Storage</td><td><?=$product->storage."GB"?></td>
					</tr>
					<?php
				}
			?>
			<?php
				if(isset($product->processor)){
					?>
					<tr>
						<td>Processor</td><td><?=$product->processor?></td>
					</tr>
					<?php
				}
			?>
			<?php
				if(isset($product->battery)){
					?>
					<tr>
					<?php
							if($product->type=="phone"){?>
								<td>Battery</td><td><?=$product->battery." mah"?></td>
							<?php
							}else{
								?>
								<td>Battery</td><td><?=$product->battery." Wh"?></td>
								<?php
							}
					?>
					
						
					</tr>
					<?php
				}
			?>
			<tr>
				<td>Year</td><td><?=$product->year?></td>
			</tr>
			<tr>
				<td>Description</td><td><?="<pre>".$product->description."</pre>"?></td>
			</tr>
			<tr>
				<td>Price</td><td>₱<?=number_format((float)$product->price)?></td>
			</tr>


		</table>
	</div>

	<p>
		
		<a href="<?php echo base_url()."cart/add/".$product['productID']?>" class="btn btn-info btn-lg">
			<span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart
		</a>
	</p> 

</div>

<?php
if(isset($added)){
	echo "You added " .$product->productName. " to your cart."; 
	echo "<br><br><br>";
	?>
	<a href="<?php echo base_url()."products"?>" class="btn btn-info btn-lg">
			<span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
		</a><br>
	<?php
	
	
}

?>