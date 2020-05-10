<!-- Product --> 
	<div class="sec-banner bg0 flex-w p-l-25 p-r-15 p-t-5 p-lr-0-lg" >
		<div class="container">
			<br>
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
				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search"  style="margin-right:10px">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
					<a href="#" data-toggle="modal" data-target="#filter" class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 "> 
							<i class="fas fa-filter"></i> Filter
						</a>
				</div>
				<!-- Modal -->
				<div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h4 class="modal-title" id="exampleModalLabel">Filter Kantin</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					<form method="post" action="<?= base_url();?>index.php/Produk/filter_produk">
					  <div class="modal-body" >
						  <div class="form-group">
							   		<label style="float:left">Nama Kantin</label>
                                    <input name="nama_kantin" id="nama_kantin" type="text" class="form-control" placeholder="Masukan Nama Kantin">
                           </div>
						  	<div class="form-group">
								<label style="float:left">Asal Sekolah</label>
								<select name="sekolah" class="js-example-disabled-results" style="width:100%;">
								<option value="">Masukan Nama Sekolah</option>
									<?php foreach($sekolah as $sekolah){?>
								  <option value="<?= $sekolah->id_sekolah;?>"><?= $sekolah->nama_sekolah;?></option>
									<?php };?>
								</select>
							 </div>
						  <div class="form-group">
								<span class="stext-112 cl8" style="float:left">
										Status Kantin
								</span><br>
								<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="status">
											<option value="">Pilih Status Kantin</option>
											<option value="best">Best Rating</option>
											<option value="">Semua Kantin</option>
										</select>
										<div class="dropDownSelect2"></div>
								</div>
							 </div>
					  </div>
					  <div class="modal-footer">
						<button type="submit" class="btn btn-primary btn-block">Filter</button>
					  </div>
					</form>
					</div>
				  </div>
				</div>
				
				<!-- Search product -->
				
					<div class="dis-none panel-search w-full p-t-10 p-b-15">
						<form method="post" action="<?php echo base_url() ;?>index.php/Produk/search_produk">
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
					
				<div class="p-b-35 isotope-item container">
					<?php
					foreach($data as $s){$produk = $s->id_produk ;}
					if(empty($produk)){
					?>
								<img src="<?php echo base_url() ;?>assets_frontend/images/no_result.gif" style="min-width:350px;width:50%;height:70%;margin:auto;display: block;" class="card-img-top container" >
					<?php }?>
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
							  <img src="<?php echo base_url() ;?><?php echo $a->foto_produk ;?>" style="width:100%;height:186px"  class="card-img-top" alt="IMG-PRODUCT">
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
						 <ul class="list-unstyled list-inline rating mb-0" style="margin-left:-20px;margin-top:-20px; height:10px;">
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
										 <form method="post" action="<?php echo base_url() ;?>index.php/Produk/masuk_keranjang/<?= $a->id_produk;?>/<?php echo $a->id_kantin ;?>">
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
				<?php 
					}
					?>
				</div><br><br>
		</div>
</div>			