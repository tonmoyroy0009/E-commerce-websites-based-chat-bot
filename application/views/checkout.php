
<?php  require_once 'header.php';?>

<div class="content">

	<div class="main-1">
		<div class="container">
			<div class="register">
				<form method="post"  action="<?php echo base_url();?>checkout">
					<div class="register-top-grid">
						<h3>1. Shipping Address</h3>

						 <div class="wow fadeInLeft" data-wow-delay="0.4s">
							<span>Full Name   <label style="color: red;">*</label></span>
							<input  type="text"  value="<?php echo set_value('fname'); ?>" required=""  placeholder="Full Name" name="fname" >
							<div style="margin-top: 0px; color: red;"><?= form_error('fname'); ?></div>
						 </div>

						 <div class="wow fadeInLeft" data-wow-delay="0.4s">
							<span>Phone   <label style="color: red;">*</label></span>
							<input  type="text"  value="<?php echo set_value('phone'); ?>"  required="" placeholder="Phone" name="phone" >
							<div style="margin-top: 0px; color: red;"><?= form_error('phone'); ?></div>
						 </div>
						 <div class="wow fadeInLeft" data-wow-delay="0.4s">
							<span>Email   <label style="color: red;">*</label></span>
							<input  type="text"  value="<?php echo set_value('email'); ?>"  required="" placeholder="Email" name="email" >
							<div style="margin-top: 0px; color: red;"><?= form_error('email'); ?></div>
						 </div>

						 <div class="wow fadeInRight" data-wow-delay="0.4s">
							 <span>Street Adress   <label style="color: red;">*</label></span>
							 <input  type="text"  value="<?php echo set_value('add'); ?>" required=""  placeholder="Street Adress " name="add" >
							 <div style="margin-top: 0px; color: red;"><?= form_error('add'); ?></div>
						 </div>


						 <div class="clearfix"> </div>
						   <a class="news-letter" href="#">

						   </a>
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
					  transition: all 0.5s ease 0s;" type="submit" value="Continue" name="cdetail">
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
