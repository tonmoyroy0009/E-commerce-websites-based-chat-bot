<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://mywebsite/Admin_login
	 * This method loads admin_login.php, admin_home.php file from views folder
	 * Receives requests from login page and varify login credentials
	 */
	public function index(){
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('admin_login');
		}
		else{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$result = $this->Login_model->login($email,$password);
			if($result->num_rows() > 0){
				foreach($result->result() as $row){
					$this->session->userid = $row->id;
					$this->session->admin = $row->is_Admin;
					$this->session->email =  $row->email;
					redirect('admin_home');
				}
			}
			else{
				$this->session->set_flashdata('SUCCESSMSG','Email and Password is Wrong!!');
				redirect('admin_login');
			}
		}
	}
    
	/**
	* Maps to the following URL
	* http://mywebsite/Admin_login/logout
	* helps to destroy login session
	*/
	public function logout(){
		$this->session->sess_destroy();
		redirect('admin_login');
	}
      
}
