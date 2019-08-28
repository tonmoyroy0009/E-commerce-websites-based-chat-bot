<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_home extends CI_Controller {
	/**
	* Constructor for this controller
	* It checks login session for admin
	* Otherwise redirect admin to login page.
	*/
	public function __construct(){
		parent::__construct();
		if($this->session->email == ""){
			redirect('admin_login');
		}
	}
    
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://mywebsite/Admin_home
	 * This method loads admin_home.php file from views folder
	 * Which contains the UI part of this page.
	 */
	
	public function index(){
            
		$this->load->view('admin_home');
	}
}
