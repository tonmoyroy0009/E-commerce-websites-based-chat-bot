<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
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
	 * 		http://mywebsite/Category
	 * This method loads list_category.php file from views folder
	 * Shows all categories of products
	 */
	 
	public function index(){
		
		$data['category_list'] = $this->Category_model->get_list();
		$this->load->view('list_category',$data);
	}   
	
	/**
	* Should not access this method directly
	* Receives request for add category
	* Invokes category_add() of Category_model from models folder
	* 
	*/
	
	public function category_add(){
		$this->form_validation->set_rules('category_name', 'Category Name', 'required|is_unique[category.category_name]');
		if ($this->form_validation->run() == FALSE){
			$this->load->view('add_category');
		}
		else{
			$category_name = $this->input->post('category_name');
			$user_id = $this->session->userid;
			$data = array(
					'category_name' => $category_name,
					'created_by' => $user_id,
					'created_date' => date("Y-m-d H:i:s")
			);
			$insert = $this->Category_model->category_add($data);
			$this->session->set_flashdata('SUCCESSMSG','Category Created Successfully');
			redirect('category/category_add');
			
		}
		
	}
    
	/**
	 * Maps to the following URL
	 * 		http://mywebsite/Category/delete_category/$id
	 * The 3rd segment of the above url which is the arugemnt ($id)
	 * for the below method.
	 * Invokes delete_category() of Category_model from models folder
	 */
	public function delete_category($id){
		$this->Category_model->delete_category($id);
		$this->session->set_flashdata('SUCCESSMSG','Category Deleted Successfully!!');
		redirect('category');
	}
        
 
        
}
