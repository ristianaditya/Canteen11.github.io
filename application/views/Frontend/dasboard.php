<!DOCTYPE html>
<html lang="en">
<head>
	<title>Canteen11</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="<?php echo base_url() ;?>css/style.css">
<!--===============================================================================================-->	
	<link href="<?php echo base_url(); ?>assets/image/serve.png" rel="shortcut icon"/>
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  	<!-- Material Design Bootstrap -->
  	<link rel="stylesheet" href="<?php echo base_url() ;?>MDB/css/mdb.min.css">
	<style type="text/css">
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
	<div style="position:absolute; width: 100%;">
	<!-- Header -->
	<header>

		<!-- Header desktop -->
		<div class="container-menu-desktop">
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
								<a  href="<?php echo base_url() ;?>index.php/Utama">Home</a>
							</li>
							<li>
								<a href="<?php echo base_url() ;?>index.php/Canteen/kantin">Kantin</a>
							</li>
							<li class="label1" data-label1="hot">
								<a  href="<?php echo base_url() ;?>index.php/Produk/produk">Produk</a>
							</li>
							<?php if($jumlah_payment >= 1){?>
							<li class="label1" data-label1="Process">
								<a  href="<?php echo base_url() ;?>index.php/Payment">Payment</a>
							</li>
							<?php }?>
							<li>
								  <a  href="<?php echo base_url() ;?>index.php/Contact/contact">Contact</a>
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
                           <div style="margin-left:10px;" class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
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
		<div class="wrap-header-mobile" >
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.html"><img src="<?php echo base_url() ;?>assets_frontend/images/icons/logo09.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="
				<?php 
					if(!isset($jumlah)){
						echo 0 ;
					}else{ 
						echo $jumlah ;};
						?>
				">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>
                     <button type="button" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-11" id="apps_modal_btn" data-toggle="modal" data-target="#appsModal"><i class="ik ik-grid"></i></button>
                     <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-sidebar" style="margin-top:-7px;">
						<a style="max-height:10px;margin-left:-20px;"  href="#" data-toggle="modal" data-target="#profile" style="color:black">
						   <i class="fas fa-user" style="color:black"></i>
						  </a>
					 </div>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">

				<ul class="main-menu-m">
							<li >
								<a  href="<?php echo base_url() ;?>index.php/Utama">Home</a>
							</li>
							<li>
								<a href="<?php echo base_url() ;?>index.php/Canteen/kantin">Kantin</a>
							</li>
							<li>
								<a  href="<?php echo base_url() ;?>index.php/Produk/produk"  class="label1 rs1" data-label1="hot">Produk</a>
							</li>
							<?php if($jumlah_payment >= 1){?>
							<li>
								<a  href="<?php echo base_url() ;?>index.php/Payment"  class="label1 rs1" data-label1="process">Payment</a>
							</li>
							<?php }?>
							<li>
								<a  href="<?php echo base_url() ;?>index.php/Utama/contact">Contact</a>
							</li>
						</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="<?php echo base_url() ;?>assets_frontend/images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15" method="post" action="<?php echo base_url() ;?>index.php/Utama/search_produk">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<?php foreach($keranjang as $keranjang) {?>
					<li class="header-cart-item flex-w flex-t m-b-12">
						<a href="<?php echo base_url() ;?>index.php/Utama/delete_pesanan/<?= $keranjang->id_dafpes;?>">
							<div class="header-cart-item-img">
								<img src="<?php echo base_url().$keranjang->foto_produk ;?>" style="height:40px;" alt="IMG">
							</div>
						</a>
						<div class="header-cart-item-txt p-t-8">
								<?php echo $keranjang->nama_produk; if($keranjang->status_produk == 1){ echo "<font style='color:red'> (Sold Out)</font>"; }?>
							<span class="header-cart-item-info">
								<?php echo $keranjang->jumlah_pesanan." x Rp. ".number_format($keranjang->harga,2,",",".");?>
							</span>
						</div>
					</li>
					<?php }?>
				</ul>
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total : <?php echo "Rp. ".number_format($total->jumlah,2,",",".");?>
					</div>

					<div class="header-cart-buttons flex-w w-full">
						 <?php if(empty($jumlah)){ }else {?>
							<?php if($validasi_checkout > 0){?>
								<a class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10" style="color:white;width:100%" onclick="toastr.error('Salah satu produk sedang kosong');">Selengkapnya</a>
							<?php }else{?>
							<?php if($validasi_checkout1 > 0){?>
								<a class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10" style="color:white;width:100%" onclick="toastr.error('Kantin Sedang tutup');">Selengkapnya</a>
							<?php }else{?>
							 	<a href="<?php echo base_url() ;?>index.php/Utama/chart"  class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10" style="width:100%">
						   			Selengkapnya
							 	</a>
						  <?php }}}?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
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
	  
	

	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1 rs2-slick1">
			<div class="slick1">
				<div class="item-slick1" style="background-image: url(<?php echo base_url() ;?>assets_frontend/images/slide-08.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Tersedia Makanan & minuman
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									Canteen Eleven
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
								<a href="<?php echo base_url() ;?>index.php/Produk/produk" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="item-slick1" style="background-image: url(<?php echo base_url() ;?>assets_frontend/images/slide-01.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Tunggu & makanan anda akan sampai
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									Canteen Eleven
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
								<a href="<?php echo base_url() ;?>index.php/Produk/produk" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	
	
    <!--Second container-->
    <div class="container">
		
		<!-- Banner -->
	<div >
		 <!--Section heading-->
        <div class="row mt-5 mb-4">
          <div class="col-md-12 mb-3">
            <div class="divider-new">
              <h3 class="text-center text-uppercase font-weight-bold mr-3 ml-3 wow fadeIn" data-wow-delay="0.2s">Top Best Seller</h3>
            </div>
          </div>
        </div>	
			<div class="row">
					<?php foreach($kantin as $kantin) {?>
				
					<div class="col-lg-4 col-md-12 mb-4 wow fadeIn" data-wow-delay="0.4s">

					  <!--Card-->
					  <div class="card card-cascade wider">

						  <div class="card">
							<?php if($kantin->status_kantin == 1) {?>
								<div class="view ">
									<?php }else {?>
									<div class="view overlay zoom" >
										<?php }?>
										<?php if(empty($kantin->foto_kantin)) {?>
										<div class="view">
												 <img src="<?php echo base_url();?>assets_frontend/images/kantin-default.jpg" alt="IMG-BANNER" style="height:280px;width:100%;">
												<?php if($kantin->status_kantin == 1) {?>
													<div class="mask pattern-9 flex-center">
														<h1><p class="white-text" style=" font-weight: 400;"><B>CLOSED</B></p></h1>
													</div>
												<?php }?>
										</div>
										<?php } else{?>
											<div class="view">
												<img  class="pattern-6" src="<?php echo base_url().$kantin->foto_kantin;?>" alt="IMG-BANNER" style="height:280px;width:100%;">
												<?php if($kantin->status_kantin == 1) {?>
													<div class="mask pattern-9 flex-center">
														<h1><p class="white-text" style=" font-weight: 400;"><B>CLOSED</B></p></h1>
													</div>
												<?php }?>
												<?php if($kantin->penilaian >= 4) { if($kantin->jml_transaksi >= 24) {?>
												 <span class="soldout">
													<i class="fas fa-check"></i> Star Seller	
												 </span>
												<?php }}?>
											</div>
												<?php }?>
											<a href="<?php echo base_url() ;?>index.php/Canteen/kantinone/<?php echo $kantin->id_kantin ;?>">
											  <div class="mask rgba-white-slight"></div>
											</a>
								  </div>

								  <!-- Button -->
								  <a  href="<?php echo base_url() ;?>index.php/Canteen/kantinone/<?php echo $kantin->id_kantin ;?>" style="z-index:20" class="btn-floating btn-action ml-auto mr-4 mdb-color lighten-3"><i
									  class="fas fa-chevron-right pl-1"></i></a>

								  <!-- Card content -->
								  <div class="card-body">
									  	<ul class="list-unstyled list-inline rating mb-0" style="margin-left:-2px;margin-top:-13px; height:20px;pointer-events: none;">
										  <?php if($kantin->penilaian <= 1){?>
												<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"> </i></li>
										  <?php }else if($kantin->penilaian <= 1.5){?>
												<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"> </i></li>
												<li class="list-inline-item"><i class="fas fa-star-half-alt amber-text"></i></li>
										  <?php }else if($kantin->penilaian <= 2){?>
												<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
												<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
										  <?php }else if($kantin->penilaian <= 2.5){?>
												<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
												<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
												<li class="list-inline-item"><i class="fas fa-star-half-alt amber-text"></i></li>
										  <?php }else if($kantin->penilaian <= 3){?>
												<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
												<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
												<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
										  <?php }else if($kantin->penilaian <= 3.5){?>
												<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
												<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
												<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
												<li class="list-inline-item"><i class="fas fa-star-half-alt amber-text"></i></li>
										  <?php }else if($kantin->penilaian <= 4){?>
												<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
												<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
												<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
												<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
										  <?php }else if($kantin->penilaian <= 4.5){?>
												<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
												<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
												<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
												<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
												<li class="list-inline-item"><i class="fas fa-star-half-alt amber-text"></i></li>
										  <?php }else if($kantin->penilaian <= 5){?>
												<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
												<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
												<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
												<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
												<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
										  <?php }?>
										  <li class="list-inline-item" style="margin-left:5px;"><p class="text-muted"> <?= $kantin->penilaian;?></p></li>
										</ul>
										<!-- Title -->
										<h4 class="card-title"><strong><?php echo strtoupper($kantin->nama_kantin);?></strong></h4>
										<hr>
										<!-- Text -->
										  <p class="card-text"><strong><?= $kantin->nama_sekolah;?></strong></p>
										<p class="card-text"><?= $kantin->alamat_sekolah;?>.</p>

								  </div>


							</div>
							<!-- Card -->

						  </div>
						</div>
					<!--/First column-->
						<?php };?>
					</div>
				</div>
		
      <!--Section: Menu intro-->
      <section id="intro" class="mt-3 mb-4">

        <!--Section heading-->
        <div class="row mt-5 mb-4">
          <div class="col-md-12 mb-3">
            <div class="divider-new">
              <h3 class="text-center text-uppercase font-weight-bold mr-3 ml-3 wow fadeIn" data-wow-delay="0.2s">Pengajuan Kantin</h3>
            </div>
          </div>
        </div>

        <!--First row-->
        <div class="row smooth-scroll">

          <!--First column-->
          <div class="col-lg-6 col-md-12 wow fadeIn" data-wow-delay="0.4s">

            <!--Title-->
            <h4 class="mb-4 text-center">Buatlah Kantinmu sekarang !!!</h4>

            <!--Description-->
            <p class="grey-text mb-4" align="justify">
             Canteen11 adalah layanan pesan antar makanan secara Online. Fitur utama aplikasi ini memungkinkan pengguna untuk memesan makanan dari berbagai pilihan kantin di setiap sekolah yang ada di kota Bandung. Adapun mengenai pembayaran, pemesanan dapat membayarnya melalui uang tunai atau Canteen Kredit. Canteen Kredit merupakan metode pembayaran melalui cara top-up . 
            </p>

            <!--Menu button-->
            <div class="text-center mb-2 mt-2">
              <a href="#" data-toggle="modal" data-target="#pengajuan" data-offset="100" class="btn btn btn-outline-grey btn-rounded waves-effect">
                <strong>Pengajuan Kantin</strong>
              </a>
				 <a href="<?= base_url();?>index.php/Login/login" data-offset="100" class="btn btn btn-outline-grey btn-rounded waves-effect">
                <strong>Login Sekarang</strong>
              </a>
            </div>
			  
			  <!-- Central Modal Small -->
				<div class="modal fade" id="pengajuan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
				  aria-hidden="true">

				  <!-- Change class .modal-sm to change the size of the modal -->
				  <div class="modal-dialog " role="document">


					<div class="modal-content">
					  <div class="modal-header">
						<h4 class="modal-title w-100" id="myModalLabel">Pengajuan Kantin</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
						<form id="addForm" method="POST" enctype="multipart/form-data" action="<?= base_url();?>index.php/Pengajuan/pengajuan">
					  <div class="modal-body" style="overflow-y:scroll;max-height:430px;">
						   <div class="form-group">
							   		<label>Username</label>
                                    <input name="nama" id="nama" type="text" class="form-control" placeholder="Masukan Nama Lengkap">
                           </div>
						  <div class="form-group">
							   		<label>Nama Kantin</label>
                                    <input name="nama_kantin" id="nama_kantin" type="text" class="form-control" placeholder="Masukan Nama Kantin">
                           </div>
						   <div class="form-group">
							   		<label>Email</label>
                                    <input name="email" id="email" type="email" class="form-control" placeholder="Masukan alamat Email">	
                            </div>
						   <div class="form-group">
							   		<label>No Telepon</label>
                                    <input name="no_telepon" id="no_telepon" type="number" class="form-control" placeholder="Masukan Nomer Telepon">
                            </div>
						   <div class="form-group">
							   		<label>NIK</label>
                                    <input name="nik" id="nik" type="number" class="form-control" placeholder="Masukan NIK">
                            </div>
						    <div class="form-group">
									<label>Tanggal Lahir</label>
                                    <input name="tgl_lahir" id="tgl_lahir" type="date" class="form-control" placeholder="Masukan Tanggal Lahir">
                            </div>
						  	<div class="form-group">
									<label>Alamat Tempat Tinggal</label>
									<textarea name="alamat" id="alamat" type="text" class="form-control" placeholder="Masukan Alamat Rumah"></textarea>
                            </div>
						  	<div class="form-group">
								<label>Asal Sekolah</label>
								<select name="sekolah" class="js-example-disabled-results" style="width:100%;">
									<?php foreach($sekolah as $sekolah){?>
								  <option value="<?= $sekolah->id_sekolah;?>"><?= $sekolah->nama_sekolah;?></option>
									<?php };?>
								</select>
							 </div>
							<div class="form-group">
									<label>Password</label>
                                    <input name="password" id="password" type="password" class="form-control" placeholder="Masukan Password">
							</div>
						  	<div class="form-group">
									<label>Confirm Password</label>
                                     <input name="confirm" id="confirm" type="password" class="form-control" placeholder="Masukan Confirm Password">
						    </div> 
							<div class="form-group">
									<label>Bukti Pengajuan Dari Sekolah</label>
                                    <input type="file" name="foto" id="foto" class="form-control"/>
                            </div>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary btn-sm">Kirim</button>
					  </div>
					</form>
					</div>
				  </div>
				</div>
				<!-- Central Modal Small --> 
			  
			  	<!-- Central Modal Small -->
				<div class="modal fade" id="penilaian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

				  <!-- Change class .modal-sm to change the size of the modal -->
				  <div class="modal-dialog " role="document">


					<div class="modal-content">
					  <div class="modal-header">
						<h4 class="modal-title w-100" id="myModalLabel"> </h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
						<form id="addForm" method="POST" enctype="multipart/form-data" action="<?= base_url();?>index.php/Pengajuan/pengajuan">
						  <div class="modal-body" style="overflow-y:scroll;max-height:430px;">
							   <div class="form-group">
										<label>Username</label>
										<input name="nama" id="nama" type="text" class="form-control" placeholder="Masukan Nama Lengkap">
							   </div>
								<div class="form-group">
										<label>Bukti Pengajuan Dari Sekolah</label>
										<input type="file" name="foto" id="foto" class="form-control"/>
								</div>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary btn-sm">Kirim</button>
						  </div>
						</form>
					</div>
				  </div>
				</div>
				<!-- Central Modal Small --> 
			  
			  
          </div>
          <!--/First column-->

          <!--Second column-->
          <div class="col-lg-5 ml-auto col-md-12 mb-5 wow fadeIn" data-wow-delay="0.4s">

            <!--Image-->
            <img src="https://mdbootstrap.com/img/Others/food.jpg" alt="" class="z-depth-0 img-fluid">

          </div>
          <!--/Second column-->

        </div>
        <!--/First row-->

      </section>
      <!--/Section: Menu intro-->

    </div>

	<br><br>
	
	<!--Streak-->
    <div class="streak streak-photo streak-md" style="background-image: url('https://mdbootstrap.com/img/Others/food31.jpg');">
      <div class="flex-center mask rgba-black-strong">
        <div class="text-center white-text">
          <h2 class="h2-responsive mb-5">
            <i class="fas fa-quote-left" aria-hidden="true"></i> Food for the body is not enough. There must be food
            for the soul.
            <i class="fas fa-quote-right" aria-hidden="true"></i>
          </h2>
          <h5 class="text-center font-italic">~ Dorothy Day</h5>
        </div>
      </div>
    </div>
    <!--/Streak-->
	<br><br>	
		
	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					New Product
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
					</button>
					<?php 
					foreach($kategori as $a ) {?>
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".<?php echo $a->id_kategori ;?>">
						<?php echo $a->nama_kategori ;?>
					</button>
					<?php }?>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<form method="post" action="<?php echo base_url() ;?>index.php/Utama/search_produk">
							<div class="bor8 dis-flex p-l-15">
								<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
									<i class="zmdi zmdi-search"></i>
								</button>

								<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search" placeholder="Search">
							</div>
						</form>	
				</div>
			</div>

			<div class="row isotope-grid">
				<?php
					foreach($data as $a){
					?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $a->id_kategori ;?>">
					
					<!--Card Narrower-->
					<div class="card card-cascade narrower">
						  <!--Card image-->
						  <div class="view view-cascade">
							  <div class="view">
							  <img src="<?php echo base_url() ;?><?php echo $a->foto_produk ;?>" style="width:100%;height:186px"  class="card-img-top"
							  alt="IMG-PRODUCT">
								<a  href="<?php echo base_url() ;?>index.php/Produk/detail_produk/<?php echo $a->id_produk ;?>">
								  <div class="mask rgba-white-slight"></div>
								</a>
							  <?php if($a->status_produk == 1){?>
								<div class="mask pattern-9 flex-center" style="z-index:10;">
									<h1><p class="white-text" style=" font-weight: 400;"><B>Sold Out</B></p></h1>
								</div>
							  <?php }?>
								  <?php if($a->penilaian >= 4) { if($a->jml_transaksi >= 24) {?>
									 <span class="soldout">
									 	<i class="fas fa-check"></i> Star Seller	
								  	 </span>
									<?php }}?>
							  </div>
						  </div>
						  <!--/.Card image-->

						  <!--Card content-->
						  <div class="card-body card-body-cascade">
							<h5 class="pink-text"><i class="fas fa-utensils"></i> <?= $a->nama_kantin;?></h5>
							<!--Title-->
							<h4 class="card-title"><?php echo $a->nama_produk ;?></h4>
							<p class="btn btn-unique"><?php echo "Rp. ".number_format($a->harga,2,",",".") ;?></p>
							  <?php if($a->status_produk != 1){
										if($a->status_kantin == 1){
											?>
											<a class="btn-floating btn-sm btn-primary" style="color:black;float:right;margin-right:-5px" onclick="toastr.error('Kantin Sudah Tutup');"><i class="zmdi zmdi-shopping-cart"></i></a>
								<?php }else{?>
											<button class="btn-floating btn-sm btn-primary" style="float:right;margin-right:-5px" type="submit" data-toggle="modal" data-target="#<?= $a->id_produk;?>">
												<i class="zmdi zmdi-shopping-cart"></i>
											</button>
									<?php }} else{?>
											<a class="btn-floating btn-sm btn-primary" style="color:black;float:right;margin-right:-5px" onclick="toastr.error('Produk ini sudah terjual');"><i class="zmdi zmdi-shopping-cart"></i></a>
									<?php }?>
						  </div>
						  <!--/.Card content-->
						<div class="card-footer text-muted text-center">
						 <ul class="list-unstyled list-inline rating mb-0" style="margin-left:-20px;margin-top:0px; height:20px;pointer-events: none;">
							 <li class="list-inline-item"><p class="text-muted"> Rating : </p></li>
							  <?php if($a->penilaian <= 1){?>
							  		<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"> </i></li>
							  <?php }else if($a->penilaian <= 1.5){?>
								 	<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"> </i></li>
							  		<li class="list-inline-item"><i class="fas fa-star-half-alt amber-text"></i></li>
						      <?php }else if($a->penilaian <= 2){?>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
							  <?php }else if($a->penilaian <= 2.5){?>
								 	<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
							  		<li class="list-inline-item"><i class="fas fa-star-half-alt amber-text"></i></li>
							  <?php }else if($a->penilaian <= 3){?>
								 	<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
							  <?php }else if($a->penilaian <= 3.5){?>
								  	<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
							  		<li class="list-inline-item"><i class="fas fa-star-half-alt amber-text"></i></li>
							  <?php }else if($a->penilaian <= 4){?>
								 	<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
							  <?php }else if($a->penilaian <= 4.5){?>
								 	<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								 	<li class="list-inline-item"><i class="fas fa-star-half-alt amber-text"></i></li>
							  <?php }else if($a->penilaian <= 5){?>
								 	<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
							  <?php }?>
							  <li class="list-inline-item" style="margin-left:5px;"><p class="text-muted"> <?= $a->penilaian;?></p></li>
							</ul>
					  </div>
					</div><br>
				</div>
				
				
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
						<?php echo form_open_multipart('Utama/pengajuan_saldo/') ;?>
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

								<!-- Modal: modalAbandonedCart-->
								<div class="modal fade right" id="<?= $a->id_produk;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
								  aria-hidden="true">
								  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
									<!--Content-->
									<div class="modal-content">
									  <!--Header-->
									  <div class="modal-header">
										<p class="heading">Product in the cart
										</p>

										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true" class="white-text">&times;</span>
										</button>
									  </div>

									  <!--Body-->
									  <div class="modal-body">

										<div class="row">
										  <div class="col-3">
											<p></p>
											<p class="text-center"><i class="fas fa-shopping-cart fa-4x"></i></p>
										  </div>

										  <div class="col-9">
											<p>Do you need more time to make a purchase decision?</p>
											<p>No pressure, your product will be waiting for you in the cart.</p>
										  </div>
										</div>
									  </div>

									  <!--Footer-->
									  <div class="modal-footer justify-content-center">
										 <form method="post" action="<?php echo base_url() ;?>index.php/Utama/masuk_keranjang/<?= $a->id_produk;?>/<?php echo $a->id_kantin ;?>">
											<input type="number" name="harga" value="<?php echo $a->harga ;?>" hidden>
											<input type="text" name="id_kantin" value="<?php echo $a->id_kantin ;?>" hidden>
											<input  type="number" name="jumlah" value="1" hidden>
											<button type="submit" class="btn btn-info">
												Go to cart
											</button>
										</form>
										<a type="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">Cancel</a>
									  </div>
									</div>
									<!--/.Content-->
								  </div>
								</div>
				<?php 
					}
					?>
			</div>
		</div><br><br><br>
	<div class="container-fluid light-grey-background" style="background-color:#E6E6FA">
      <div class="container py-4">

        <!-- Section: Features v.4 -->
        <section id="features" class="mb-5 pt-4">

          <!-- First row -->
          <div class="row mt-5 pt-4features wow fadeIn" data-wow-delay="0.2s">

            <div class="col-md-6 col-lg-3 text-center">
              <div class="icon-area">
                <div class="circle-icon">
                   <img src="<?= base_url()?>assets_frontend/images/customize.png" style="max-height:200px">
                </div>
                <br>
                <h5 class="dark-grey-text font-weight-bold mt-2">Customization</h5>
                <div class="mt-1">
                  <p class="mx-3 grey-text">Kostumisasi Canteen bagi para seller sangat mudah dan banyak.</p>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-3 text-center">
              <div class="icon-area">
                <div class="circle-icon">
                  <img src="<?= base_url()?>assets_frontend/images/easy.png">
                </div>
                <br>
                <h5 class="dark-grey-text font-weight-bold mt-2">Mudah digunakan</h5>
                <div class="mt-1">
                  <p class="mx-3 grey-text">Dengan menu tampilan yang mudah Digunakan Oleh berbagai kalangan.</p>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-3 text-center mb-4">
              <div class="icon-area">
                <div class="circle-icon">
                  <img src="<?= base_url()?>assets_frontend/images/business.png">
                </div>
                <br>
                <h5 class="dark-grey-text font-weight-bold mt-2">Bisnis Sekolah</h5>
                <div class="mt-1">
                  <p class="mx-3 grey-text">Untuk menunjang penghasilan Canteen yang ada diberbagai sekolah di kota Bandung</p>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-3 text-center mb-4">
              <div class="icon-area">
                <div class="circle-icon">
                  <img src="<?= base_url()?>assets_frontend/images/smart1.png" style="max-height:200px">
                </div>
                <br>
                <h5 class="dark-grey-text font-weight-bold mt-2">Aplikasi Pintar</h5>
                <div class="mt-1">
                  <p class="mx-3 grey-text">Memudahkan para seller dengan menyediakan rekap penjualan perbulan</p>
                </div>
              </div>
            </div>

          </div>
          <!-- First row -->

        </section>
        <!-- Section: Features v.4 -->

      </div>
    </div>
		<div class="container" style="margin-bottom:-60px;">
		 <!-- Grid row -->
        <div class="row mt-5 pt-5 wow fadeIn" data-wow-delay="0.4s">

          <!-- Grid column -->
          <div class="col-md-6 mb-5 text-center">

            <div class="embed-responsive embed-responsive-16by9 z-depth-1 rounded">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/KA7ag_J2WHs"
                allowfullscreen></iframe>
            </div>

          </div>
          <!-- Grid column -->

          <!-- Second column -->
          <div  style="margin-top:-20px;" class="col-md-6 mb-5 text-center">
            <!-- Section heading -->
            <h3 class="text-center title mb-5 mt-lg-5 pt-xl-4 pb-2 dark-grey-text font-weight-bold wow fadeIn"
              data-wow-delay="0.2s">
              <strong>Download our app</strong>
            </h3>
			  			<iframe  style="margin-top:-50px;"
                           src="https://appsgeyser.com/social_widget/social_widget.php?width=295&height=150&apkName=Canteen11_10471231&simpleVersion=no"
                           width="320" height="180" vspace="0" hspace="0" frameborder="no"
                           scrolling="no" seamless=""
                           allowtransparency="true">
						</iframe>
			  			

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->
		</div>
	</section>
		
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
					Copyright © SAIBER TIM SMKN 11 BANDUNG <?= date("Y") ;?>
				</p>
			</div>
		</div>
		</footer>
	</div>
		<!-- Modal: modalCart -->
			<div class="modal fade" id="kelola" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			  aria-hidden="true">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <!--Header-->
				  <div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Your cart</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">×</span>
					</button>
				  </div>
				  <!--Body-->
				  <div class="modal-body">

					<table class="table table-hover" id="mydata">
					  <thead>
						<tr>
						  <th>Product name</th>
						  <th>Qty</th>
						  <th>Price</th>
						  <th>Remove</th>
						</tr>
					  </thead>
					  <tbody id="show_data">

					  </tbody>
					</table>

				  </div>
				  <!--Footer-->
				  <div class="modal-footer">
					<button class="btn btn-primary">Checkout</button>
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
				<p class="heading">Yakin ingin Keluar ?</p>
			  </div>

			  <!--Body-->
			  <div class="modal-body">

				<i class="fas fa-times fa-4x animated rotateIn"></i>

			  </div>

			  <!--Footer-->
			  <div class="modal-footer flex-center">
				<a  href="<?php echo base_url(); ?>index.php/Login/logout" class="btn  btn-outline-danger">Logout</a>
				<a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
			  </div>
			</div>
			<!--/.Content-->
		  </div>
		</div>
		<!--Modal: modalConfirmlogout-->

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
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
	<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css" rel="stylesheet">
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
	  $("#addForm").validate({
		  rules: {
			nama: {
			  required: true,
			  minlength: 6
			},
			nama_kantin: {
			  required: true,
			  minlength: 6
			},
			email: {
			  required: true,
			  minlength: 6,
			  email: true
			},
			no_telepon: {
			  required: true,
			  number: true,
			  minlength: 3
			},
			 alamat: {
			  required: true,
			},
			alamat_kantin: {
			  required: true,
			},
			nik: {
			  required: true,
			  number: true,
			  minlength: 16
			},
			tgl_lahir: {
			  required: true,
			},
			 password: {
			  required: true,
			  minlength: 6
			},
			 confirm: {
			  equalTo: "#password",
			  required: true,
			  minlength: 6
			},
			  foto: {
			  required: true,
			},
		  },

		  messages: {
			nama: {
			  required: "Field Nama Wajib Diisi ",
			  minlength: "Min. 6 karakter"
			},
			nama_kantin: {
			  required: "Field Nama Kantin Wajib Diisi",
			  minlength: "Min. 6 karakter"
			},
			 email: {
			  required: "Field Email Wajib Diisi",
			  minlength: "Min. 6 karakter",
			  email: "Format email tidak valid"
			},
			no_telepon: {
			  required: "Field Nomer Telepon Wajib Diisi",
			  number: "Hanya dapat menampung format number",
			  minlength: "Min. 12 karakter"
			},
			nik: {
			  required: "Field NIK Wajib Diisi",
			  number: "Hanya dapat menampung format number",
			  minlength: "Min. 12 karakter"
			},
			tgl_lahir: {
			  required: "Field Tanggal Lahir Wajib Diisi",
			},
			  alamat: {
			  required: "Field Alamat Wajib Diisi",
			},
			  password: {
			  required: "Field password Wajib Diisi",
			  minlength: "Min. 12 karakter"
			},
			  confirm: {
			  required: "Field Confirm Password Wajib Diisi",
			  minlength: "Min. 12 karakter",
			  equalTo: "Confirm Password Tidak Sesuai"
			},
			 foto: {
			  required: "Field Foto Wajib Diisi",
			},
		  }
		});
	</script>
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
	<script src="<?php echo base_url() ;?>assets_frontend/js/main.js"></script>
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
		toastr.warning('Harap Tunggu hingga proses Payment selesai !');
    </script>
    <?php }
else if($data == 12)
{ ?>
    <script>
      Swal.fire({
        position:'center',
        icon:'success',
        title:'Terimakasih anda sudah order ke kantin kami :) ',
        showConfirmButton:false,
      }
               );
    </script>
    <?php }
else if($data == 14)
{ ?>
    <script>
		toastr.error('Saldo anda tidak mencukupi !');
    </script>
    <?php }
else if($data == 15)
{ ?>
    <script>
		toastr.error('Tunggu Hingga Top Up Selesai !');
    </script>
  <?php }
else if($data == 16)
{ ?>
    <script>
		toastr.success('Pengiriman Top Up Berhasil');
    </script>
   <?php }
else if($data == 17)
{ ?>
    <script>
		toastr.error('Bukti foto tidak valid');
    </script>
    <?php }
		?>
	</div>
</body>
</html>