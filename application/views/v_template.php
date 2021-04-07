 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SIPAS</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?= base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?= base_url();?>assets/bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url();?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= base_url();?>assets/css/bootstrap-select.min.css">
  
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  	folder instead of downloading all of them to reduce the load. -->
  	<link rel="stylesheet" href="<?= base_url();?>assets/dist/css/skins/_all-skins.min.css">
  	<!-- Morris chart -->
  	<link rel="stylesheet" href="<?= base_url();?>assets/bower_components/morris.js/morris.css">
  	<!-- jvectormap -->
  	<link rel="stylesheet" href="<?= base_url();?>assets/bower_components/jvectormap/jquery-jvectormap.css">
  	<!-- datatables -->
  	<link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  	<!-- Date Picker -->
  	<link rel="stylesheet" href="<?= base_url();?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  	<!-- Daterange picker -->
  	<link rel="stylesheet" href="<?= base_url();?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  	<!-- bootstrap wysihtml5 - text editor -->
  	<link rel="stylesheet" href="<?= base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  	<!-- iCheck for checkboxes and radio inputs -->
  	<link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/iCheck/all.css">

  	<!-- Bootstrap time Picker -->
  	<link rel="stylesheet" href="<?= base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.css">


  	<!-- Google Font -->
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
  <body class="hold-transition skin-blue sidebar-mini">
  	<div class="wrapper">

  		<header class="main-header">
  			<a href="#" class="logo">
  				<span class="logo-mini"><b>SIPAS</span>
  					<!-- logo for regular state and mobile devices -->
  					<span class="logo-lg"><b>SIPAS</span>
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
  										<img src="<?= base_url(); ?>assets/images/<?= $this->session->userdata('foto') ?>" class="user-image" alt="User Image">
  										<span class="hidden-xs" style="text-transform: capitalize;"><?= $this->session->userdata('nama'); ?></span>
  									</a>

  									<ul class="dropdown-menu">
  										<!-- User image -->
  										<li class="user-header">
  											<img src="<?= base_url(); ?>assets/images/<?= $this->session->userdata('foto') ?>" class="img-circle" alt="User Image">

  											<p><?= $this->session->userdata('nama'); ?></p>

  											<p style="color:white;text-align: center">
  												<?php if ($this->session->userdata('role_id')=='1') {
  													echo'SUPER ADMIN';
  												}else if($this->session->userdata('role_id')=='2'){
  													echo'SEKRETARIS';
  												} else if($this->session->userdata('role_id')=='3'){
  													echo'KEPEGAWAIAN';
  												} else if($this->session->userdata('role_id')=='4'){
  													echo'TATA USAHA';
  												}  else if($this->session->userdata('role_id')=='5'){
                            echo'Ka. Balai';
                          }  else if($this->session->userdata('role_id')=='6'){
                            echo'Ka. Sub Bag Tata Usaha';
                          }  else if($this->session->userdata('role_id')=='7'){
                            echo'Kasi Kerjasama dan Pelayanan Pengkajian';
                          }else if($this->session->userdata('role_id')=='8'){
                            echo'Koordinator Program';
                          } else if($this->session->userdata('role_id')=='9'){
                            echo'Ketua Kelompok Pengkaji';
                          }else if($this->session->userdata('role_id')=='10'){
                            echo'Ka. Ur. Keuangan';
                          }else if($this->session->userdata('role_id')=='11'){
                            echo'Ka. Ur. Kepegawaian';
                          }else if($this->session->userdata('role_id')=='12'){
                            echo'Ka. Ur Perlengkapan/RT';
                          }else if($this->session->userdata('role_id')=='13'){
                            echo'Laboratorium';
                          }

                          ?>
  											</p>
  										</li>

  										<!-- Menu Footer-->
  										<li class="user-footer">
  											<div class="pull-left">
  										<!--		<a href="#" class="btn btn-default btn-flat">Profile</a> -->
  											</div>
  											<div class="pull-right">
  												<a href="<?= base_url('c_login/logout/') ?>" class="btn btn-default btn-flat">Sign out</a>
  											</div>
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
  					<section class="sidebar"><br>
  						<!-- Sidebar user panel -->
  						<div class="user-panel">
  							<div class="pull-left image">
  								<img src="<?= base_url(); ?>assets/images/<?= $this->session->userdata('foto') ?>" class="img-circle" alt="User Image">
  							</div>
  							<div class="pull-left info">
  								<p style="text-transform: uppercase;"><?= $this->session->userdata('nama'); ?></p>
  								<p class="small">
  									<?php if ($this->session->userdata('role_id')=='1') {
  										echo'SUPER ADMIN';
  									}else if($this->session->userdata('role_id')=='2'){
  										echo'SEKRETARIS';
  									} else if($this->session->userdata('role_id')=='3'){
  										echo'KEPEGAWAIAN';
  									}  else if($this->session->userdata('role_id')=='4'){
                            echo'TATA USAHA';
                          }  else if($this->session->userdata('role_id')=='5'){
                            echo'Ka. Balai';
                          }  else if($this->session->userdata('role_id')=='6'){
                            echo'Ka. Sub Bag Tata Usaha';
                          }  else if($this->session->userdata('role_id')=='7'){
                            echo'Kasi Kerjasama dan Pelayanan Pengkajian';
                          }else if($this->session->userdata('role_id')=='8'){
                            echo'Koordinator Program';
                          } else if($this->session->userdata('role_id')=='9'){
                            echo'Ketua Kelompok Pengkaji';
                          }else if($this->session->userdata('role_id')=='10'){
                            echo'Ka. Ur. Keuangan';
                          }else if($this->session->userdata('role_id')=='11'){
                            echo'Ka. Ur. Kepegawaian';
                          }else if($this->session->userdata('role_id')=='12'){
                            echo'Ka. Ur Perlengkapan/RT';
                          }else if($this->session->userdata('role_id')=='13'){
                            echo'Laboratorium';
                          }?>

  								</p>

  							</div>
  						</div>
  						<br>

  						<!-- sidebar menu: : style can be found in sidebar.less -->


  						<ul class="sidebar-menu" data-widget="tree">
  							<li class="header">MAIN NAVIGATION</li>
                
  							 <li><a href="<?= base_url('c_superadmin'); ?>"><i class="fa fa-desktop"></i><span>Dashboard</span></a></li>


  							<?php if ($this->session->userdata('role_id')=='1'): ?>
  								<li class="treeview">
  									<a href="#">
  										<i class="fa fa-files-o"></i>
  										<span>Data Master</span>
  										<span class="pull-right-container">
  											<i class="fa fa-angle-left pull-right"></i>
  										</span>
  									</a>
  									<ul class="treeview-menu">
  										<li><a href="<?= base_url('c_superadmin/users'); ?>"><i class="fa fa-circle-o"></i> Users</a></li>

                      <li><a href="<?= base_url('c_superadmin/instansi'); ?>"><i class="fa fa-circle-o"></i> Instansi</a></li>

  									</ul>
  								</li>
  							<?php endif ?>


  							<?php if ($this->session->userdata('role_id')=='3') :?>
                  <?php else: ?>
  								
  								<li>
  									<a href="<?= base_url("c_superadmin/suratmasuk") ?>">
  										<i class="fa fa-inbox"></i><span>Surat Masuk</span>
                      <?php if($this->session->userdata('role_id')=='5'): ?>
                      <span class="pull-right-container">
                        <?php

                         $info1= $this->db->query("SELECT * FROM surat_masuk WHERE status_surat='0'")->num_rows();
                         
                        ?>
                      <?php if($info1=='0'): ?>
                      <?php elseif($info1!='0'): ?>
                          <small class="label pull-right bg-blue"><?= $info1; ?></small>
                      
                        <?php endif; ?> 
                      </span>
       
  										<?php endif; ?>
  									</a>
  								</li>
  							<?php endif; ?>
  							
  							<?php if ($this->session->userdata('role_id')=='1' || $this->session->userdata('role_id')=='3'|| $this->session->userdata('role_id')=='4' || $this->session->userdata('role_id')=='5') :?>
                
  							<li>
  								<a href="<?= base_url('c_superadmin/suratkeluar'); ?>">
  									<i class="fa fa-send"></i>
  									<span>Surat Keluar</span>
  								</a>
  							</li>

  							<?php endif ?>

  							<li class="treeview">
                  <?php if ($this->session->userdata('role_id')=='1' || $this->session->userdata('role_id')=='2' || $this->session->userdata('role_id')=='3' || $this->session->userdata('role_id')=='4' || $this->session->userdata('role_id')=='5') : ?>
  								<a href="#">
  									<i class="fa fa-print"></i>
  									<span>Cetak Laporan</span>
  									<span class="pull-right-container">
  										<i class="fa fa-angle-left pull-right"></i>
  									</span>
  								</a>
                <?php endif; ?>
  								<ul class="treeview-menu">
  									<?php if ($this->session->userdata('role_id')=='1' || $this->session->userdata('role_id')=='2' || $this->session->userdata('role_id')=='4' || $this->session->userdata('role_id')=='5') :?>
  									<li><a href="<?= base_url('c_superadmin/laporansuratmasuk'); ?>"><i class="fa fa-circle-o"></i> Surat Masuk</a></li>
  									<?php endif ?>

  									<?php if ($this->session->userdata('role_id')=='1' || $this->session->userdata('role_id')=='3' || $this->session->userdata('role_id')=='4' || $this->session->userdata('role_id')=='5') :?>

  									<li><a href="<?= base_url('c_superadmin/laporansuratkeluar'); ?>"><i class="fa fa-circle-o"></i> Surat Keluar</a></li>
  									<?php endif ?>

  								</ul>
  							</li>
                  <?php if ($this->session->userdata('role_id')=='1') :?>
                <li>
                  <a href="<?= base_url('c_superadmin/backup_database/'); ?>">
                    <i class="fa fa-sign-out"></i> <span>Backup DB</span>

                  </a>
                </li>
              <?php endif; ?>


  							<li>
  								<a href="<?= base_url('c_login/logout/'); ?>">
  									<i class="fa fa-sign-out"></i> <span>Logout</span>

  								</a>
  							</li>

  						</ul>

  					</section>
  					<!-- /.sidebar -->
  				</aside>

  				<!-- Content Wrapper. Contains page content -->
  				<div class="content-wrapper">

  					<?php $this->load->view($main_view); ?>
  					<!-- Content Header (Page header) -->

  				</div>
  				<!-- /.content-wrapper -->
  				<footer class="main-footer">
  					<div class="pull-right hidden-xs">
  						<b>Version</b> 2.4.0
  					</div>
  					<strong>Copyright &copy; 2019 <a href="#">Balai Pengkajian Teknologi Pertanian</a>.</strong>
  				</footer>

  			</div>
  			<!-- ./wrapper -->

  			<!-- jQuery 3 -->
  			<script src="<?= base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  			<!-- jQuery UI 1.11.4 -->
  			<script src="<?= base_url();?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
  			<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  			<script>
  				$.widget.bridge('uibutton', $.ui.button);
  			</script>
  			<!-- Bootstrap 3.3.7 -->
  			<script src="<?= base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  			<!-- Morris.js charts -->
  			<script src="<?= base_url();?>assets/bower_components/raphael/raphael.min.js"></script>
  			<script src="<?= base_url();?>assets/bower_components/morris.js/morris.min.js"></script>
  			<!-- Sparkline -->
  			<script src="<?= base_url();?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  			<!-- jvectormap -->
  			<script src="<?= base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  			<script src="<?= base_url();?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  			<!-- jQuery Knob Chart -->
  			<script src="<?= base_url();?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  			<!-- daterangepicker -->
  			<script src="<?= base_url();?>assets/bower_components/moment/min/moment.min.js"></script>
  			<script src="<?= base_url();?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  			<!-- Select2 -->
  			<script src="<?= base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
  			<!-- datepicker -->
  			<script src="<?= base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/chart.js"></script>
  			<!-- InputMask -->
  			<script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
  			<script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  			<script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
  			<script src="<?= base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  			<script src="<?= base_url(); ?>assets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  			<!-- Bootstrap WYSIHTML5 -->
  			<script src="<?= base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  			<!-- Slimscroll -->
  			<script src="<?= base_url();?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  			<!-- DataTables -->
  			<script src="<?= base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  			<script src="<?= base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  			<!-- FastClick -->
  			<script src="<?= base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
  			<!-- AdminLTE App -->
  			<script src="<?= base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
  			<script src="<?= base_url();?>assets/dist/js/adminlte.min.js"></script>
  			<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  			<script src="<?= base_url();?>assets/dist/js/pages/dashboard.js"></script>
  			<!-- AdminLTE for demo purposes -->
  			<script src="<?= base_url();?>assets/dist/js/demo.js"></script>
     
        <script src="<?= base_url();?>assets/js/bootstrap-select.min.js"></script>
        <!-- <script src="<?= base_url();?>assets/js/jquery.min.js"></script> -->

  			<script>
  				$(function () {
  					$('#example1').DataTable()
  					$('#example2').DataTable({
  						'paging'      : true,
  						'lengthChange': false,
  						'searching'   : false,
  						'ordering'    : true,
  						'info'        : true,
  						'autoWidth'   : false
  					})
  				})
  			</script>


  			<script>
  				$(function () {

    //Date picker
    $('#datepicker').datepicker({
    	autoclose: true,
    	format:"yyyy-mm-dd"

    });

    $('#datepicker1').datepicker({
    	autoclose: true,
    	format:"yyyy-mm-dd"

    });

    $('#datepicker2').datepicker({
    	autoclose: true,
    	format:"yyyy-mm-dd"

    });

    $('#datepicker3').datepicker({
    	autoclose: true,
    	format:"yyyy-mm-dd"

    });


})
</script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
 -->  <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
 -->
<script type="text/javascript">


	$(document).ready(function(){
		$('.form-checkbox').click(function(){
			if ($(this).is(':checked')) {
				$('#show').attr('type','text');
				$('#show1').attr('type','text');
			}else{
				$('#show').attr('type','password');
				$('#show1').attr('type','password');
			}
		});
	});
</script>

<script type="text/javascript">
var ctx = document.getElementById('myyChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Surat Masuk', 'Surat Keluar'],
        datasets: [{
             label: 'Data bulan <?= date("M") ?>',
            data: [<?= $jml_surat_masuk; ?>, <?= $jml_surat_keluar; ?>],
            backgroundColor: [
          
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                // 'rgba(255, 206, 86, 0.2)',
                // 'rgba(75, 192, 192, 0.2)',
                // 'rgba(153, 102, 255, 0.2)',
                // 'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
           
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                // 'rgba(255, 206, 86, 1)',
                // 'rgba(75, 192, 192, 1)',
                // 'rgba(153, 102, 255, 1)',
                // 'rgba(255, 159, 64, 1)'
            ],

            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

setInterval(function(){
  window.location.href="<?= base_url() ?>c_login/logout";
},600000)
</script>


</body>
</html>
