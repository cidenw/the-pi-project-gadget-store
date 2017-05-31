<link href="https://fonts.googleapis.com/css?family=Raleway:200" rel="stylesheet">
<style>

p,h1,h2,h3{
  font-family: 'Raleway', sans-serif;
}

#SupportSB {
    height: 45px;
    width: 300px;
    box-sizing: border-box;
    border: 1.0px solid #333;
    border-radius: 15px;
    font-family: 'Raleway', sans-serif;
    font-size: 20px;
    color: #131111;
    background-color: #FFF;
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
}


/** TAB MENU **/
.tablink {
    background-color: #eeeeee;
    color: black;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    font-size: 17px;
    width: 262.5px;
    font-family: 'Raleway', sans-serif;
    height: 160px;
    text-align: center;
}

.tablink:hover {
    font-family: 'Raleway', sans-serif;
    background-color: #e1dfdf;
}

/* Style the tab content */
.tabcontent {
    color: black;
    display: none;
    /**padding: 10px; **/
    width: 1050px;
    height: 800px;
}

#a,#b,#c,#d {
	background-color: #fff;
}

.tab_header{
    text-align: center;
    margin-left: 10%;
}

/** BRANCHES **/

#branches {
    /* Remove default list styling */
    list-style-type: none;
    font-family: 'Raleway', sans-serif;
    width: 400px;
    float: center;
}

#branches li a {
    text-decoration: none; /* Remove default text underline */
    font-size: 18px; /* Increase the font-size */
    color: black;
}

/** FAQS **/
#answers1,#answers2,#answers3,#answers4,#answers5,#answers6 {
    width: 100%;
    text-align: center;
    margin-top:20px;
}

#faqs{
	height: 20px;
	height:20px;
}

/**  form **/

#supportButton {
   background-color: #3d9ba1;
   border: none;
   color: white;
   padding: 6px 24px;
   font-family: 'Raleway', sans-serif;
   font-size: 13px;
   display: inline-block;
}

#formbar {
    height: 30px;
    width: 230px;
    box-sizing: border-box;
    border: 0.50px solid #333;
    border-radius: 10px;
    font-family: 'Raleway', sans-serif;
    font-size: 15px;
    color: #131111;
    background-color: #FFF;
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
}

#form-message{
	background-color: #FFF;
	box-sizing: border-box;
	border: 0.50px solid #333;
    border-radius: 10px;
    font-family: 'Raleway';
}
</style>

<center>

<!--
<br><br>
<p style="font-size: 50px">How can we help you? </p>
</p>
<br><br><br>
-->
<br><br>
<div class="tab_header">

<div id="a" class="tabcontent">
  <h1 style="font-size: 45px"><br>What are your questions about us?</h1>
  <br>
  
  <h3 style="font-size: 20px;"> Ordering Online </h3>

  <h3 style="font-size: 20px; color: blue">How do I place an order? &nbsp; &nbsp;
  <img id="faqs" src="<?php echo base_url(); ?>assets/images/arrow.png" onclick="showOrHide('answers1')"/> </h3>
  <div id="answers1" style="display: none;">
  <p style="font-size: 17px">
    Shopping at The Project Pi is easy and secure. Placing an online order requires just a few steps: 
    <br> <br>
    Select an item you would like to purchase, and then click the Add to Cart button. You <br> 
    can then choose to continue shopping or go directly to Checkout. Once you are finished <br> 
    shopping, click on Shopping Cart at the top right corner of page, and follow the <br>
    Checkout steps. You will receive an email confirming your order.</p>
  </div>

  <h3 style="font-size: 20px; color: blue">What should I do if I'm having trouble placing an order? &nbsp; &nbsp;
  <img id="faqs" src="<?php echo base_url(); ?>assets/images/arrow.png" onclick="showOrHide('answers2')"/> </h3>
  <div id="answers2" style="display: none;">
  <p style="font-size: 17px">
    For any technical difficulties you are experiencing with your website, please call us <br> toll-free at 855-726-8721, seven days a week, 9 a.m.-9 p.m. EST, or email us.</p>
  </div>

  <h3 style="font-size: 20px; color: blue">How do I pay for my order? &nbsp; &nbsp;
  <img id="faqs" src="<?php echo base_url(); ?>assets/images/arrow.png" onclick="showOrHide('answers3')"/> </h3>
  <div id="answers3" style="display: none;">
  <p style="font-size: 17px">
    We accept Visa®, MasterCard®, Discover®, American Express®, Diner's Club® and JCB, as well<br>
    as debit cards with the Visa® or MasterCard® logo. Our servers encrypt all information submitted <br>
    to them, so you can be confident that your credit card information will be kept safe and secure. </p>
  </div>
  
  <h3 style="font-size: 20px;"> Product Assistance</h3>

  <h3 style="font-size: 20px; color: blue">How do I find a product online that I saw in a store? &nbsp; &nbsp;
  <img id="faqs" src="<?php echo base_url(); ?>assets/images/arrow.png" onclick="showOrHide('answers4')"/> </h3>
  <div id="answers4" style="display: none;">
  <p style="font-size: 17px">
    <p>Not all merchandise carried in stores is available online at this time. You may use <br>
    our Search feature to look for an item by keyword or item number. </p>
  </div>

  <h3 style="font-size: 20px; color: blue">How often are new products added to the online stores? &nbsp; &nbsp;
  <img id="faqs" src="<?php echo base_url(); ?>assets/images/arrow.png" onclick="showOrHide('answers5')"/> </h3>
  <div id="answers5" style="display: none;">
  <p style="font-size: 17px">
    We add products to our online stores frequently, and offer new sales and promotions, as <br>
    well, so check back often for new products and great offers</p>
  </div>

  <h3 style="font-size: 20px;">Product Returns</h3>

  <h3 style="font-size: 20px; color: blue">What is your return policy? &nbsp; &nbsp;
  <img id="faqs" src="<?php echo base_url(); ?>assets/images/arrow.png" onclick="showOrHide('answers6')"/> </h3>
  <div id="answers6" style="display: none;">
  <p style="font-size: 17px">
    <p>The Pi Project Direct will accept, for return or exchange, defective or unopened merchandise <br>
    purchased at Samsung.com/US, subject to the exceptions and timeframe for returns listed below:<br>
    All merchandise returned to Samsung Direct must be in the original packaging with all original<br>
    items (such as manuals, remotes, cables, etc.) accompanying the merchandise and a copy of the <br>
    invoice/packing slip included to be eligible for return or exchange. Shipping and handling fees <br>
    from your original order will not be refunded, unless the merchandise is determined by Samsung <br>
    Direct, in its sole discretion, to be defective. </p>
  </div>



</div>

<div id="b" class="tabcontent">
<br>
  <h1 style="font-size: 45px">What do you need help with?</h1>
  <br>
  <h1 style="font-size: 30px; color: blue">
  Email us your concerns or schedule a service!</h1>

  <form action="/action_page.php">
  <h3> First name: </h3>
  <input id="formbar" type="text" name="firstname" value="Mickey">
  <br>
  <h3>Last name: </h3> 
  <input id="formbar" type="text" name="lastname" value="Mouse">
  <br><br>
  <textarea name="message" id="form-message" rows="8" cols="40">
   Write here...
   </textarea> <br><br>
  <input type="submit" id="supportButton" value="Submit">
  </form> 

  <br>
  <h3 style="font-size: 20px;">Message us! </h3>
  <p>
  <a href="https://wwww.facebook.com/aristimialmoro"><img src="<?php echo base_url(); ?>assets/images/fb.png" height="26px">  tppsupport</a> <br>
  <a href="https://twitter.com/aristimialmoro"><img src="<?php echo base_url(); ?>assets/images/tw.png" height="30px"> tppsupport</a>
  </p> 
</div>

<div id="c" class="tabcontent">
  <br>
  <h1 style="font-size: 45px">How would you like to contact us?</h1>
  <br><br>
  <h1 style="font-size: 30px; color: blue">
  1-800-31415</h1>
  <p style="font-size: 20px">
    (1-800-726-7864) <br>
    MON - FRI : 8AM -12 AM (EST)<br>
    SAT - SUN : 9AM -11 PM (EST)
  </p>

  <p style="font-size: 15px">24 hour support available for mobile devices</p>

  <h1 style="color: blue">Social Support</h1>
  <p>Contact us on Twitter or Facebook and we'll reply <br>
  with an answer to your question or issue.<br><br>
  <a href="https://wwww.facebook.com/aristimialmoro"><img src="<?php echo base_url(); ?>assets/images/fb.png" height="26px">  tppsupport</a> <br>
  <a href="https://twitter.com/aristimialmoro"><img src="<?php echo base_url(); ?>assets/images/tw.png" height="30px"> tppsupport</a>
  </p>
</div>

<div id="d" class="tabcontent">
  <h1 style="font-size: 45px">How would you find Us?</h1>
  <br>
  <input type="text" name="search" placeholder="Type your City/Province" id="SupportSB" onkeyup="searchBranch()" />
  <br><br>
    <h1 style="font-size: 30px; color: blue"> BRANCHES </h1>
  <center>
  <ul id="branches">
  <li><a href="#">Greenbelt 5, Makati City</a></li>
  <li><a href="#">Glorietta 4, Makati City</a></li>
  <li><a href="#">SM Mall Of Asia, Pasay City</a></li>
  <li><a href="#">SM Megamall, Mandaluyong City</a></li>
  <li><a href="#">SM North EDSA, Quezon City</a></li>
  <li><a href="#">Trinoma, Quezon City</a></li>
  <li><a href="#">UPTC, Quezon City</a></li>
  <li><a href="#">SM Fairview, Quezon City</a></li>
  <li><a href="#">SM Southmall, Las Pinas City</a></li>
  <li><a href="#">Alabang Town Center, Muntinlupa City</a></li>
  <li><a href="#">Molito, Muntinlupa City</a></li>
  <li><a href="#">Bonifacio High Street, Taguig City</a></li>
  <li><a href="#">SM Aura, Taguig City</a></li>
  </center>

  </ul>

  <h1 style="font-size: 30px; color: blue">STORE HOURS</h1>
  <p style="font-size: 20px" >
    MON - FRI : 9AM - 10 PM (EST)<br>
    SAT - SUN : 9AM - 11 PM (EST)
  </p>

  <p>Like us on facebook or twitter.<br><br>
  <a href="https://wwww.facebook.com/aristimialmoro"><img src="<?php echo base_url(); ?>assets/images/fb.png" height="26px">  @thepiproject</a> <br>
  <a href="https://twitter.com/aristimialmoro"><img src="<?php echo base_url(); ?>assets/images/tw.png" height="30px"> @thepiproject</a>
  </p>
</div>

<button class="tablink" onclick="openOpt('a', this)" id="defaultOpen" >
  <h3>Frequently Asked Questions!</h3>
  <p style="font-size: 15px"> You can find answers to some <br> of your questions here. </p>
</button>
<button class="tablink" onclick="openOpt('b', this)">
  <h3>Find a Solution!</h3>
  <p style="font-size: 15px">See FAQs, interactive demos,community forums, or get a repair.</p>
</button>
<button class="tablink" onclick="openOpt('c', this)">
  <h3>Contact Us!</h3>
  <p style="font-size: 15px">You can reach us via phone,chat,email, or ask the community.</p>
</button>
<button class="tablink" onclick="openOpt('d', this)">
  <h3>Visit Us!</h3>
  <p style="font-size: 15px">Find the nearest store in you location.</p>
</button>

</div>



<!-- TAB MENU JS -->
<script>
function openOpt(optName,element) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(optName).style.display = "block";
    element.style.backgroundColor = '#559397';

}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

<script>
function searchBranch() {
    // Declare variables
    var input, filter, ul, li, a, i;
    input = document.getElementById('SupportSB');
    filter = input.value.toUpperCase();
    ul = document.getElementById("branches");
    li = ul.getElementsByTagName('li');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

function showOrHide(aString) {
    var x = document.getElementById(aString);
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
</script>

</center>
