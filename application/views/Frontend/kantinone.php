<style>

	@media screen and (min-width: 30em) {
	  .split-layout {
		flex-direction: row;
		align-items: stretch;
	  }
	}

	.split-layout__item {
	  flex: 1;
	}
	@media screen and (min-width: 30em) {
	  .split-layout__item {
		padding-left: 1em;
	  }
	  .split-layout__item:first-child {
		padding: 0;
	  }
	}

	.split-layout__divider {
	  display: flex;
	  flex-direction: row;
	  align-items: center;
	}
	@media screen and (min-width: 30em) {
	  .split-layout__divider {
		flex-direction: column;
	  }
	}

	.split-layout__label {
	  padding: 1em;
	}

	.split-layout__rule {
	  flex: 1;
	  border-style: solid;
	  border-color: rgba(34, 34, 34, 0.3);
	  border-width: 1px 0 0 0;
	}
	@media screen and (min-width: 30em) {
	  .split-layout__rule {
		border-width: 0 1px 0 0;
	  }
</style>
<!-- Slider -->
<section class="section-slide">
  <div class="wrap-slick1">
	  <?php
			foreach($produk as $s){
				$penilaian = $s->penilaian;
				$jml_transaksi = $s->jml_transaksi;
			}
			?>
	  <?php if($penilaian >= 4) { if($jml_transaksi >= 24) {?>
	  	<span style="z-index:50;padding: 6px 12px;position: absolute;right: 0;top: 0;">
			<img src="<?= base_url();?>assets_frontend/images/best.png" style="height:100px;">
	  	</span>
	  <?php }}?>
	<div class="slick1">
      <div class="item-slick1 bg-overlay1" style="background-image: url(<?php echo base_url() ;?>assets_frontend/images/canteen.png);">
		  <div class="container h-full">
          <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
              <span class="ltext-202 txt-center cl0 respon2">
                Pesan dan ambil makanan mu sekarang 
              </span>
            </div>
            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
              <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                <?= $detail->nama_kantin ;?>
              </h2>
            </div>
            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
              <div class="form-group row">
                <a href="<?= base_url();?>index.php/Utama" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04" style="margin-right:10px;">
                  HOME
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="item-slick1 bg-overlay1" style="background-image: url(<?php echo base_url() ;?>assets_frontend/images/kantin.jpg);">
        <div class="container h-full">
          <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
              <span class="ltext-202 txt-center cl0 respon2">
                Pesan dan ambil makanan mu sekarang
              </span>
            </div>
            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
              <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                <?= $detail->nama_kantin ;?>
              </h2>
            </div>
            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
              <div class="form-group row">
                <a href="<?= base_url();?>index.php/Utama" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04" style="margin-right:10px;">
                  HOME
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><br>
<h2 class="ltext-103 cl5 text-center my-5">Profil Kantin</h2>
<section class="magazine-section my-4 position-static container" style="float:right;">

 <!--hidden-->
  <!-- Grid row -->
  <div class="split-layout container">
  <div class="row fixed container">
      <!-- Grid column -->
    <div class="col-lg-4 col-md-6 mb-md-0 mb-5" style="">

      <!-- Featured news -->
      <div class="single-news mb-3 container">

        <!-- Image -->
        <div class="view overlay rounded z-depth-2 mb-4" style="margin-left:20px;" >
           <?php if(empty($detail->foto)) {;?>
          <img class="img-fluid" src="<?php echo base_url();?>assets_frontend/images/kantin-default.jpg" style="height:320px; width:490px; max-width:100%;max-height:auto;" alt="IMG-BANNER">
          <?php } else{;?>
          <img class="img-fluid" src="<?php echo base_url().$detail->foto ;?>" style="height:320px; width:490px; max-width:100%;" alt="normal">
          <?php }?>
          <a>
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>
        </div>
    </div>
      <div class="split-layout__divider" style="margin-left:20px;">
		<div class="split-layout__rule"></div>
			<div class="split-layout__label">Info</div>
		<div class="split-layout__rule"></div>
    </div>
   <div class="col-lg-4 col-md-6 mb-md-0 mb-5" style="margin:20px;">

      <!-- Featured news -->
      <div class="single-news mb-3">

        <!-- Grid row -->
        <div class="row mb-3">

          <!-- Grid column -->
          <div class="col-12">

            <!-- Badge -->
            <a href="#"><span class="badge badge-pill teal"><img src="https://img.icons8.com/color/25/000000/visit.png"><?php echo $detail->nama_sekolah ;?></span></a>

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->

        <!-- Title -->
        <div class="d-flex justify-content-between">
          <div class="col-11 text-truncate pl-0 mb-3">
             <?php echo strtoupper($detail->nama) ;?>
          </div>
          <a><img src="https://img.icons8.com/ios/32/000000/user.png"></a>
        </div>

      </div>
      <!-- Featured news -->

      <!-- Small news -->
      <div class="single-news mb-3">

        <!-- Title -->
        <div class="d-flex justify-content-between">
          <div class="col-11 text-truncate pl-0 mb-3">
            <?php echo $detail->no_telepon ;?>
          </div>
          <a><img src="https://img.icons8.com/ios/32/000000/ringing-phone.png"></a>
        </div>

      </div>
      <!-- Small news -->

      <!-- Small news -->
      <div class="single-news mb-3">

        <!-- Title -->
        <div class="d-flex justify-content-between">
          <div class="col-11 text-truncate pl-0 mb-3">
            <?php echo $detail->email ;?>
          </div>
          <a><img src="https://img.icons8.com/ios/30/000000/important-mail.png"></a>
        </div>

      </div>
      <!-- Small news -->

      <!-- Small news -->
      <div class="single-news mb-3">

        <!-- Title -->
        <div class="d-flex justify-content-between">
          <div class="col-11 text-truncate pl-0">
            <?php echo $detail->alamat_sekolah ;?>
          </div>
          <a><img src="https://img.icons8.com/ios/32/000000/address.png"></a>
        </div>

      </div>
      <!-- Small news -->

    </div>
      
    <!-- Grid column -->
	  </div>
    </div><br><br><br>
</section>
<!-- Content page -->
<section class="bg0 p-t-75 p-b-120">
  <div class="container">
    <!-- Product -->
    <div class="container" style="margin-top:-60px;">
      <div class="p-b-10">
        <h3 class="ltext-103 cl5">
          Product Overview
        </h3>
      </div>
      <div class="flex-w flex-sb-m p-b-52">
        <div class="flex-w flex-l-m filter-tope-group m-tb-10">
          <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
            All Products
          </button>
          <?php 
				foreach($kategori as $a ) {
			
			?>
          <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".<?php echo $a->id_kategori ;?>">
            <?php echo $a->nama_kategori ;?>
          </button>
          <?php }?>
        </div>
        <div class="flex-w flex-c-m m-tb-10">
          <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
            <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search">
            </i>
            <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none">
            </i>
            Search
          </div>
        </div>
        <!-- Search product -->
        <div class="dis-none panel-search w-full p-t-10 p-b-15">
          <form method="post" action="<?php echo base_url() ;?>index.php/Canteen/search_produk_kantin/<?= $this->uri->segment(3);?>">
            <div class="bor8 dis-flex p-l-15">
              <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                <i class="zmdi zmdi-search">
                </i>
              </button>
              <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search" placeholder="Search">
            </div>
          </form>	
        </div>
      </div>
      <div class="row isotope-grid">
        <?php
			foreach($produk as $a){
			if(!empty($a->id_produk)){
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

					</div><br>
				</div>
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
										 <form method="post" action="<?php echo base_url() ;?>index.php/Canteen/masuk_keranjang/<?= $a->id_produk ;?>/<?=$a->id_kantin;?>">
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
								<!-- Modal: modalAbandonedCart-->
        <?php $status_kantin = $a->status_kantin;
}
}
?>
      </div>
    </div>
  </div>
</section>
<!-- modal pengingat -->
	<div class="modal fade" id="info_kantin"  aria-labelledby="exampleModalLabel">
			<div class="modal-dialog" role="document">
			  <div class="card card-cascade narrower">
								  <!-- Card image -->
								  <div class="view view-cascade gradient-card-header mdb-color lighten-3">
									<h5 class="mb-0 font-weight-bold">PERHATIAN</h5>
								  </div>
				<div class="modal-body">
					<div class="col-sm-12 mr-auto">
						<p class="lead">Kantin ini sedang tutup saat ini. Anda tidak bisa melakukan transaksi di kantin ini. Coba tunggu dan ulangin proses transaksi saat Kantin ini sudah dibuka. Termikasih  : )</p>
					</div>
				</div>
				<div class="modal-footer">
				  <button class="btn btn-danger" type="button" data-dismiss="modal">TUTUP</button>
				</div>
			  </div>
			</div>
		  </div>

		<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
		<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
		<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>