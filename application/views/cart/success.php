<style>
    h1,h2,h3,h4,h5,table {
		font-family: 'Raleway', sans-serif;
	}
</style>

<?php 
if($_GET['isSent']){
?>
<center>
<br><br><br><br>
<h1>
<br>
 <img class="search" src="<?php echo base_url(); ?>assets/images/mail.png" height="300px"/><br><br>
An email has been sent to <?= $_GET['email']?> <br><br>
<a href="<?=base_url().'products'?>" style="text-decoration: none;">Continue Shopping</a>
</h1>
</center>
<?php
}else{
	echo "<h1> <br><br><br><br> <center> Order unsuccessful. <br> Check your email address. </center> </h1>";
}
?>
