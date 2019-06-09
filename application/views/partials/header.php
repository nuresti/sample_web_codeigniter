    <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
<meta charset="utf-8" />
<title><?php echo $title; ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta content="Preview page of Metronic Admin Theme #3 for dashboard & statistics" name="description" />
<meta content="" name="author" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/global/plugins/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/global/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')?>" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?php echo base_url('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/global/plugins/morris/morris.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/global/plugins/fullcalendar/fullcalendar.min.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/global/plugins/jqvmap/jqvmap/jqvmap.css')?>" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL STYLES -->

<link href="<?php echo base_url('assets/global/css/components.min.css')?>" rel="stylesheet" id="style_components" type="text/css" />
<link href="<?php echo base_url('assets/global/css/plugins.min.css')?>" rel="stylesheet" type="text/css" />
<!-- END THEME GLOBAL STYLES -->
<!-- BEGIN THEME LAYOUT STYLES -->
<link href="<?php echo base_url('assets/layouts/layout3/css/layout.min.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/pages/css/profile.min.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/layouts/layout3/css/themes/default.min.css')?>" rel="stylesheet" type="text/css" id="style_color" />
<link href="<?php echo base_url('assets/layouts/layout3/css/custom.min.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/summernote/dist/summernote-bs4.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/global/plugins/datatables/datatables.min.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css'?>" rel="stylesheet" type="text/css" />
<!-- END THEME LAYOUT STYLES -->
<link rel="shortcut icon" href="favicon.ico" /> </head>
<!-- END HEAD -->

<body class="page-container-bg-solid">
<div class="page-wrapper">
<div class="page-wrapper-row">
<div class="page-wrapper-top">
<!-- BEGIN HEADER -->
<div class="page-header">
<!-- BEGIN HEADER TOP -->
<div class="page-header-top">
<div class="container">
<!-- BEGIN LOGO -->
<div class="page-logo">
<a href="index.html">
    <img src="<?php echo base_url('assets/layouts/layout3/img/logo-default.jpg')?>" alt="logo" class="logo-default">
</a>
</div>
<!-- END LOGO -->
<!-- BEGIN RESPONSIVE MENU TOGGLER -->
<a href="javascript:;" class="menu-toggler"></a>
<!-- END RESPONSIVE MENU TOGGLER -->
<!-- BEGIN TOP NAVIGATION MENU -->
<div class="top-menu">
<ul class="nav navbar-nav pull-right">
    <!-- END INBOX DROPDOWN -->
    <!-- BEGIN USER LOGIN DROPDOWN -->
    <li class="dropdown dropdown-user dropdown-dark">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            <img alt="" class="img-circle" src="<?php echo base_url('assets/layouts/layout3/img/') . $user['image'];?>">
            <span class="username username-hide-mobile"><?php echo $user['name'] ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-default">
            <li>
                <a href="<?php echo base_url('c_user/myprofile') ?>">
                    <i class="icon-user"></i> My Profile </a>
            </li>
            <li class="divider"> </li>
            <li>
                <a href="<?php echo base_url('c_auth/logout') ?>">
                    <i class="icon-key"></i> Log Out </a>
            </li>
        </ul>
    </li>
</ul>
</div>
<!-- END TOP NAVIGATION MENU -->
</div>
</div>
<!-- END HEADER TOP -->
<!-- BEGIN HEADER MENU -->
<div class="page-header-menu">
<div class="container">
<!-- BEGIN HEADER SEARCH BOX -->
<form class="search-form" action="page_general_search.html" method="GET">
<div class="input-group">
    <input type="text" class="form-control" placeholder="Search" name="query">
    <span class="input-group-btn">
        <a href="javascript:;" class="btn submit">
            <i class="icon-magnifier"></i>
        </a>
    </span>
</div>
</form>
<!-- END HEADER SEARCH BOX -->
<!-- BEGIN MEGA MENU -->
<!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
<!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
<div class="hor-menu  ">

    <!-- QUERY MENU -->
    <?php 
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT a.id, a.menu
                        FROM user_menu a
                        JOIN user_access_menu b 
                        ON a.id = b.menu_id
                        WHERE b.role_id = $role_id
                        ORDER BY b.menu_id ASC";
        $menu = $this->db->query($queryMenu)->result_array();

     ?> 

     <!-- LOOPING MENU -->
     <?php 
        foreach ($menu as $m):
      ?>

      <ul class="nav navbar-nav">
        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
            <a href="javascript:;"> <?php echo $m['menu'];  ?>
                <span class="arrow"></span>
            </a>
            <ul class="dropdown-menu pull-left">
      <!-- SIAPKAN SUB MENU SESUAI MENU -->
      <?php 
        $menuId = $m['id'];
        $querySubMenu = "SELECT * 
                        FROM user_sub_menu 
                        WHERE menu_id = $menuId 
                        AND is_active = 1";

        $subMenu = $this->db->query($querySubMenu)->result_array();
       ?>
        <?php foreach ($subMenu as $sm):?>
            <?php if($title == $sm['title']): ?>
        
                <li aria-haspopup="true" class=" active">
            <?php else :  ?>
                <li aria-haspopup="true" class="">
            <?php endif; ?>
            <a href="<?php echo base_url($sm['url']); ?>" class="nav-link  active">
                <i class="<?php echo $sm['icon']; ?>"></i> <?php echo $sm['title']; ?>
            </a>
        </li>
        
    
    <?php endforeach; ?>
            </ul>
        </li>
    </ul>
  <?php endforeach; ?>

<!-- <ul class="nav navbar-nav">
    <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown active">
        <a href="javascript:;"> Administrator
            <span class="arrow"></span>
        </a>
        <ul class="dropdown-menu pull-left">
            <li aria-haspopup="true" class=" active">
                <a href="home" class="nav-link  active">
                    <i class="icon-bar-chart"></i> Default Dashboard
                    <span class="badge badge-success">1</span>
                </a>
            </li>
            <li aria-haspopup="true" class=" ">
                <a href="dashboard_2.html" class="nav-link  ">
                    <i class="icon-bulb"></i> Dashboard 2 </a>
            </li>
        </ul>
    </li>
    <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
        <a href="javascript:;"> User
            <span class="arrow"></span>
        </a>
        <ul class="dropdown-menu pull-left">
        	<li aria-haspopup="true" class=" ">
                <a href="c_kategori" class="nav-link  ">
                    <i class="icon-bulb"></i> Kategori </a>
            </li>
            <li aria-haspopup="true" class=" ">
                <a href="c_produk" class="nav-link  ">
                    <i class="icon-bulb"></i> Produk </a>
            </li>
            <li aria-haspopup="true" class="dropdown-submenu ">
                <a href="produk" class="nav-link nav-toggle ">
                    <i class="icon-settings"></i> Stuff
                    <span class="arrow"></span>
                </a>
                <ul class="dropdown-menu">
                    <li aria-haspopup="true" class=" ">
                        <a href="form_controls.html" class="nav-link "> Bootstrap Form
                            <br>Controls </a>
                    </li>
                    <li aria-haspopup="true" class=" ">
                        <a href="form_dropzone.html" class="nav-link "> Dropzone File Upload </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
        <a href="c_user"> My Profile
            <span class="arrow"></span>
        </a>
    </li>
</ul> -->
</div>
<!-- END MEGA MENU -->
</div>
</div>
<!-- END HEADER MENU -->
</div>
<!-- END HEADER -->
</div>
</div>