<?php
	class Account extends CI_Controller{
		public function signin(){
			
			$data['title'] = "Sign In";
			$this->load->library('session');
			if($this->session->userdata('is_LoggedIn')){
				header('Location:'.base_url().'products');
			}else{
				$this->load->view('templates/header');
				$this->load->view('accounts/signin', $data);
				$this->load->view('templates/footer');
			}
			
		}

		public function index(){
			$this->load->view('templates/header');
			$this->load->view('accounts/index');
			$this->load->view('templates/footer');;
		}
		public function signout(){
			$this->session->set_userdata('is_LoggedIn', false);
			$cart = array();
			$this->session->set_userdata('cart', $cart);
			$this->session->unset_userdata('profile');
			header('Location:'.base_url().'account/signin?msg='.'Sign in for better experience.');
		}
		public function verify_login(){
			$email = $_POST['email'];
			$password = $_POST['password'];
			$user = $this->account_model->verify_password($email,$password);
			if(isset($user['login'])){
				$this->load->library('session');
				$cart = array();
				$this->session->set_userdata('cart', $cart);
				if(isset($user['cart'])){
					$this->session->set_userdata('cart', $user['cart']);
				}
				
				$this->session->set_userdata('is_LoggedIn', true);
				$this->session->set_userdata('profile', $user['profile']);

				header('Location:'.base_url().'account/signin?msg=success');
			}else{
				header('Location:'.base_url().'account/signin?msg='.$user['error']);
			}

		}
		public function register(){
			$data['title'] = "Register";
			$this->load->view('templates/header');
			
			
			if(isset($_POST['email'])){
				$this->account_model->register($_POST);
			}else{
				$this->load->view('accounts/register', $data);
			}
			$this->load->view('templates/footer');
		}
	}