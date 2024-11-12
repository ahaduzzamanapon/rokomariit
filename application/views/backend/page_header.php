<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$meta_title;?> | <?=$domain_title;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url();?>awedget/assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?=base_url();?>awedget/assets/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?=base_url();?>awedget/assets/plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?=base_url();?>awedget/assets/plugins/iCheck/all.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?=base_url();?>awedget/assets/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url();?>awedget/assets/plugins/select2/select2.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url();?>awedget/assets/plugins/datatables/dataTables.bootstrap.css">

  <link rel="stylesheet" href="<?=base_url();?>awedget/assets/plugins/texteditor/editor.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>awedget/assets/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url();?>awedget/assets/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?=base_url();?>awedget/assets/css/custom.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="<?=base_url().'admin/dashboard';?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>TM</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>ROKOMARI</b> IT</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="javascript:void();" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li><a target="_blank" href="<?=base_url()?>" class="btn btn-success">Visit Website</a></li>
          <li class="dropdown user user-menu">
            <a href="javascript:void();" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url();?>awedget/assets/img/no-avatar.jpeg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=ucwords($this->session->userdata('first_name').' '.$this->session->userdata('last_name'));?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?=base_url();?>awedget/assets/img/no-avatar.jpeg" class="img-circle" alt="User Image">
                <p><small>Member since <strong><?=date('j F, Y', $this->session->userdata('created_on'));?></strong></small> </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="javascript:void();" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?=base_url('login/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>awedget/assets/img/no-avatar.jpeg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=ucwords($this->session->userdata('first_name').' '.$this->session->userdata('last_name'));?></p>
          <a href="javascript:void();"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <?php if(!$this->ion_auth->in_group([4])): ?>
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview <?=backend_activate_menu_class('dashboard');?>"> <a href="<?=base_url('admin/dashboard');?>"> <i class="fa fa-dashboard"></i> <span>Dashboard</span></a> </li>     

        <!-- <li class="treeview <?=backend_activate_menu_class('registration');?>"> <a href="<?=base_url('admin/registration/all');?>"> <i class="fa fa-dashboard"></i> <span>Registration List</span></a> </li> -->
        <li class="treeview <?=backend_activate_menu_class('gallerycategory');?>">
          <a href="javascript:void();">
            <i class="fa fa-dashboard"></i> <span>Gallary Category</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('admin/gallerycategory/add');?>"><i class="fa fa-circle-o"></i> Add Gallary Category</a></li>
            <li><a href="<?=base_url('admin/gallerycategory/all');?>"><i class="fa fa-circle-o"></i> All Gallary Category</a></li>
          </ul>
        </li>

        <li class="treeview <?=backend_activate_menu_class('gallery');?>">
          <a href="javascript:void();">
            <i class="fa fa-dashboard"></i> <span>Gallery</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('admin/gallery/add');?>"><i class="fa fa-circle-o"></i> Add Gallery</a></li>
            <li><a href="<?=base_url('admin/gallery/all');?>"><i class="fa fa-circle-o"></i> All Gallery</a></li>
          </ul>
        </li>

        <li class="treeview <?=backend_activate_menu_class('article');?>">
          <a href="javascript:void();">
            <i class="fa fa-dashboard"></i> <span>Article</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('admin/article/add');?>"><i class="fa fa-circle-o"></i> Add Article</a></li>
            <li><a href="<?=base_url('admin/article/all');?>"><i class="fa fa-circle-o"></i> All Article</a></li>
          </ul>
        </li>

        <!-- <li class="treeview <?=backend_activate_menu_class('category');?>">
          <a href="javascript:void();">
            <i class="fa fa-dashboard"></i> <span>Product Category</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('admin/category/add');?>"><i class="fa fa-circle-o"></i> Add Category</a></li>
            <li><a href="<?=base_url('admin/category/all');?>"><i class="fa fa-circle-o"></i> All Category</a></li>
          </ul>
        </li>

        <li class="treeview <?=backend_activate_menu_class('product');?>">
          <a href="javascript:void();">
            <i class="fa fa-dashboard"></i> <span>Product</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('admin/product/add');?>"><i class="fa fa-circle-o"></i> Add Product</a></li>
            <li><a href="<?=base_url('admin/product/all');?>"><i class="fa fa-circle-o"></i> All Product</a></li>
          </ul>
        </li> -->

        <li class="treeview <?=backend_activate_menu_class('services');?>">
          <a href="javascript:void();">
            <i class="fa fa-dashboard"></i> <span>Services</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('admin/services/add');?>"><i class="fa fa-circle-o"></i> Add Services</a></li>
            <li><a href="<?=base_url('admin/services/all');?>"><i class="fa fa-circle-o"></i> All Services</a></li>
          </ul>
        </li>
        <li class="treeview <?=backend_activate_menu_class('packages');?>">
          <a href="javascript:void();">
            <i class="fa fa-dashboard"></i> <span>Packages</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('admin/packages/add');?>"><i class="fa fa-circle-o"></i> Add Packages</a></li>
            <li><a href="<?=base_url('admin/packages/all');?>"><i class="fa fa-circle-o"></i> All Packages</a></li>
          </ul>
        </li>
        <li class="treeview <?=backend_activate_menu_class('news');?>">
          <a href="javascript:void();">
            <i class="fa fa-dashboard"></i> <span>Events</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('admin/news/add');?>"><i class="fa fa-circle-o"></i> Add Events</a></li>
            <li><a href="<?=base_url('admin/news/all');?>"><i class="fa fa-circle-o"></i> All Events</a></li>
          </ul>
        </li>

        <li class="treeview <?=backend_activate_menu_class('client');?>">
          <a href="javascript:void();">
            <i class="fa fa-dashboard"></i> <span>Client</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('admin/client/add');?>"><i class="fa fa-circle-o"></i> Add Client</a></li>
            <li><a href="<?=base_url('admin/client/all');?>"><i class="fa fa-circle-o"></i> All Client</a></li>
          </ul>
        </li>
        <li class="treeview <?=backend_activate_menu_class('slider');?>">
          <a href="javascript:void();">
            <i class="fa fa-dashboard"></i> <span>Slider</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('admin/slider/add');?>"><i class="fa fa-circle-o"></i> Add Slider</a></li>
            <li><a href="<?=base_url('admin/slider/all');?>"><i class="fa fa-circle-o"></i> All Slider</a></li>
          </ul>
        </li>

         <li class="treeview <?=backend_activate_menu_class('testimonial');?>">
          <a href="javascript:void();">
            <i class="fa fa-dashboard"></i> <span>Testimonial</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('admin/testimonial/add');?>"><i class="fa fa-circle-o"></i> Add Testimonial</a></li>
            <li><a href="<?=base_url('admin/testimonial/all');?>"><i class="fa fa-circle-o"></i> All Testimonial</a></li>
          </ul>
        </li>

       <!--  <li class="treeview <?=backend_activate_menu_class('managementteam');?>">
          <a href="javascript:void();">
            <i class="fa fa-dashboard"></i> <span>Management Team</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('admin/managementteam/add');?>"><i class="fa fa-circle-o"></i> Add Management Team</a></li>
            <li><a href="<?=base_url('admin/managementteam/all');?>"><i class="fa fa-circle-o"></i> All Management Team</a></li>
          </ul>
        </li> -->

        <li class="treeview <?=backend_activate_menu_class('contact');?>">
          <a href="javascript:void();">
            <i class="fa fa-dashboard"></i> <span>Contact Us</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('admin/contact/add');?>"><i class="fa fa-circle-o"></i> Add Contact Us</a></li>
            <li><a href="<?=base_url('admin/contact/all');?>"><i class="fa fa-circle-o"></i> All Contact Us</a></li>
          </ul>
        </li>

        <li class="treeview <?=backend_activate_menu_class('social');?>">
          <a href="javascript:void();">
            <i class="fa fa-dashboard"></i> <span>Social Icon</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('admin/social/add');?>"><i class="fa fa-circle-o"></i> Add Social Icon</a></li>
            <li><a href="<?=base_url('admin/social/all');?>"><i class="fa fa-circle-o"></i> All Social Icon</a></li>
          </ul>
        </li>

        <!-- <li class="treeview <?=backend_activate_menu_class('concern');?>">
          <a href="javascript:void();">
            <i class="fa fa-dashboard"></i> <span>Concern</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('admin/concern/add');?>"><i class="fa fa-circle-o"></i> Add Concern</a></li>
            <li><a href="<?=base_url('admin/concern/all');?>"><i class="fa fa-circle-o"></i> All Concern</a></li>
          </ul>
        </li> -->
        
        <li class="<?=backend_activate_menu_class('settign');?>"><a href="<?php echo base_url('admin/setting/edit/1');?>"><i class="fa fa-book"></i> <span>Page Setup</span></a></li>        

        <li class="treeview <?=backend_activate_menu_class('manage_user');?>">
          <a href="javascript:void();">
            <i class="fa fa-dashboard"></i> <span>Manage Users</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('admin/manage_user/all');?>"><i class="fa fa-circle-o"></i> User List</a></li>
            <li><a href="<?=base_url('admin/manage_user/add');?>"><i class="fa fa-circle-o"></i> Add User</a></li>
          </ul>
        </li>
          
        <li class="<?=backend_activate_menu_class('change_password');?>"><a href="<?php echo base_url('change_password');?>"><i class="fa fa-book"></i> <span>Change Password</span></a></li>        
      </ul>
      <?php else: ?>
        <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview <?=backend_activate_menu_class('user_dashboard');?>"> <a href="<?=base_url('admin/user_dashboard');?>"> <i class="fa fa-dashboard"></i> <span>Dashboard</span></a> </li>     
        <li class="treeview <?=backend_activate_menu_class('purchase_history');?>"> <a href="<?=base_url('admin/purchase_history');?>"> <i class="fa fa-dashboard"></i> <span>Purchase History</span></a> </li>     
        <li class="<?=backend_activate_menu_class('change_password');?>"><a href="<?php echo base_url('change_password');?>"><i class="fa fa-book"></i> <span>Change Password</span></a></li>        
      </ul>

      <?php endif; ?>



    </section>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">