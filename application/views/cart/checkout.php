<?php 
$philippine_cities = array("Alaminos City","Angeles City","Antipolo City","Bacolod City","Bago City","Baguio City","Bais City","Balanga City","Batangas City","Bayawan City","Bisilig City","Butuan City","Cabanatuan City","Cadiz City","Cagayan de Oro City","Calamba City","Calapan City","Calbayog City","Caloocan City","Candon City","Canlaon City","Cauayan City","Cavite City","Cebu City","Cotabato City","Dagupan City","Danao City","Dapitan City","Davao City","Digos City","Dipolog City","Dumaguete City","Escalante City","Gapan City","General Santos City","Gingoog City","Himamaylan City","Iligan City","Iloilo City","Iriga City",
"Isabela City","Island Garden City of Samal","Kabankalan City","Kidapawan City","Koronadal City","La Carlota City","Laoag City","Lapu-Lapu City","Las Piñas City","Legazpi City","Ligao City","Lipa City","Lucena City","Maasin City","Makati City","Malabon City","Malaybalay City","Malolos City","Malolos City","Mandaluyong City","Mandaue City","Manila","Maragondon","Marawi City","Masbate City","Muntinlupa City","Naga City","Olongapo City","Ormoc City","Oroquieta City","Ozamis City","Pagadian City","Palayan City","Legazpi City","Parañaque City","Pasay City","Pasig City","Passi City","Puerto Princesa City","Quezon City","Roxas City","Sagay City","San Carlos City, Negros Occidental","San Carlos City, Pangasinan","San Fernando City, La Union","San Fernando City, Pampanga","San Jose City","San Jose del Monte City","San Pablo City","Santa Rosa City","Santiago City","Muñ City","Silay City","Sipalay City","Sorsogon City","Surigao City","Tabaco City","Tacloban City","Tacurong City",
"Tagaytay City","Tagbilaran City","Tagum City","Talisay City, Cebu", "Talisay City, Negros Occidental","Tanauan City","Tangub City","Tanjay City","Tarlac City","Taguig City","Toledo City","Trece Martires City","Tuguegarao City","Urdaneta City","Valencia City","Valenzuela City","Victorias City","Vigan City","Zamboanga City");
$provinces = array("ARMM"," Bicol Region","CAR","Cagayan Valley","Central Mindanao","Central Luzon", "Caraga", "Central Visayas", "Eastern Visayas", "Ilocos Region", "National Capital Region", "Northern Mindanao", "Southern Mindanao", "Western Mindanao", "Western Visayas");
		
?>
<div id="display_cart">


</div>
<?=$title?> <br> 
<table border="1">
	<tr><th>Product Name</th><th>Unit Price</th><th>Quantity</th><th>Price</th>		</tr>

	<?php
	$total = 0;
	foreach($cart as $productID=>$productQuantity){
		echo "<tr>";
		$currentProduct = $this->product_model->get_products($productID);
		echo "<td>".$currentProduct->productName."</td>";
		echo "<td>".number_format((float)$currentProduct->price)."</td>";
		?>
		<td><?=$productQuantity?></td>
		<?php

		$price = $productQuantity*$currentProduct->price;
		echo "<td>".number_format($price)."</td>";
		?></tr>
		<?php
		$total+= $price;
	}
	?>
	<tr><td><td><td>total</td><td><?php echo number_format($total)?></td></td></td></tr>
</table>
<div class = "container">
	<table class = "table table-bordered">
		<tbody>
			<form action="<?=base_url().'cart/confirm_order'?>" method="post" enctype="multipart/form-data">
				<tr>
					<td> First Name </td>
					<td> <input type="text" name="firstName" class="form-control flat" required /> </td>
				</tr>
				<tr>
					<td> Last Name </td>
					<td> <input type="text" name="lastName" class = "form-control flat" required /> </td>
				</tr>
				<tr>
					<td> Email </td>
					<td> <input type="email" name="email" class = "form-control flat" required /> </td>
				</tr>
				<tr>
					<td> Contact number </td>
					<td> <input type="tel" name="contact" class = "form-control flat" required /> </td>
				</tr>
				<tr>
					<td> Address </td>
					<td> <input type="text" name="address" class = "form-control flat" required > </td>
				</tr>
				<tr>
					<td> City </td>
					<td> 
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
					<td> Region </td>
					<td>
						<select name="region" required>
						<?php
							foreach($provinces as $province){
								echo "<option value='".$province."'>".$province."</option>";
							}
						?>				
						</select>
					</td>
				</tr>
				<td colspan = "2" align="center"><button type = "submit" name = "insert" class = "btn btn-inverse">Confirm Order</button></td>

			</form>
		</tbody>
	</table>
</div>

	