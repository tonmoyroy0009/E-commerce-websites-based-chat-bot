<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Color extends CI_Controller {
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
	 * 		http://mywebsite/Color
	 * This method loads list_color.php file from views folder
	 * Shows all colors of products
	 */
	public function index(){
		$data['color_list'] = $this->Color_model->get_list();
		$this->load->view('list_color',$data);
	}   
	
	/**
	* Should not access this method directly
	* Receives request for add color
	* Invokes add_color() of Color_model from models folder
	* 
	*/
	public function add_color(){
		$this->form_validation->set_rules('color_name', 'Color Name', 'required');
		$this->form_validation->set_rules('color_code', 'Color Code', 'required');
		if ($this->form_validation->run() == FALSE){
			$this->load->view('add_color');
		}
		else{
			$color_name = $this->input->post('color_name');
			$user_id = $this->session->userid;
			$data = array(
					'color_name' => $color_name,
					'colorcode' => $this->input->post('color_code'),
					'created_by' => $user_id,
					'created_date' => date("Y-m-d H:i:s")
			);
			$insert = $this->Color_model->add_color($data);
			$this->session->set_flashdata('SUCCESSMSG','Color Created Successfully');
			redirect('color/add_color');
		}
		
	}
        
    /**
	 * Maps to the following URL
	 * 		http://mywebsite/Color/delete_color/$id
	 * The 3rd segment of the above url which is the arugemnt ($id)
	 * for the below method.
	 * Invokes delete_color() of Color_model from models folder
	 */
	public function delete_color($id){
		$this->Color_model->delete_color($id);
		$this->session->set_flashdata('SUCCESSMSG','Color Deleted Successfully!!');
		redirect('color');
	}
       
}
