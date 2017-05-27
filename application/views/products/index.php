<h2><?= $title ?></h2>
<select onchange="if (this.value) window.location.href=this.value">
	
    <option value="<?php echo base_url()."products" ?>">Pick one:</option>
    <option value="<?php echo base_url()."products?orderby=brand" ?>"   <?php if($orderby=="brand") echo "selected"?> >Sort by: Brand</option>
    <option value="<?php echo base_url()."products?orderby=price" ?>"  <?php if($orderby=="price") echo "selected"?> >Sort by Price(Low to High)</option>
    <option value="<?php echo base_url()."products?orderby=price-desc" ?>"  <?php if($orderby=="price-desc") echo "selected"?> >Sort by Price(High to Low)</option>
     <option value="<?php echo base_url()."products?orderby=category" ?>"  <?php if($orderby=="category") echo "selected"?> >Sort by Category</option>
     <option value="<?php echo base_url()."products?orderby=name" ?>"  <?php if($orderby=="name") echo "selected"?> >Sort by Product Name</option>
</select>

<?php 
	
	

foreach ($products as $product) : ?>

	<?php 
	//if($product->type=="accesories"){ 
		echo $product['productID']." - "?>
		<a href="<?php echo site_url("/products/".$product['productID']); ?>"><?php echo $product->productName?> </a>
	 <br>
	<?php
	//}
	?>

	
<?php endforeach;?>

