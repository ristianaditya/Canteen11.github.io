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
						  <h3 class="mb-0">Riwayat Transaksi</h3>
						</div>
						 <form method="post" action="<?php echo base_url(); ?>index.php/Penjual/Utama/search_transaksi">
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
                    <th scope="col">Tanggal</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
					<?php $no=1; foreach($pesanan as $pesanan){?>
                  <tr>
                    <th>
                     <?= $no++;?>
                    </th>
                    <td>
                      <?= strtoupper($pesanan->nama);?>
                    </td>
                    <td>
						<?= $pesanan->tanggal;?>
                    </td>
					   <td>
						<?= number_format($pesanan->total_harga);?>
                    </td>
					<td class="text-right">
						  <div class="dropdown">
							<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							  <i class="fas fa-ellipsis-v"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
							  
							  <a class="dropdown-item" href="<?= base_url();?>index.php/Penjual/Utama/detail_transaksi/<?= $pesanan->id_transaksi;?>">Detail</a>
							</div>
						  </div>
                    </td>
                  </tr>
					<?php }?>
                </tbody>
              </table>
            </div>
			</div>
		  </div>
		</div>