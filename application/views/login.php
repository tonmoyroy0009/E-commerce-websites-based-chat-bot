<?php
require_once 'header.php';
?>

<div class="content">
	<div class="main-1">
		<div class="container">
			<div class="login-page">
			   <div class="account_grid">
					<div class="col-md-6 login-left">
						<h3>NEW CUSTOMERS</h3>

						 <a class="acount-btn" href="<?=base_url()?>register">Create an Account</a>
					</div>
					<div class="col-md-6 login-right">
						<h3>REGISTERED CUSTOMERS</h3>
						<p>If you have an account with us, please login.</p>
						<?php if($this->session->flashdata('error')) { ?>
							<div role="alert" class="alert alert-danger">
									<button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
									<?=$this->session->flashdata('error')?>
							</div>
						<?php } ?>
						<form action="<?=base_url();?>login/verify" method="post">
							<div>
								<span>Email Address   <label style="color: red;">*</label></span>
								<input type="text" required="" name="email" placeholder="Email" >
							</div>
							<div>
								<span>Password   <label style="color: red;">*</label></span>
								<input type="password" name="password" required="" placeholder="Password">
							</div>
							<input type="submit" value="Login">
						</form>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>
</div>




<?php
require_once 'footer.php';
?>

</body>
</html>
