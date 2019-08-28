<?php
require_once 'header.php';
?>

<div class="content">
<div class="cart-items">
	<div class="container">
			<form class="checkout_form clearfix" action="<?php echo base_url()?>checkout/confirm" method="post">
                    <?php $i = 1; ?>
                <?php
                if(!empty($this->cart->contents()))
                {
					$total = 0;
					foreach ($this->cart->contents() as $item){
					echo form_hidden('rowid[]', $item['rowid']);
							$total = $total + (($item['qty']) * ($item['price']));
						?>
			 <div class="cart-header">
				 <h2 style="font-size: 1.2em; margin-bottom: 2em; font-weight: bolder; color: #ff2d00; font-family: sans-serif;">3. Confirm Order</h2>

				 <div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
                                                    <img  src="<?=base_url();?>upload/product/<?=$item['id']?>/<?=$item['image']?>" style="width: 100%; height: 300px; cursor: pointer;" alt="">
						</div>
					   <div class="cart-item-info">
                                               <h3><a style="text-transform: capitalize; cursor: pointer;"><?php echo $item['name']; ?></a></h3>
                                               <br>
						<ul class="qty">
							<li><p>Qty: <span><?php echo $item['qty'] ; ?></span></p></li>
							<li><p>FREE delivery</p></li>
								<li><p> <?php
									 $color =  $this->db->query("SELECT * FROM color where id = '".$item['color']."'");
								foreach ($color->result() as $value) {?>
									  <span style="color: #F5003C;">Color:&nbsp;&nbsp; <span style="height: 20px; width: 20px; background: #<?=$value->colorcode;?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span>
							   <?php }
									?></p></li>
						<li><p> <?php
									 $color =  $this->db->query("SELECT * FROM size where id = '".$item['size']."'");
								foreach ($color->result() as $value) {?>
									  <span style="color: #F5003C;">Size:&nbsp;&nbsp; <?=$value->size;?></span>
							   <?php }
									?></p></li>
						</ul>
							 <div class="delivery">

                                                        <p style="color: #F5003C;">BDT. <?php echo number_format($item['price'], 2); ?> </p>
							 <span  style="color: #F5003C;">BDT. <?php echo ($item['qty']) * ($item['price']); ?></span>
							 <div class="clearfix"></div>
				        </div>
					   </div>
					   <div class="clearfix"></div>

				  </div>
			 </div>


                    <?php }
                    ?>
                         <div class="col-md-12" >
                            <div class="col-md-8" style="text-align: right;">

                            </div>
                            <div class="col-md-2" style="text-align: left;">
                                <b>Sub Total:</b>
                            </div>
                            <div class="col-md-2" style="text-align: right; color: #1800ff;">
                                BDT. <?php echo $total;?>
                            </div>
                         </div>
                         <div class="col-md-12">
                             <div class="col-md-8" style="text-align: right;">

                            </div>
                            <div class="col-md-2" style="text-align: left;">
                                <b>Total:</b>
                            </div>
                            <div class="col-md-2" style="text-align: right; color: #1800ff;">
                                BDT. <?php echo $total;?>
                            </div>
                         </div>
                         <br>
                         <br>
                         <br>
                         <div class="col-md-12" style="text-align: right;">
                             <input class="btn btn-danger my-cart-btn my-cart-b" type="submit" name="confirm" value="Confirm">


                         </div>
                        </form>

                 <?php }?>
                 </div>
		 </div>


</div>

<?php
require_once 'footer.php';
?>


</body>
</html>
