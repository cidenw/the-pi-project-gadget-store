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
 h1,h2,h3,h4,h5,table {
        font-family: 'Raleway', sans-serif;
    }
    
    /** TABLE CART **/
    
    table,#form{
        border-collapse: collapse;
        border: none;
    }
    
    #cart-tr {
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

    td,th{
        text-align: left;
        padding-left: 25px;
        padding-top: 18px;
        padding-right: 25px;
        padding-bottom: 18px;
        border: none;
        font-size: 16px;
    }
    
    th{
        font-size: 20px;
    }
    table{
      box-shadow: 8px 8px 4px #c7c7c7; 
    } 
    

    input[type=text],[type=email],[type=tel],[type=password]{
        font-family: 'Gill Sans MT';
        font-size: 16px;
        border: 0.10px solid #333;
        padding: 5px 5px 5px 5px;
        background-color: ;
        color: black;
        border-radius: 40px;
        width: 280px;

    }

    select{
        border-radius: 20px;
        padding: 5px 5px 5px 5px;
        font-family: 'Gill Sans MT';
        font-size: 16px;
        border: 0.10px solid #333;
    }

    button{
        font-family: 'Raleway', sans-serif;
        font-size: 20px;
        border: none;
        padding: 15px 15px 15px 15px;
        background-color: #308489;
        color: white;
        border-radius: 35px;
    }

    .form tr:nth-child(odd) .form-h{
        background-color: #308489;
        color: white;
    }

    .form tr:nth-child(odd) .form-i{
        background-color: #e1e1e1;
        color: white;
    }

    .form tr:nth-child(even) .form-h{
         background-color: #32898e;
         color: white;
    }

    .form tr{
        border: none;
        border-bottom: none;
    }

</style>


<center>
<h1 style="font-size: 60px;"><?= $title ?><h1>

<div class = "container">
    <table class="form">
        <tbody>
            <form action="<?=base_url()?>account/verify_login" method="post">
                <tr>
                <td class="form-h">
                    Email:
                </td">
                <td class="form-i">
                 <h5> <input type="text" name="email">
                </td>
                </tr>
                 <tr>
                <td class="form-h">
                     Password:
                </td>
                <td class="form-i">
                 <input type="password" name="password"> </h5><br>
                </td>
                </tr>
                <br><br>
                 
                 <td colspan = "2"> <center><button type = "submit" class = "btn btn-inverse">Sign In</button></center></td>
            </form>
        </tbody>
    </table>
</div>


<br><br>
<?php
if(isset($_GET['msg'])){
	echo $_GET['msg'];
}
	

?>
<br>
<h2><a href="<?=base_url().'account/register'?>" style="color:#308489;">Register here</a></h2>

</center>


