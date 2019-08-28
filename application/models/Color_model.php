<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Color_Model extends CI_Model {
	/* 
	|This color model is for adding, deleting color for NewMarkets product.
	|We also will be able to get all color list form existing color we added
	*/
    
	public function get_list(){
	/*
	|This get_list method is for getting all the color previosuly added on color table
	|it will return query result as an array to controller 'Color.php' 
	|from where this method is called
	*/
		$this->db->select("*");
		$this->db->from('color');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function add_color($data){
	/* 
	|This method will add new color to 'color' table
	|if insertion successfull it will return true
	*/
		$this->db->insert('color', $data); 
		return TRUE;
	}
	
	public function delete_color($id) {
	/* 
	|This method will delete row in 'color' table
	|a variable named 'id' passed to this method from where this method is invokded. 
	|it will match this id with existing id in color table
	|if it get some row by matching id it will simply delete this row.
	*/
		$this->db->where('id',$id);
		$this->db->delete('color');
	}
        
}