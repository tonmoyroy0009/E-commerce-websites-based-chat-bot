<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_view extends CI_Controller {

        
	public function index(){
	 
	}
	
	/**
	* Shows detail for each product on homepage
	* Should not access this method directly
	* Returns data as json format
	* JQuery library recieves this json data
	* Invokes methods from Product_model and Category_model
	*/
	public function single_product_detail(){
		$detail = '';
		$base  = base_url();
		$product_id = $this->input->post('product_id');
		$output['single_product_detail'] = $this->Product_model->single_product_detail($product_id);
		$output['size_list'] = $this->Category_model->get_list_size();
		$output['color_list'] = $this->Category_model->get_list_color();
		foreach ($output['single_product_detail'] as $post){
			$color_encode = explode(",", $post->color_id);
			$size_encode = explode(",", $post->size_id);
			$detail.= "
				<div class='modal-dialog' role='document'>
					<div class='modal-content modal-info'>
						<div class='modal-header'>
							<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>				
						</div>
						<div class='modal-body modal-spa'>
							<div class='col-md-5 span-2'>
								<div class='item'>
									<img height=350px  width=100%  src='".$base."upload/product/".$post->id."/".$post->product_image."'>
								</div>
							</div>
							<div class='col-md-7 span-1'>
								<h3 style='text-transform: capitalize'>".$post->product_name."</h3>
								<div class='price_single'><br>
									<span class='reducedfrom '>Rs. ".$post->product_price."</span><br><br>
									<h4>Color</h4>
									<span class='reducedfrom '>";
									foreach ($output['color_list'] as $color) {
										foreach ($color_encode as $encode) {
											if($color->id==$encode){
												$detail.="<span class='data_values ' id="."c".$color->id." style=' height: 20px; width:20px; cursor: pointer;margin:8px; background-color:#".$color->colorcode.";'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";
											}

										}
									}
									$detail.="<br><br><h4>Size</h4>";
									foreach ($output['size_list'] as $size) {
										foreach ($size_encode as $encode) {
											if($size->id==$encode){
												$detail.="<span class='data_values_size ' id="."size".$size->id." style='margin:8px;cursor: pointer;' >".$size->size."</span>";
											}

										}
									}
					
									$detail.=  "</span>
									<div class='clearfix'></div>
								</div><br>
																		
								<div class='add-to'>
									<form action='".$base."cart/add' method='post' name='productformcart' id='addcartform'>
										<input type='hidden' name='color' id='colorProduct' value=''>
										<input type='hidden' name='size' id='sizeProduct' value=''>
										<input type='hidden' name='id'  value=".$post->id.">
										<input type='hidden' name='name'  value=".$post->product_name.">
										<input type='hidden' name='price' value=".$post->product_price.">
										<input type='hidden' name='image' value=".$post->product_image.">
										Qty<input min='1' type='number' id='quantity' name='qty' value='1' class='form-control input-small' style='width:60px;'>
										
										<button type='submit'  class='add-cart item_add' name='action'>ADD TO CART</button>
									</form>
								</div>
							</div>
							<div class='clearfix'> </div>
						</div>
					</div>
				</div>";
			
			
			$data['success'] = $detail;
		}
		echo json_encode($data);
	}
        
    
}
