<style>
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

<br><br>
<center>
<h1 style="font-size: 60px">

<?= $title ?>
</h1>
<br>



<?php 
$philippine_cities = array("Alaminos City","Angeles City","Antipolo City","Bacolod City","Bago City","Baguio City","Bais City","Balanga City","Batangas City","Bayawan City","Bisilig City","Butuan City","Cabanatuan City","Cadiz City","Cagayan de Oro City","Calamba City","Calapan City","Calbayog City","Caloocan City","Candon City","Canlaon City","Cauayan City","Cavite City","Cebu City","Cotabato City","Dagupan City","Danao City","Dapitan City","Davao City","Digos City","Dipolog City","Dumaguete City","Escalante City","Gapan City","General Santos City","Gingoog City","Himamaylan City","Iligan City","Iloilo City","Iriga City",
"Isabela City","Island Garden City of Samal","Kabankalan City","Kidapawan City","Koronadal City","La Carlota City","Laoag City","Lapu-Lapu City","Las Piñas City","Legazpi City","Ligao City","Lipa City","Lucena City","Maasin City","Makati City","Malabon City","Malaybalay City","Malolos City","Malolos City","Mandaluyong City","Mandaue City","Manila","Maragondon","Marawi City","Masbate City","Muntinlupa City","Naga City","Olongapo City","Ormoc City","Oroquieta City","Ozamis City","Pagadian City","Palayan City","Legazpi City","Parañaque City","Pasay City","Pasig City","Passi City","Puerto Princesa City","Quezon City","Roxas City","Sagay City","San Carlos City, Negros Occidental","San Carlos City, Pangasinan","San Fernando City, La Union","San Fernando City, Pampanga","San Jose City","San Jose del Monte City","San Pablo City","Santa Rosa City","Santiago City","Muñ City","Silay City","Sipalay City","Sorsogon City","Surigao City","Tabaco City","Tacloban City","Tacurong City",
"Tagaytay City","Tagbilaran City","Tagum City","Talisay City, Cebu", "Talisay City, Negros Occidental","Tanauan City","Tangub City","Tanjay City","Tarlac City","Taguig City","Toledo City","Trece Martires City","Tuguegarao City","Urdaneta City","Valencia City","Valenzuela City","Victorias City","Vigan City","Zamboanga City");
$provinces = array("ARMM"," Bicol Region","CAR","Cagayan Valley","Central Mindanao","Central Luzon", "Caraga", "Central Visayas", "Eastern Visayas", "Ilocos Region", "National Capital Region", "Northern Mindanao", "Southern Mindanao", "Western Mindanao", "Western Visayas");
		
?>
<br>
<div class = "container">
	<table class="form">
		<tbody>
			<form action="<?=base_url().'account/register'?>" method="post" enctype="multipart/form-data">
				<tr>
					<td class="form-h"> First Name </td>
					<td class="form-i"> <input type="text" name="firstName" class="form-control flat" required /> </td>
				</tr>
				<tr>
					<td class="form-h"> Last Name </td>
					<td id="form-i"> <input type="text" name="lastName" class = "form-control flat" required /> </td>
				</tr>
				<tr>
					<td class="form-h"> Email </td>
					<td class="form-i"> <input type="email" name="email" class = "form-control flat" required /> </td>
				</tr>
				<tr>
					<td class="form-h"> Password </td>
					<td class="form-i"> <input type="password" name="password" class = "form-control flat" required /> </td>
				</tr>
				<tr>
					<td class="form-h"> Contact number </td>
					<td class="form-i"> <input type="tel" name="contact" class = "form-control flat" required /> </td>
				</tr>
				<tr>
					<td class="form-h"> Address </td>
					<td class="form-i"> <input type="text" name="address" class = "form-control flat" required > </td>
				</tr>
				<tr>
					<td class="form-h"> City </td>
					<td class="form-i"> 
						<select name = "city" required>
						<?php
							foreach($philippine_cities as $city){
								echo "<option value='".$city."'>".$city."</option>";
							}
						?>
						</select>

					 </td>
				</tr>
				<tr>
					<td class="form-h"> Region </td>
					<td class="form-i">
						<select name="region" required>
						<?php
							foreach($provinces as $province){
								echo "<option value='".$province."'>".$province."</option>";
							}
						?>				
						</select>
					</td>
				</tr>
				<td colspan = "2"> <center><button type = "submit" name = "insert" class = "btn btn-inverse">Register</button></center></td>

			</form>
		</tbody>
	</table>
</div>

<?php
if(isset($_GET['msg'])){
	echo $_GET['msg'];
}
?>
