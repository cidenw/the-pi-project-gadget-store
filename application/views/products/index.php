<h2><?= $title ?></h2>
<?php foreach ($products as $product) : ?>
	<?php 
	//if($product->type=="accesories"){ 
		echo $product['productID']." - "?>
		<a href="<?php echo site_url("/products/".$product['productID']); ?>"><?php echo $product->productName?> </a>
	 <br>
	<?php
	//}
	?>

	
<?php endforeach;?>

