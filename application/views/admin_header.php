<!DOCTYPE html>
<html class="no-focus">
    <head>
        <meta charset="utf-8">
        <title>Admin</title>
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
        <link rel="shortcut icon" href="">
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/slick/slick.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/slick/slick-theme.min.css">
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" id="css-main" href="<?php echo base_url(); ?>assets/css/oneui.css">
        <link rel="stylesheet" id="css-main" href="<?php echo base_url(); ?>assets/js/jquery.multiselect.css">

    </head>
    <body>
            <div id="page-container" class="side-scroll header-navbar-fixed">

<header id="header-navbar" class="content-mini content-mini-full">
               
                <ul class="nav-header pull-left">
                    <li>
                        <div class="btn-group">
                            <a href="<?= base_url("admin_home");?>" class="btn btn-default btn-image dropdown-toggle" >
                                 Home
                            </a>
                        </div>
                    </li>
                </ul>
                <ul class="nav-header pull-left">
                    <li>
                        <div class="btn-group">
                            <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                              Products
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a tabindex="-1" href="<?= base_url("product");?>">
                                       
                                       All Products
                                    </a>
                                </li>
                                <li>
                                    <a tabindex="-1" href="<?= base_url("product/add_product");?>">

                                       Create Product
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                
                <ul class="nav-header pull-left">
                    <li>
                        <div class="btn-group">
                            <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                              Category
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a tabindex="-1" href="<?= base_url("category");?>">
                                       
                                       All Category
                                    </a>
                                </li>
                                <li>
                                    <a tabindex="-1" href="<?= base_url("category/category_add");?>">

                                       Create Category
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <ul class="nav-header pull-left">
                    <li>
                        <div class="btn-group">
                            <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                              Color
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a tabindex="-1" href="<?= base_url("color");?>">
                                       
                                       All Color
                                    </a>
                                </li>
                                <li>
                                    <a tabindex="-1" href="<?= base_url("color/add_color");?>">

                                       Create Color
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <ul class="nav-header pull-left">
                    <li>
                        <div class="btn-group">
                            <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                              Size
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a tabindex="-1" href="<?= base_url("size");?>">
                                       
                                       All Size
                                    </a>
                                </li>
                                <li>
                                    <a tabindex="-1" href="<?= base_url("size/add_size");?>">

                                       Create Size
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                
                
               
               
                <ul class="nav-header pull-right">
                    <li>
                        <div class="btn-group">
                           
                              
							<a href="<?php echo site_url('admin_login/logout'); ?>">
								<i class="si si-logout pull-right"></i>Log out
							</a>
                                
                            
                        </div>
                    </li>
                </ul>
            </header>