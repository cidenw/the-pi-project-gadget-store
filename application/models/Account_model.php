<?php
	class Account_model extends CI_Model{
		public function verify_password($email, $password){
			$usersColl = new DOMDocument();
			$path = "/home/woccidental/public_html/tpp/assets/xml/users.xml";
			$usersColl->load($path);
			$UserInfo = array();
			$userInfos = array();
			$Users = $usersColl->getElementsbyTagName("users")[0];
			
			for($i = 0; $i< $Users->childNodes->length; $i++){
				$user = $Users->childNodes->item($i);
				$userInfo['cart'] = array();
				if($user->nodeType == 1){
					for($j=0; $j<$user->childNodes->length; $j++){
						$child = $user->childNodes->item($j);
						if($child->nodeType==1){
							if($child->nodeName=="cart"){
								$cart = array();
								for($k=0; $k<$child->childNodes->length; $k++){
									$product = $child->childNodes->item($k);
									if($product->nodeType==1){

										for($l = 0; $l<$product->childNodes->length; $l+=2){

											$item = $product->childNodes->item($l);
											$productID = $product->childNodes->item($l);
											$productQuantity = $product->childNodes->item($l+1);
											if($item->nodeType==1){
												$cart[$productID->nodeValue] = $productQuantity->nodeValue;
											}
											
										}
									}
								}
								$userInfo['cart'] = $cart;
							}else{
								$userInfo[$child->nodeName] = $child->nodeValue;
							}
							
							//echo $child->nodeName;
						}
					}
					array_push($userInfos, $userInfo);
				}
				
			}
			$this->load->library('encrypt');
			$email = $_POST['email'];
			$password = $_POST['password'];
			//$password = $this->encrypt->encode($password);
			foreach($userInfos as $user){
				//print_r($user['cart']);
				if($user['email'] == $email){
					if($this->encrypt->decode($user['password']) == $password){
						$data['login'] = true;
						$data['profile'] = $user;
						if(isset($user['cart'])){
							$data['cart'] = $user['cart'];
						}
						
						return $data;
					}else{
						$data['error'] = "Incorrect password.";
						return $data;
					}
				}
			}
			if(!isset($data['login'])){
				$data['error'] = "Account does not exist";
				return $data;
			}
		}

		public function updateCart($editProfile = null){
			if(!is_null($editProfile)){
				$newProfile = array();
				$newProfile['email'] = $editProfile['email'];
				$newProfile['firstName'] = $editProfile['firstName'];
				$newProfile['lastName'] = $editProfile['lastName'];
				$newProfile['contact'] = $editProfile['contact'];
				$newProfile['address'] = $editProfile['address'];
				$newProfile['city'] = $editProfile['city'];
				$newProfile['region'] = $editProfile['region'];
				$newProfile['password'] = $editProfile['password'];
				$this->session->set_userdata('profile', $newProfile);
				$header = 'account?msg=Successfully%20updated';
				
			}
			$data = $this->session->userdata('profile');
			$cart = $this->session->userdata('cart');
			$usersColl = new DOMDocument();
			$path = "/home/woccidental/public_html/tpp/assets/xml/users.xml";
			$usersColl->load($path);
			$UserInfo = array();
			$userInfos = array();
			$Users = $usersColl->getElementsbyTagName("users")[0];
			
			$email = $data['email'];
			$firstName = $data['firstName'];
			$lastName = $data['lastName'];
			$contact = $data['contact'];
			$address = $data['address'];
			$city = $data['city'];
			$region = $data['region'];
			$this->load->library('encrypt');
			$password = $data['password'];
			if(!is_null($editProfile)){
				$password = $this->encrypt->encode($password);
			}

			$toDelete = null;
			for($i = 0; $i< $Users->childNodes->length; $i++){
				$user = $Users->childNodes->item($i);
				if($user->nodeType == 1){
					for($j=0; $j<$user->childNodes->length; $j++){
						$child = $user->childNodes->item($j);
						if($child->nodeType==1){
							if($child->nodeValue==$email){
								$toDelete = $user;
							}
						}
					}
				}
			}
			


			$usersColl->formatOutput = true;
			$root = $usersColl->documentElement;
			if(is_null($toDelete)){
				return;
			}
			$delete = $root->removeChild($toDelete);
			$newUser = $usersColl->createElement("user");
			$fname = $usersColl->createElement("firstName", $firstName);
			$newUser->appendChild($fname);
			$lname = $usersColl->createElement("lastName", $lastName);
			$newUser->appendChild($lname);
			$userEmail = $usersColl->createElement("email", $email);
			$newUser->appendChild($userEmail);
			$userContact = $usersColl->createElement("contact", $contact);
			$newUser->appendChild($userContact);
			$userAddress = $usersColl->createElement("address", $address);
			$newUser->appendChild($userAddress);
			$userCity = $usersColl->createElement("city", $city);
			$newUser->appendChild($userCity);
			$userRegion = $usersColl->createElement("region", $region);
			$newUser->appendChild($userRegion);
			$userPassword = $usersColl->createElement("password", $password);
			$newUser->appendChild($userPassword);
			
			if(!empty($cart)){
				$newCart = $usersColl->createElement("cart");
				foreach($cart as $id=>$quantity){
				$newProduct = $usersColl->createElement("product");
				$newProductID = $usersColl->createElement("productID", $id);
				$newProductQuantity = $usersColl->createElement("quantity", $quantity); 
				$newProduct->appendChild($newProductID);
				$newProduct->appendChild($newProductQuantity);
				$newCart->appendChild($newProduct);
				}
			$newUser->appendChild($newCart);
			}
			
			$root->appendChild($newUser);
			$usersColl->save("/home/woccidental/public_html/tpp/assets/xml/users.xml");
			if(isset($header)){
				header('Location:'.base_url().$header);
			}
		}

		public function register($data){
			$usersColl = new DOMDocument();
			$path = "/home/woccidental/public_html/tpp/assets/xml/users.xml";
			$usersColl->load($path);
			$UserInfo = array();
			$userInfos = array();
			$Users = $usersColl->getElementsbyTagName("users")[0];
			
			for($i = 0; $i< $Users->childNodes->length; $i++){
				$user = $Users->childNodes->item($i);
				if($user->nodeType == 1){
					for($j=0; $j<$user->childNodes->length; $j++){
						$child = $user->childNodes->item($j);
						if($child->nodeType==1){
							if($child->nodeName=="cart"){
								$cart = array();
								for($k=0; $k<$child->childNodes->length; $k++){
									$product = $child->childNodes->item($k);
									if($product->nodeType==1){
										for($l = 1; $l<$product->childNodes->length-2; $l+=2){
											$item = $product->childNodes->item($l);
											$productID = $product->childNodes->item($l);
											$productQuantity = $product->childNodes->item($l+2);
											if($item->nodeType==1){
												$cart[$productID->nodeValue] = $productQuantity->nodeValue;
											}
											
										}
									}
								}
								$userInfo['cart'] = $cart;
							}else{
								$userInfo[$child->nodeName] = $child->nodeValue;
							}
						}
					}
					array_push($userInfos, $userInfo);
				}
				
			}
			$email = $data['email'];
			$firstName = $data['firstName'];
			$lastName = $data['lastName'];
			$contact = $data['contact'];
			$address = $data['address'];
			$city = $data['city'];
			$region = $data['region'];
			$this->load->library('encrypt');
			$password = $data['password'];
			$password = $this->encrypt->encode($password);
			foreach($userInfos as $user){
				if($user['email']==$email){
					$msg = "Email already taken.";
					echo $user['email']."1<br>";
					echo $email."2<br>";
					header('Location:'.base_url().'account/register?msg='.$msg);
					return;
				}
			}

			$usersColl->formatOutput = true;
			$root = $usersColl->documentElement;

			$newUser = $usersColl->createElement("user");
			$fname = $usersColl->createElement("firstName", $firstName);
			$newUser->appendChild($fname);
			$lname = $usersColl->createElement("lastName", $lastName);
			$newUser->appendChild($lname);
			$userEmail = $usersColl->createElement("email", $email);
			$newUser->appendChild($userEmail);
			$userContact = $usersColl->createElement("contact", $contact);
			$newUser->appendChild($userContact);
			$userAddress = $usersColl->createElement("address", $address);
			$newUser->appendChild($userAddress);
			$userCity = $usersColl->createElement("city", $city);
			$newUser->appendChild($userCity);
			$userRegion = $usersColl->createElement("region", $region);
			$newUser->appendChild($userRegion);
			$userPassword = $usersColl->createElement("password", $password);
			$newUser->appendChild($userPassword);

			$root->appendChild($newUser);
			$usersColl->save("/home/woccidental/public_html/tpp/assets/xml/users.xml");
			$msg = "Sign up successful.<br>Sign in with your newly created account";
			header('Location:'.base_url().'account/signin?msg='.$msg);
		}
	}
?>
	