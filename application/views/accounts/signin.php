<style>

    h1,h2,h3,h4,h5,table {
		font-family: 'Raleway', sans-serif;
	}

	input[type=text],[type=password]{
    	font-family: 'Gill Sans MT';
    	font-size: 16px;
    	border: 0.10px solid #333;
    	padding: 8px 8px 8px 8px;
    	background-color: #eee;
    	color: black;
    	border-radius: 40px;
        width: 260px;
    }

    input[type=submit]{
    	font-family: 'Raleway', sans-serif;
    	font-size: 35px;
    	border: none;
    	padding: 20px 20px 20px 20px;
    	background-color: #308489;
    	color: white;
    	border-radius: 40px;

    }

</style>


<center>
<br><br><br>
<h1 style="font-size: 60px;"><?= $title ?><h1>
<br>
<form action="<?=base_url()?>account/verify_login" method="post">
  <h5>Email: <input type="text" name="email"><br><br>
   Password: <input type="password" name="password"> </h5><br>
  <input type="submit" value="Submit">
</form>

<br><br>
<?php
if(isset($_GET['msg'])){
	echo $_GET['msg'];
}
	

?>
<a href="<?=base_url().'account/register'?> ">Register</a>

</center>


