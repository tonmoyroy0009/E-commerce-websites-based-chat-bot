<?php  require_once 'header.php';?>


<div class="content">

	<div class="main-1">
		<div class="container">
			<div class="register">
                <form method="post"  action="<?php echo base_url();?>checkout/payment">
					 <div class="register-top-grid">
						<h3>2. Payment</h3>
										 <div class="wow fadeInRight" data-wow-delay="0.4s">
							 <span>Payment   <label style="color: red;">*</label></span>
							  <select name="payment" required="" style="background: #f2eed5; border: 1.2px solid #27b6a5; padding: 3px; width: 50%;color: #300f68;">
								<option value="">Select Payment Method</option>
									<option value="cash">Cash On Delivery</option>
								</select>
						 </div>
						<div class="clearfix"> </div>
					</div>


					<div class="register-but">
						<input  style="background-color: #fff;
						border: 2px solid #27B6A5;
						color: #27B6A5;
					  display: inline-block;
					  font-size: 1.3em;
					  outline: medium none;
					  padding: 0.6em 2em;
					  text-transform: uppercase;
					  transition: all 0.5s ease 0s;" type="submit" value="Continue" name="paymentdetail">
					</div>
				</form>

		   </div>
		 </div>
	</div>

</div>


<br>
<br>


<?php require 'footer.php';?>

<div class="modal fade" id="header-modal" aria-hidden="true"></div>

</body>
</html>
