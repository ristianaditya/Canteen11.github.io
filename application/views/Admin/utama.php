<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Admin : Canteen11</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="<?php echo base_url(); ?>assets/image/serve.png" rel="shortcut icon"/>
		<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
		<link href="<?php echo base_url() ;?>assets_be/css/lib/font-awesome.min.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		 <link href="<?php echo base_url() ;?>assets_be/css/lib/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url() ;?>assets/plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ;?>assets/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ;?>assets/plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ;?>assets/plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ;?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="<?php echo base_url() ;?>assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ;?>assets/plugins/jvectormap/jquery-jvectormap.css">
        <link rel="stylesheet" href="<?php echo base_url() ;?>assets/plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ;?>assets/plugins/weather-icons/css/weather-icons.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ;?>assets/plugins/c3/c3.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ;?>assets/plugins/owl.carousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ;?>assets/plugins/owl.carousel/dist/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ;?>assets/dist/css/theme.min.css">
        <script src="<?php echo base_url() ;?>assets/src/js/vendor/modernizr-2.8.3.min.js"></script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    </head>

    <body>
        <div class="wrapper">
            <header class="header-top" header-theme="dark">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <div class="top-menu d-flex align-items-center">
                            <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                            <div class="header-search">
                                <div class="input-group">
                                    <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
									<button type="button" class="nav-link ml-10" id="apps_modal_btn" data-toggle="modal" data-target="#appsModal"><i class="ik ik-grid"></i></button>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
							<a  href="#" data-toggle="modal" data-target="#export" class="btn btn-danger">Download Report</a>
                        </div>
                        <div class="top-menu d-flex align-items-center">
							<a style="color:white"><b>Admin</b></a>
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="<?php echo base_url(); ?>assets/image/man.png" alt=""></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="<?php echo base_url() ;?>index.php/Admin/Admin/data_admin"><i class="ik ik-user dropdown-icon"></i> Profile</a>
                                    <a class="dropdown-item" href="" class="dropdown-item"  data-toggle='modal' data-target='#logout'><i class="ik ik-power dropdown-icon"></i> Logout</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </header>

            <div class="page-wrap">
                <div class="app-sidebar colored">
                    <div class="sidebar-header">
                        <a class="header-brand" href="<?php echo base_url() ;?>index.php/Admin/Admin">
                           	<img src="<?php echo base_url() ;?>assets_frontend/images/icons/logo10.png" height="40px;" alt="IMG-LOGO">
                        </a>
                        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
                        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                    </div>
                    
                    <div class="sidebar-content">
                        <div class="nav-container">
                            <nav id="main-menu-navigation" class="navigation-main">
								<div class="nav-lavel">Main</div>
                                <div class="nav-item">
                                    <a href="<?php echo base_url() ;?>index.php/Admin/Admin"><i class="ik ik-home"></i><span>Dashboard</span></a>
                                </div>
								<div class="nav-lavel">Features</div>
								<div class="nav-item">
                                    <a href="<?php echo base_url() ;?>index.php/Admin/Sekolah/data_sekolah" ><i class="ik ik-map"></i><span>Data Sekolah</span></a>
                                </div>
								<div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Data Akun</span></a>
                                    <div class="submenu-content">
                                        <a href="<?php echo base_url() ;?>index.php/Admin/Akun/data_pembeli" class="menu-item">Akun Pembeli</a>
                                        <a href="<?php echo base_url() ;?>index.php/Admin/Akun/data_penjual" class="menu-item">Akun Penjual</a>
                                    </div>
                                </div>
								<div class="nav-item">
                                    <a href="<?php echo base_url() ;?>index.php/Admin/Saldo/data_saldo" ><i class="ik ik-upload"></i><span>Pengisian Saldo</span></a>
                                </div>
								<div class="nav-item">
                                    <a href="<?php echo base_url() ;?>index.php/Admin/Kategori/data_kategori" ><i class="ik ik-server"></i><span>Kategori Produk</span></a>
                                </div>
								<div class="nav-item">
                                    <a href="<?php echo base_url() ;?>index.php/Admin/Kantin/data_kantin" ><i class="ik ik-shopping-bag"></i><span>Data Kantin</span></a>
                                </div>
								<div class="nav-item">
                                    <a href="<?php echo base_url() ;?>index.php/Admin/Produk/data_produk" ><i class="ik ik-box"></i><span>Data Produk</span></a>
                                </div>
								<div class="nav-item">
                                    <a href="<?php echo base_url() ;?>index.php/Admin/Transaksi/transaksi" ><i class="ik ik-file-text"></i><span>Total Transaksi</span></a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="main-content">
                    <div class="container-fluid">
							<?php
								$this->load->view($konten);
							?>
                    </div>
                </div>
                <footer class="footer">
                    <div class="w-100 clearfix">
                        <span class="text-center text-sm-left d-md-inline-block">Copyright © SAIBER TIM SMKN 11 BANDUNG <?= date("Y") ;?></span>
                    </div>
                </footer>
                
            </div>
        </div>
        
        
        

        <div class="modal fade apps-modal" id="appsModal" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel" aria-hidden="true" data-backdrop="false">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ik ik-x-circle"></i></button>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                   
                    <div class="modal-body d-flex align-items-center">
                        <div class="container">
                            <div class="apps-wrap">
                                <div class="app-item">
                                     <a href="<?php echo base_url() ;?>index.php/Admin/Admin"><i class="ik ik-home"></i><span>Dashboard</span></a>
                                </div>
								 <div class="app-item">
                                    <a href="<?php echo base_url() ;?>index.php/Admin/Sekolah/data_sekolah" ><i class="ik ik-map"></i><span>Data Sekolah</span></a>
                                </div>
                                <div class="app-item dropdown">
                                    <a href="#" class="dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-layers"></i><span>Data Akun</span></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
										<a class="dropdown-item" href="<?php echo base_url() ;?>index.php/Admin/Akun/data_pembeli" class="menu-item">Akun Pembeli</a>
                                        <a class="dropdown-item" href="<?php echo base_url() ;?>index.php/Admin/Akun/data_penjual" class="menu-item">Akun Penjual</a>
                                    </div>
                                </div>
                                <div class="app-item">
                                     <a href="<?php echo base_url() ;?>index.php/Admin/Kategori/data_kategori" ><i class="ik ik-server"></i><span>Kategori Produk</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="<?php echo base_url() ;?>index.php/Admin/Kantin/data_kantin" ><i class="ik ik-shopping-bag"></i><span>Data Kantin</span></a>
                                </div>
                                <div class="app-item">
                                     <a href="<?php echo base_url() ;?>index.php/Admin/Produk/data_produk" ><i class="ik ik-box"></i><span>Data Produk</span></a>
                                </div>
								<div class="app-item">
                                    <a href="<?php echo base_url() ;?>index.php/Admin/Transaksi/transaksi" ><i class="ik ik-file-text"></i><span>Total Transaksi</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!--Modal: modalConfirmlogout-->
		<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		  aria-hidden="true">
		  <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
			<!--Content-->
			<div class="modal-content text-center">
			  <!--Header-->
			  <div class="modal-header d-flex justify-content-center">
				  <p class="heading"><b>Yakin ingin Keluar ?</b></p>
			  </div>

			  <!--Body-->
			  <div class="modal-body">

				<i class="fas fa-times fa-4x animated rotateIn"></i>

			  </div>

			  <!--Footer-->
			  <div class="modal-footer flex-center">
				<a href="<?php echo base_url() ;?>index.php/Login/logout_admin" class="btn btn-danger">Logout</a>
				<a type="button" class="btn  btn-primary" style="color:white" data-dismiss="modal">No</a>
			  </div>
			</div>
			<!--/.Content-->
		  </div>
		</div>
		
		<!-- Modal -->
		<div class="modal fade" id="export" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel">Export To PDF</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			<form method="post" action="<?= base_url();?>index.php/Penjual/Export/admin">
			  <div class="modal-body">
				  <div class="form-group row" style="margin-bottom:-20px">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Bulan</label>
                      <div class="col-sm-9">
						<select class="form-control" name="bulan" style="height:40px;width:100%;">
								<option name="bulan" value="01">Januari</option>
								<option name="bulan" value="02">Februari</option>
								<option name="bulan" value="03">Maret</option>
								<option name="bulan" value="04">April</option>
								<option name="bulan" value="05">Mei</option>
								<option name="bulan" value="06">Juni</option>
								<option name="bulan" value="07">Juli</option>
								<option name="bulan" value="08">Agustus</option>
								<option name="bulan" value="09">September</option>
								<option name="bulan" value="10">Oktober</option>
								<option name="bulan" value="11">November</option>
								<option name="bulan" value="12">Desember</option>
						</select>	
                     </div>
                  </div>
				  
			  </div><br><br>
			  <div class="modal-footer">
				<button type="submit" class="btn btn-primary btn-block">Download</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
		
		<!--Modal: modalConfirmlogout-->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>
			window.jQuery || document.write('<script src="<?php echo base_url() ;?>assets/src/js/vendor/jquery-3.3.1.min.js"><\/script>')
		</script>
        <script src="<?php echo base_url() ;?>assets/plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="<?php echo base_url() ;?>assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ;?>assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="<?php echo base_url() ;?>assets/plugins/screenfull/dist/screenfull.js"></script>
        <script src="<?php echo base_url() ;?>assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ;?>assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo base_url() ;?>assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url() ;?>assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <script src="<?php echo base_url() ;?>assets/plugins/jvectormap/jquery-jvectormap.min.js"></script>
        <script src="<?php echo base_url() ;?>assets/plugins/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js"></script>
        <script src="<?php echo base_url() ;?>assets/plugins/moment/moment.js"></script>
        <script src="<?php echo base_url() ;?>assets/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="<?php echo base_url() ;?>assets/plugins/d3/dist/d3.min.js"></script>
        <script src="<?php echo base_url() ;?>assets/plugins/c3/c3.min.js"></script>
        <script src="<?php echo base_url() ;?>assets/js/tables.js"></script>
        <script src="<?php echo base_url() ;?>assets/js/widgets.js"></script>
        <script src="<?php echo base_url() ;?>assets/js/charts.js"></script>
        <script src="<?php echo base_url() ;?>assets/dist/js/theme.min.js"></script>
		<script src="<?php echo base_url() ;?>assets_frontend/vendor/select2/select2.min.js"></script>
		<script>
			$(".js-select2").each(function(){
				$(this).select2({
					minimumResultsForSearch: 20,
					dropdownParent: $(this).next('.dropDownSelect2')
				});
			})
		</script>
		<script>
			var $disabledResults = $(".js-example-disabled-results");
			$disabledResults.select2();
	</script>
    </body>
	<script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
    </script>
	
	<?php
	$data = $this->session->flashdata('data');
	if ($data == 1)
	{?>
		<script> 
			Swal.fire({
			  position: 'top-end',
			  icon: 'success',
			  toast: true,
			  title: 'Data Anda Berhasil Di Tambahkan',
			  showConfirmButton: false,
			  timer: 2700,
			  timerProgressBar: true
			}) 
		</script>
	<?php }
	else if($data == 2)
	{?>
		<script> 
			Swal.fire({
			  position: 'top-end',
			  icon: 'error',
			  toast: true,
			  title: 'Data Anda Gagal untuk Diperbarui!',
			  showConfirmButton: false,
			  timer: 2700,
			  timerProgressBar: true
			}) 
		</script>
	<?php }
	else if ($data == 3)
	{ ?>
		<script> 
			Swal.fire({
			  position: 'top-end',
			  icon: 'success',
			  toast: true,
			  title: 'Data Anda Berhasil Dihapus',
			  showConfirmButton: false,
			  timer: 2700,
			  timerProgressBar: true
			}) 
		</script>
	<?php }
	else if ($data == 4)
	{ ?>
		<script> 
			Swal.fire({
			  position: 'top-end',
			  icon: 'warning',
			  toast: true,
			  title: 'Data ini masih terkait. Coba lagi nanti !!!',
			  showConfirmButton: false,
			  timer: 2700,
			  timerProgressBar: true
			}) 
		</script>
	<?php }
	else if ($data == 5)
	{ ?>
		<script> 
			Swal.fire({
			  position: 'top-end',
			  icon: 'success',
			  toast: true,
			  title: 'Data berhasil di perbarui !!!',
			  showConfirmButton: false,
			  timer: 2700,
			  timerProgressBar: true
			}) 
		</script>
	<?php }
	else if($data == 6)
	{ ?>
		<script>
			Swal.fire({
				position:'top-end',
				icon:'success',
				toast: true,
				title:'Password anda Berhasil diubah',
				showConfirmButton:false,
				timer: 2700,
				timerProgressBar: true
			});
		</script>
	<?php }
	else if($data == 7)
	{ ?>
		<script>
			Swal.fire({
				position:'top-end',
				icon:'error',
				toast: true,
				title:'Password Gagal diubah !!!',
				showConfirmButton:false,
				timer: 2700,
				timerProgressBar: true
			});
		</script>
	<?php }
	else if($data == 9)
	{ ?>
		<script>
			Swal.fire({
				position:'top-end',
				icon:'success',
				toast: true,
				title:'Selamat Datang di Web Admin',
				showConfirmButton:false,
				timer: 2700,
				timerProgressBar: true
			});
		</script>
	<?php }
	?>
</html>

