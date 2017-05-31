
<style>
 .products-section{
 	position: relative;
    max-width: 400px;
    margin:-4px;
    padding: 0;
    display: inline-block;
 }
 .products-grid{
    height: 380px;
    overflow: auto;
    margin: 0 0 0 0;
    padding: 0;
    list-style: none;
    display: block;
    text-align: center;
    width: 100%
 }

 .products-grid:after{
    clear:both;
 }

 .products-grid:after, .products-box:before{
    content:"";
    display:table;
 }

 .products-grid li{
    overflow: hidden;
    width: 328px;
    height: 328px;
    display: inline-block;
    margin: 20px;
 }

 .products-box{
    width: 100%;
    height: 100%;
    position: relative;
    cursor: pointer;
    border-radius: 10px;
    -webkit-transition: 0.3s ease-in-out, -webkit-transform 0.3s ease-in-out;
    -moz-transition: 0.3s ease-in-out, -moz-transform 0.3s ease-in-out;
    transition: 0.3s ease-in-out, transform 0.3s ease-in-out;
	opacity: 0.75;

 }

 .products-box:hover {
    transform: scale(1.05);
 } 

 .products-img-1 {
    background: linear-gradient(rgba(0,0,0,0.50), rgba(0,0,0,0.10));
	transition: all 0.3s ease-in;
}

 .products-img-1:hover{
    transition: all 0.3s ease-in;
    opacity: 1;
 }

 .products-info h3{
 	text-align: left;
    font-family: 'Century Gothic';
    font-weight: 400;
    color: #fff;
    font-size: 42px;
    margin: 0 30px;
    padding: 100px 0 0 0;
    line-height: 1.5;
 }

 .products-info p{
    margin: 10 10px;
    font-family: 'Century Gothic';
    color: #fff;
 }

 li a {
    font-family: 'Century Gothic';
 }

 li a:hover{
    background: transparent;
 }

</style>

<h2><?= $title ?></h2>
<select onchange="if (this.value) window.location.href=this.value">
	
    <option value="<?php echo base_url()."products" ?>">Pick one:</option>
    <option value="<?php echo base_url()."products?orderby=brand" ?>"   <?php if($orderby=="brand") echo "selected"?> >Sort by: Brand</option>
    <option value="<?php echo base_url()."products?orderby=price" ?>"  <?php if($orderby=="price") echo "selected"?> >Sort by Price(Low to High)</option>
    <option value="<?php echo base_url()."products?orderby=price-desc" ?>"  <?php if($orderby=="price-desc") echo "selected"?> >Sort by Price(High to Low)</option>
     <option value="<?php echo base_url()."products?orderby=category" ?>"  <?php if($orderby=="category") echo "selected"?> >Sort by Category</option>
     <option value="<?php echo base_url()."products?orderby=name" ?>"  <?php if($orderby=="name") echo "selected"?> >Sort by Product Name</option>
</select>

<br><br>

<center>
<?php 
	foreach ($products as $product) : ?>
	<div class = "products-section">
		<ul class = "products-grid">
		<li>
			<div class = "products-box products-img-1 ">
			<a href="<?php echo site_url("/products/".$product['productID']); ?>">
				<h3><?php echo $product -> productName?></h3>	
				<img src="<?php echo base_url()."assets/images/products/".$product['productID'].".jpg" ?>" class = "products-box products-img-1"/>
				</a>
				<br>
			<?php
			//}
			?>
			</div>
		</li>
		</div>
	</ul>
	</div>
<?php endforeach;?>

</center>