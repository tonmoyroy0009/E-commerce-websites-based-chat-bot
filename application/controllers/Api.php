<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	
	public function index($s){
			echo $s;
	}
	public function get_products(){
		$array = $this->Product_model->get_list();
		header('Content-Type:Application/json');
	
		echo json_encode($array);
	}
	public function get_single_product($id){
		$array = $this->Product_model->single_product_detail($id);
		header('Content-Type:Application/json');
	
		echo json_encode($array);
	}
}
