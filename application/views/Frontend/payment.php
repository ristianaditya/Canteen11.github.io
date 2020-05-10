<style>

	.card {
		z-index: 0;
		border: none;
		position: relative
			}
	.purple-text {
		color: #673AB7;
		font-weight: normal
	}

	.steps {
		font-size: 25px;
		color: gray;
		margin-bottom: 10px;
		font-weight: normal;
		text-align: right
	}

	.fieldlabels {
		color: gray;
		text-align: left
	}

	#progressbar {
		margin-bottom: 30px;
		overflow: hidden;
		color: lightgrey
	}

	#progressbar .active {
		color: #673AB7
	}

	#progressbar li {
		list-style-type: none;
		font-size: 15px;
		width: 25%;
		float: left;
		position: relative;
		font-weight: 400
	}

	#progressbar #account:before {
		font-family: FontAwesome;
		content: "\f017"
	}

	#progressbar #personal:before {
		font-family: FontAwesome;
		content: "\f110"
	}

	#progressbar #payment:before {
		font-family: FontAwesome;
		content: "\f0d1"
	}

	#progressbar #confirm:before {
		font-family: FontAwesome;
		content: "\f00c"
	}

	#progressbar li:before {
		width: 50px;
		height: 50px;
		line-height: 45px;
		display: block;
		font-size: 20px;
		color: #ffffff;
		background: lightgray;
		border-radius: 50%;
		margin: 0 auto 10px auto;
		padding: 2px
	}

	#progressbar li:after {
		content: '';
		width: 100%;
		height: 2px;
		background: lightgray;
		position: absolute;
		left: 0;
		top: 25px;
		z-index: -1
	}

	#progressbar li.active:before,
	#progressbar li.active:after {
		background: #673AB7
	}

	.progress {
		height: 20px
	}

	.progress-bar {
		background-color: #673AB7
	}
	</style>
	<meta http-equiv=refresh content=10;url=Payment>
		
	<section class="bg0 p-t-104 p-b-116	" style="background-color:#edf3ff;">
		
		<div class="container">
			
			 <div class="container-fluid">
				 	
				  <!-- Section: Heading -->
				  <section class="mb-4">
					   <!-- Card image -->
					 <div class="card card-cascade narrower">
								  <div class="view view-cascade gradient-card-header mdb-color lighten-3">
									<h5 class="mb-0 font-weight-bold">Payment</h5>
								  </div>
						
					  <div class="card-body d-flex justify-content-between">
						<h4 class="h4-responsive mt-3">Invoice </h4>

						<div>
						  <a href="<?= base_url() ;?>index.php/Payment/laporan_pdf" class="btn btn-primary"><i class="fas fa-print left"></i> Download Pdf</a>
						</div>

					  </div>
					</div>

				  </section>
				  <!-- Section: Heading -->

				  <!-- Section: Invoice details -->
				  <section class="mb-4">

					<div class="card">
					  <div class="card-body">

						<!-- Grid row -->
						<div class="row">

						  <!-- Grid column -->
						  <div class="col-md-6 text-left">

							<p><small>From:</small></p>
							<p><strong>Canteen11 Company</strong></p>
							<p>Jln Budi Cilember Bandung Jawa Barat</p>
							<p><strong>Invoice date:</strong> <?php echo date('D-M-Y')?></p>
							<p><strong>Due date:</strong><?php echo date('D-M-Y')?></p>

						  </div>
						  <!-- Grid column -->

						  <!-- Grid column -->
						  <div class="col-md-6 text-right">

							<h4 class="h4-responsive"><small>Invoice</small></h4>
							<p><strong><?php echo $this->session->userdata('email')?></strong></p>
							<p><strong>
								<?php if($pesanan->method = 1){
											echo "Virtuan Money";
										}else{
											echo "Bayar di Tempat";
										}
								;?>
								</strong>
							</p>
							  <?php 
										foreach($data_payment as $saa) {
											$stat = $saa->status;
											$nama_sekolah = $saa->nama_sekolah;
											$alamat= $saa->alamat_sekolah;
										} 
									?>
							<p> <?= $alamat;?></p>
							<p> <?= $nama_sekolah;?></p>

						  </div>
						  <!-- Grid column -->

						</div>
						<!-- Grid row -->

					  </div>
					</div>

				  </section>
				  <!-- Section: Invoice details -->

				  <!-- Section: Invoice table -->
				  <section class="mb-5">
					<div class="card">
					  <div class="card-body">
						 <div class="row justify-content-center">
							<div class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
								
								<ul id="progressbar">
									<li class="active" id="account"><strong>Antrian</strong></li>
									<li  <?php if($stat == 3){ echo "class='active'";  } else if($stat == 4){ echo "class='active'";  }?> id="personal"><strong>Process</strong></li>
									<li  <?php if($stat == 4){ echo "class='active'";  }?>  id="payment"><strong>Delivery</strong></li>
									<li id="confirm"><strong>Finish</strong></li>
								</ul>
							</div>
						  </div>
						<div class="table-responsive">
						  <table class="table" >
							<thead>
							  <tr style="background-color:rgb(245, 245, 245)">
								<th class="center">No</th>
								<th>Produk</th>
								<th>Description</th>
								<th class="right">Price</th>
								<th class="center">Qty</th>
								<th class="right">Total</th>
							  </tr>
							</thead>
							  <tbody>
									<?php 
										$no=1; foreach($data_payment as $data) { $id_pesanan = $data->id_pesanan;$ongkir= $data->ongkir; $statuspesanan = $data->status; $id_kantin = $data->id_kantin ;
									?>
									<tr>
										<td class="center"><?= $no++;?></td>
										<td class="left strong"><?= $data->nama_produk;?></td>
										<td class="left"><?= $data->deskripsi;?></td>
										<td class="center"><?= "Rp. ".number_format($data->harga,2,",",".");?></td>
										<td class="center"><?= $data->jumlah_pesanan;?></td>

										<td class="center"><?= "Rp. ".number_format($data->total_harga,2,",",".");?></td>
									</tr>
									<?php }?>
								</tbody>
						  </table>
						</div>
						<ul class="list-unstyled text-right">
						 <div class="col-lg-4 col-sm-5 ml-auto" >
								<table class="table table-clear" >
									<tbody>
										<tr>
											<td class="left">
												<strong class="text-dark">Subtotal</strong>
											</td>
											<td class="right"><?php echo "Rp. ".number_format($payment->jumlah,2,",",".");?></td>
										</tr>
										<tr>
											<td class="left">
												<strong class="text-dark">Biaya Ongkir</strong>
											</td>
											<td class="right">
												<?php $ratusan = substr($ongkir, -3);
													 if($ratusan<500){
														 $akhir = $ongkir - $ratusan;
														 echo "Rp. ".number_format($akhir, 2, ',', '.');
													 }else{
														 $akhir = $ongkir + (1000-$ratusan);
														 echo "Rp. ".number_format($akhir, 2, ',', '.');
													 };
												?>
											</td>
										</tr>
										<tr>
											<td class="left">
												<strong class="text-dark">Total</strong> </td>
											<td class="right">
												<strong class="text-dark">
													<?php $ratusan = substr($ongkir, -3);
														 if($ratusan<500){
															 $akhir = $payment->jumlah + $ongkir - $ratusan;
															 echo "Rp. ".number_format($akhir, 2, ',', '.');
														 }else{
															 $akhir = $payment->jumlah + $ongkir + (1000-$ratusan);
															 echo "Rp. ".number_format($akhir, 2, ',', '.');
														 };
													?>
												</strong>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</ul>
						  
						  <div class="row" style="margin-top:40px;">
								<div class="col-lg-4 col-sm-5">
								</div>
								<?php if($data->status == 2){?>
								<a href="#" data-toggle="modal" data-target="#batal" class="btn btn-danger btn-rounded col-lg-3 col-sm-3 ml-auto" > <i class="fas fa-trash"> </i>  Batalkan Pesanan</a>
								<?php }?>
							</div> 
					  </div>
					</div>

				  </section>
				  <!-- Section: Invoice table -->

					</div>
					
				</div>
			</section>
					<div class="modal fade" id="batal"  aria-labelledby="exampleModalLabel" >
						<div class="modal-dialog" role="document">
						  <div class="modal-content" style="margin-top:220px">
							<div class="modal-header">
								<div class="c">
								<h4 class="modal-title" id="exampleModalLabel"><b>Yakin ingin Batal ?</b></h4>
								</div>
							</div>
							<div class="modal-body">Apakah Anda Yakin Ingin Melanjutkan Proses ini ?</div>
							<div class="modal-footer">
							  <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
								<a href="<?php echo base_url() ;?>index.php/Payment/cancel/<?= $id_pesanan;?>" class="btn btn-danger"><i class="icon-remove"></i>  Batalkan Pesanan</a>
							</div>
						  </div>
						</div>
					  </div>
			
					<!--Modal: modalCookie-->
						<div class="modal fade top" id="konfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
						  aria-hidden="true" data-backdrop="true">
						  <div class="modal-dialog modal-frame modal-bottom modal-notify modal-info" role="document">
							<!--Content-->
							<div class="modal-content">
							  <!--Body-->
							  <div class="modal-body">
								<div class="row d-flex justify-content-center align-items-center">

									<p class="align-middle"><b>Apakah Makanan anda sudah sampai tujuan ? Jika iya tolong Konfirmasi Pesanan </b></p>
									
								  <a href="<?php echo base_url() ;?>index.php/Payment/konfirm/<?= $id_kantin ;?>/<?= $akhir ;?>" class="btn btn-primary"><i class="icon-remove"></i> Konfirmasi</a>
								  <a type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</a>
								</div>
							  </div>
							</div>
							<!--/.Content-->
						  </div>
						</div>

							<!--Modal: modalPush-->
							<div class="modal fade" id="info_konfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
							  aria-hidden="true">
							  <div class="modal-dialog modal-notify modal-info" role="document">
								<!--Content-->
								<div class="modal-content text-center">
								  <!--Header-->
								  <div class="modal-header d-flex justify-content-center">
									<p class="heading">Konfirmasi Pesanan !!!</p>
								  </div>

								  <!--Body-->
								  <div class="modal-body">

									<i class="fas fa-bell fa-4x animated rotateIn mb-4"></i>

									<p>Apakah makanan anda telah sampai ?? Jika makanan anda telah sampai. harap untuk melakukan konfirmasi pesanan sekarang. Termikasih  : )</p>

								  </div>

								  <!--Footer-->
								  <div class="modal-footer flex-center">
									<a  href="#" data-dismiss='modal' data-toggle="modal" data-target="#konfirm" class="btn btn-danger" style="float-right">Konfirmasi</a>
								  </div>
								</div>
								<!--/.Content-->
							  </div>
							</div>
							<!--Modal: modalPush-->

							<!--Modal: modalPush-->
							<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
							  aria-hidden="true">
							  <div class="modal-dialog modal-notify modal-info" role="document">
								<!--Content-->
								<div class="modal-content text-center">
								  <!--Header-->
								  <div class="modal-header d-flex justify-content-center">
									<p class="heading">Be always up to date</p>
								  </div>

								  <!--Body-->
								  <div class="modal-body">

									<i class="fas fa-bell fa-4x animated rotateIn mb-4"></i>

									<p>Pesanan anda sedang di buat. Silahkan tunggu hingga prosses selesai dan makanan anda akan sampai tujuan</p>

								  </div>

								  <!--Footer-->
								  <div class="modal-footer flex-center">
									<a type="button" class="btn btn-info" data-dismiss="modal">Yes</a>
								  </div>
								</div>
								<!--/.Content-->
							  </div>
							</div>
							<!--Modal: modalPush-->
