<!DOCTYPE HTML>
<html>
<head>
<title>New Market</title>
<link rel="shortcut icon" href="<?=base_url();?>images\logo.png" />
<link href="<?=base_url();?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
<link href="<?=base_url();?>css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?=base_url();?>css/owl.carousel.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="<?=base_url();?>js/jquery.min.js"></script>
<script src="<?=base_url();?>js/simpleCart.min.js"> </script>
<script type="text/javascript" src="<?=base_url();?>js/bootstrap-3.1.1.min.js"></script>
<script src="<?=base_url();?>js/imagezoom.js"></script>


<script defer src="<?=base_url();?>js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="<?=base_url();?>css/flexslider.css" type="text/css" media="screen" />

<script>

$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>
<style>

.active{
	border: 2px solid #0000ff;
}

.gallery-info {
    background-color: rgba(25, 23, 23, 0.4);
    display: none;
    left: 8px;
    padding: 0.5em 0;
    position: absolute;
    top: 67.6%;
    width: 94%;
}
.modal-header {
    border-bottom: 0px solid #e5e5e5;
    min-height: 16.4286px;
    padding: 15px;
}
            </style>


</head>
<body>
<div class="header">
	<div class="header-top">
		<div class="container">
			<div class="top-right" style="width: 300px;">
				<ul>
				<?php
					if(!empty($this->session->userdata('userid'))){
				?>
					<li  class="text">
						<a style="cursor: pointer; text-transform: capitalize;"><?php echo $this->session->userdata('firstname');?></a>
					</li>
					<li  class="text">
						<a href="<?=base_url();?>login/logout" >Logout</a></li>
				<?php }
					else { ?>
						<li  class="text"><a href="<?=base_url();?>login">Login</a></li>
						<li  class="text"><a href="<?=base_url();?>register">Register</a></li>
				<?php }
				?>

					<li>
						<div class="cart box_1">
							<a href="<?=base_url("cart")?>">Cart
								<?php if(!empty($this->cart->contents())){
										echo $this->cart->total_items();
									}
									else{
										echo "0";
									}
								?>

							</a>

							<div class="clearfix"> </div>
						</div>
					</li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="header-bottom">
		<div class="container">

			<div class="content white">
				<nav class="navbar navbar-default" role="navigation">
					<div class="navbar-header">

						<!--<h1 class="navbar-brand"><a  href="<?=base_url();?>"home>New Market</a></h1>-->
						<h1 class="navbar-brand"><a  href="<?=base_url();?>"home><img border="0" src="<?=base_url();?>images/logo.png" style="width: 120%; cursor: pointer;" alt="New Market"></a></h1>
					</div>

				</nav>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>



 <link href="https://snatchbot.me/sdk/webchat.css" rel="stylesheet" type="text/css"><script src="https://snatchbot.me/sdk/webchat.min.js"></script><script> Init('?botID=7440&appID=TLnBQ4VenfxayyxfsBAb', 400, 400, 'https://dvgpba5hywmpo.cloudfront.net/media/image/1513412246eRi8XlfYOg', 'bubble', 'DAE9EA', 101, 100, 70, '', '1'); /* for authentication of its users, you can define your userID (add &userID={login}) */ </script>
                        
                        
                        