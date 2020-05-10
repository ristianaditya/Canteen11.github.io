<style type="text/css">
		input.error, textarea.error {border: 1px dotted red;}
		label.error, label.error{
			color: red;
			font-style: italic
		}
	</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  
<!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(<?php echo base_url() ;?><?= $profile->foto_kantin ;?>); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello <?= $profile->nama ;?>!</h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
            <a href="#" data-toggle="modal" data-target="#change" class="btn btn-info">Ganti Foto Kantin</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
					<?php if(empty($profile->foto)) {?>
						<img src="<?php echo base_url() ;?>assets/image/loader1.gif" style="height:190px;width:500px" class="rounded-circle profile-pic">
					<?php } else { ?>
						<img src="<?php echo base_url() ;?><?= $profile->foto ;?>" style="height:190px;width:500px" class="rounded-circle profile-pic">
					<?php }?>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <button class="btn btn-sm btn-info mr-4">Contact</button>
                <button class="btn btn-sm btn-default float-right">Message</button>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
			<form method="post" enctype="multipart/form-data" action="<?= base_url();?>index.php/Penjual/Utama/update_foto_penjual/">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                      <span class="heading"></span>
                      <span class="description"></span>
                    </div>
                    <div>
                      <span class="heading"></span>
                      <span class="description"></span>
                    </div>
                    <div>
                      <span class="heading"></span>
                      <span class="description"></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                  <?= strtoupper($profile->nama) ;?><span class="font-weight-light"></span>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>Bandung, Indonesia
                </div>
                  <i class="ni education_hat mr-2"></i><?= $kantin->nama_kantin;?>
                <hr class="my-4" />
				  <input type="file" name="foto" class="btn btn-info file-uploads" style="width:100%;margin-bottom:10px">
				  <button type="submit" class="btn btn-primary btn-block">Update</button>
				  <div style="color:red;"><?php if(empty($error)){}else{ echo $error;}?></div>
              </div>
			</form>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="<?= base_url();?>index.php/Penjual/Utama/aksi_edit_penjual" method="post">
                <h6 class="heading-small text-muted mb-4">Informasi Penjual</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input name="username" type="text" id="Username" class="form-control form-control-alternative" placeholder="Masukan Nama" value="<?= strtoupper($profile->nama) ;?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">NIK</label>
                        <input name="no_ktp" placeholder="Masukan NIK" id="NIK" class="form-control form-control-alternative" value="<?= $profile->no_ktp;?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Telepon</label>
                        <input name="no_telepon" type="text" id="telepon" class="form-control form-control-alternative" placeholder="Masukan Telepon" value="<?= $profile->no_telepon ;?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Tanggal Lahir</label>
                        <input name="tgl_lahir" type="date" id="t_lahir" placeholder="Masukan Tanggal Lahir" class="form-control form-control-alternative" value="<?= $profile->tgl_lahir;?>">
                      </div>
                    </div>
                  </div>
                </div>
				<div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Email</label>
                        <input name="email" id="input-address" class="form-control form-control-alternative" placeholder="Alamat Email" value="<?= $profile->email;?>" type="email">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Alamat</label>
                        <input name="alamat" class="form-control form-control-alternative" placeholder="Alamat Rumah" value="<?= $user->alamat;?>" type="text">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Informasi Kantin</h6>
                <div class="pl-lg-4">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Nama Kantin</label>
                        <input name="nama_kantin" id="input-address" placeholder="Masukan Nama kantin" class="form-control form-control-alternative" value="<?= $kantin->nama_kantin;?>" type="text">
                      </div>
					  <div class="form-group">
                    <label>Deskripsi Kantin</label>
                    <textarea name="deskripsi_kantin" rows="4" placeholder="Masukan Deskripsi Kantin" class="form-control form-control-alternative"><?= $kantin->deskripsi;?>	  
					</textarea>
                  </div>
                    </div>
                </div>
				  <button type="submit" style="float:right" class="btn btn-primary">Update</button>
              </form>
				<a href="#" data-toggle="modal" data-target="#exampleModal" style="float:right;margin-right:10px" class="btn btn-warning">Password</a>
            </div>
          </div>
        </div>
      </div>

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h2 class="modal-title" id="exampleModalLabel">Ganti Password</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			<form id="addForm" method="post" action="<?= base_url();?>index.php/Penjual/Utama/ganti_password_penjual">
			  <div class="modal-body">
				  			<div class="form-group">
									<label>Old Password</label>
                                    <input name="old_password" id="old_password" type="password" class="form-control" placeholder="Masukan Password Lama">
							</div>
				  			<div class="form-group">
									<label>Password</label>
                                    <input name="password" id="password" type="password" class="form-control" placeholder="Masukan Password">
							</div>
						  	<div class="form-group">
									<label>Confirm Password</label>
                                     <input name="confirm" id="confirm" type="password" class="form-control" placeholder="Masukan Confirm Password">
						    </div> 
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
		
		<!-- Modal -->
		<div class="modal fade" id="change" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h2 class="modal-title" id="exampleModalLabel">Ganti Banner Kantin</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			<form method="post" enctype="multipart/form-data" action="<?= base_url();?>index.php/Penjual/Utama/update_foto_kantin/<?=$profile->id_kantin;?>">
			  <div class="modal-body">
				 	 <?php if(empty($profile->foto_kantin)) {?>
						<img class="profile-picture"  height="250px" width="100%" src="<?php echo base_url();?>assets_frontend/images/kantin-default.jpg">
						<?php } else { ?>
						<img class="profile-picture" height="250px" width="100%" src="<?php echo base_url() ;?><?php echo $profile->foto_kantin ;?>"><br>
					<?php }?>		
			  </div>
			  <div class="modal-footer">
				<input type="file" name="foto" class="btn btn-info file-upload" style="width:100%;height:44px">
				<button type="submit" class="btn btn-primary btn-block">Update</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
		<script src="<?php echo base_url() ;?>assets_frontend/jquery.validate.min.js"></script>
		<script src="<?php echo base_url() ;?>assets_frontend/jquery.validate.js"></script>
		<script>
		  $("#addForm").validate({
			  rules: {

				 old_password: {
				  required: true,
				  minlength: 6
				},
				 password: {
				  required: true,
				  minlength: 6
				},
				 confirm: {
				  equalTo: "#password",
				  required: true,
				  minlength: 6
				},
			  },

			  messages: {
				  old_password: {
				  required: "Field password Wajib Diisi",
				},
				  password: {
				  required: "Field password Wajib Diisi",
				  minlength: "Min. 12 karakter"
				},
				  confirm: {
				  required: "Field Confirm Password Wajib Diisi",
				  minlength: "Min. 12 karakter",
				  equalTo: "Confirm Password Tidak Sesuai"
				},
			  }
			});
		</script>
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
		<script>
		$(document).ready(function() {


			var readURL = function(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$('.profile-picture').attr('src', e.target.result);
					}

					reader.readAsDataURL(input.files[0]);
				}
			}


			$(".file-upload").on('change', function(){
				readURL(this);
			});

			$(".upload-button").on('click', function() {
			   $(".file-upload").click();
			});
		});
	</script>