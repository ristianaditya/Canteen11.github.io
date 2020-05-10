   <!-- Header -->
    <div class="header
				<?php if($profile->status_kantin == 1){?>
				  		bg-default
					<?php }else if(($profile->status_kantin == 2)){ ?>
						bg-primary
					<?php }?>
				pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
           <div class="card-header border-0">
				 <div class="row align-items-center">
						<div class="col">
						  <h3 class="mb-0">Proses Pesanan</h3>
						</div>
						 <form method="post" action="<?php echo base_url(); ?>index.php/Penjual/Utama/search_proses_pesanan">
							   <div class="input-group input-group-rounded input-group-merge container">
								<input style="z-index:0" type="search" name="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
								<div class="input-group-prepend">
								  <button type="submit" class="input-group-text">
									<span class="fa fa-search"></span>
								  </button>
								</div>
							  </div>
							</form>		
				  </div>
            </div>
            <div class="table-responsive">
              <table class="table table-hover text-center align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Alamat</th>
					 <th>Method</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ongkir</th>
                    <th scope="col">Jarak</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
					<?php foreach($pesanan as $pesanan){?>
                  <tr>
                    <th>
                     <?= ++$start;?>
                    </th>
                    <td>
                      <?= strtoupper($pesanan->nama);?>
                    </td>
                    <td>
						<?= $pesanan->alamat;?>
                    </td>
					  <td>
						<?php if($pesanan->method == 1){ 
							echo "Saldo";
						}else {
						   	echo "COD";
						 }?>
                    </td>
						<?php if($pesanan->status == 3){ ?>
					  <td style="background-color:rgb(255, 250, 205);color:rgb(244, 164, 95)"><b> Pengolahan</b></td>
					  
						<?php }else {?>
					  <td style="background-color:rgb(152, 251, 153);color:rgb(46, 139, 87)"><b> Pengiriman</b></td>
						<?php }?>
                    <td>
						<?php
						$ongkir = $pesanan->ongkir;
						$ratusan = substr($ongkir, -3);
							if($ratusan<500){
								$akhir = $ongkir - $ratusan;
								echo number_format($akhir);
							}else{
								$akhir = $ongkir + (1000-$ratusan);
								echo number_format($akhir);
							};
						?>
                    </td>
                    <td>
						<?= $pesanan->jarak;?>
                    </td>
					<td class="text-right">
						  <div class="dropdown">
							<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							  <i class="fas fa-ellipsis-v"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
								<?php if($pesanan->status == 3){ ?>
									<a class="dropdown-item" href="#" href="#" data-toggle="modal" data-target="#<?= $pesanan->id_pesanan;?>">Antar Pesanan</a>
								<?php }?>
							  
							  <a class="dropdown-item" href="<?= base_url();?>index.php/Penjual/Utama/detail_pesanan/<?= $pesanan->id_pesanan;?>">Detail</a>
							</div>
						  </div>
                    </td>
                  </tr>
					
					<div class="modal fade" id="<?= $pesanan->id_pesanan;?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
						<div class="modal-dialog modal-primary modal-dialog-centered modal-10" role="document">
							<div class="modal-content bg-gradient-danger">

								<div class="modal-header">
									<h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>

								<div class="modal-body">

									<div class="py-3 text-center">
										<i class="ni ni-bell-55 ni-3x"></i>
										<h4 class="heading mt-4">Antar Pesanan ?</h4>
										<p>Apakah anda yakin pesanan ini sudah siap untuk diantarkan ?.</p>
									</div>

								</div>

								<div class="modal-footer">
									<a href="<?= base_url();?>index.php/Penjual/Utama/kirim_pesanan/<?= $pesanan->id_pesanan;?>/<?= $pesanan->id_pembeli;?>" class="btn btn-white">Accept</a>
									<button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button> 
								</div>

							</div>
						</div>
					</div>
					<!--Modal: modal-->
					<?php }?>
                </tbody>
              </table>
            </div>
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                		<?php echo $this->pagination->create_links(); ?>
				</ul>
              </nav>
            </div>
			</div>
		  </div>
		</div>