<style>
img[class=slideshow]{
 position: absolute;
 left: 0px;
 top: 0px;
}

.slideshow {
display:none;
}

</style>

<h2><?= $title ?></h2>
This is home

 <div class="w3-content w3-section" style="max-width:500px">
  <img class="slideshow" src="<?php echo base_url(); ?>assets/images/1.jpg" style="width:100%; max-height:720px">
  <img class="slideshow" src="<?php echo base_url(); ?>assets/images/4.jpg" style="width:100%; max-height:720px">
 </div>

 <script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("slideshow");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 3000); // Change image every 2 seconds
}
</script>