<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Size extends CI_Controller {
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
	 * 		http://mywebsite/Size
	 * This method loads list_size.php file from views folder
	 * Shows all sizes of products
	 */
	public function index(){
		
		$data['size_list'] = $this->Size_model->get_list();
		$this->load->view('list_size',$data);
	}   
	
	/**
	* Should not access this method directly
	* Receives request for add size
	* Invokes add_size() of Size_model from models folder
	* 
	*/
	public function add_size(){
		$this->form_validation->set_rules('size_name', 'Size Name', 'required');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('add_size');
		}
		else{
			$size_name = $this->input->post('size_name');
			$user_id = $this->session->userid;
			$data = array(
					'size' => $size_name,
					'created_by' => $user_id,
					'created_date' => date("Y-m-d H:i:s")
			);
			$insert = $this->Size_model->add_size($data);
			$this->session->set_flashdata('SUCCESSMSG','Size Created Successfully');
			redirect('size');
		}
		
	}
    /**
	 * Maps to the following URL
	 * 		http://mywebsite/Size/delete_size/$id
	 * The 3rd segment of the above url which is the arugemnt ($id)
	 * for the below method.
	 * Invokes delete_size() of Size_model from models folder
	 */   
	public function delete_size($id){
		$this->Size_model->delete_size($id);
		$this->session->set_flashdata('SUCCESSMSG','Size Deleted Successfully!!');
		redirect('size');
	}
       
}
