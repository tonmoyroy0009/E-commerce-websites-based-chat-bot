
         
       
       <?php      require_once('admin_header.php'); ?>
           
            <main id="main-container">
                

                
                <div class="content">
                    <div class="row">
                        <div class="col-lg-12">
                           
                            <div class="block">
                                <div class="block-header">
                                    <ul class="block-options">
                                        <li>
                                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                        </li>
                                    </ul>
                                    <h3 class="block-title">New Product Register</h3>
                                </div>
                                <div class="block-content block-content-full bg-gray-lighter ">
                                      <form class="form-horizontal"  method="post" enctype="multipart/form-data">
                                          
                                        
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Product Name<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" id="product_name" value="<?php echo set_value('product_name'); ?>" name="product_name" placeholder="Product Name" >
                                                 <div style="margin-top: 0px; color: red;"><?= form_error('product_name'); ?></div>
                                            </div>
                                        </div>
                                          
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Product Description<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <textarea class="form-control input-lg" id="product_description"  name="product_description" placeholder="Product Description" rows="4" ><?php echo set_value('product_description'); ?></textarea>
                                                <div style="margin-top: 0px; color: red;"><?= form_error('product_description'); ?></div>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Product Category<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <select class="form-control" name="product_category" id="subcategoryview" >
                                                    <option value="">Select category</option>
                                                    <?php
                                                    foreach ($category_list as $post)
                                                    {?>
                                                    <option value="<?=$post->id?>"><?=$post->category_name?></option>
                                                   <?php }
                                                    ?>
                                                   
                                                </select>
                                                 <div style="margin-top: 0px; color: red;"><?= form_error('product_category'); ?></div>
                                            </div>
                                        </div>
                                        
                                       
                                        <div class="form-group">
                                            <label  class="col-md-2 control-label">Color Product<span class="text-danger"></span></label>
                                            <div class="col-md-7">
                                                    <select  class="form-control" name="colorproduct[]"  multiple id="colorproduct">
                                                   <?php
                                                        foreach ($color_list as $post)
                                                        {?>
                                                        <option value="<?=$post->id?>"><?=$post->color_name;?></option>
                                                       <?php }
                                                   ?>
                                                   </select>
                                            </div>
                                        </div>
                                          
                                        <div class="form-group">
                                            <label  class="col-md-2 control-label">Size Product<span class="text-danger"></span></label>
                                            <div class="col-md-7">
                                                    <select   class="form-control" name="sizeproduct[]"  multiple id="sizeproduct">
                                                   <?php
                                                        foreach ($size_list as $post)
                                                        {?>
                                                        <option value="<?=$post->id?>"><?=$post->size;?></option>
                                                       <?php }
                                                   ?>
                                                   </select>
                                            </div>
                                        </div>
                                          
                                        
                                         
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Product Image<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <img id="previewimage" onclick="$('#uploadFile').click();" src="<?php echo base_url(); ?>images/product_image.gif" style="cursor: pointer;height: 210px;width: 210px;position: relative;z-index: 10;"/>
                                                <input type="file" id="uploadFile" name="product_image" style="position: absolute; margin: 0px auto; visibility: hidden;" accept="image/*" />
                                                <div style="margin-top: 0px; color: red;"><?= form_error('product_image'); ?></div>
                                            </div>
                                        </div>
										
                                         <div class="form-group">
                                            <label class="col-md-2 control-label">Display Rate<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text"  name="rate" value="<?php echo set_value('rate'); ?>" placeholder="Product Price"  id="rate">
                                                   <div style="margin-top: 0px; color: red;"><?= form_error('rate'); ?></div>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-2 control-label">Original Rate<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text"  name="orate" value="<?php echo set_value('orate'); ?>" placeholder="Original Product Price"  id="rate">
                                                   <div style="margin-top: 0px; color: red;"><?= form_error('orate'); ?></div>
                                            </div>
                                        </div>
                                         
                                        
                                     
                                       <div class="form-group">
                                            <div class="col-md-8 col-md-offset-2">
                                                <button class="btn btn-sm btn-primary" name="submit" type="submit"><i class="fa fa-check"></i>Submit Product</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                           
                        </div>
                     
                    </div>
                  
                </div>
               
            </main>
        <?php      require_once('admin_footer.php'); ?>
        </div>
    
        <script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core/jquery.appear.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core/jquery.countTo.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core/jquery.placeholder.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core/js.cookie.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/app.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.multiselect.js"></script>
        
        
    </body>
</html>
<script>


$('#colorproduct').multiselect({
    columns: 1,
    placeholder: 'None Selectd',
    search: true,
    selectAll: true
});
$('#sizeproduct').multiselect({
    columns: 1,
    placeholder: 'None Selectd',
    search: true,
    selectAll: true
});

</script>
<script>
    
$('document').ready(function()
{ 
	function readURL(input) {
		if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                            $('#previewimage').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
		}
	}
		$("#uploadFile").change(function(){
			readURL(this);
		});
                
		
        
	
});
</script>