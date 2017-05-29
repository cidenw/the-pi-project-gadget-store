<?php
	class Products extends CI_Controller{
		public function index(){
			$data = array();
			$data['title'] = 'Products';

			
			if(isset($_GET['orderby'])){
				$data['orderby'] = $_GET['orderby'];
			}else{
				$data['orderby'] = "";
			}
			if(isset($_GET['search'])){
				$data['search'] = $_GET['search'];
				$data['products'] = $this->product_model->get_products(NULL, $data['orderby'], $data['search']);
			}else{
				$data['products'] = $this->product_model->get_products(NULL, $data['orderby']);
			}
			

			
			$this->load->view('templates/header');
			$this->load->view('products/index', $data);
			$this->load->view('templates/footer');

		}

		public function view($productID = NULL){
			$data['product'] = $this->product_model->get_products($productID);
			//$data['product'] = $this->product_model->get_products($slug);
			//print_r($this->product_model->get_products(5));
			//print_r($data['product']);
			if(empty($data['product'])){
				show_404();
			}

			$data['title'] = $data['product']['productName'];

			$this->load->view('templates/header');
			$this->load->view('products/view',$data);
			$this->load->view('templates/footer');

		}


	}