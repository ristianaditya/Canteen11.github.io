<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Canteen11</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->	
    <link href="<?php echo base_url(); ?>assets/image/serve.png" rel="shortcut icon"/>
    <link rel="stylesheet" href="<?php echo base_url() ;?>css/style.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>assets_frontend/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>assets_frontend/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>assets_frontend/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>assets_frontend/fonts/linearicons-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>assets_frontend/vendor/animate/animate.css">
    <!--===============================================================================================-->	
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>assets_frontend/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>assets_frontend/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>assets_frontend/vendor/select2/select2.min.css">
    <!--===============================================================================================-->	
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>assets_frontend/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>assets_frontend/vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>assets_frontend/vendor/MagnificPopup/magnific-popup.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>assets_frontend/vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>assets_frontend/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>assets_frontend/css/main.css">
    <!--===============================================================================================-->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	<!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  	<!-- Material Design Bootstrap -->
  	<link rel="stylesheet" href="<?php echo base_url() ;?>MDB/css/mdb.min.css">
  	<link rel="stylesheet" href="<?php echo base_url() ;?>MDB/css/mdb.lite.min.css">
  	<link rel="stylesheet" href="<?php echo base_url() ;?>MDB/css/cards-extended.min.css">
  	<link rel="stylesheet" href="<?php echo base_url() ;?>MDB/css/cards-extended.css">
	<style>
		@import url('https://fonts.googleapis.com/css?family=Muli&display=swap');
			@import url('https://fonts.googleapis.com/css?family=Monserrat&display=swap');

			* {
				box-sizing: border-box;
			}
			.panel-container {
				background-color: #fff;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
				border-radius: 4px;
				font-size: 90%;
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;
				padding: 30px;
				max-width: 400px;
				text-align: center;
			}

			.panel-container strong {
				line-height: 20px;
			}

			.panel-container p {
				margin: 25px 0;
				line-height: 20px;
			}

			.ratings-container {
				display: flex;
				margin: 20px 0;
			}

			.rating {
				cursor: pointer;
				flex: 1;
				padding: 20px;
				margin: 10px 5px;
			}

			.rating.active, .rating:hover {
				border-radius: 4px;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			}

			.rating img {
				width: 40px;
			}

			.rating small {
				color: #555;
				display: inline-block;
				margin: 10px 0 0;
			}

			.rating.active small, .rating:hover small {
				color: #111;
			}

			.btn {
				background-color: #302D2B;
				border: 0;
				border-radius: 4px;
				color: #fff;
				cursor: pointer;
				padding: 12px 30px;
			}
			input.error, textarea.error {border: 1px dotted red;}
			label.error, label.error{
				color: red;
				font-style: italic
			};
			 @fonts-face{
				font-family: "Rubik";
				src: url(/assets/fonts/Rubik/Rubik-Light.ttf);
			}
			.rubik{
				font-family: "Rubik";

			}
			.soldout {
				background: #f5365c;
				color: #fff;
				font-size: 14px;
				font-weight: 700;
				padding: 6px 12px;
				position: absolute;
				right: 0;
				top: 0;
			}
	</style>
		
  </head>
  <body>
    <!-- Header -->
    <header class="header-v2">
		
      <!-- Header desktop -->
      <div class="container-menu-desktop ">
        <div class="wrap-menu-desktop">
          <nav class="limiter-menu-desktop container">
			  
            <!-- Logo desktop -->		
            <a href="#" class="logo">
              <img src="<?php echo base_url() ;?>assets_frontend/images/icons/logo09.png" height="200px;" alt="IMG-LOGO">
            </a>
			  
            <!-- Menu desktop -->
            <div class="menu-desktop">
              <ul class="main-menu">
                <li >
                  <a  href="<?php echo base_url() ;?>index.php/Utama">Home
                  </a>
                </li>
                <li>
                  <a href="<?php echo base_url() ;?>index.php/Canteen/kantin">Kantin
                  </a>
                </li>
                <li class="label1" data-label1="hot">
                  <a  href="<?php echo base_url() ;?>index.php/Produk/produk">Produk
                  </a>
                </li>
                <?php if($jumlah_payment >= 1){?>
                <li class="label1" data-label1="Process">
                  <a  href="<?php echo base_url() ;?>index.php/Payment">Payment
                  </a>
                </li>
                <?php }?>
                <li>
                  <a  href="<?php echo base_url() ;?>index.php/Contact/contact">Contact
                  </a>
                </li>
              </ul>
            </div>	
			  
           <!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="
						<?php 
							if(!isset($jumlah)){
								echo 0 ;
							}else{ 
								echo $jumlah ;};
						?>">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>
                           <div style="margin-left:13px;" class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
							<a href="#" data-toggle="modal" data-target="#profile" style="color:black">
							<i class="zmdi zmdi-menu">
							</i>
						  </a>
						  </div>
					</div>
          </nav>
        </div>	
      </div>
		
      <!-- Header Mobile -->
      <div class="wrap-header-mobile">
		  
        <!-- Logo moblie -->		
        <div class="logo-mobile">
          <a href="<?php echo base_url() ;?>index.php/Utama">
            <img src="<?php echo base_url() ;?>assets_frontend/images/icons/logo09.png" alt="IMG-LOGO">
          </a>
        </div>
		  
        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
          <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
            <i class="zmdi zmdi-search">
            </i>
          </div>
          <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="
            <?php 
             if(!isset($jumlah)){
             	echo 0 ;
             }else{ 
             echo $jumlah ;};
            ?>">
            <i class="zmdi zmdi-shopping-cart">
            </i>
          </div>
          <button type="button" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-11" id="apps_modal_btn" data-toggle="modal" data-target="#appsModal">
            <i class="ik ik-grid">
            </i>
          </button>
			<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-sidebar" style="margin-top:-7px;">
                    <a style="max-height:10px;margin-left:-20px;"  href="#" data-toggle="modal" data-target="#profile" style="color:black">
					   <i class="fas fa-user" style="color:black"></i>
					  </a>
                 </div>
        </div>
		  
        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze" style="margin-left:-10px;" >
          <span class="hamburger-box">
            <span class="hamburger-inner">
            </span>
          </span>
        </div>
      </div>
		
      <!-- Menu Mobile -->
      <div class="menu-mobile">
        <ul class="main-menu-m">
          <li >
            <a  href="<?php echo base_url() ;?>index.php/Utama">Home
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ;?>index.php/Canteen/kantin">Kantin
            </a>
            <ul class="sub-menu-m">
              <?php foreach($kantin as $a) { ?>
              <li>
                <a href="index.html">
                  <?php echo $a->nama_kantin ;?>
                </a>
              </li>
              <?php } ?>
            </ul>
            <span class="arrow-main-menu-m">
              <i class="fa fa-angle-right" aria-hidden="true">
              </i>
            </span>
          </li>
          <li>
            <a  href="<?php echo base_url() ;?>index.php/Produk/produk"  class="label1 rs1" data-label1="hot">Produk
            </a>
          </li>
          <?php if($jumlah_payment >= 1){?>
          <li>
            <a  href="<?php echo base_url() ;?>index.php/Payment"  class="label1 rs1" data-label1="Process">Payment
            </a>
          </li>
          <?php }?>
          <li>
            <a  href="<?php echo base_url() ;?>index.php/Contact/contact">Contact
            </a>
          </li>
        </ul>
      </div>
		
      <!-- Modal Search -->
      <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
          <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
            <img src="<?php echo base_url() ;?>assets_frontend/images/icons/icon-close2.png" alt="CLOSE">
          </button>
          <form class="wrap-search-header flex-w p-l-15" method="post" action="<?php echo base_url() ;?>index.php/Produk/search_produk">
            <button class="flex-c-m trans-04">
              <i class="zmdi zmdi-search">
              </i>
            </button>
            <input class="plh3" type="text" name="search" placeholder="Search...">
          </form>
        </div>
      </div>
    </header>
	  
    <!-- Modal: modal -->
    <div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
      <div class="modal-dialog modal-full-height modal-right" role="document">
        <div class="modal-content" style="max-width:0%">
          <!--Body-->
          <div>
             <nav id="sidebar">
            <div class="img bg-wrap text-center py-4" style="background-image: url(<?php echo base_url() ;?>css/images/images.jfif);">
              <div class="user-logo">
				  	<?php if(empty($profile->foto)) {?>
							<div class="img" style="background-image: url(<?php echo base_url() ;?>assets/image/loader1.gif);"></div>
					<?php } else { ?>
						<div class="img" style="background-image: url(<?php echo base_url() ;?><?= $profile->foto ;?>);"></div>
					<?php }?>
                <h3>
					<?php if(empty($profile->nama)) {
							echo "USER";
					 } else { 
						echo strtoupper($profile->nama);
					}?>
                </h3>
              </div>
            </div>
            <ul class="list-unstyled components mb-5">
				 <?php 
				if($this->session->userdata('status_fe') == "login")
				{ ?>
				<li class="active">
					<a href="<?php echo base_url() ;?>index.php/Profile/profile">
						<i class="fas fa-user-circle">
					</i> Profile
					</a>
              	</li>
				<li class="active">
					<a href="#" data-toggle="modal" data-target="#saldo" data-dismiss="modal">
						<i class="fas fa-dollar-sign"></i> Saldo ( <?= "Rp. ".number_format($profile->saldo) ?> )
					</a>
              	</li>
				<li class="active">
					<a href="#" data-toggle="modal" data-target="#riwayat" data-dismiss="modal">
						<i class="fas fa-history">
                		</i> Riwayat
					</a>
              	</li>
				  <li class="active">
					<a href="#" data-toggle="modal" data-target="#logout" data-dismiss="modal">
					  <i class="fas fa-sign-out-alt">
                	  </i> Sign Out
					</a>
				  </li>
              <?php }
			else { ?>
				<li class="active">
					<a href="<?php echo base_url() ;?>index.php/Login/login">
					  <i class="fas fa-sign-in-alt">
                		</i> Login
					</a>
				  </li>
              <?php }
				?>
            </ul>
          </nav>
          </div>
        </div>
      </div>
    </div>
	  
	  						<!-- Modal: modalCart -->
								<div class="modal fade" id="riwayat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
								  aria-hidden="true">
								  <div class="modal-dialog modal-full-height modal-right" role="document">
									<div class="modal-content">
									  <!--Header-->
									  <div class="modal-header">
										<h4 class="modal-title" id="myModalLabel">Riwayat Transaksi</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">×</span>
										</button>
									  </div>
									  <!--Body-->
									  <div class="modal-body" style="overflow-y:scroll;max-height:570px;">

										<table class="table table-hover">
										  <thead>
											<tr>
											  <th>#</th>
											  <th>Nama Kantin</th>
											  <th>Total</th>
											  <th>Tanggal</th>
											</tr>
										  </thead>
										  <tbody>
											  <?php $i=1; foreach($riwayat as $riwayat) {?>
											<tr>
											  <th scope="row"><?= $i++ ;?></th>
											  <td><?= $riwayat->nama_kantin ;?></td>
											  <td><?= $riwayat->total_harga ;?></td>
											  <td><?= $riwayat->tanggal ;?></td>
											</tr>
											  <?php }?>
										  </tbody>
										</table>
										  <a href="<?= base_url();?>index.php/Payment/riwayat_pdf" class="btn btn-danger btn-block" style="max-height:50px;">Lebih Lengkap dengan Download Pdf</a>
									  </div>
									</div>
								  </div>
								</div>
								<!-- Modal: modalCart -->	  
	  
    <!--Modal: modalConfirmlogout-->
    <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
      <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
        <!--Content-->
        <div class="modal-content text-center">
          <!--Header-->
          <div class="modal-header d-flex justify-content-center">
            <p class="heading">Yakin ingin Keluar ?
            </p>
          </div>
          <!--Body-->
          <div class="modal-body">
            <i class="fas fa-times fa-4x animated rotateIn">
            </i>
          </div>
          <!--Footer-->
          <div class="modal-footer flex-center">
            <a  href="<?php echo base_url(); ?>index.php/Login/logout" class="btn  btn-outline-danger">Logout
            </a>
            <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No
            </a>
          </div>
        </div>
        <!--/.Content-->
      </div>
    </div>
    <!--Modal: modalConfirmlogout-->
	  
	   <!-- Central Modal Small -->
	<div class="modal fade " id="penilaian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	  aria-hidden="true">

		  <!-- Change class .modal-sm to change the size of the modal -->
		  <div class="modal-dialog modal-sm" role="document">
			<div class="modal-content" style="min-width:330px;">
				<form action="<?= base_url();?>index.php/Produk/penilaian" method="post">
					<div id="panel" class="panel-container">
						<h5><b>How satisfied are you with our<br /> customer support performance?</b></h5>
						<div class="ratings-container">
							<button type="submit" name="rating" value="1" class="rating " style="background-color: white">
								<img src="https://image.flaticon.com/icons/svg/187/187150.svg" alt=""/>
								<small>Unhappy</small>
							</button>
							<button type="submit" name="rating" value="3" class="rating " style="background-color: white">
								<img src="https://image.flaticon.com/icons/svg/187/187136.svg" alt=""/>
								<small>Neutral</small>
							</button>
							<button type="submit" name="rating" value="5" class="rating " style="background-color: white">
								<img src="https://image.flaticon.com/icons/svg/187/187133.svg" alt=""/>
								<small>Satisfied</small>
							</button>
							<input hidden name="id_kantin" type="text" value="<?= $this->session->flashdata('kantin') ;?>" >
						</div>
						<textarea name="deskripsi" style="width:100%;width: 100%;height: 100px;padding: 12px 20px;box-sizing: border-box;border: 2px solid #ccc;border-radius: 4px;background-color: #f8f8f8;resize: none;" placeholder="Masukan deskripsi" required></textarea>
						<a style="color:red;margin-bottom:30px">**Harap Masukan deskripsi penilaian terlebih dahulu sebelum memilih rating!!!</a>
						<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
					</div>
				</form>
		  </div>
		</div>
	</div>
		
	<!-- Central Modal Small --> 
	  
	 <!-- Central Modal Small -->
	<div class="modal fade" id="saldo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	  aria-hidden="true">

	  <!-- Change class .modal-sm to change the size of the modal -->
	  <div class="modal-dialog modal-sm" role="document">


		<div class="modal-content">
		  <div class="modal-header">
			<h4 class="modal-title w-100" id="myModalLabel">Top Up</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
			<?php echo form_open_multipart($this->uri->segment(1).'/pengajuan_saldo/') ;?>
		  <div class="modal-body">
			<div class="form-group">
				<label>Pilih Nominal Saldo</label>
				<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
					<select class="js-select2" name="nominal" required>
						<option >Masukan Metode Pembayaran</option>
						<option value="10000">Rp. 10.000</option>
						<option value="20000">Rp. 20.000</option>
						<option value="30000">Rp. 30.000</option>
						<option value="40000">Rp. 40.000</option>
						<option value="50000">Rp. 50.000</option>
						<option value="100000">Rp. 100.000</option>
						<option value="200000">Rp. 200.000</option>
					</select>
					<div class="dropDownSelect2"></div>
				</div>
			</div>
			  <div class="form-group">
				  <label>Masukan Bukti Transfer</label>
				  <div class="file-field">
					<div class="btn btn-primary btn-sm float-left">
					  <span>Choose file</span>
					  <input class="file-uploads" type="file" name="foto" />
					</div>
					<div class="file-path-wrapper">
					  <input class="file-path validate" type="text" placeholder="Bukti Transfer">
					</div>
				  </div>
			  </div>
			  <p style="color:red">*Pastikan anda telah transfer ke No rekening ini 231345345545. </p>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary btn-sm">Kirim</button>
		  </div>
		<?php echo form_close() ;?>
		</div>
	  </div>
	</div>
	<!-- Central Modal Small --> 
	  
    <!-- Cart -->
    <div class="wrap-header-cart js-panel-cart">
      <div class="s-full js-hide-cart">
      </div>
      <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
          <span class="mtext-103 cl2">
            Your Cart
          </span>
          <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
            <i class="zmdi zmdi-close">
            </i>
          </div>
        </div>
        <div class="header-cart-content flex-w js-pscroll">
          <ul class="header-cart-wrapitem w-full">
            <?php foreach($keranjang as $data) {?>
            <li class="header-cart-item flex-w flex-t m-b-12">
				
              <?php $this->session->set_flashdata('link', $this->uri->segment(3));?>
              <a href="<?php echo base_url() ;?>index.php/<?= $this->uri->segment(1)?>/delete_pesanan/<?= $data->id_dafpes;?>/<?= $data->id_kantin;?>/<?= $data->id_pesanan;?>">
                <div class="header-cart-item-img">
                  <img src="<?php echo base_url().$data->foto_produk ;?>" style="height:40px;" alt="IMG">
                </div>
              </a>
              <div class="header-cart-item-txt p-t-8">
                <?php echo $data->nama_produk ; if($data->status_produk == 1){ echo "<font style='color:red'> (Sold Out)</font>"; }?>
                <span class="header-cart-item-info">
                  <?php echo $data->jumlah_pesanan." x Rp. ".number_format($data->harga,2,",",".");?>
                </span>
              </div>
            </li>
            <?php }?>
          </ul>
          <div class="w-full">
            <div class="header-cart-total w-full p-tb-40">
              Total : 
              <?php echo "Rp. ".number_format($total->jumlah,2,",",".");?>
            </div>
            <div class="header-cart-buttons flex-w w-full">
              <?php if(empty($jumlah)){ }else {?>
				<?php if($validasi_checkout > 0){?>
             		<a class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10" style="color:white;width:100%" onclick="toastr.error('Salah satu produk sedang kosong');">Selengkapnya</a>
				<?php }else{?>
				<?php if($validasi_checkout1 > 0){?>
             		<a class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10" style="color:white;width:100%" onclick="toastr.error('Kantin Sedang tutup');">Selengkapnya</a>
				<?php }else{?>
				 <a href="<?php echo base_url() ;?>index.php/Utama/chart" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10" style="width:100%">
               Selengkapnya
				</a>
              <?php }}}?>
            </div>
          </div>
        </div>
      </div>
    </div>
	<div style="position:absolute; width: 100%;" >
	<!--===============================================================================================-->
    <?php
	$this->load->view($konten);
	?>
	<!--===============================================================================================-->
    <!-- Footer -->
    <footer class="bg3 p-t-75 p-b-32">
		  <div class="container">
			<div class="row">
			  <div class="col-sm-6 col-lg-3 p-b-50">
				<h4 class="stext-301 cl0 p-b-30">
				  Categories
				</h4>
				<ul>
				  <li class="p-b-10">
					<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
					  Minuman
					</a>
				  </li>
				  <li class="p-b-10">
					<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
					  Makanan Berat
					</a>
				  </li>
				  <li class="p-b-10">
					<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
					  Makanan Ringan
					</a>
				  </li>
				</ul>
			  </div>
			  <div class="col-sm-6 col-lg-3 p-b-50">
				<h4 class="stext-301 cl0 p-b-30">
				  Help
				</h4>
				<ul>
				  <li class="p-b-10">
					<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
					  Track Order
					</a>
				  </li>
				  <li class="p-b-10">
					<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
					  Returns 
					</a>
				  </li>
				  <li class="p-b-10">
					<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
					  Shipping
					</a>
				  </li>
				  <li class="p-b-10">
					<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
					  FAQs
					</a>
				  </li>
				</ul>
			  </div>
			  <div class="col-sm-6 col-lg-3 p-b-50">
				<h4 class="stext-301 cl0 p-b-30">
				  GET IN TOUCH
				</h4>
				<p class="stext-107 cl7 size-201">
				  SMK Negeri 11 Bandung, Jalan Budi Raya, Sukaraja, Kota Bandung, Jawa Barat
				</p>
				<div class="p-t-27">
				  <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
					<i class="fab fa-facebook-f"></i>
				  </a>
				  <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
					<i class="fab fa-youtube"></i>
				  </a>
				  <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
					<i class="fab fa-instagram"></i>
				  </a>
				</div>
			  </div>
			  <div class="col-sm-6 col-lg-3 p-b-50">
						<h4 class="stext-301 cl0 p-b-30">
							Contact
						</h4>

						<ul>
							<li class="p-b-10">
								<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
									<i class="fas fa-home mr-3"></i> Track Order
								</a>
							</li>
							<li class="p-b-10">
								<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
									<i class="fas fa-envelope mr-3"></i> Canteen11@gmail.com
								</a>
							</li>

							<li class="p-b-10">
								<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
									<i class="fas fa-phone mr-3"></i> 085352585451
								</a>
							</li>
						</ul>
					</div>
			</div>
			<div class="p-t-40">
			  <p class="stext-107 cl6 txt-center clearfix">
				Copyright © SAIBER TIM SMKN 11 BANDUNG 
				<?= date("Y") ;?>
			  </p>
			</div>
		  </div>
		</footer>

	</div>
    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
      <span class="symbol-btn-back-to-top">
        <i class="zmdi zmdi-chevron-up">
        </i>
      </span>
    </div>
	  
	
	<!-- rating.js file -->
	<script src="<?php echo base_url() ;?>MDB/js/addons/rating.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>
	<script>
		// Rating Initialization
			$(document).ready(function() {
			  $('#rateMe1').mdbRate();
			});
	</script>
	<!-- JQuery -->
	<script src="<?php echo base_url() ;?>MDB/js/jquery-3.4.1.min.js"></script>
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="<?php echo base_url() ;?>MDB/js/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="<?php echo base_url() ;?>MDB/js/bootstrap.js"></script>
    <!-- MDB core JavaScript -->
  	<script type="text/javascript" src="<?php echo base_url() ;?>MDB/js/mdb.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<!--===============================================================================================-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ;?>assets_frontend/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ;?>assets_frontend/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url() ;?>assets_frontend/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ;?>assets_frontend/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ;?>assets_frontend/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url() ;?>assets_frontend/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ;?>assets_frontend/vendor/slick/slick.min.js"></script>
	<script src="<?php echo base_url() ;?>assets_frontend/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ;?>assets_frontend/vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ;?>assets_frontend/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ;?>assets_frontend/vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ;?>assets_frontend/vendor/sweetalert/sweetalert.min.js"></script>
	<script src="<?php echo base_url() ;?>assets_frontend/jquery.validate.min.js"></script>
	<script src="<?php echo base_url() ;?>assets_frontend/jquery.validate.js"></script>
	
	<script>
			var $disabledResults = $(".js-example-disabled-results");
			$disabledResults.select2();
	</script>

<!--===============================================================================================-->
	<script src="<?php echo base_url() ;?>assets_frontend/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
	 <!--===============================================================================================-->
	  <script>
	  	$('#myBoton').on("click", function(){
        $('html, body').animate({scrollTop: 700}, 300);
    });
	  </script>
	<?php 
		if(empty($data_payment))
		{
			//kosong
		}
	  	else
		{
			//ambil status
			foreach($data_payment as $statuss)
			{
				$status_kantin = $statuss->status;
			}
			//memanggil modal sesuai kondisi
			if($status_kantin == 3)
			{
			  echo "<script>$('#info').modal('show');</script>";
			}
			if($status_kantin == 4)
			{
			  echo "<script>$('#info_konfirm').modal('show');</script>";
			}
		}
	?>
	  
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ;?>assets_frontend/js/main.js"></script>
	<!--===============================================================================================-->
    <?php
	$data = $this->session->flashdata('data');
	if ($data == 1)
	{ ?>
		<script>
			toastr.success('Pesan Anda Berhasil Terkirim');
		</script>
	<?php }
	else if($data == 2)
	{?>
		<script> 
			Swal.fire(
			  'Berhasil',
			  'Berhasil Masuk kedalam Daftar Keranjang',
			  'success'
			)
		</script>
	<?php }
	else if($data == 3)
	{ ?>
		<script>
			toastr.warning('Pesanan Anda Berhasil Dihapus');
		</script>
	<?php }
	else if($data == 4)
	{ ?>
		<script>
			toastr.success('Data Anda Berhasil Diperbarui');
		</script>
	<?php }
	else if($data == 5)
	{ ?>
		<script>
			toastr.error('Data Anda Gagal untuk Diperbarui!');
		</script>
	<?php }
	else if($data == 6)
	{ ?>
		<script>
			toastr.warning('Hanya bisa memuat 1 kantin!');
		</script>
	<?php }
	else if($data == 7)
	{ ?>
		<script>
			toastr.info('Pesanan sedang dalam Proses');
		</script>
	<?php }
	else if($data == 8)
	{ ?>
		<script>
			toastr.success('Pesanan Berhasil dibatalkan');
		</script>
	<?php }
	else if($data == 9)
	{ ?>
		<script>
			toastr.error('Harap isi detail Transaksi !!!');
		</script>
	<?php }
	else if($data == 10)
	{ ?>
		<script>
			toastr.warning('Proses Payment Belum Selesai !');
		</script>
	<?php }
	else if($data == 12)
	{ ?>
		<script>
			Swal.fire({
			  title: 'Success',
			  text: "Terimakasih anda sudah order ke kantin kami :)",
			  icon: 'success',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Berikan Penilaian '
			}).then((result) => {
			  if (result.value) {
				$('#penilaian').modal('show');
			  }
			})  
		</script>
	<?php }
	else if($data == 14)
	{ ?>
		<script>
			toastr.error('Saldo anda tidak mencukupi !');
		</script>
	<?php } else if($data == 15)
	{ ?>
		<script>
			toastr.error('Anda Belum Memilih Produk !');
		</script>
	<?php }
	else if($data == 16)
	{ ?>
		<script>
			toastr.error('Tunggu Hingga Top Up Selesai !');
		</script>
	<?php }
	else if($data == 17)
	{ ?>
		<script>
			toastr.success('Pengiriman Top Up Berhasil');
		</script>
	<?php }
	else if($data == 18)
	{ ?>
		<script>
			toastr.error('Bukti foto tidak valid');
		</script>
	<?php }
	else if($data == 19)
	{ ?>
		<script> 
			 
			Swal.fire(
			  'Success',
			  'Terimakasih sudah memberikan Penilaian',
			  'success'
			)
		</script>
	<?php }?>
  </body>
	
	<!--===============================================================================================-->
	<?php 
	if(empty($produk))
	{
	 //kosong	
	}else
	{
		//ambil status
		foreach($produk as $b)
		{
			$status_kantin = $b->status_kantin;
		}
		
		//memanggil modal sesuai kondisi
		if($status_kantin == 1)
		{
		  echo "<script>$('#info_kantin').modal('show');</script>";
		}
	}
	?>
	<!--===============================================================================================-->
		<?php
			if($this->uri->segment(4) == 1)
			{
				echo "<script>$('html, body').animate({scrollTop: 1200}, 300);</script>" ; 	
			}
		?>
<!--===============================================================================================-->

</html>
