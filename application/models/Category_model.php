<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model {
	/* 
	|Normally in model we will connect database to our site.
	|This catagory model is for adding, deleting catagory for NewMarkets product.
	|We also will be able to get elements form existing catagory for adding 
	|characteristics new product.
	*/
    
	public function get_list(){
	/* 
	|This get_list method will return all catagory we created.
	|This will return us catagory_name, date of creation, created_by whom etc.
	|I use codeigniter built in method db->get for getting desired result.
	|with return we send this query result to controller 'Catagory.php' form where this 
	| models get_list method is invoked.
	*/
		$this->db->select(" * ");
		$this->db->from('category');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_list_size(){
	/* 
	|This method will return all the size added on 'size' 
	|table to where this method is invoked
	*/
		$this->db->select(" * ");
		$this->db->from('size');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_list_color(){
	/* 
	|This method will return all the color added on 'color' 
	|table to where this method is invoked
	*/
		$this->db->select(" * ");
		$this->db->from('color');
		$query = $this->db->get();
		return $query->result();
	}
	
 
	public function category_add($data){
	/* 
	|This method will add new catagory to 'catagory' table
	|if insertion successfull it will return true
	*/
		$this->db->insert('category', $data); 
		return TRUE;
	}
	
	public function delete_category($id){
	/* 
	|This method will delete catagory to 'catagory' table
	|a variable named 'id' passed to this method from where this 
	|method is invokded. it will match this id with existing id in catagory table
	|if it get some row by matching id it will simply delete this row.
	*/
		$this->db->where('id',$id);
		$this->db->delete('category');
	}
        
}