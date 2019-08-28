<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {
    
	public function __construct() {
		/*
		|A constructor is a function that is executed after the object has been 
		|initialized (its memory allocated, instance properties copied etc.). 
		|Its purpose is to put the object in a valid state.
		*/
		parent::__construct();
		$this->tablename = $this->session->userdata('table_id').'products';
		$this->tablecategory = $this->session->userdata('table_id').'category';
	}
	
	public function product_insert($colorproduct,$sizeproduct){
	/*
	|This method is for inserting a product for customer with every details
	|it will interact with database 'products' table
	|especially it will save every details of a produce in database
	*/
		$this->db->set('product_name',$this->input->post('product_name'));
		$this->db->set('product_description',$this->input->post('product_description'));  
		$this->db->set('product_price',$this->input->post('rate'));
		$this->db->set('category_id', $this->input->post('product_category'));
		$this->db->set('color_id', $colorproduct);
		$this->db->set('size_id', $sizeproduct);
		$this->db->set('created_date', date("Y-m-d H:i:s"));
		$this->db->set('created_by', $this->session->userid);
		$query = $this->db->insert('products');
		$response=$this->db->insert_id();
		return $response;
	}
        
        
	public function update_image($insert_id, $mainimagefilename) {
	/*
	|This method is for updating image or product in database
	*/
		$this->db->set('product_image', $mainimagefilename);
		$this->db->where('id',$insert_id);
		$query = $this->db->update('products');
	}
	public function get_list() {
	/*
	|This method is for getting all the list of product created in dababase 
	|
	*/
		$this->db->select(" * ");
		$this->db->from($this->tablename);
		$query = $this->db->get();
		return $query->result();
	}
        
        
    
    public function delete_product($id) {
	/*
	|This method is for deleting a prduct/products from database 'products' table
	|it will serch for product to match to its parameters value
	|if match any rows id with given id it delete this row/rows
	*/
         $this->db->where('id',$id);
         $this->db->delete('products');
    }
    
    
    public function single_product_detail($product_id) {
	/*
	|This method give information of a single product
	|It will serach by product id and return every details of that particular product
	*/
        $this->db->select(" * ");
        $this->db->from('products');
        $this->db->where('id',$product_id);
        $query = $this->db->get();
        return $query->result();
    }   
	
	public function get_product_list($product_description,$category_id){
	/*
	|This method give list of product created so far in database 'product' table
	|and return the result to where this method is called
	*/
		$this->db->select(" * ");
        $this->db->from('products');
        $query = $this->db->get();
        return $query->result();
		
	}
    
    
    
    
    
}