<?php
class Cart extends CI_Controller{
	public function index(){

		$data = array();
		$data['title'] = 'Shopping Cart';
		$data['products'] = $this->product_model->get_products();

		$this->load->library('session');
		$data['cart'] = $this->session->userdata('cart');
		if(empty($data['cart'])){
			$data['cart'] = array();
		}
		$this->load->view('templates/header');
		$this->load->view('cart/index', $data);
		$this->load->view('templates/footer');

	}

	public function add($productID = NULL){
		if($productID == NULL){
			show_404();
		}

		if($productID == "checkout"){
			checkout();
			return;
		}
		$data['product'] = $this->product_model->get_products($productID);
		$data['title'] = $data['product']['productName'];

		$this->load->library('session');
		$cart = $this->session->userdata('cart');
		if(empty($cart)){
			$cart = array();
		}
		array_push($cart, (String)$data['product']['productID']);
		$cart = array_count_values($cart);
		$data['added'] = true;
		$this->session->set_userdata('cart', $cart);
		$this->load->view('templates/header');
		$this->load->view('products/view', $data);
		$this->load->view('templates/footer');
	}

	public function update(){
		$data = array();
		$data['title'] = 'Shopping Cart';
		$data['products'] = $this->product_model->get_products();

		$this->load->library('session');
		$data['cart'] = $this->session->userdata('cart');
		if(empty($data['cart'])){
			$data['cart'] = array();
		}
		$this->load->view('cart/update',$data);
	}
	public function checkout(){

		$data = array();
		$data['title'] = 'Checkout';
		$data['products'] = $this->product_model->get_products();

		$this->load->library('session');
		$data['cart'] = $this->session->userdata('cart');


		$this->load->view('templates/header');
		$this->load->view('cart/checkout', $data);
		$this->load->view('templates/footer');
	}

	public function confirm_order(){

		$data = array();
		$data['title'] = 'Checkout';
		$data['products'] = $this->product_model->get_products();

		$this->load->library('session');
		$data['cart'] = $this->session->userdata('cart');

		$this->load->library('Pdf');

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('The Pi Project');
		$pdf->SetTitle('The Pi Project');
		$pdf->SetSubject('Order Summary & Payment Instructions');

// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
		$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			require_once(dirname(__FILE__).'/lang/eng.php');
			$pdf->setLanguageArray($l);
		}

// ---------------------------------------------------------

// set default font subsetting mode
		$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
		$pdf->SetFont('dejavusans', '', 11, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
		$pdf->AddPage();

// set text shadow effect
		$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print
		$name = $_POST['firstName']." ".$_POST['lastName'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$region = $_POST['region'];
		$data['email'] = $email;
		$date = getdate()['month']." ".getdate()['mday'].", ".getdate()['year']." - ".date("h:i:sa"); 
		$total = 0;
		foreach($data['cart'] as $productID=>$productQuantity){
			$currentProduct = $this->product_model->get_products($productID);
			$total+=$currentProduct->price*$productQuantity;
		}
		$total = number_format($total);
		$tbl = <<<EOD

		<table cellpadding="1" cellspacing="0">
			<tr>
				<td width = "120">Issue Date:</td><td>$date</td>
			</tr>
			<tr>
				<td width = "120">Invoice For:</td><td>$name</td>
			</tr>
			<tr>
				<td width = "120"></td><td>$email</td>
			</tr>
			<tr>
				<td width = "120"></td><td>$contact</td>
			</tr>
			<tr>
				<td width = "120"></td><td>$address</td>
			</tr>
			<tr>
				<td width = "120"></td><td>$city</td>
			</tr>
			<tr>
				<td width = "120"></td><td>$region</td>
			</tr>
		</table>



EOD;

		$tbl.= <<<EOD
		<br><br><br>
		<table cellspacing="0" cellpadding="1" border="1">
EOD;


			$tbl.= <<<EOD
			<tr>
				<th>Product Name</th>
				<th>Unit Price</th>
				<th>Quantity</th>
				<th>Amount</th>
			</tr>

EOD;

			foreach($data['cart'] as $productID=>$productQuantity){
				$currentProduct = $this->product_model->get_products($productID);
				$price = number_format($productQuantity*$currentProduct->price);
				$unitprice = number_format((float)$currentProduct->price);
				$productName = $currentProduct->productName;
				$tbl.=<<<EOD
				<tr>

					<td>$productName</td>
					<td>₱$unitprice</td>

					<td>$productQuantity</td>

					<td>₱$price</td>
				</tr>

EOD;
			}


			$tbl.=<<<EOD
		</table>
		<br>
		<br>
		<br>
		<table>
			<tr>
				<td></td><td></td><td>Amount due:</td><td border="1"> ₱$total</td>
			</tr>
		</table>
EOD;

		$fileName = "Payment-Instructions.pdf";
		$pdf->writeHTML($tbl, true, false, false, false, '');
		$pdf->addPage();
		$payment=<<<EOD
		<pre>
			Bank Transfer Instructions
			Please transfer the total amount to the following bank account.
			You may deposit the amount to any of the following:

			BANK TRANSFER
			Bank: BDO
			Account Name: THE PI PROJECT 
			Account no: 000000000000
			Type: Savings

			GCASH 
			Cellphone no: 0906 240 3450

			PayMaya
			Cellphone no: 0906 240 3450

			Smart Money
			Account no: 0000 0000 0000 0000

			PALAWAN, LBC, CEBUANA, Western Union
			Name: Waleed Occidental
			Address: Caloocan
			Cellphone no: 0906 240 3450

			Afterwards, text us the following: deposited amount, your name, order id and payment method
			0906 240 3450

			Your order history would be update upon shipment including the tracking information
			Your order will not ship until we receive payment.
		</pre>

EOD;
		$pdf->writeHTML($payment, true, false, false, false, '');
		$file = $pdf->Output($fileName, 'S');

		

		
		require 'application\libraries\PHPMailerAutoload.php';

		$mail = new PHPMailer;

			//$mail->SMTPDebug = 3;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
		$mail->Username = 'thepiprojectph@gmail.com';                 // SMTP username
		$mail->Password = 'tpppassword';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to
		$mail->setFrom('thepiprojectph@gmail.com', 'The Pi Project');   // Add a recipient
		$mail->addAddress($email, $name);               // Name is optional
		$mail->addAddress('thepiprojectph@gmail.com', 'The Pi Project');
		$mail->addReplyTo('thepiprojectph@gmail.com', 'The Pi Project');
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');

			//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->addStringAttachment($file, $fileName, "base64", "application/pdf");
		$mail->Subject = 'Payment Instructions';
		$mail->Body    = '<b>Thank you for your recent order from our site The Pi Project. <br>Attached here is the summary of your order and payment Instructions.</b>';
		$mail->AltBody = 'Thank you for your your recent order from our site The Pi Project. Attached here is the summary of your order and payment Instructions.';
		if(!$mail->send()) {
			//echo 'Message could not be sent.';
			//echo 'Mailer Error: ' . $mail->ErrorInfo;
			$data['isSent'] = false;
		} else {
			$data['isSent'] = true;
			$cart = array();
			$this->session->set_userdata('cart', $cart);
			//echo 'Message has been sent';
		}
		
		$this->load->view('templates/header');
		$this->load->view('cart/success', $data);
		$this->load->view('templates/footer');
	}
}
?>