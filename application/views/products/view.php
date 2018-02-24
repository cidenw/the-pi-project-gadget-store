<style type="text/css">
	
	h1,h2,h3,h4,h5,table,pre,#caption,.button {
		font-family: 'Raleway', sans-serif;
	}
    
    .product-image{
    	margin-left: 100px;
    }
	/** TABLE #1 **/
	
	#prod-table{
		border-collapse: collapse;
		border: none;
	}
    
    #top-tr {
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

	td{
		text-align: left;
		padding-left: 30px;
		padding-top: 10px;
		padding-right: 20px;
		border: none;
		font-size: 13px;
	}

    #prod-table{
      box-shadow: 8px 8px 4px #c7c7c7; 
    } 
    
    /** PRODUCT IMAGE **/

    #the-prod {
       box-shadow: 8px 8px 8px #c7c7c7; 
       /** border-radius: 10%; **/
    }

    /** PRODUCT IMAGE ANIMATION ZOOM **/

    #the-prod:hover {
	   opacity: 0.9;
    }

    /* The Modal (background) */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 2; /* Sit on top */
      padding-top: 100px; /* Location of the box */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
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

.close:hover,.close:focus {
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
/** ADD TO CART BUTTON **/
.button {
    background-color: #308489;
    border: none;
    color: white;
    padding: 11px 23px;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    margin: 8px 2px;
    cursor: pointer;
    box-sizing: border-box;
    border-radius: 20px;
    border: 1.25px solid #333333;
}

.remarks{
	background-color: #efefef;
}

#remarks{
		border-collapse: collapse;
		border: none;
		box-shadow: 8px 8px 4px #c7c7c7; 
}

#remarks-tr{
    background-color: #efefef;
    border: none;
}

#remarks-td{
text-align: left;
		padding-left: 30px;
		padding-top: 10px;
		padding-right: 20px;
		border: none;
		font-size: 13px;
}

</style>

<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">×</span>
  <img class="modal-content" id="img01">
  <div id="caption">  </div>
</div>


<br><br><br>

<center>
<div class="product-image">
   <div class="sectionA" style="float: left;">
         <h2 style="font-size: 20px"> <?php echo $product->productName?> </h2>
         <img src="<?php echo base_url()."assets/images/products/".$product['productID'].".jpg" ?>" height="400px" id="the-prod" alt="<?php echo $product->productName?>" />
    </div>
    <div class="section B" style="float: left; margin-left: 30px; margin-top: 50px">
		 <table id="prod-table">
		  <tbody>
		    <tr id="top-tr">
		       <td> </td>
               <td style="float: right;"> <a href="<?php echo base_url()."cart/add/".$product['productID']?>" class="btn btn-info btn-lg"> <input type="button" class="button" value="Add to cart"> </a></td>
               <!-- <td style="float: right;"> <img src="<?php echo base_url(); ?>assets/images/cart-b.png" height="40px"/> </a></td> -->
		    </tr>
			<tr>
				<td><h3>Name</h3></td>
				<td><h4><?=$product->productName?></h4></td>
			</tr>
			<?php
				if(isset($product->brand)){
					?>
					
					<tr>
						<td><h3>Brand</h3></td>
						<td><h4><?=$product->brand?></h4></td>
					</tr>
					<?php
				}
			?>

			<tr>
				<td><h3>Price</h3></td>
				<td><h4>₱ <?=number_format((float)$product->price)?></h4></td>
			</tr>
			<tr>
				<td><h3>Year</h3></td>
				<td><h4><?=$product->year?></h4></td>
			</tr>
		   </tbody>
         </table>
    </div>

    <div class="sectionC" style="float: left ;margin-left: 30px; margin-top: 50px;">
       <table id="prod-table" >
         <tbody>
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
				<td id="prod-head"><h3>Description</h3></td>
				<td><h4><?="<pre>".$product->description."</pre>"?></h4></td>
			</tr> 
			</tbody>
		</table>
    </div>
</div>
</center>
 
     

   <!--
	<p>
		<a href="<?php echo base_url()."cart/add/".$product['productID']?>" class="btn btn-info btn-lg">
			<span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart
		</a> 
    </p>  -->

  
  <br><br><br>
  <div style="position: fixed; bottom: 0px; opacity: 0.6; background: #efefef; left: 30px; padding-left: 20px; padding-right: 20px">
    <?php
    if(isset($_GET['added'])){

	echo "<h3>You added <br>" .$product->productName. " <br> to your cart.</h3>"; 
	?>
	<a href="<?php echo base_url()."products"?>" class="btn btn-info btn-lg">
		<h3> Continue Shopping </h3>
		</a><br>
	
	<?php	
     }
    ?>
    </div>

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
document.addEventListener('keyup', function(e) {
    if (e.keyCode == 27) {
        modal.style.display = "none";
    }
});
</script>

