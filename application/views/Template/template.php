<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> <?php echo $this->session->userdata['username']; ?> | <?= $title ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
	<!-- Morris chart -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/morris.js/morris.css">
	<!-- jvectormap -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">

	<script src="<?= base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<!-- jQuery UI 1.11.4 -->
	<link rel="icon" href="<?php echo base_url(); ?>assets/dist/img/favicon.png" type="image/gif">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/sweetalert/sweetalert2.min.css">
	<script src="<?= base_url(); ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/dropdown/css/dd.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/magnific/magnific-popup.css">
	<script src="<?= base_url(); ?>assets/plugins/magnific/jquery.magnific-popup.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

</head>

<body class="hold-transition skin-black sidebar-mini">
	<div class="wrapper">
		<header class="main-header">
			<!-- Logo -->
			<a href="index2.html" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>K</b>K</span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b><?php echo $this->session->userdata['nama_operator']; ?></span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- User Account: style can be found in dropdown.less -->
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?php echo base_url('uploads/operator/p.jpeg'); ?>" class="user-image" alt="User Image">
								<span class="hidden-xs"><?php echo $this->session->userdata['username']; ?></span>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
									<img src="<?php echo base_url('uploads/operator/p.jpeg'); ?>" class="img-circle" alt="User Image">
									<p>
										<?php echo $this->session->userdata['nama_operator']; ?>
										<small></small>
									</p>
								</li>
								<!-- Menu Body -->
								<li class="user-body">

									<a href="<?= base_url(); ?>index.php/auth/logout" class="btn btn-default btn-flat" style="text-align:center;">Sign out</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<div class="user-panel">
					<div class="pull-left image">
						<img src="<?php echo base_url('uploads/operator/p.jpeg') ?>" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<p> <?php echo $this->session->userdata['username']; ?> </p>
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>
				<!-- /.search form -->
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<?php if ($this->session->userdata('id') == 1) : ?>
					<ul class="sidebar-menu" data-widget="tree">
						<li class="header">MAIN NAVIGATION</li>
						<li>
							<a href="<?= base_url(); ?>toko">
								<i class="fa fa-users"></i> <span>Data Toko</span>
								<span class="pull-right-container">
								</span>
							</a>
						</li>
					</ul>

				<?php else : ?>
					<ul class="sidebar-menu" data-widget="tree">
						<li class="header">MAIN NAVIGATION</li>
						<li>
							<a href="<?= base_url(); ?>Dashboard">
								<i class="fa fa-dashboard"></i> <span>DASHBOARD</span>
								<span class="pull-right-container">
								</span>
							</a>
						</li>


						<li>
							<a href="<?= base_url(); ?>index.php/penjualan">
								<i class="fa fa-shopping-cart"></i> <span>TRANSAKSI</span>
								<span class="pull-right-container">
								</span>
							</a>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-cubes"></i> <span>Data Barang</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="<?= base_url(); ?>index.php/Barang">
										<i class="fa fa-shopping-cart"></i> <span>BARANG</span>
										<span class="pull-right-container">
										</span>
									</a>
								</li>
								<li>
									<a href="<?= base_url(); ?>index.php/Stok">
										<i class="fa fa-cubes"></i> <span>STOK</span>
										<span class="pull-right-container">
										</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="active treeview">
							<a href="#">
								<i class="fa fa-folder-o"></i> <span>LAPORAN</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right-container"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<?php $tahun =  date('Y');
								$bulan =  date('m'); ?>
								<li><a href="<?= base_url(); ?>index.php/Lapharian/index/<?= $tahun ?>/<?= $bulan ?>"><i class="fa fa-circle-o"></i>LAPORAN HARIAN</a></li>
								<li><a href="<?= base_url(); ?>index.php/Lapbulanan/index/<?= $tahun ?>"><i class="fa fa-circle-o"></i>LAPORAN BULANAN</a></li>
								<li><a href="<?= base_url(); ?>index.php/laporan"><i class="fa fa-circle-o"></i>LAPORAN PEMBAYARAN</a></li>
							</ul>
						</li>
					</ul>
				<?php endif; ?>
			</section>
			<!-- /.sidebar -->
		</aside>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					<?= $title ?>
					<small><?php echo $this->session->userdata['username']; ?></small>
				</h1>
			</section>
			<!-- Main content -->
			<?php echo $contents ?>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> 0.2
			</div>
			<strong>&copy;2022 Developed by - <a href="#">Kasir Kita</a></strong>
		</footer>
		<!-- /.control-sidebar -->
		<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
		<div class="control-sidebar-bg"></div>
	</div>
	<script src="<?= base_url(); ?>assets/plugins/dropdown/js/jquery.dd.js"></script>

	<script src="<?= base_url(); ?>assets/plugins/sweetalert/sweetalert2.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/Bootstrap-validator/validator.js"></script>
	<script src="<?= base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?= base_url(); ?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
	<!-- daterangepicker -->
	<script src="<?= base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- datepicker -->
	<script src="<?= base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<!-- Bootstrap WYSIHTML5 -->
	<!-- Slimscroll -->
	<script src="<?= base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="<?= base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="<?= base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
	<script src="<?= base_url(); ?>assets/bower_components/select2/dist/js/select2.min.js"></script>
	<script>
		$(document).ready(function() {
			$(".select22").select2({
				placeholder: "Please Select"
			});
		});
	</script>
</body>

</html>