<link href="https://fonts.googleapis.com/css?family=Raleway:200" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
/** MENU ICON **/
#nav-icon {
  position: fixed;
  right: 15px;
  top: 20px;
  width: 30px;
  height: 35px;
  z-index: 10;
  cursor: pointer;
  -webkit-transform: rotate(0deg);
  transform: rotate(0deg);
  -webkit-transition: .5s ease-in-out;
  transition: .5s ease-in-out;
}

#nav-icon span {
  position: absolute;
  display: block;
  width: 100%;
  height: 4px;
  background: white;
  border-radius: 9px;
  opacity: 1;
  left: 0;
  -webkit-transform: rotate(0deg);
  transform: rotate(0deg);
  -webkit-transition: .25s ease-in-out;
  transition: .25s ease-in-out;
}

#nav-icon span:nth-child(1) {
  top: 0px;
}

#nav-icon span:nth-child(2) {
  top: 11px;
}

#nav-icon span:nth-child(3) {
  top: 22px;
}

#nav-icon.animate-icon span:nth-child(1) {
  top: 11px;
  -webkit-transform: rotate(135deg);
  transform: rotate(135deg);
}

#nav-icon.animate-icon span:nth-child(2) {
  opacity: 0;
  left: -60px;
}

#nav-icon.animate-icon span:nth-child(3) {
  top: 11px;
  -webkit-transform: rotate(-135deg);
  transform: rotate(-135deg);
}


/** SLIDESHOW **/
.slideshow {
position: absolute;
left: 0px;
top: 0px;
display:none;
z-index: -1;
}

.w3-badge {
  cursor:pointer
}

.w3-badge {
  height:13px;
  width:13px;
  padding:0
}

/** FULL SCREEN MENU **/
#overlay {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  display: none;
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.7);
}

#overlay div {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  width: 100%;
  height: 100vh;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}

#overlay ul {
  list-style: none;
  margin: 0;
  padding: 0;
  color: white;
  text-align: center;
  font-family: 'Raleway', sans-serif;
}

#overlay ul li {
  margin:20px auto;
  text-decoration: none;
}

#overlay ul li a{
  text-decoration: none;
   padding: 8px;
   font-size: 38px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

#overlay a:hover, #overlay a:focus {
    color: #f1f1f1;
}

/** SEARCH ICON **/
.search{
  position: fixed;
  right: 25px;
  top: 15px;
  width: 75px;
}

/** LOGO **/
.logo{
  height: 70px;
}

</style>
<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo3.png" class="logo"></a>
<a href="<?php echo base_url(); ?>products"><img class="search" src="<?php echo base_url(); ?>assets/images/search.png"></a>
   <div id="nav-icon">
      <span></span>
      <span></span>
      <span></span>
  </div>

<div id="overlay">
  <div>
      <ul>
        <li><a href="<?php echo base_url(); ?>about">About</a></li>
        <li><a href="<?php echo base_url(); ?>products">Product</a></li>
        <li><a href="<?php echo base_url(); ?>support">Support</a></li>
         <li><a href="<?php echo base_url(); ?>cart">Cart</a></li>
      </ul>
  </div>
</div>

 <div class="w3-content w3-section" style="max-width:500px">
  <img class="slideshow" src="<?php echo base_url(); ?>assets/images/1.gif" style="width:100%; max-height:720px">
  <img class="slideshow" src="<?php echo base_url(); ?>assets/images/2.png" style="width:100%; max-height:720px">
  <img class="slideshow" src="<?php echo base_url(); ?>assets/images/c.jpg" style="width:100%; max-height:720px">
  <img class="slideshow" src="<?php echo base_url(); ?>assets/images/d.jpg" style="width:100%; max-height:720px">
  <img class="slideshow" src="<?php echo base_url(); ?>assets/images/e.jpg" style="width:100%; max-height:720px">
  <img class="slideshow" src="<?php echo base_url(); ?>assets/images/f.jpg" style="width:100%; max-height:720px">
  <img class="slideshow" src="<?php echo base_url(); ?>assets/images/g.jpg" style="width:100%; max-height:720px">
  <img class="slideshow" src="<?php echo base_url(); ?>assets/images/h.jpg" style="width:100%; max-height:720px">
  <img class="slideshow" src="<?php echo base_url(); ?>assets/images/i.jpg" style="width:100%; max-height:720px">

   <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
      <span class="w3-badge demo w3-border w3-transparent w3-hover-white" ></span>
      <span class="w3-badge demo w3-border w3-transparent w3-hover-white" ></span>
      <span class="w3-badge demo w3-border w3-transparent w3-hover-white" ></span>
      <span class="w3-badge demo w3-border w3-transparent w3-hover-white" ></span>
      <span class="w3-badge demo w3-border w3-transparent w3-hover-white" ></span>
      <span class="w3-badge demo w3-border w3-transparent w3-hover-white" ></span>
      <span class="w3-badge demo w3-border w3-transparent w3-hover-white" ></span>
      <span class="w3-badge demo w3-border w3-transparent w3-hover-white" ></span>
      <span class="w3-badge demo w3-border w3-transparent w3-hover-white" ></span>
   </div>
 </div> 


<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="js/script.min.js"></script>
<script type="text/javascript">
var myIndex = 0;
carousel();

function carousel() {
    var x = document.getElementsByClassName("slideshow");
    var dots = document.getElementsByClassName("demo");

    for (var i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }

    for (var i = 0; i < dots.length; i++) {
       dots[i].className = dots[i].className.replace(" w3-white", "");
    }
    
    myIndex++;

    if(myIndex > x.length){
      myIndex=1;
    }


    x[myIndex-1].style.display = "block";  
    dots[myIndex-1].className += " w3-white";
    setTimeout(carousel, 4000); // Change image every 4 seconds
}

$(document).ready(function(){
  $('#nav-icon').click(function(){
    $(this).toggleClass('animate-icon');
    $('#overlay').fadeToggle();
  });
});


$(document).ready(function(){
  $('#overlay').click(function(){
    $('#nav-icon').removeClass('animate-icon');
    $('#overlay').toggle();
  });
});

</script>