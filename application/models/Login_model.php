<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {
	/*
	|Login model is for checkhing customer/admin varification to give him/her access
	|This login model is also used for our registration of customer
	|so it will also enter user registration information in database table
	|This model will match user given email password to database email password for validation
	*/
    
	public function login($email,$password){
	/*
	|this method is for admin login varification
	|this method is given two parameter from which it will get admin email and password
	|then it query for matching this email password with admin table's email password
	|the query result send as an array to whrere this method is invoked
	*/
		$this -> db -> select(' * ');
		$this -> db -> from('admin');
		$this -> db -> where('email', $email);
		$this -> db -> where('password', $password);
		$this -> db -> limit(1);
		$query = $this -> db -> get();
		return $query;
	}
      
	public function verify($email, $password){
	/*
	|This method for verification of customer of newmarket.com
	|this method get two parameter from which it invoked
	|it match given email password with our 'customer' table email password
	|if it does not get any single row mathcing so this email password is incorrect for login
	|it then return a false
	|if it get any row matching with given email password it returns query result
	|as an array to where this method is invoked 
	*/
		$query=$this->db->query("SELECT * FROM customers WHERE email = '$email' AND password = '$password' limit 1 ");
		$result = $query->row_array();
		if ($query->num_rows() > 0){
			return($result);
		}
		else{
			return false;
		}
	}
        
	public function add(){
	/*
	|This method is for reister an user information
	|It will get information of customer from post method of html form
	|then it will save information of user email password...... etc to customer table 
	*/
		$this->db->set('created_date',date('Y-m-d H:i:s'));
		$this->db->set('email', $this->input->post('email'));
		$this->db->set('full_name', $this->input->post('fullname'));
		$this->db->set('phone', $this->input->post('phone'));
		$this->db->set('password', $this->input->post('password'));
		if($this->db->insert('customers')){
			$response=$this->db->insert_id();
		}
		
	}
  
       
}