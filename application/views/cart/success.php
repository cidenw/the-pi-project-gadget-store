<?php 
if($_GET['isSent']){
?>
An email has been sent to <?= $_GET['email']?> 
<a href="<?=base_url().'products'?>">Continue Shopping</a>
<?php
}else{
	echo "Order unsuccessful. Check your email address.";
}
?>
