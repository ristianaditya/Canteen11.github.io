<section class="sec-product-detail bg0 p-t-65 p-b-60" style="background-color:#edf3ff;">
	<div class="container">
	 	<div class="card card-cascade narrower">
			 <div class="view view-cascade gradient-card-header mdb-color lighten-3">
				 <h5 class="mb-0 font-weight-bold">Detail Product</h5>
			 </div><br>
      		<div class="row wow fadeIn" style="margin-left:30px;margin-right:25px;">
				<!--Grid column-->
				<div class="col-md-6 mb-4" style="margin-top:30px;">
				  <img src="<?php echo base_url().$data->foto_produk ;?>" class="img-fluid"  style="min-height:250px;max-height:250px;min-height:300px" alt="">
				</div>
				<!--Grid column-->
				<!--Grid column-->
				<div class="col-md-6 mb-4">

				  <!--Content-->
				  <div class="p-4">
						<div class="mb-3">
						  <a href="#"><span class="badge badge-pill teal"><img src="https://img.icons8.com/color/25/000000/visit.png"><?php echo $data->nama_sekolah ;?></span></a>
						  <a href="">
							<span class="badge badge-pill purple"><img src="https://img.icons8.com/color/25/000000/visit.png"> <?php echo $data->nama_kategori ;?></span>
						  </a>
						</div>
			  			<h1 class="">
							<b><?php echo strtoupper($data->nama_produk) ;?></b>
						</h1>
						<p class="lead">
							<span><b><?php echo "Rp. ".number_format($data->harga,2,",",".") ;?></b></span>
						</p>
					  	 <ul class="list-unstyled list-inline rating mb-0" style="margin-left:-20px;margin-top:-20px; height:10px;pointer-events: none;">
							 <li class="list-inline-item"><p class="text-muted"> Rating : </p></li>
							  <?php if($data->penilaian <= 1){?>
							  		<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"> </i></li>
							  <?php }else if($data->penilaian <= 1.5){?>
								 	<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"> </i></li>
							  		<li class="list-inline-item"><i class="fas fa-star-half-alt amber-text"></i></li>
						      <?php }else if($data->penilaian <= 2){?>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
							  <?php }else if($data->penilaian <= 2.5){?>
								 	<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
							  		<li class="list-inline-item"><i class="fas fa-star-half-alt amber-text"></i></li>
							  <?php }else if($data->penilaian <= 3){?>
								 	<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
							  <?php }else if($data->penilaian <= 3.5){?>
								  	<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
							  		<li class="list-inline-item"><i class="fas fa-star-half-alt amber-text"></i></li>
							  <?php }else if($data->penilaian <= 4){?>
								 	<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
							  <?php }else if($data->penilaian <= 4.5){?>
								 	<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								 	<li class="list-inline-item"><i class="fas fa-star-half-alt amber-text"></i></li>
							  <?php }else if($data->penilaian <= 5){?>
								 	<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
								    <li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
							  <?php }?>
							  <li class="list-inline-item" style="margin-left:5px;"><p class="text-muted"> <?= $data->penilaian;?></p></li>
							</ul><br>
            			<p class="lead font-weight-bold">Add Description</p>
			 			<form class="justify-content-left" method="post" action="<?php echo base_url() ;?>index.php/Produk/masuk_keranjang/<?php echo $data->id_produk;?>/<?= $data->id_kantin;?>">
							<textarea name="desc" placeholder="ex : kuahnya agak banyak ya." style="width:100%;width: 100%;height: 100px;padding: 12px 20px;box-sizing: border-box;border: 2px solid #ccc;border-radius: 4px;background-color: #f8f8f8;resize: none;"></textarea><br>
							<?php $this->session->set_flashdata('details', $data->id_kantin );?>
							<?php $this->session->set_flashdata('kantins', $this->uri->segment('2'));?>
							<input type="text" name="id_kantin" value="<?php echo $data->id_kantin ;?>" hidden>
							<input type="number" name="harga" value="<?php echo $data->harga ;?>" hidden>
							<div class="form-group input-group">
								<input type="number"  name="jumlah" value="1" aria-label="Search" class="form-control" style="max-width:70px;">
								<button  class="btn btn-primary btn-md my-0 p" type="submit">
									Add to cart <i class="fas fa-shopping-cart ml-1"></i>
								</button>
							</div>
					  	</form>
				  </div>
				  <!--Content-->
				</div>
				<!--Grid column-->
			  </div>
		</div><br><br><br>
		<div class="card card-cascade narrower">
			<div class="view view-cascade gradient-card-header mdb-color lighten-3">
				<h5 class="mb-0 font-weight-bold">Additional information</h5>
			</div>
			<!-- Tab01 -->
			<div class="tab01">
				<!-- Tab panes -->
				<div class="tab-content p-t-43">
					<!-- - -->
					<div class="tab-pane fade show active" id="information" role="tabpanel">
						<div class="container">
							<div class="col-sm-10 col-md-8 col-lg-5 m-lr-auto">
								<table class="table table-hover">
									<tr>
										<td>
											<span class="stext-102 cl3 size-205">
												<h6>Nama Kantin</h6>
											</span>
										</td>
										<td>
											<span class="stext-102 cl6 size-206">
												<h7> : <?php echo strtoupper($alldetail->nama_kantin) ;?></h7>
											</span>
										</td>
									</tr>
									<tr>
										<td>
											<span class="stext-102 cl3 size-205">
												<h6>Nama Produk</h6>
											</span>
										</td>
										<td>
											<span class="stext-102 cl6 size-206">
												<h7> : <?php echo strtoupper($data->nama_produk) ;?></h7>
											</span>
										</td>
									</tr>
									<tr>
										<td>
											<span class="stext-102 cl3 size-205">
												<h6>Kategori</h6>
											</span>
										</td>
										<td>
											<span class="stext-102 cl6 size-206">
												<h7> : <?php echo strtoupper($data->nama_kategori) ;?></h7>
											</span>
										</td>
									</tr>
									<tr>
										<td>
											<span class="stext-102 cl3 size-205">
												<h6>Nama Penjual</h6>
											</span>
										</td>
										<td>
											<span class="stext-102 cl6 size-206">
												<h7> : <?php echo strtoupper($alldetail->nama ) ;?></h7>
											</span>
										</td>
									</tr>
									<tr>
										<td>
											<span class="stext-102 cl3 size-205">
												<h6>No Telepon</h6>
											</span>
										</td>
										<td>
											<span class="stext-102 cl6 size-206">
												<h7> : <?php echo $alldetail->no_telepon ;?></h7>
											</span>
										</td>
									</tr>
									<tr>
										<td>
											<span class="stext-102 cl3 size-205">
												<h6>Email</h6>
											</span>
										</td>
										<td>
											<span class="stext-102 cl6 size-206">
												<h7> : <?php echo $alldetail->email ;?></h7>
											</span>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><br><br>
</section>