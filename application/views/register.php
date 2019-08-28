<?php
require_once 'header.php';
?>

<div class="content">
	<div class="main-1">
		<div class="container">
			<div class="register">
				<form method="post"  action="<?php echo base_url();?>register">
				 <div class="register-top-grid">
					<h3>PERSONAL INFORMATION</h3>
					 <div class="wow fadeInLeft" data-wow-delay="0.4s">
						<span>Full Name   <label style="color: red;">*</label></span>
						<input  type="text"  value="<?php echo set_value('fullname'); ?>"   placeholder="Full Name" name="fullname" >
						<div style="margin-top: 0px; color: red;"><?= form_error('fullname'); ?></div>
					 </div>

					 <div class="wow fadeInRight" data-wow-delay="0.4s">
						<span>Email Address   <label style="color: red;">*</label></span>
						<input  type="text" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email" >
						<div style="margin-top: 0px; color: red;"><?= form_error('email'); ?></div>
					 </div>
					 <div class="wow fadeInRight" data-wow-delay="0.4s">
						 <span>Mobile   <label style="color: red;">*</label></span>
						 <input  type="text"  name="phone" value="<?php echo set_value('phone'); ?>" placeholder="Phone">
                         <div style="margin-top: 0px; color: red;"><?= form_error('phone'); ?></div>
					 </div>
					 <div class="clearfix"> </div>
					   <a class="news-letter" href="#">

					   </a>
					 </div>
				     <div class="register-bottom-grid">
						    <h3>LOGIN INFORMATION</h3>
							 <div class="wow fadeInLeft" data-wow-delay="0.4s">
								<span>Password   <label style="color: red;">*</label></span>
								<input  type="text" placeholder="Password"  value="<?php echo set_value('password'); ?>" name="password" placeholder="Email">
                                <div style="margin-top: 0px; color: red;"><?= form_error('password'); ?></div>
							 </div>
							 <div class="wow fadeInRight" data-wow-delay="0.4s">
								<span>Confirm Password   <label style="color: red;">*</label></span>
								<input  type="text" name="cpassword" value="<?php echo set_value('cpassword'); ?>"  placeholder="Confirm Password">
                                <div style="margin-top: 0px; color: red;"><?= form_error('cpassword'); ?></div>
							 </div>
					 </div>
                      <div class="register-but">
						<input  style="    background-color: #fff;
						border: 2px solid #000;
						color: #000;
						display: inline-block;
						font-size: 1.2em;
						outline: medium none;
						padding: 0.6em 2em;
						text-transform: uppercase;
						transition: all 0.5s ease 0s;" type="submit" value="submit">
					  </div>
				</form>

			</div>
		</div>
	</div>

</div>


<?php
require_once 'footer.php';
?>


</body>
</html>
