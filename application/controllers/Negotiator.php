<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Negotiator extends CI_Controller {
    
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://mywebsite/Negotiator
	 * Should not access this method directly
	 * This is webhook for snatchbot.me
	 */
	
	public function index(){
		
		
		
		$bot_id = $_POST['bot_id'];
		$user_id = $_POST['user_id']; 
		$module_id = $_POST['module_id'];
		$channel = $_POST['channel']; 
		$message = $_POST['incoming_message'];
		
		// $this->db->set('uid', $user_id);
		// $query = $this->db->insert('negotiate');
		
		if($this->Negotiate_model->get_uid($user_id)==null){
			$this->Negotiate_model->set_uid($user_id);
		}
		
		// $uid = $this->Negotiate_model->get_uid('user.1500c816165c936e.pVvgxmL3');
		
		// if($uid[0]->pid==null){
		    // echo 'null';   
		// }
		// else{
		    // echo 'not null';
		// }
		
		
		if($message=='clothes'){
			$this->send_with_cards($user_id, $bot_id, $module_id, $message);
		}
		else if($message=='দামাদামি'){
			$this->send_without_cards($user_id, $bot_id, $module_id, 'প্রোডাক্টের আইডি কি?');
		}
		else if($message=='confirm' || $message=='ok'){
			$uid = $this->Negotiate_model->get_uid($user_id);
				
			$this->go($user_id, $bot_id, $module_id, $uid[0]->uid);
			
		}
		else if($message=='দামাদামি'){
			$this->send_without_cards($user_id, $bot_id, $module_id, 'প্রোডাক্টের আইডি কি?');
		}
		else if($message=='another product'){
			$this->Negotiate_model->update_price($user_id, 0);
			$this->Negotiate_model->update_pid($user_id, null);
			$this->send_without_cards($user_id, $bot_id, $module_id, 'প্রোডাক্টের আইডি কি?');
		}
		else if(is_numeric($message)){
			$uid = $this->Negotiate_model->get_uid($user_id);
			if($uid[0]->pid==null){
				$price = $this->get_product_by_id($message);
				if($price!=null){
					$this->Negotiate_model->update_pid($user_id, $message);
					$this->send_without_cards($user_id, $bot_id, $module_id, $price->product_price.' টাকা মাত্র!');
				}
				else{
					$this->send_without_cards($user_id, $bot_id, $module_id, 'খুইজা পাই নাই, কি আইডি দিসেন!');
				}
			}
			else{
				
				$price = $this->get_product_by_id($uid[0]->pid);
				//$this->send_without_cards($user_id, $bot_id, $module_id, 'you: '.$message.' or: '.$price->original_price.' dis: '.$price->product_price.'');
				
				if($message <= $price->original_price){
					$msg_array = array('ধূর অনেক কম!','হইবো না','কিনছেন কোনোদিন?','না মামা এই দামে হইবো না','ভাবিয়ে তোলে');
					$msg = mt_rand(0,5);
					$this->send_without_cards($user_id, $bot_id, $module_id, $msg_array[$msg]);
				}
				else if($message >= $price->product_price){
					$this->Negotiate_model->update_price($user_id, $message);
					$this->confirm($user_id, $bot_id, $module_id, $message.' টাকা! এখনি নিয়া যান, দেরি কইরেন না।');
				}
				else{
					$avg = ($price->product_price + $message)/2;
					if($avg > $uid[0]->price){
						$this->Negotiate_model->update_price($user_id, $message);
					}
					if($message < $uid[0]->price){
						$this->ok($user_id, $bot_id, $module_id, $uid[0]->price.' টাকায় নিবেন?');
					}
					else{
						$this->confirm($user_id, $bot_id, $module_id, $message.' টাকা ফাইনাল। যান নিয়া যান।');
					}
					
				}
				
				
			}
			
			
		}
		else{
			$this->send_without_cards($user_id, $bot_id, $module_id, 'অতিরিক্ত কথা বুঝি না। কাজের কথা কন। কাপড় লাগবো? লাগলে লেখেন clothes');
		}
		
		// $price = $this->get_product_by_id('5');
		// echo $price;
	}
	
	public function get_product_by_id($message){
		$data = $this->Product_model->single_product_detail($message);
		//print_r($data)
		if($data!=null){
			return $data[0];
		}
		else{
			return null;
		}
		
		
	}
	
	public function negotiate($user_id, $bot_id, $module_id, $message){
		header('Content-Type: application/json');
		
		$response = [
					'user_id' => $user_id,
					'bot_id' => $bot_id, 
					'module_id' => $module_id,
					'message' => 'অতিরিক্ত কথা বুঝি না। কাজের কথা কন। কাপড় লাগবো? লাগলে লেখেন clothes', 
					'blocked_input' => false
				];
		
		echo json_encode($response);
	}
	
	public function go($user_id, $bot_id, $module_id, $message){
		header('Content-Type: application/json');
		$cards = [
                    
                    [   
                        'type' => 'gallery', 
                        'value' => 'gallery', 
                        'gallery' => [
                            [
                                
                                'buttons' => [
                                    [
                                        'type' => 'url',
                                        'value' => 'http://nema.ml/cart/add_after_negotiate/'.$message,
                                        'name' => 'Cart'
                                    ]
                                ]

                            ]
                        ]
                    ]
                ];
		$response = [
					'user_id' => $user_id,
					'bot_id' => $bot_id, 
					'module_id' => $module_id,
					'message' => 'Cart এ যান', 
					'cards' => $cards, 
					'blocked_input' => false
				];
		
		echo json_encode($response);
	}
	
	public function confirm($user_id, $bot_id, $module_id, $message){
		header('Content-Type: application/json');
		$suggestedReplies = ['confirm'];
		$response = [
					'user_id' => $user_id,
					'bot_id' => $bot_id, 
					'module_id' => $module_id,
					'message' => $message, 
					'suggested_replies' => $suggestedReplies,
					'blocked_input' => false
				];
		
		echo json_encode($response);
	}
	
	public function ok($user_id, $bot_id, $module_id, $message){
		header('Content-Type: application/json');
		$suggestedReplies = ['ok'];
		$response = [
					'user_id' => $user_id,
					'bot_id' => $bot_id, 
					'module_id' => $module_id,
					'message' => $message, 
					'suggested_replies' => $suggestedReplies,
					'blocked_input' => false
				];
		
		echo json_encode($response);
	}
	
	public function send_without_cards($user_id, $bot_id, $module_id, $message){
		header('Content-Type: application/json');
		
		$response = [
					'user_id' => $user_id,
					'bot_id' => $bot_id, 
					'module_id' => $module_id,
					'message' => $message, 
					'blocked_input' => false
				];
		
		echo json_encode($response);
	}
	
	public function send_with_cards($user_id, $bot_id, $module_id, $message){
		header('Content-Type: application/json');
		$data = $this->Home_model->popular_product();
		$sts = array();
		foreach ($data as $d){

			$id = $d->id;
			$name = $d->product_name;
			$description = $d->product_description;
			$price = $d->product_price;
			$image = $d->product_image;
			array_push($sts , [
						'image' => base_url('upload/product/'.$id.'/'.$image),
						'heading' => $name,
						'subtitle' => 'BDT. '.$price,
                        'buttons' => [
                            [
                                'type' => 'url',
                                'value' => '#',
                                'name' => 'প্রোডাক্ট আইডি: '.$id
                            ]
                        ]
					]);
			
		}
		
		$cards = [
			
			[   
				'type' => 'gallery', 
				'value' => 'gallery', 
				'gallery' => $sts
	
				
			]
		];
		$suggestedReplies = ['দামাদামি'];
		$response = [
					'user_id' => $user_id,
					'bot_id' => $bot_id, 
					'module_id' => $module_id,
					'message' => 'এগুলো আছে দেখেন', 
					'cards' => $cards, 
					'suggested_replies' => $suggestedReplies,
					'blocked_input' => false
				];
		
		echo json_encode($response);
	}
	
}
