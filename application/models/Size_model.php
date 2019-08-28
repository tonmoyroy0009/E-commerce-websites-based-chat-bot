<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Size_Model extends CI_Model {
	/*
	|this model is for adding, getting or deleting size of newmarkets products
	|it will interact with database 'size' table
	*/
    
	public function get_list(){
	/*
	|This method will select all the list previously created in size table
	|It will then return query result as an array to where this method is invoked
	*/	
		$this->db->select(" * ");
		$this->db->from('size');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function add_size($data){
	/*
	|This method is for adding new size in database 'size' table
	|this method get size as an parameter and add it to databse 'size' table
	*/
		 $this->db->insert('size', $data); 
		 return TRUE;
	}
	
	public function delete_size($id) {
	/*
	|This method is for deleting an existing size
	|It match given size as a parameter to this method to existing size in 'size' table
	|if it can get row or rows matching size it will delete this row/rows 
	*/
		$this->db->where('id',$id);
		$this->db->delete('size');
	}
        
}