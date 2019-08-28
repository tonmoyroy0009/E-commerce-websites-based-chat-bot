<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {
    /*
	|This model is for adding popular product in newmarket.com's home page
	*/
        
	public function popular_product(){
		/*
		|This method is for selectig products from databases 'products' table
		|to show in newmarket's home page
		|it limists products so that home page lokking not overloaded
		|this method return qury result as an array to where is is invoked 
		*/
		$this->db->select("*");
		$this->db->from('products');
		$this->db->limit('5'); //Can be increased
		$query = $this->db->get();
		return $query->result();
	}
  
}