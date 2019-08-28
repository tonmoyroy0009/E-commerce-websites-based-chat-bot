<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://mywebsite/Home
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://mywebsite/
	 */
	public function index(){
		$data['category_list'] = $this->Category_model->get_list();
		$data['popular_product'] = $this->Home_model->popular_product();
		$this->load->view('home',$data);
	}
	
}
