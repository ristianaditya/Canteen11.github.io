<!-- Banner --> 
	<div class="sec-banner bg0 flex-w p-l-25 p-r-30 p-t-40 p-lr-0-lg">
		<div class="container">

			<div class="flex-w flex-sb-m p-b-32 txt-center">
				<div class="flex-w flex-c-m m-tb-10">		
					<div class="p-b-20">
						<h3 class="ltext-103 cl5">
							Canteen Overview
						</h3>
					</div>
				</div>
				
				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search" style="margin-right:10px">
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
					<form method="post" action="<?= base_url();?>index.php/Canteen/filter_kantin">
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
						<form method="post" action="<?php echo base_url() ;?>index.php/Canteen/search_kantin">
							<div class="bor8 dis-flex p-l-15">
								<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
									<i class="zmdi zmdi-search"></i>
								</button>

								<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search" placeholder="Search">
							</div>
						</form>
					</div>
			</div>
			
			<div class="row" style="margin-bottom:100px;">
				<?php
					foreach($kantin as $s){$produk = $s->id_kantin ;}
					if(empty($produk)){
					?>
								<img src="<?php echo base_url() ;?>assets_frontend/images/no_result.gif" style="min-width:350px;width:50%;height:70%;margin:auto;display: block;" class="card-img-top container" >
					<?php }?>
				<?php foreach($kantin as $data) {;?>
            <div class="col-lg-4 col-md-12 mb-4 wow fadeIn" data-wow-delay="0.4s">

              <!--Card-->
              <div class="card card-cascade wider">
				  
				  <div class="card">
					<?php if($data->status_kantin == 1) {?>
						<div class="view ">
						<?php }else {?>
						<div class="view overlay zoom" >
							<?php }?>
							<?php if(empty($data->foto_kantin)) {?>
							<div class="view">
									 <img src="<?php echo base_url();?>assets_frontend/images/kantin-default.jpg" alt="IMG-BANNER" style="height:280px;width:100%;">
									<?php if($data->status_kantin == 1) {?>
										<div class="mask pattern-9 flex-center">
											<h1><p class="white-text" style=" font-weight: 400;"><B>CLOSED</B></p></h1>
										</div>
									<?php }?>
							</div>
							<?php } else{?>
								<div class="view">
									<img  class="pattern-6" src="<?php echo base_url().$data->foto_kantin;?>" alt="IMG-BANNER" style="height:280px;width:100%;">
									<?php if($data->status_kantin == 1) {?>
										<div class="mask pattern-9 flex-center">
											<h1><p class="white-text" style=" font-weight: 400;"><B>CLOSED</B></p></h1>
										</div>
									<?php }?>
									<?php if($data->penilaian >= 4) { if($data->jml_transaksi >= 24) {?>
									 <span class="soldout">
									 	<i class="fas fa-check"></i> Star Seller	
								  	 </span>
									<?php }}?>
								</div>
									<?php }?>
						<a href="<?php echo base_url() ;?>index.php/Canteen/kantinone/<?php echo $data->id_kantin ;?>">
						  <div class="mask rgba-white-slight"></div>
						</a>
					  </div>

					  <!-- Button -->
					  <a  href="<?php echo base_url() ;?>index.php/Canteen/kantinone/<?php echo $data->id_kantin ;?>" style="z-index:20" class="btn-floating btn-action ml-auto mr-4 mdb-color lighten-3"><i
						  class="fas fa-chevron-right pl-1"></i></a>

					  <!-- Card content -->
					
					   <div class="card-body">
						   
							 <ul class="list-unstyled list-inline rating mb-0" style="margin-left:-20px;margin-top:-20px; height:10px;pointer-events: none;">
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
							</ul>
						<!-- Title -->
						<h4 class="card-title"><strong><?php echo strtoupper($data->nama_kantin);?></strong></h4>
						<hr>
						<!-- Text -->
						  <p class="card-text"><strong><?= $data->nama_sekolah;?></strong></p>
						<p class="card-text"><?= $data->alamat_sekolah;?>.</p>

					  </div>


					</div>
					<!-- Card -->
				  
				  </div></div>
            <!--/First column-->
				<?php };?>
				
			</div>
		</div>
	</div>
