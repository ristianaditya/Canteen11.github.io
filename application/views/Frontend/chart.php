<style>
		#map {
			width: 100%;
			height: 200px;
			
		}
</style>
<link rel="stylesheet" href="<?php echo base_url() ;?>assets_frontend/style.css">
<!-- Shoping Cart -->
	<?php foreach($keranjang as $id_kantin) {
		$id_kantin = $id_kantin->id_kantin; }
	?>	<form method="post" action="<?php echo base_url() ;?>index.php/Utama/checkout/<?php if(empty($id_kantin)){ }else{ echo $id_kantin;}?>" class="bg0 p-t-75 p-b-85"  style="background-color:#edf3ff;">	
		<div class="container">
		<!-- Section: Invoice details -->
				   <div class="card card-cascade narrower">

								  <!-- Card image -->
								  <div class="view view-cascade gradient-card-header mdb-color lighten-3">
									<h5 class="mb-0 font-weight-bold">Cart</h5>
								  </div><br>
					  <div class="card-body">
						<div class="container">
						<!-- Grid row -->
						<div class="row">

						  <!-- Grid column -->
						  <div class="col-md-6 text-left" style="margin-bottom:10px;">

									<?php 
										foreach($keranjang as $data)
											{ 
												$nama_kantin = $data->nama_kantin; 
												$nama_sekolah = $data->nama_sekolah; 
												$alamat = $data->alamat_sekolah; 
											}
									?>

							<p><small>From:</small></p>
							<p><strong>Canteen11 Company</strong></p>
							<p>Jln Budi Cilember Bandung Jawa Barat</p>
							<p><strong>Chackout date:</strong> <?php echo date('D-M-Y')?></p>

						  </div>
						  <!-- Grid column -->

						  <!-- Grid column -->
						  <div class="col-md-6 text-right">

							<p><small>Detail :</small></p>
							<p><strong><?php if(empty($nama_kantin)){echo "none" ;}else{echo $nama_kantin ;}?></strong></p>
							<p><strong>
								
								</strong>
							</p>
							<p> <?php if(empty($nama_sekolah)){echo "none" ;}else{ echo $nama_sekolah;}?></p>
							<p> <?php if(empty($alamat)){echo "none" ;}else{ echo $alamat;}?></p>

						  </div>
						  <!-- Grid column -->

						</div>
						<!-- Grid row -->
						</div>
					  </div><br>
				  <!-- Section: Invoice details -->

			
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head" style="background-color:rgb(245, 245, 245)">
									<th class="text-center">Product</th>
									<th class="text-center">Product Name</th>
									<th class="text-center" style="width:100px;">Price</th>
									<th class="text-center" style="width:10px;">Quantity</th>
									<th class="text-center">Total</th>
								</tr>
								<?php foreach($keranjang as $produk) {
								$data_kantin = $produk->alamat_sekolah;
								?>
								<tr class="table_row" >
									<td class="column-1">
										<a href="<?php echo base_url() ;?>index.php/Utama/delete_pesanan_chart/<?= $produk->id_dafpes;?>">
											<div class="how-itemcart1" style="width:70px;">
												<img style="height:50px;width:70px;" src="<?php echo base_url().$produk->foto_produk?>" alt="IMG">
											</div>
										</a>
									</td>
									<td class="text-center"><?= $produk->nama_produk ;?></td>
									<td class="text-center"><?= number_format($produk->harga,2,",",".");?></td>
									<td class="text-center center-align">
										<div class="wrap-num-product flex-w m-l-auto m-r-0" >
											<a href="<?= base_url();?>index.php/Utama/kurang_qty/<?= $produk->id_dafpes;?>/<?= $produk->id_produk;?>/<?= $produk->harga;?>" class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" >
												<i class="fs-16 zmdi zmdi-minus"></i>
											</a>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="<?= $produk->jumlah_pesanan;?>">

											<a href="<?= base_url();?>index.php/Utama/tambah_qty/<?= $produk->id_dafpes;?>/<?= $produk->id_produk;?>/<?= $produk->harga;?>" class="btn-num-product-up cl8 hov-btn3 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</a>
										</div>
									</td>
									<td class="text-center"><?= number_format($produk->total_harga,2,",",".");?></td>
								</tr>
								<?php }?>
							</table>
						</div>
					</div>
				</div>
				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50" >
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm" style="background-color:rgb(245, 245, 245)">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>
						<div style="margin-top:-30px;" class="flex-w flex-t bor12 p-b-13">
						</div><br>
						<div id="map"></div><br	>
						<div id="pesan">
							<form>
								<input hidden value="<?php if(empty($data_kantin)){}else{echo $data_kantin; };?>" type="text" class="form-control" id="start">

								<div class="form-group">
									<label>Masukkan Lokasi Tujuan</label>
									<input name="alamat" type="text" class="form-control" id="end" placeholder="Masukan Lokasi Tujuan" required>
								</div>
								 <div class="d-block my-3">
									 <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="payment" required>
											<option disabled>Masukan Metode Pembayaran</option>
											<option value="1">Saldo</option>
											<option selected value="2">Bayar di Tempat</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								  </div> <br>
								 <div id="myBoton">
									<input type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer dropdown-item" id="pesan-btn" style="text-align:center" value="Lanjutkan">
								 </div>
							</form>
						 <div id="detail">
							 
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
										  </tbody>
										</table>

									  </div>
									</div>
								  </div>
								</div>
							 
							<hr />
							<h4>Detail Pesanan</h4><br>
							<div class="card-custom">	
								<table>
									<tr>
										<th>Jarak</th>
										<th>:</th>
										<td ><textarea name="jarak" readonly id="distance" style="max-height:20px;"></textarea></td>
									</tr>
									<tr>
										<th>Durasi</th>
										<th>:</th>
										<td><textarea readonly name="durasi" id="duration" style="max-height:20px;"></textarea></td>
									</tr>
									<tr>
										<th>Ongkir</th>
										<th>:</th>
										<td><textarea readonly name="ongkir" id="price" style="max-height:20px;"></textarea></td>
									</tr>
									<tr>
										<th>Harga Makanan</th>
										<th>:</th>
										<td><?php echo "Rp. ".number_format($total->jumlah,2,",",".");?></td>
									</tr>
								</table>
							</div><br><br>
							 <?php if(empty($jumlah)){ }else {?>
								<?php if($validasi_checkout > 0){?>
									<a class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer dropdown-item" style="color:white;background-color:black" onclick="toastr.error('Produk sedang kosong');">Check Out</a>
								<?php }else{?>
								<?php if($validasi_checkout1 > 0){?>
									<a class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer dropdown-item" style="color:white;background-color:black" onclick="toastr.error('Kantin Sedang tutup');">Check Out</a>
								<?php }else{?>
								<a class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer dropdown-item" style="color:white;background-color:black" href="#" data-toggle="modal" data-target="#checkout1">Check Out</a>
							  <?php }}}?>
						</div>
						</div>
					  </div>

						<!--Modal: modalCookie-->
						<div class="modal fade top" id="checkout1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
						  aria-hidden="true" data-backdrop="true">
						  <div class="modal-dialog modal-frame modal-notify modal-top" role="document">
							<!--Content-->
							<div class="modal-content">
							  <!--Body-->
							  <div class="modal-body">
								<div class="row d-flex justify-content-center align-items-center">

									<p class="align-middle"><b>Apakah Anda memerlukan lebih banyak waktu untuk membuat keputusan pembelian  </b></p>
									
								  <button type="submit" class="btn btn-primary" > Checkout <i class="fas fa-book ml-1"></i></button>
								  <a type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</a>
								</div>
							  </div>
							</div>
							<!--/.Content-->
						  </div>
						</div>
					</div>
				</div>
			</div>
		</div>

</form>
		<script>
			  var map;
			  function initMap() {
				map = new google.maps.Map(document.getElementById('map'), {
				  center: {lat: -7.795580, lng: 110.369490},
				  zoom: 15
				});
			  }
		</script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtgo_o9DzZTmF9pfJA48Qdd-igXNzL6jM&libraries=places"></script>
		<script src="<?php echo base_url() ;?>assets_frontend/script.js"></script>

