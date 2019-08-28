
           <?php require_once('admin_header.php'); ?>

            <main id="main-container">
                <div class="content">
                <?php if($this->session->flashdata('SUCCESSMSG')) { ?>
                        <div role="alert" class="alert alert-success">
                                <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                                <strong>Well done!</strong>
                                <?=$this->session->flashdata('SUCCESSMSG')?>
                        </div>
                <?php } ?>
                    <div class="block">
                        
                         <div class="block-header">
                            <h3 class="block-title col-lg-6" style="text-align: left;">
                                Product List
                            </h3>
                            <span class="col-lg-6" style="text-align: right;">
                                  <a class="btn btn-default btn-rounded btn-condensed btn-sm" data-toggle="tooltip" title="Add New Product" href="<?=base_url();?>product/add_product"><span title="Add New Product"class="fa fa-plus"></span></a>
                            </span>
                        </div>
                        <form method="get">                 
                            <div class="col-md-12">
                                
                                <div class="col-md-3"><input class="form-control" type="text" value="" name="product_description" placeholder="Enter Product Description" ></div>
                                <div class="col-md-3">
                                    <select class="form-control" name="product_category" >
                                        <option value="">Select category</option>
                                        <?php
                                        foreach ($category_list as $post)
                                        {?>
                                        <option value="<?=$post->id?>"><?=$post->category_name?></option>
                                       <?php }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3"><input class="btn btn-success" name="submit" value="Search" type="submit"></div>
                            </div>
                        </form>        
                    <div class="col-md-12" style="padding-top: 20px;"></div>
                    <div class="block-content">
                            <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
                                       
                                        <th>Product Image</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  foreach ($product_list as $post) 
                                    { ?>
                                    <tr>
                                        
                                        <td><img src="<?=base_url();?>/upload/product/<?= $post->id ?>/<?= $post->product_image?>" width="100" height="100"></td>
										
                                        <td><?= $post->product_name?></td>
										
                                        <td style="text-transform: capitalize;"><?php
                                            foreach ($category_list as $value) {
                                                if($value->id  == $post->category_id)
                                                {
                                                   echo $value->category_name;
                                                }
                                            }
                                        ?>
                                        </td>
										
                                       
                                        
                                        <td><?= $post->product_price?></td>
                                       
                                       
                                        
                                         <td>
                                             
                                            <a href="<?= base_url("product/delete_product/".$post->id) ?>" data-href="" class="btn btn-danger btn-rounded btn-condensed btn-sm delete"  data-toggle="tooltip" title="Delete" ><span class="fa fa-times" title="delete"></span></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                 

                 
                </div>
               
            </main>
           

           <?php require_once('admin_footer.php'); ?>
        </div>
           <div class="modal fade" id="header-modal" aria-hidden="true"></div>
      
        <script src="<?= base_url();?>assets/js/core/jquery.min.js"></script>
        <script src="<?= base_url();?>assets/js/core/bootstrap.min.js"></script>
        <script src="<?= base_url();?>assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="<?= base_url();?>assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="<?= base_url();?>assets/js/core/jquery.appear.min.js"></script>
        <script src="<?= base_url();?>assets/js/core/jquery.countTo.min.js"></script>
        <script src="<?= base_url();?>assets/js/core/jquery.placeholder.min.js"></script>
        <script src="<?= base_url();?>assets/js/core/js.cookie.min.js"></script>
        <script src="<?= base_url();?>assets/js/app.js"></script>

        
        <script src="<?= base_url();?>assets/js/plugins/datatables/jquery.dataTables.min.js"></script>

       
        <script src="<?= base_url();?>assets/js/pages/base_tables_datatables.js"></script>
    </body>
</html>
