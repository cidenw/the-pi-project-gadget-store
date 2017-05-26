<?php
	class Products extends CI_Controller{
		public function index(){
			$data = array();
			$data['title'] = 'Products';

			$data['products'] = $this->product_model->get_products();
			$this->load->view('templates/header');

			$this->load->view('products/index', $data);
			$this->load->view('templates/footer');

		}

		public function view($slug = NULL){
			$data['product'] = $this->product_model->get_products($slug);
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