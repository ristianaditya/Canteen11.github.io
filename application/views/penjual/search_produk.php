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
						  <a href="<?= base_url() ;?>index.php/Penjual/Utama/tambah_produk" class="mb-0 btn btn-primary" style="color:white">Tambah Produk</a>
						</div>
						    <form method="post" action="<?php echo base_url(); ?>index.php/Penjual/Utama/search_produk">
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
                    <th scope="col">Kategori</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">foto</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
					<?php $no=1; foreach($produk as $produk){?>
                  <tr>
                    <th>
                     <?= $no++ ;?>
                    </th>
					 <td>
						 <?= $produk->nama_kategori;?>
                    </td>
                    <td>
                        <?= strtoupper($produk->nama_produk);?>
                    </td>
                    <td>
						<?= $produk->harga;?>
                    </td>
                    <td>
						<img src="<?= base_url(); ?><?= $produk->foto_produk;?>" style="height:40px;width:50px;">
                    </td>
                  
						<?php if($produk->status_produk == 1){ ?>
					   <td style="background-color:rgb(255, 250, 205);color:rgb(244, 164, 95);"><b> Kosong</b></td>
						<?php }else {?>
					  <td style="background-color:rgb(152, 251, 153);color:rgb(46, 139, 87)"><b> Tersedia</b></td>
						<?php }?>
					  
					  <td class="text-right">
						  <div class="dropdown">
							<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							  <i class="fas fa-ellipsis-v"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
								<a class="dropdown-item" href="<?= base_url();?>index.php/Penjual/Utama/edit_produk/<?= $produk->id_produk;?>">Edit Produk</a> 
								<a class="dropdown-item" href="#" href="#" data-toggle="modal" data-target="#<?= $produk->id_produk;?>"> Delete Produk</a>
							</div>
						  </div>
                    </td>
                  </tr>
					
					<div class="modal fade" id="<?= $produk->id_produk;?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
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
										<h4 class="heading mt-4">Hapus Produk ?</h4>
										<p>Apakah anda yakin untuk menghapus produk ini ?.</p>
									</div>

								</div>

								<div class="modal-footer">
									<a href="<?= base_url();?>index.php/Penjual/Utama/delete_produk/<?= $produk->id_produk;?>" class="btn btn-white">Accept</a>
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