
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title><?=$title;?>  </title>

    <!-- Bootstrap -->
    <link href="<?=base_url();?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=base_url();?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?=base_url();?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="<?=base_url();?>assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- Ion.RangeSlider -->
    <link href="<?=base_url();?>assets/vendors/normalize-css/normalize.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <!-- Bootstrap Colorpicker -->
    <link href="<?=base_url();?>assets/vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="<?=base_url();?>assets/vendors/cropper/dist/cropper.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?=base_url();?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="<?=base_url();?>assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?=base_url();?>assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?=base_url();?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=base_url();?>assets/build/css/custom.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="<?=base_url();?>assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="<?=base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
				<script src="<?=base_url();?>node_modules/sweetalert/dist/sweetalert.min.js"></script>

  </head>



  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?=base_url('c_admin')?>" class="site_title"><i class="fa fa-paw"></i> <span>TTIC</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?=base_url();?>images/admin.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
								<span>Welcome</span>
                <h2><?=$this->session->userdata('username');?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
						
            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
								<h3>General</h3>
                
								<ul class="nav side-menu">	
								<?php if($this->session->userdata('level')=='admin'){ ?>
									<li><a href="<?=base_url();?>c_admin/"><i class="fa fa-dashboard"></i> Home <span class="fa fa-chevron"></span></a>
									<li><a href="<?=base_url();?>c_admin/v_data_user/"><i class="fa fa-user"></i> Data Admin TTIC </a>
									<li><a href="<?=base_url();?>c_admin/v_data_barang/"><i class="fa fa-gift"></i> Data Barang </a>
									<li><a href="<?=base_url();?>c_admin/v_harga/"><i class="fa fa-retweet"></i> Data Harga Barang </a>
									<li><a href="<?=base_url();?>c_admin/v_data_kelola_harga"><i class="fa fa-dollar"></i> Data Kelola Harga</a>
									
									<?php } if($this->session->userdata('level')=='pimpinan'){ ?>
										
										<li><a href="<?=base_url();?>c_admin/"><i class="fa fa-dashboard"></i> Home <span class="fa fa-chevron"></span></a>
										<li><a href="<?=base_url();?>c_admin/v_data_barang/"><i class="fa fa-gift"></i> Data Barang </a>
										<li><a href="<?=base_url();?>c_admin/v_harga/"><i class="fa fa-retweet"></i> Data Harga Barang </a>
										
									<?php } if($this->session->userdata('level')=='petugas'){ ?>
											<li><a href="<?=base_url();?>c_admin/"><i class="fa fa-dashboard"></i> Home <span class="fa fa-chevron"></span></a>
											<li><a href="<?=base_url();?>c_admin/v_data_barang/"><i class="fa fa-gift"></i> Data Barang </a>
											<li><a href="<?=base_url();?>c_admin/v_harga/"><i class="fa fa-retweet"></i> Data Harga Barang </a>

        					<?php }; ?>


							
                  <!-- <li><a href="<?=base_url();?>controller/data_selesai_memilih"><i class="fa fa-edit"></i> Data Harga Bahan Paangan</a> -->
                  <!-- <li><a href="<?=base_url();?>grafik"><i class="fa fa-edit"></i> Grafik</a> -->
                  </li>
                </ul>
              </div>
            </div>
        
						<!-- /sidebar menu -->
				


            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?=base_url();?>c_login/login_user">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?=base_url();?>images/admin.png" alt=""><?=$this->session->userdata('nama')?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                   <li><a href="<?=base_url();?>c_user"><i class="fa fa-home pull-right"></i> Beranda</a></li>
                    <li><a href="<?=base_url();?>c_login/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
