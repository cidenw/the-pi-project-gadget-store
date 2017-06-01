<?php 
$philippine_cities = array("Alaminos City","Angeles City","Antipolo City","Bacolod City","Bago City","Baguio City","Bais City","Balanga City","Batangas City","Bayawan City","Bisilig City","Butuan City","Cabanatuan City","Cadiz City","Cagayan de Oro City","Calamba City","Calapan City","Calbayog City","Caloocan City","Candon City","Canlaon City","Cauayan City","Cavite City","Cebu City","Cotabato City","Dagupan City","Danao City","Dapitan City","Davao City","Digos City","Dipolog City","Dumaguete City","Escalante City","Gapan City","General Santos City","Gingoog City","Himamaylan City","Iligan City","Iloilo City","Iriga City",
"Isabela City","Island Garden City of Samal","Kabankalan City","Kidapawan City","Koronadal City","La Carlota City","Laoag City","Lapu-Lapu City","Las Piñas City","Legazpi City","Ligao City","Lipa City","Lucena City","Maasin City","Makati City","Malabon City","Malaybalay City","Malolos City","Malolos City","Mandaluyong City","Mandaue City","Manila","Maragondon","Marawi City","Masbate City","Muntinlupa City","Naga City","Olongapo City","Ormoc City","Oroquieta City","Ozamis City","Pagadian City","Palayan City","Legazpi City","Parañaque City","Pasay City","Pasig City","Passi City","Puerto Princesa City","Quezon City","Roxas City","Sagay City","San Carlos City, Negros Occidental","San Carlos City, Pangasinan","San Fernando City, La Union","San Fernando City, Pampanga","San Jose City","San Jose del Monte City","San Pablo City","Santa Rosa City","Santiago City","Muñ City","Silay City","Sipalay City","Sorsogon City","Surigao City","Tabaco City","Tacloban City","Tacurong City",
"Tagaytay City","Tagbilaran City","Tagum City","Talisay City, Cebu", "Talisay City, Negros Occidental","Tanauan City","Tangub City","Tanjay City","Tarlac City","Taguig City","Toledo City","Trece Martires City","Tuguegarao City","Urdaneta City","Valencia City","Valenzuela City","Victorias City","Vigan City","Zamboanga City");
$provinces = array("ARMM"," Bicol Region","CAR","Cagayan Valley","Central Mindanao","Central Luzon", "Caraga", "Central Visayas", "Eastern Visayas", "Ilocos Region", "National Capital Region", "Northern Mindanao", "Southern Mindanao", "Western Mindanao", "Western Visayas");
		
?>
<?php
	if(isset($_POST['email'])){
		$this->account_model->updateCart($_POST);
			
	}
	if(isset($_GET['msg'])){
		echo $_GET['msg'];
	}
	$profile = $this->session->userdata('profile');
?>

<div class = "container">
	<table class = "table table-bordered">
		<tbody>
			<form action="" method="post" enctype="multipart/form-data">
				<tr>
					<td> First Name </td>
					<td> <input type="text" name="firstName" class="form-control flat" value="<?=$profile['firstName']?>" readonly /> </td>
				</tr>
				<tr>
					<td> Last Name </td>
					<td> <input type="text" name="lastName" class = "form-control flat" value="<?=$profile['lastName']?>" readonly /> </td>
				</tr>
				<tr>
					<td> Email </td>
					<td> <input type="email" name="email" class = "form-control flat" value="<?=$profile['email']?>" readonly /> </td>
				</tr>
				<tr>
					<td> Password </td>
					<td> <input type="password" name="password" class = "form-control flat" id= "pwd" required /><button type="button" id="eye">
    <img src="https://cdn0.iconfinder.com/data/icons/feather/96/eye-16.png" alt="eye" />
</button> </td>
				</tr>
				<script type="text/javascript">
	function show() {
    var p = document.getElementById('pwd');
    p.setAttribute('type', 'text');
}

function hide() {
    var p = document.getElementById('pwd');
    p.setAttribute('type', 'password');
}

var pwShown = 0;

document.getElementById("eye").addEventListener("click", function () {
    if (pwShown == 0) {
        pwShown = 1;
        show();
    } else {
        pwShown = 0;
        hide();
    }
}, false);
</script>
				<tr>
					<td> Contact number </td>
					<td> <input type="tel" name="contact" class = "form-control flat" value="<?=$profile['contact']?>" required /> </td>
				</tr>
				<tr>
					<td> Address </td>
					<td> <input type="text" name="address" class = "form-control flat" value="<?=$profile['address']?>" required > </td>
				</tr>
				<tr>
					<td> City </td>
					<td> 

						<select name = "city" required>
						<?php
							foreach($philippine_cities as $id=>$city){
								?>
								<option <?php if($id==array_search($profile['city'],$philippine_cities)) echo "selected"?> value="<?=$city?>" ><?=$city?> </option> 
								<?php
							}
						?>
						</select>

					 </td>
				</tr>
				<tr>
					<td> Region </td>
					<td>
						<select name="region" value="<?=array_search($profile['region'],$provinces)?>" required>
						<?php
							foreach($provinces as $id=>$province){
								?>
								<option <?php if($id==array_search($profile['region'], $provinces)) echo "selected"?> value="<?=$province?>" ><?=$province?> </option> 
								<?php
							}
						?>		
						</select>
					</td>
				</tr>
				<td colspan = "2" align="center"><button type = "submit" name = "insert" class = "btn btn-inverse">Update</button></td>

			</form>
		</tbody>
	</table>
</div>