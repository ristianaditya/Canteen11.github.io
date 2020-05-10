
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
		<form method="post" enctype="multipart/form-data" action="<?= base_url();?>index.php/Penjual/Utama/aksi_tambah_produk/<?=$profile->id_kantin;?>">
		<div class="row">
			<div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
			  <div class="card card-profile shadow">
				<br><br><br>
				<div class="row justify-content-center">
				  <div class="col-lg-3 order-lg-2">
					<div class="card-profile-image">
							<img class="profile-pic" height="180px" width="180px" src="<?php echo base_url() ;?>assets/image/product.jpg" >
					</div>
				  </div>
				</div>
				<div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
				</div><br><br><br>
				<div class="card-body pt-0 pt-md-4">
					<input class="btn btn-info file-uploads" style="width:100%" type="file" name="foto" />
					 <div style="color:red;"><?php if(empty($error)){}else{ echo $error;}?></div>
				</div>
			  </div>
			</div>
		<div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Tambah Produk</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">Produk information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control form-control-alternative" placeholder="Masukan Nama Produk" >
						  <div style="color:red;"><?php echo form_error ('nama_produk'); ?></div>	
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Harga</label>
                        <input type="number" name="harga" placeholder="Masukan Harga Produk" class="form-control form-control-alternative">
						  <div style="color:red;"><?php echo form_error ('harga'); ?></div>	
                      </div>
                    </div>
                  </div>
					<div class="form-group">
                     <label class="form-control-label" for="input-last-name">Kategori Produk</label>
					 <select class="form-control form-control-alternative" name="kategori" style="height:100%">
						 <?php foreach($kategori as $a){?>
						 	<option value="<?= $a->id_kategori;?>"><?= $a->nama_kategori ;?></option>
						 <?php }?>
					</select>
                  </div>
                  <div class="form-group">
                     <label class="form-control-label" for="input-last-name">Status Produk</label>
					 <select class="form-control form-control-alternative" name="status" style="height:100%">
						 <option value="2">Tersedia</option>
						 <option value="1">Kosong</option>
					 </select>
                  </div>
				  <div class="form-group">
					 <label>deskripsi</label>
					  <textarea rows="4" class="form-control form-control-alternative" name="deskripsi" placeholder="Masukan Deskripsi Produk"></textarea>  <div style="color:red;"><?php echo form_error ('deskripsi'); ?></div>	
				  </div>
					<button type="submit" style="float:right" class="btn btn-primary">Submit</button>
                </div>
            </div>
          </div>
		</div>
	</div>
	</form>
	<script>
		$(document).ready(function() {


			var readURL = function(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$('.profile-pic').attr('src', e.target.result);
					}

					reader.readAsDataURL(input.files[0]);
				}
			}


			$(".file-uploads").on('change', function(){
				readURL(this);
			});

			$(".upload-button").on('click', function() {
			   $(".file-uploads").click();
			});
		});
	</script>