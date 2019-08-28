<?php require_once 'header.php';?>



	<div class="gallery">
		<div class="container">
			<h3>Popular Products</h3>
			<div class="gallery-grids">
				<?php
					if(!empty($popular_product)){
						foreach ($popular_product as $popular){

							$id = $popular->id;
							$name = $popular->product_name;
							$description = $popular->product_description;
							$price = $popular->product_price;
							$image = $popular->product_image;
				?>
				<div class="col-md-3 gallery-grid ">
					<a>
						<img class="quicklook" id="<?=$popular->id;?>" src="<?=base_url();?>/upload/product/<?=$popular->id;?>/<?=$popular->product_image;?>" style="height: 310px; width: 99%; cursor: pointer;" alt=""/>
						<div class="gallery-info quicklook" id="<?=$popular->id;?>" style="cursor: pointer;">
							<div class="quick">
								<p><span class="glyphicon glyphicon-eye-open "  style="cursor: pointer; color: greenyellow;" aria-hidden="true"></span> view</p>
							</div>
						</div>
					</a>
					<div class="galy-info">
						<p><?=$popular->product_name;?></p>
						<div class="galry">
							<div class="prices">
								<h5  class="item_price" style="color: #F5003C;">BDT. <?=$popular->product_price;?></h5>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<?php }
					}
				else{
					echo "No Item available!!";
				} ?>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>


	<div class="modal fade" id="header-modal" aria-hidden="true"></div>



	<?php require_once 'footer.php';?>

	<script src="<?=base_url();?>js/owl.carousel.js"></script>
	<script>
		$(document).ready(function() {
			$("#owl-demo").owlCarousel({
				items : 5,
				lazyLoad : true,
				autoPlay : true,
				pagination : false,
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {

			$("#header-modal").delegate("#addcartform","submit",function(e){
				var color = document.forms["productformcart"]["color"].value;
				if (color == null || color == "") {
					alert("Color must be selected. Click for select.");
					return false;
				}

				var size = document.forms["productformcart"]["size"].value;
				if (size == null || size == "") {
					alert("Size must be selected. Click for select.");
					return false;
				}
			});


			 $("#header-modal").delegate(".data_values","click",function(e){
				var id = $(this).attr('id');
				$('.data_values').removeClass('active');
				$("#"+id).addClass('active');
				$("#colorProduct").val(id.slice(1));
			});
			 $("#header-modal").delegate(".data_values_size","click",function(e){
				var id = $(this).attr('id');
				$('.data_values_size').removeClass('active');
				$("#"+id).addClass('active');
				$("#sizeProduct").val(id.slice(4));
			});


			$('.quicklook').click(function() {
				var product_id = $(this).attr('id');
				$.ajax({
					type: "POST",
					url: "<?=base_url("product_view/single_product_detail");?>",
					data: {product_id: product_id},
					dataType: "json",
					success: function(data) {
						 $("#header-modal").html(data.success);
						  $('#header-modal').modal('show');
					}

				});
			});
		});
	</script>
</body>
</html>
