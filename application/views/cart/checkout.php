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
    

    input[type=text],[type=email],[type=tel]{
    	font-family: 'Gill Sans MT';
    	font-size: 16px;
    	border: 0.10px solid #333;
    	padding: 5px 5px 5px 5px;
    	background-color: ;
    	color: black;
    	border-radius: 40px;

    }

    select{
    	border-radius: 10px;
    	padding: 5px 5px 5px 5px;
    	font-family: 'Gill Sans MT';
    	font-size: 16px;
    	border: 0.10px solid #333;
    }

    button{
    	font-family: 'Raleway', sans-serif;
    	font-size: 20px;
    	border: none;
    	padding: 20px 20px 20px 20px;
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


<?php 
$philippine_cities = array("Alaminos City","Angeles City","Antipolo City","Bacolod City","Bago City","Baguio City","Bais City","Balanga City","Batangas City","Bayawan City","Bisilig City","Butuan City","Cabanatuan City","Cadiz City","Cagayan de Oro City","Calamba City","Calapan City","Calbayog City","Caloocan City","Candon City","Canlaon City","Cauayan City","Cavite City","Cebu City","Cotabato City","Dagupan City","Danao City","Dapitan City","Davao City","Digos City","Dipolog City","Dumaguete City","Escalante City","Gapan City","General Santos City","Gingoog City","Himamaylan City","Iligan City","Iloilo City","Iriga City",
"Isabela City","Island Garden City of Samal","Kabankalan City","Kidapawan City","Koronadal City","La Carlota City","Laoag City","Lapu-Lapu City","Las Piñas City","Legazpi City","Ligao City","Lipa City","Lucena City","Maasin City","Makati City","Malabon City","Malaybalay City","Malolos City","Malolos City","Mandaluyong City","Mandaue City","Manila","Maragondon","Marawi City","Masbate City","Muntinlupa City","Naga City","Olongapo City","Ormoc City","Oroquieta City","Ozamis City","Pagadian City","Palayan City","Legazpi City","Parañaque City","Pasay City","Pasig City","Passi City","Puerto Princesa City","Quezon City","Roxas City","Sagay City","San Carlos City, Negros Occidental","San Carlos City, Pangasinan","San Fernando City, La Union","San Fernando City, Pampanga","San Jose City","San Jose del Monte City","San Pablo City","Santa Rosa City","Santiago City","Muñ City","Silay City","Sipalay City","Sorsogon City","Surigao City","Tabaco City","Tacloban City","Tacurong City",
"Tagaytay City","Tagbilaran City","Tagum City","Talisay City, Cebu", "Talisay City, Negros Occidental","Tanauan City","Tangub City","Tanjay City","Tarlac City","Taguig City","Toledo City","Trece Martires City","Tuguegarao City","Urdaneta City","Valencia City","Valenzuela City","Victorias City","Vigan City","Zamboanga City");
$provinces = array("ARMM"," Bicol Region","CAR","Cagayan Valley","Central Mindanao","Central Luzon", "Caraga", "Central Visayas", "Eastern Visayas", "Ilocos Region", "National Capital Region", "Northern Mindanao", "Southern Mindanao", "Western Mindanao", "Western Visayas");
		
?>
<div id="display_cart">

</div>


<center>
<br>
<h1 style="font-size: 50px"> <?=$title?>  </h1>

<br>

<table>
	<tr>
	   <th>Product Name</th>
	   <th>Unit Price</th>
	   <th>Quantity</th>
	   <th>Price</th>		
	</tr>

	<?php
	$total = 0;
	foreach($cart as $productID=>$productQuantity){
		echo "<tr>";
		$currentProduct = $this->product_model->get_products($productID);
		echo "<td><h3>".$currentProduct->productName."</h3></td>";
		echo "<td><h4> ₱ ".number_format((float)$currentProduct->price)."</h4></td>";
		?>
		<td><h4><?=$productQuantity?></h4></td>
		<?php

		$price = $productQuantity*$currentProduct->price;
		echo "<td><h4> ₱ ".number_format($price)."</h4></td>";
		?></tr>
		<?php
		$total+= $price;
	}
	?>
	<tr>
	  <td></td>
	  <td></td>
	  <td><h3>Total</h3></td>
	  <td><h4> ₱ <?php echo number_format($total)?></h4></td>
	 </tr>
</table>

<br><br>


<?php
if($this->session->userdata('is_LoggedIn')){
	?>

	<a href="<?=base_url().'cart/confirm_order'?>">Confirm Order</a>
	<?php
}else{
	?>
	<h2>Write here your information.</h2>
	<br>
	<div class = "container">
	<table class = "form">
		<tbody>
			<form action="<?=base_url().'cart/confirm_order'?>" method="post">
				<tr>
					<td class="form-h"> First Name </td>
					<td class="form-i"> <input type="text" name="firstName" required /> </td>
				</tr>
				<tr>
					<td class="form-h"> Last Name </td>
					<td class="form-i"> <input type="text" name="lastName" required /> </td>
				</tr>
				<tr>
					<td  class="form-h"> Email </td>
					<td class="form-i"> <input type="email" name="email" required /> </td>
				</tr>
				<tr>
					<td  class="form-h"> Contact number </td>
					<td class="form-i"> <input type="tel" name="contact" required /> </td>
				</tr>
				<tr>
					<td  class="form-h"> Address </td>
					<td class="form-i"> <input type="text" name="address" required > </td>
				</tr>
				<tr>
					<td  class="form-h"> City </td>
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
					<td  class="form-h"> Region </td>
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

				<td colspan = "2"> <center><button type = "submit" name = "insert" class = "btn btn-inverse">Confirm Order</button></center></td>

			</form>
		</tbody>
	</table>
</div>
</center>

	<?php
}
?>

	