<?php
class Checkout_model extends CI_Model{

	public function add_checkout($add,$fname,$phone,$email,$uid){
	/*
	|This method is for adding details of customers ordered products in database
	|it will save shiping address, owner name email, etc
	|in database 'Checkout' table
	*/
		
		$this->db->set('address',$add);
		$this->db->set('full_name',$fname);
		$this->db->set('phone',$phone);
		$this->db->set('email',$email);
		$this->db->set('customer_id',$uid);
		$this->db->set('order_date',date('Y-m-d H:i:s'));
		$this->db->insert('checkout');              
	
	}
	public function add_payment($payment,$in,$uid){
	/*
	|This method is for adding payment method for a particular customer
	|and inserting in database 'checkout' table
	*/
		
		$this->db->set('payment_option',$payment);
		$this->db->where('checkout_id',$in);
		$this->db->where('customer_id',$uid);
		$this->db->update('checkout');              
	
	}
	public function add_checkout_cart($cid,$in,$uid){
	/*
	|This method is for adding updating cart of user 
	*/
		$this->db->set('sale_id',$cid);
		$this->db->where('checkout_id',$in);
		$this->db->where('customer_id',$uid);
		$this->db->update('checkout');              
	
	}
	
	
	public function add_sale($byname,$total1,$qu){
	/*
	|This metod is for adding every selling details in database sales table
	*/
		
		$this->db->set('buyer_name',$byname);
		$this->db->set('grand_amount',$total1);
		$this->db->set('issue_date',date('Y-m-d'));
		$this->db->set('total_quantity',$qu);
		$this->db->insert('sales');              
	
	}
	public function add_sale_detail($sale_id, $product_id, $product_price,$quantity, $ip, $color_id, $size_id){
	/*
	|This method is for updating data related to saling for a particular period
	|it will set product price after deducting price for sale in products
	|and save information in database 'sales_detail' table
	*/
		$this->db->set('sale_id',$sale_id);
		$this->db->set('quantity',$quantity);
		$this->db->set('color_id',$color_id);
		$this->db->set('size_id',$size_id);
		$this->db->set('product_price',$product_price);
		$this->db->set('product_id',$product_id);
		$this->db->set('ip',$ip);
		$this->db->insert('sales_detail');   
	}
	
		
		
}