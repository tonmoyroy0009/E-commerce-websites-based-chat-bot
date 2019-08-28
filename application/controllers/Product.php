<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	
	/**
	* Constructor for this controller
	* It checks login session for admin
	* Otherwise redirect users to login page.
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
	 * 		http://mywebsite/Product
	 * This method loads list_product.php file from views folder
	 * Shows all products
	 */
	public function index(){
		
		$product_description = $this->input->get('product_description');
		$category_id = $this->input->get('product_category');
		$output['product_list'] = $this->Product_model->get_product_list($product_description,$category_id);
		$output['size_list'] = $this->Category_model->get_list_size();
		$output['color_list'] = $this->Category_model->get_list_color();
		$output['category_list'] = $this->Category_model->get_list();
		$this->load->view('list_product',$output);
	}   
	
	/**
	* Should not access this method directly
	* Receives request for add product
	* Invokes product_insert() of Product_model from models folder
	* Invokes update_image() of Product_model from models folder
	*/
	public function add_product(){

		if(!empty($_POST)){
			
			$this->form_validation->set_rules('product_name', 'Product Name', 'required');
			$this->form_validation->set_rules('product_description', 'Product Description', 'required');
			$this->form_validation->set_rules('product_category', 'Product Category', 'required');
			
			$this->form_validation->set_rules('rate', 'Product Price', 'required');
			if($_FILES['product_image']['name']==''){
				$this->form_validation->set_rules('product_image','Image','required');
			}


			if ($this->form_validation->run() == FALSE){
				$data['size_list'] = $this->Category_model->get_list_size();
				$data['color_list'] = $this->Category_model->get_list_color();
				$data['product_list'] = $this->Product_model->get_list();
				$data['category_list'] = $this->Category_model->get_list();
				$this->load->view('add_product',$data);
			}
			else{

				
				if(!empty($this->input->post('colorproduct'))){
					$colorproduct = implode(",", $this->input->post('colorproduct'));
				}
				else{
					$colorproduct = '';
				}    
				if(!empty($this->input->post('sizeproduct'))){
					$sizeproduct = implode(",", $this->input->post('sizeproduct'));
				}
				else{
					$sizeproduct = '';
				}    
				$insert_id = $this->Product_model->product_insert($colorproduct,$sizeproduct);
				
				@mkdir('./upload/product/'.$insert_id);
				$config['upload_path'] = './upload/product/'.$insert_id.'/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$this->load->library('upload', $config);
				$config['file_name'] = strtolower($_FILES['product_image']['name']);
				$this->upload->initialize($config);
				$this->upload->do_upload('product_image');
				$upload_data = $this->upload->data();
				$main_image_file_name = $upload_data['file_name'];
				$this->Product_model->update_image($insert_id, $main_image_file_name);
				$this->session->set_flashdata('SUCCESSMSG','Product Added Successfully');
				redirect('product');
			}
		}
		else{
			$data['size_list'] = $this->Category_model->get_list_size();
			$data['color_list'] = $this->Category_model->get_list_color();
			$data['product_list'] = $this->Product_model->get_list();
			$data['category_list'] = $this->Category_model->get_list();
			$this->load->view('add_product',$data);
		}
	}
	
	/**
	 * Maps to the following URL
	 * 		http://mywebsite/Product/delete_product/$id
	 * The 3rd segment of the above url which is the arugemnt ($id)
	 * for the below method.
	 * Invokes delete_product() of Product_model from models folder
	 */
	public function delete_product($id) 
        {
            $this->Product_model->delete_product($id);
            $this->session->set_flashdata('SUCCESSMSG','Product Deleted Successfully!!');
            redirect('product');
        }
       
}
