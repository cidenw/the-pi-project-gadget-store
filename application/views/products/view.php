<h2><?php echo $product->productName?></h2>
<div class="post-body">
<img src="<?php echo base_url()."assets/images/products/".$product['productID'].".jpg" ?>"/>

<br>
<div>
	<table border="1">
	<tr>
		<td>Name</td><td><?=$product->productName?></td>
	</tr>
	<tr>
		<td>Display</td><td><?=$product->display." inch"?></td>
	</tr>
	<tr>
		<td>Storage</td><td><?=$product->storage."GB"?></td>
	</tr>
	<tr>
		<td>Processor</td><td><?=$product->processor?></td>
	</tr>
	<tr>
		<td>Year</td><td><?=$product->year?></td>
	</tr>
	<tr>
		<td>Description</td><td><?="<pre>".$product->description."</pre>"?></td>
	</tr>
	<tr>
		<td>Price</td><td><?=number_format((float)$product->price)?></td>
	</tr>


	</table>
</div>

 <p>
        <a href="<?php echo base_url()."cart/add/".$product['productID']?>" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart
        </a>
</p> 

</div>