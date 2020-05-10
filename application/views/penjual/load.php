<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Canteen 11 : Penjual
  </title>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <!-- Favicon -->
  <link href="<?= base_url()?>/assets/image/serve.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>assets_frontend/vendor/bootstrap/css/bootstrap.min.css">
  <!-- Icons -->
  <link href="<?= base_url()?>/assets_penjual/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="<?= base_url()?>/assets_penjual/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="<?= base_url()?>/assets_penjual/css/argon-dashboard.css?v=1.1.1" rel="stylesheet" />
	<!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
</head>

<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="header-brand" href="<?php echo base_url() ;?>index.php/Penjual/Utama">
         <img src="<?php echo base_url() ;?>assets_frontend/images/icons/logo09.png" class="navbar-brand-img" height="40px;" alt="IMG-LOGO">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link" href="<?= base_url()?>#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <?php if(empty($profile->foto)) {?>
						<img src="<?php echo base_url() ;?>assets/image/loader1.gif" style="height:38px;width:40px">
					<?php } else { ?>
						<img src="<?php echo base_url() ;?><?= $profile->foto ;?>" style="max-height:36px;width:100px">
					<?php }?>
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="<?= base_url()?>index.php/penjual/utama/edit_profile" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My Profile</span>
              </a>
            <div class="dropdown-divider"></div>
             <a href="#" class="dropdown-item"  data-toggle="modal" data-target="#closed">
                <i class="ni ni-button-power"></i>
               
					<?php if($profile->status_kantin == 1){?>
				  		<span>Open Canteen</span>
					<?php }else if(($profile->status_kantin == 2)){ ?>
						<span>Closed Canteen</span>
					<?php }?>
				
              </a>
              <a href="#" class="dropdown-item"  data-toggle="modal" data-target="#logout">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="<?= base_url()?>./index.html">
                 <img src="<?php echo base_url() ;?>assets_frontend/images/icons/logo09.png" class="navbar-brand-img" height="40px;" alt="IMG-LOGO">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <ul class="navbar-nav">
          <li class="nav-item  active ">
            <a class="nav-link active " href="<?= base_url()?>index.php/penjual/Utama">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
		 <li class="nav-item  active ">
            <a class="nav-link active " href="<?= base_url()?>index.php/penjual/Utama/produk">
              <i class="ni ni-briefcase-24 text-info"></i> Produk
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="<?= base_url()?>index.php/Penjual/Utama/pesanan">
              <i class="ni ni-check-bold text-red"></i> Pesanan
				<?php if(empty($jml_pesanan)){ }else{?>
				<span class="badge badge-warning"style="color:red;margin-left:10px">
					<?= $jml_pesanan;}?>
				</span>
            </a>
		</li>
		<li class="nav-item">
            <a class="nav-link active" href="<?= base_url()?>index.php/Penjual/Utama/proses_pesanan">
              <i class="ni ni-box-2 text-yellow"></i> Proses Pesanan
				<?php if(empty($jml_proses)){ }else{?>
				<span class="badge badge-warning"style="color:red;margin-left:10px">
					<?= $jml_proses;}?>
				</span>
            </a>
          </li>
		<li class="nav-item">
            <a class="nav-link active" href="<?= base_url()?>index.php/Penjual/Utama/riwayat_transaksi">
              <i class="ni ni-bag-17 text-success"></i> Riwayat Transaksi
            </a>
          </li>
			<li class="nav-item">
            <a class="nav-link active" href="<?= base_url()?>index.php/Penjual/Utama/feedback">
              <i class="fas fa-comments text-danger"></i> Feedback
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a href="#" data-toggle="modal" data-target="#export" class="btn btn-danger" style="color:white"><i class="fas fa-file-pdf"></i> Download  Rekap</a>
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span >
					<?php if(empty($profile->foto)) {?>
						<img class="avatar avatar-sm rounded-circle" src="<?php echo base_url() ;?>assets/image/loader1.gif" style="height:38px;width:40px">
					<?php } else { ?>
						<img class="avatar avatar-sm rounded-circle" src="<?php echo base_url() ;?><?= $profile->foto ;?>" style="max-height:36px;width:40px">
					<?php }?>
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?= strtoupper($profile->nama) ;?></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class= "dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="<?= base_url()?>index.php/penjual/utama/edit_profile" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My Profile</span>
              </a>
			  <a href="#" class="dropdown-item"  data-toggle="modal" data-target="#closed">
                <i class="ni ni-button-power"></i>
               
					<?php if($profile->status_kantin == 1){?>
				  		<span>Open Canteen</span>
					<?php }else if(($profile->status_kantin == 2)){ ?>
						<span>Closed Canteen</span>
					<?php }?>
				
              </a>
              <a href="#" class="dropdown-item"  data-toggle="modal" data-target="#logout">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
	  
	  <!-- Modal -->
		<div class="modal fade" id="export" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h2 class="modal-title" id="exampleModalLabel">Export To PDF</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			<form method="post" action="<?= base_url();?>index.php/Penjual/Export/">
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
				  
			  </div>
			  <div class="modal-footer">
				<button type="submit" class="btn btn-primary btn-block">Download</button>
			  </div>
			</form>
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
				<p class="heading">Yakin ingin Keluar ?</p>
			  </div>

			  <!--Body-->
			  <div class="modal-body">

				<i class="fas fa-times fa-4x animated rotateIn"></i>

			  </div>

			  <!--Footer-->
			  <div class="modal-footer flex-center">
				<a  href="<?php echo base_url(); ?>index.php/Login/logout_penjual" class="btn  btn-danger">Logout</a>
				<a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
			  </div>
			</div>
			<!--/.Content-->
		  </div>
		</div>
		<!--Modal: modalConfirmlogout-->
	  
	  <!--Modal: modalConfirmclosed-->
		<div class="modal fade" id="closed" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		  aria-hidden="true">
		  <div class="modal-dialog modal-sm modal-notify modal-success" role="document">
			<!--Content-->
			<div class="modal-content text-center">
			  <!--Header-->
			  <div class="modal-header d-flex justify-content-center">
				  	<?php if($profile->status_kantin == 1){?>
				   <p class="heading">Apakah anda yakin ingin membuka kantin ?</p>
					<?php }else if(($profile->status_kantin == 2)){ ?>
						<p class="heading">Apakah anda yakin ingin menutup kantin ?</p>
					<?php }?>
			  </div>

			  <!--Body-->
			  <div class="modal-body">

				<i class="ni ni-check-bold fa-4x animated rotateIn"></i>

			  </div>

			  <!--Footer-->
			  <div class="modal-footer flex-center">
				  <?php if($profile->status_kantin == 1){?>
				  			<a href="<?php echo base_url(); ?>index.php/Penjual/Utama/open_kantin" class="btn btn-success">Open</a>
					<?php }else if(($profile->status_kantin == 2)){ ?>
						 <a href="<?php echo base_url(); ?>index.php/Penjual/Utama/closed_kantin" class="btn btn-success">Closed</a>
					<?php }?>
				<a type="button" class="btn  btn-success waves-effect" data-dismiss="modal">No</a>
			  </div>
			</div>
			<!--/.Content-->
		  </div>
		</div>
		<!--Modal: modalClosed-->
    <?php
    	$this->load->view($konten);
    ?>
    <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2019 <a href="#" class="font-weight-bold ml-1" target="_blank">Tim Saiber SMKN 11</a>
            </div>
          </div>
        </div>
      </footer>
</div>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
	<script src="<?php echo base_url() ;?>assets_frontend/vendor/bootstrap/js/popper.js">
    </script>
    <script src="<?php echo base_url() ;?>assets_frontend/vendor/bootstrap/js/bootstrap.min.js">
    </script>
  <!--   Core   -->
  <script src="<?= base_url()?>/assets_penjual/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url()?>/assets_penjual/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="<?= base_url()?>/assets_penjual/js/plugins/chart.js/dist/Chart.min.js"></script>
  <script src="<?= base_url()?>/assets_penjual/js/plugins/chart.js/dist/Chart.extension.js"></script>
  <!--   Argon JS   -->
  <script src="<?= base_url()?>/assets_penjual/js/argon-dashboard.min.js?v=1.1.1"></script>
  <script src="<?= base_url()?>https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <!--Modal: modalConfirmlogout-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
	<?php
	$data = $this->session->flashdata('alert');
	if ($data == 1)
	{?>
		<script> 
			Swal.fire({
			  position: 'top-end',
			  icon: 'success',
			  toast: true,
			  title: 'Pesanan berhasil diterima',
			  showConfirmButton: false,
			  timer: 2700,
			  timerProgressBar: true
			}) 
		</script>
	<?php } else if ($data == 2)
	{?>
		<script> 
			Swal.fire({
			  position: 'top-end',
			  icon: 'success',
			  toast: true,
			  title: 'Status Pesanan berhasil diubah',
			  showConfirmButton: false,
			  timer: 2700,
			  timerProgressBar: true
			}) 
		</script>
	<?php } else if ($data == 3)
	{?>
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
	<?php } else if ($data == 4)
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
	<?php } else if($data == 5)
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
	<?php } else if($data == 6)
	{?>
		<script> 
			Swal.fire({
			  position: 'top-end',
			  icon: 'success',
			  toast: true,
			  title: 'the canteen has opened',
			  showConfirmButton: false,
			  timer: 2700,
			  timerProgressBar: true
			}) 
		</script>
	<?php } else if($data == 7)
	{?>
		<script> 
			Swal.fire({
			  position: 'top-end',
			  icon: 'success',
			  toast: true,
			  title: 'The canteen is closed',
			  showConfirmButton: false,
			  timer: 2700,
			  timerProgressBar: true
			}) 
		</script>
	<?php } ?>
</body>
</html>