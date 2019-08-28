<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

   /**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://mywebsite/Login
	 * This method loads login.php file from views folder
	 * Shows Login from to the user 
	 * Different from admin login
	 */
	public function index(){
		if(!empty($this->session->userdata('userid'))){
			redirect(base_url());
		}
		$data['category_list'] = $this->Category_model->get_list();
	   
		$this->load->view('login',$data);
	}
	/**
	* Receives requests from login page and varify login credentials
	* Should not access this method directly
	*/
	public function verify(){
		$email = $this->input->post('email');
		$password= $this->input->post('password');
		$data['res'] = $this->Login_model->verify($email,$password);
		if(!empty($data['res'])){
			$this->session->set_userdata('userid',$data['res']['customer_id']);
			$this->session->set_userdata('full_name',$data['res']['full_name']);
			
			$this->session->set_userdata('email',$data['res']['email']);
			redirect(base_url());
		}
		else{
			$this->session->set_flashdata('error','Invalid EmailID OR Password. Please Try Again.');
			redirect('login');
		}
	}
        
    /**
	* Maps to the following URL
	* http://mywebsite/Login/logout
	* helps to destroy login, cart, checkout sessions
	*/
	public function logout(){
		$this->session->set_userdata(array(
			'userid'		=> '',
			'full_name'      => '',
			'email'      => '',
			'product_id'      => '',
			'product_price'      => '',
			'cart_total'      => '',
			'checkout_id'      => ''
		));
            
		$this->session->unset_userdata('userid');
		$this->session->unset_userdata('full_name');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('product_id');
		$this->session->unset_userdata('product_price');
		$this->session->unset_userdata('cart_total');
		$this->session->unset_userdata('checkout_id');
		$this->session->sess_destroy();
		redirect('login');
	}
}
