<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
	/**
	* Constructor for this controller
	* It checks login session for users
	* Otherwise redirect users to login page.
	*/
	public function __construct(){
	    parent::__construct();
            
		if ($this->session->userdata('userid')== ""){
			redirect('login');
		}
	}
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://mywebsite/Checkout
	 * This method loads checkout.php file from views folder
	 * Shows shipping form
	 */
	 
	public function index(){
		
		if($this->input->post('cdetail')){
			if(!empty($_POST)){
				
				$this->form_validation->set_rules('add', 'Address', 'required');
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
				$this->form_validation->set_rules('fname', 'FullName', 'required');
				$this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
				
				if ($this->form_validation->run() == FALSE){
					$data['category_list'] = $this->Category_model->get_list();
		
					$this->load->view('checkout',$data);
				}
				else{
					$uid=$this->session->userdata('userid');
					$add = $this->input->post('add');
					$fname = $this->input->post('fname');
					$phone = $this->input->post('phone');
					$email = $this->input->post('email');
							 
					$insert_id = $this->Checkout_model->add_checkout($add,$fname,$phone,$email,$uid);
					$in=$this->db->insert_id();
					$checkout_id=$this->session->userdata('checkout_id');
					$this->session->set_userdata('checkout_id',$in);
					redirect('checkout/payment');
				}
				
				
						
			}
		}
		else{
			$data['category_list'] = $this->Category_model->get_list();
		
			$this->load->view('checkout',$data);
		}
	}
	
	/**
	* Next step of shipping form
	* Shows payment option
	* Loads payment.php from views
	*/
   
        
	public function payment(){
		$data['category_list'] = $this->Category_model->get_list();
		
		$this->load->view('payment',$data);
		if($this->input->post('paymentdetail')){
			if(!empty($_POST)){
				$uid=$this->session->userdata('userid');
				$payment = $this->input->post('payment');
				$checkout_id=$this->session->userdata('checkout_id');
				$this->Checkout_model->add_payment($payment,$checkout_id,$uid);
				redirect('checkout/confirm');
			}
		}
			     
	}
	
	/**
	* Next option of payment option
	* Shows all the products and details for cofirmation
	* Sends all requests to the Checkout_model
	* Loads confirm_order.php from views
	*/
	public function confirm(){
		if($this->input->post('confirm')){
			$uid=$this->session->userdata('userid');
			$total=0;
			$qu=0;
			
			if(!empty($this->cart->contents())){
				$total = 0;
				$insert_id=$this->db->insert_id();
				$checkout_id=$this->session->userdata('checkout_id');
				$this->Checkout_model->add_checkout_cart($insert_id,$checkout_id,$uid);
				foreach ($this->cart->contents() as $items){
					$ip = $_SERVER['REMOTE_ADDR'];
					$total = $total + (($items['qty']) * ($items['price']));
					$qu = $qu + $items['qty'];
					$this->Checkout_model->add_sale_detail($insert_id,$items['id'],$items['price'],$items['qty'],$ip,$items['color'],$items['size']);
				}
			}
			
			$byname=$this->session->userdata('full_name');

			$this->Checkout_model->add_sale($byname,$total,$qu);
			$insert=$this->db->insert_id();
			$this->Checkout_model->add_checkout_cart($insert,$checkout_id,$uid);
			
			$this->cart->destroy();
			
			$this->session->set_flashdata('SUCCESSMSG','Your Order Successfully Placed!!');
			redirect('cart');
		}
		$data['category_list'] = $this->Category_model->get_list();
            
		$this->load->view('confirm_order',$data);		
   }
	
	
}
