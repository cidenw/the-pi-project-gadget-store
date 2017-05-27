<h2><?php echo $product->productName?></h2>
<div class="post-body">
<img src="<?php echo base_url()."assets/images/products/".$product['productID'].".jpg" ?>"/>
 <p>Shopping-cart icon on a styled link button:
        <a href="<?php echo base_url()."cart/".$product['productID']?>" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart
        </a>
      </p> 
<br>
<?php print_r($product); ?>

</div>