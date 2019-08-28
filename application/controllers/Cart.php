<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://mywebsite/Cart
	 * This method loads cart.php file from views folder
	 * Shows all carts
	*/
	public function index(){
		$data['category_list'] = $this->Category_model->get_list();
		$this->load->view('cart',$data);
	}
	/**
	* Should not access this method directly
	* Receives request for add items to the Cart
	* Cart is a built in library of Codeigniter
	*/
	public function add(){
		$image =  $this->input->post('image');
		$insert_data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'image' => $this->input->post('image'),
			'color' => $this->input->post('color'),
			'size' => $this->input->post('size'),
			'qty' => $this->input->post('qty')
		);		
		$this->cart->insert($insert_data); //invokes insert() method of Cart class.
		redirect('cart'); //redirect to the same controller but in index method
	}
	
	/**
	* Should not access this method directly
	* Receives request for delete items from the Cart
	* Cart is a built in library of Codeigniter
	*/
	
	public function remove($rowid) {
		   
		if ($rowid==="all"){
			$this->cart->destroy(); //invokes destroy() method of Cart class.
		}
		else{
			$data = array(
				'rowid'   => $rowid,
				'qty'     => 0
			);
			$this->cart->update($data); //invokes update() method of Cart class.
		}
		redirect('cart'); //redirect to the same controller but in index method
	}
	
        
       
	
}
