<h2><?= $title ?></h2>
<?php foreach ($products as $product) : ?>
	<?= $product['productID']." - "?>
	<a href="<?php echo site_url("/products/".$product['productID']); ?>"><?php echo $product->productName?> </a>
	 <br>
<?php endforeach;?>

