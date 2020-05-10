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
						  <h3 class="mb-0">Pesanan</h3>
						</div>
						 <form method="post" action="<?php echo base_url(); ?>index.php/Penjual/Utama/search_pesanan">
							  <div class="input-group input-group-rounded input-group-merge container">
								<input type="search" name="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
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
                    <th style="width:50px">Alamat</th>
					<th>Method</th>
                    <th scope="col">Ongkir</th>
                    <th scope="col">Jarak</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
					<?php $no = 1; foreach($pesanan as $pesanan){?>
                  <tr>
                    <th>
                     <?= $no++ ;?>
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
						<a href="#" data-toggle="modal" data-target="#<?= $pesanan->id_pesanan;?>" class="btn btn-success active btn-sm"><i class="ni ni-active-40"></i></a>
						<a href="<?= base_url();?>index.php/Penjual/Utama/detail_pesanan/<?= $pesanan->id_pesanan;?>" class="btn btn-primary active btn-sm btn-rounded"><i class="ni ni-bullet-list-67"></i> </a>
                    </td>
                  </tr>
					
					<div class="modal fade" id="<?= $pesanan->id_pesanan;?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
						<div class="modal-dialog modal-primary modal-dialog-centered modal-10" role="document">
							<div class="modal-content bg-gradient-success">

								<div class="modal-header">
									<h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>

								<div class="modal-body">

									<div class="py-3 text-center">
										<i class="ni ni-bell-55 ni-3x"></i>
										<h4 class="heading mt-4">Terima Pesanan ?</h4>
										<p>Apakah anda yakin terima pesanan ini ?.</p>
									</div>

								</div>

								<div class="modal-footer">
									<a href="<?= base_url();?>index.php/Penjual/Utama/accept_pesanan/<?= $pesanan->id_pesanan;?>" class="btn btn-white">Accept</a>
									<button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button> 
								</div>

							</div>
						</div>
					</div>
					<?php }?>
                </tbody>
              </table>
            </div>
			</div>
		  </div>
		</div>
