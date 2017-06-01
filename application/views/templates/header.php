<html>
	<head>
		<title>The Pi Project</title>
		    <link href='<?php echo base_url(); ?>assets/css/style.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/css?family=Raleway:200" rel="stylesheet">
        <link rel="icon" href="<?= base_url().'assets/images/logo.png' ?>">

  <style>
  /** NEW NAV BAR **/
.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  font-family: 'Raleway', sans-serif;
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 18px;
}

.topnav a:hover {
  background-color: #308489;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }

}
  </style>
	</head>
	<body>
<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo4.png" id="logo" height="13%"></a>
<br>


<div class="topnav" id="myTopnav">
<nav id="navbar">
  <a href="<?php echo base_url(); ?>">Home</a>
  <a href="<?php echo base_url();?>about">About</a>
  <a href="<?php echo base_url();?>products">Products</a>
  <a href="<?php echo base_url(); ?>support">Support</a>

  <a style="float: right;" href="<?php echo base_url(); ?>cart">Cart</a>
  <?php
  if($this->session->userdata('is_LoggedIn')){
    ?>
      <a style="float:right" href="<?php echo base_url().'account/signout'; ?>">Sign Out</a>
      <a style="float:right" href="<?php echo base_url().'account/'; ?>">My Account</a>
    <?php
  }else{
    ?>
      <a style="float:right" href="<?php echo base_url().'account/signin'; ?>">Sign In</a>
  <?php
  } 
  ?>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
  <a style="float: right;"><input type="submit" value="Find" id="find" onclick=" window.location = '<?=base_url()?>products?search=' + document.getElementById('searchbar').value"></a>
  <a style="float: right;"><input type="text" name="search" placeholder="Search.." id="searchbar"  onkeydown = "if (event.keyCode == 13) document.getElementById('find').click()"></a>
</nav>
</div>



<!--
<div class="navbar">
<ul id="navbar-ul">
  <li id="navbar-li"><a id="navbar-li-a" href="<?php echo base_url(); ?>">Home</a></li>
  <li id="navbar-li"><a id="navbar-li-a" href="<?php echo base_url(); ?>about">About</a></li>
  <li id="navbar-li"><a id="navbar-li-a" href="<?php echo base_url(); ?>products">Products</a></li>
  <li id="navbar-li"><a id="navbar-li-a" href="<?php echo base_url(); ?>support">Support</a></li>

  <li id="navbar-li"><input type="text" name="search" placeholder="Search.." id="searchbar"  onkeydown = "if (event.keyCode == 13)
                        document.getElementById('find').click()"></li>
  <li id="navbar-li"><input type="submit" value="Find" id="find" onclick=" window.location = '<?=base_url()?>products?search=' + document.getElementById('searchbar').value"></li>

  <li id="navbar-li" style="float:right"><a id="navbar-li-a" href="<?php echo base_url(); ?>cart"><img class="cart" src="<?php echo base_url(); ?>assets/images/cart.png" height="32px"></a></li>
    <?php
  if($this->session->userdata('is_LoggedIn')){
  	?>
  		<li style="float:right" id="navbar-li"><a id="navbar-li-a" href="<?php echo base_url().'account/signout'; ?>">Sign Out</a></li>
  		<li style="float:right" id="navbar-li"><a id="navbar-li-a" href="<?php echo base_url().'account/'; ?>">My Account</a></li>
  		

  	<?php
  }else{
  	?>

  		<li style="float:right" id="navbar-li"><a id="navbar-li-a" href="<?php echo base_url().'account/signin'; ?>">Sign In</a></li>
  	<?php
  }
  	
  ?> -->
    
<!--
	<nav class = "navbar navbar-inverse">
		<div class = "container"> <!--
			<div class = "navbar-header">
				<a class = "navbar-brand" href = "#">TPP</a>
			</div> --> <!--
			<img src="<?php echo base_url(); ?>assets/images/logo.png" name="logo" width="210" height="200">
			
			<div id ="navbar">
				<ul class="nav navbar-nav" id="navbar-ul">
					<li id="navbar-li"><a id="navbar-a" href="<?php echo base_url(); ?>">Home</a></li>
					<li id="navbar-li"><a id="navbar-a" href="<?php echo base_url(); ?>about">About</a><li>
					<li id="navbar-li"><a id="navbar-a" href="<?php echo base_url(); ?>products">Products</a><li>
					<li id="navbar-li"><a id="navbar-a" href="<?php echo base_url(); ?>">Support</a><li>

					
				</ul>
				<a href="<?php echo base_url()."cart/"?>">Shopping Cart (im in header)</a>
			</div>-->

</ul>
</div>

<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

(function($) {
    "use strict";

    var $navbar = $("#navbar"),
        y_pos = $navbar.offset().top,
        height = $navbar.height();

    $(document).scroll(function() {
        var scrollTop = $(this).scrollTop();

        if (scrollTop > y_pos + height) {
            $navbar.addClass("navbar-fixed").animate({
                top: 0
            });
        } else if (scrollTop <= y_pos) {
            $navbar.removeClass("navbar-fixed").clearQueue().animate({
                top: "-48px"
            }, 0);
        }
    });

})(jQuery, undefined);

</script>
	