<style type="text/css">
	
	h1,h2,h3,h4,h5,table,pre {
		font-family: 'Raleway', sans-serif;
	}
	
	table{
		border-collapse: collapse;
		border: none;
		/** height: 10px; **/
	}

    tr{
    	border: none;
        border-bottom: 1px solid #ddd;
        background-color: #f6f6f6;
    }

	td{
		text-align: left;
		padding: 15px;
		border: none;
		font-size: 13px;
	
	}

	tr:hover {
      background-color: #eee;
    }

    #prod-buy{
    	background-color: #489a9f;
    	
    }

    #the-prod {
       border-radius: 50%;
    }


/** PRODUCT IMAGE ANIMATION ZOOM **/

#the-prod:hover {
	opacity: 0.8;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    /* overflow: auto; */ /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 40%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}

@keyframes zoom {
    from {transform: scale(0.1)} 
    to {transform: scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens  */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}

</style>

<center>

<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">×</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>


<br><br>
<h2 style="font-size: 47px"> <?php echo $product->productName?> </h2> 
<br>
<div class="post-body">
	<img src="<?php echo base_url()."assets/images/products/".$product['productID'].".jpg" ?>" height="600px" id="the-prod" />

	<br><br><br><br>
	<div>
		<table border="1">
		    <tr id="prod-buy">
		       <td><h3> BUY THIS PRODUCT! </h3> </td>
               <!-- <td style="float: right;"><a href="<?php echo base_url()."cart/add/".$product['productID']?>" > <img src="<?php echo base_url(); ?>assets/images/cart-b.png" height="55px"/></a></td> -->
		    </tr>
			<tr>
				<td id="prod-head"><h3>Name</h3></td>
				<td><h4><?=$product->productName?></h4></td>
			</tr>

			<?php
				if(isset($product->display)){
					?>
					
					<tr>
						<td id="prod-head"><h3>Display</h3></td>
						<td><h4><?=$product->display." inch"?></h4></td>
					</tr>
					<?php
				}
			?>
			<?php
				if(isset($product->camera)){
					?>
					
					<tr>
						<td id="prod-head"><h3>Camera</h3></td>
						<td><h4><?=$product->camera." MP"?></h4></td>
					</tr>
					<?php
				}
			?>
			<?php
				if(isset($product->storage)){
					?>
					<tr>
					    <td id="prod-head"><h3>Storage</h3></td>
					    <td><h4><?=$product->storage."GB"?></h4></td>
					</tr>
					<?php
				}
			?>
			<?php
				if(isset($product->processor)){
					?>
					<tr>
						<td id="prod-head"><h3>Processor</h3></td>
						<td><h4><?=$product->processor?></h4></td>
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
								<td id="prod-head"><h3>Battery</h3></td>
								<td><h4><?=$product->battery." mah"?></h4></td>
							<?php
							}else{
								?>
								<td id="prod-head"><h3>Battery</h3></td>
								<td><h4><?=$product->battery." Wh"?></h4></td>
								<?php
							}
					?>
					
						
					</tr>
					<?php
				}
			?>
			<tr>
				<td id="prod-head"><h3>Year</h3></td>
				<td><h4><?=$product->year?></h4></td>
			</tr>
			<tr>
				<td id="prod-head"><h3>Description</h3></td>
				<td><h4><?="<pre>".$product->description."</pre>"?></h4></td>
			</tr>
			<tr>
				<td id="prod-head"><h3>Price</h3></td>
				<td><h4>₱<?=number_format((float)$product->price)?></h4></td>
			</tr>
		</table>
	</div>


	<p>
		<a href="<?php echo base_url()."cart/add/".$product['productID']?>" class="btn btn-info btn-lg">
			<span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart
		</a> 
    </p>  

</div>
</center>

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

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('the-prod');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>