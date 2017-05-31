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
	}
?>