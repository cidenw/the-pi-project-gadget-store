<?php 
if(isSent){
?>
An email has been sent to <?= $email?> 
<a href="<?=base_url().'products'?>">Continue Shopping</a>
<?php
}else{
	echo "Order unsuccessful. Check your email address.";
}
?>
