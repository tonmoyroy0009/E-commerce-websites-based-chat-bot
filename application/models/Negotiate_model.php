<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Negotiate_model extends CI_Model {
	/* 
	|This negotiate model is for tracking user for product negotiation.
	
	*/
    
	public function get_uid($data){
	/* 
	|This method will return existing uid from 'negotiate' table
	
	*/
		$this->db->select("*");
		$this->db->from('negotiate');
		$this->db->where('uid',$data);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function set_uid($data){
	/* 
	|This method will add new uid to 'negotiate' table
	|if insertion successfull it will return true
	*/
		$this->db->set('uid', $data);
		$query = $this->db->insert('negotiate');
		$response=$this->db->insert_id();
		return $response;
	}
	
	public function update_pid($uid, $data){
		
		$this->db->set('pid', $data);
		$this->db->where('uid',$uid);
		$query = $this->db->update('negotiate');
		
	}
	public function update_price($uid, $data){
		
		$this->db->set('price', $data);
		$this->db->where('uid',$uid);
		$query = $this->db->update('negotiate');
		
	}
	
	
        
}