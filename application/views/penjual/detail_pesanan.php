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
          <div class="card shadow" style="padding-bottom:40px;">
			  
            <div class="card-header border-0">
				 <div class="row align-items-center">
						<div class="col">
						  <h3 class="mb-0">Detail Pesanan</h3>
						</div>
						<div class="col text-right">
						  <a  onclick="window.history.back()" class="btn btn-sm btn-primary active">Kembali</a>
						</div>
				  </div>
            </div>
            <div class="table-responsive">
              <table class="table table-hover text-center align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <tr>
						<th scope="col">No</th>
						<th scope="col">Produk</th>
						<th scope="col">Qty</th>
						<th scope="col">deskripsi</th>
						<th scope="col">Total Harga</th>
					</tr>
                </thead>
				  <tbody>
             		<?php $no = 1; foreach($detail_pesanan as $detail){ ?>
						<tr>
							<td><?= $no++;?></td>
							<td><?= $detail->nama_produk;?></td> 
							<td><?= $detail->jumlah_pesanan;?></td> 
							<td><?= $detail->deskripsi;?></td>
							<td><?= "Rp. ".number_format($detail->total_harga);?></td>
						</tr>
					<?php }?>
                </tbody>
              </table>
            </div>
			</div>
		  </div>
		</div>
