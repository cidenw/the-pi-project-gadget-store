<?= $title ?>

<form action="<?=base_url()?>account/verify_login" method="post">
  Email: <input type="text" name="email"><br>
  Password: <input type="password" name="password"><br>
  <input type="submit" value="Submit">
</form>
<?php
if(isset($_GET['msg'])){
	echo $_GET['msg'];
}
	

?>
<a href="<?=base_url().'account/register'?> ">Register</a>


