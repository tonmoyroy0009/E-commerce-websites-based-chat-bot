<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	
	/**
	* Constructor for this controller
	* It checks login session for users
	* If session exist then prevent user from doing registration
	*/
	public function __construct(){
		parent::__construct();
		
		if(!empty($this->session->userdata('userid'))){
				redirect(base_url());
		}
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://mywebsite/Register
	 * This method loads register.php file from views folder
	 * Shows Registration from to the user 
	 */
	public function index(){
		
	   if(!empty($_POST)){
			$this->form_validation->set_rules('fullname', 'FullName', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[customers.email]');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
			$this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
		   
			if ($this->form_validation->run() == FALSE){
				$data['category_list'] = $this->Category_model->get_list();
				$this->load->view('register',$data);
			}
			else{
				$insert_id = $this->Login_model->add();
				$this->session->set_flashdata('error','User Registered Successfully');
				redirect('login');
			}
		}
		else{
			$data['category_list'] = $this->Category_model->get_list();
			$this->load->view('register',$data);
		}
	}
}
