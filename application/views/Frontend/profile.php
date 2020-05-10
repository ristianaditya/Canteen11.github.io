	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<style>
			.profile-pic {
				display: block;
				max-width: 100%;
			}
		</style>
	</head>
				<section class="bg0 p-t-104 p-b-116" style="background-color:#edf3ff;"> 
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-5" style="margin-bottom:10px;">
								 <div class="card card-cascade narrower">

								  <!-- Card image -->
								  <div class="view view-cascade gradient-card-header mdb-color lighten-3">
									<h5 class="mb-0 font-weight-bold">Edit Photo</h5>
								  </div>
								  <!-- Card image -->
										<div class="card-body">
											<?php echo form_open_multipart('Profile/update_foto/'.$profile->id_pembeli) ;?>
											<div class="small-12 medium-2 large-2 columns">
											   	<?php if(empty($profile->foto)) {?>
														<img class="profile-pic" style="width:100%;height:300px;" src="<?php echo base_url() ;?>assets/image/loader1.gif"><br>
												<?php } else { ?>
														<img class="profile-pic" style="width:100%;height:300px;" src="<?php echo base_url() ;?><?php echo $profile->foto ;?>"><br>
												<?php }?>
											</div>
											<div>
												<input class="file-uploads" type="file" name="foto"><br>
												<button type="submit" class="btn btn-primary btn-block">Update</button>
											</div>
											<?php echo form_close() ;?>
										</div>
								</div>
                            </div>
                            <div class="col-lg-9 col-md-7">
                                 <div class="card card-cascade narrower">

              <!-- Card image -->
              <div class="view view-cascade gradient-card-header mdb-color lighten-3">
                <h5 class="mb-0 font-weight-bold">Data Profile</h5>
              </div>
              <!-- Card image -->
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-3 col-6"> <strong>Full Name</strong>
                                                        <br>
                                                        <p class="text-muted"><?= $profile->nama;?></p>
                                                    </div>
                                                    <div class="col-md-3 col-6"> <strong>Mobile</strong>
                                                        <br>
                                                        <p class="text-muted"><?= $profile->no_telepon;?></p>
                                                    </div>
                                                    <div class="col-md-3 col-6"> <strong>Email</strong>
                                                        <br>
                                                        <p class="text-muted"><?= $profile->email;?></p>
                                                    </div>
                                                    <div class="col-md-3 col-6"> <strong>Jenis Kelamin</strong>
                                                        <br>
                                                        <p class="text-muted"><?= $profile->jenis_kelamin;?></p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4 class="mt-30">Kelola Profile</h4>
                                                <hr><br>
												
												<?php echo form_open_multipart('Profile/aksi_edit_pembeli/'.$profile->id_pembeli) ;?>
													<div class="form-group row">
														<label for="exampleInputEmail2" class="col-sm-3 col-form-label">No Telephone</label>
														<div class="col-sm-9">
															<input type="number" class="form-control" id="exampleInputEmail2" name="hp" value="<?php echo $profile->no_telepon ;?>" placeholder="Masukan Nomer Telephone">
															<div style="color:red;margin-top:10px"><?php echo form_error ('hp'); ?></div>
														</div>
													</div>
													<div class="form-group row">
														<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Jenis Kelamin</label>
														<div class="col-sm-9">
															<select class="browser-default custom-select" name="jenis_kelamin">
																<?php 
																	$jk = $profile->jenis_kelamin;
																	if($jk == "Perempuan") { ?>
																	<option disabled name="jenis_kelamin" value=""> Masukan Jenis Kelamin</option>
																	<option name="jenis_kelamin" value="Perempuan" selected> Perempuan</option>
																	<option name="jenis_kelamin" value="Laki-laki" > Laki-Laki</option>
																	<?php } else {?>
																	<option disabled name="jenis_kelamin" value=""> Masukan Jenis Kelamin</option>
																	<option name="jenis_kelamin" value="Perempuan"> Perempuan</option>
																	<option name="jenis_kelamin" value="Laki-laki" selected> Laki-Laki</option>
																	<?php }?>
															</select>
															<div style="color:red;"><?php echo form_error ('jenis_kelamin'); ?></div>
														</div>
													</div><br><br><hr>
													<button type="submit" class="btn btn-primary mr-2">Submit</button>
													<a href="#" class="btn btn-danger" data-toggle='modal' data-target='#haha'><i class="fa fa-key" aria-hidden="true"></i> Ubah Password</a>
												<?php echo form_close() ;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
						
				<div class='modal fade' id='' aria-labelledby='exampleModalLabel' style="margin-top:100px;" >
					<div class='modal-dialog modal-lg box-shadow' role='document'>
						<div class='modal-content' style="width:auto;">
							<div class="modal-header" style="background-color:rgb(119, 136, 153);">
								<div class="c">
								<h4 style="color:white;" class="modal-title" id="exampleModalLabel"><b>UBAH PASSWORD</b></h4>
								</div>
							</div>
							<form id="form_barang"  method="post" action="<?php echo base_url(); ?>index.php/Profile/ganti_password">
								<div class='modal-body'>
										  <div class="form-group">
											<label>Old Password :</label>
											<input type="text" class="form-control" name="password">
										  </div>
										  <div class="form-group">
											<label>New Password :</label>
											<input id="new" type="password" class="form-control" name="" >
										  </div>
										  <div class="form-group">
											<label>Password Confirm :</label>
											<input id="confirm" type="password" class="form-control" name="new_password">
										  </div>
										<div hidden>
										  <div class="col-xs-6">
											<label for="last_name"><h4>Nip</h4></label>
											  <input type="text" class="form-control" name="nip" value="">
										  </div>
										</div>
								</div>
								<div class='modal-footer'>
									<button class='btn btn-danger' type='button' data-dismiss='modal'>Kembali</button>
									<button id="submit" type="submit" class="btn btn-success">Submit</button>
								</div>
							</form>
						</div>
					</div>
            	</div>

				<!-- Modal: modalPoll -->
				<div class="modal fade" id="haha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
				  aria-hidden="true" data-backdrop="false">
				  <div class="modal-dialog modal-notify modal-info" role="document">
					<div class="modal-content">
					  <!--Header-->
					  <div class="modal-header">
						<p class="heading lead"><b>Ubah Password</b>
						</p>

						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true" class="white-text">×</span>
						</button>
					  </div>

					  <!--Body-->
					  <div class="modal-body">
						<div class="text-center">
							<form id="form_barang"  method="post" action="<?php echo base_url(); ?>index.php/Profile/ganti_password">
										  <div class="md-form">
											  <input type="password" class="form-control" name="password" rows="3">
											  <label for="form79textarea">Old Password</label>
											</div>
											<div class="md-form">
											  <input id="new" name="old_password" type="password" class="form-control" rows="3">
											  <label for="form79textarea">New Password</label>
											</div>
											<div class="md-form">
											  <input id="confirm" type="password" class="form-control" name="new_password" rows="3">
											  <label for="form79textarea">Password Confirm</label>
											</div>
										<div hidden>
										  <div class="col-xs-6">
											<label for="last_name"><h4>Nip</h4></label>
											  <input type="text" class="form-control" name="nip" value="">
										  </div>
                          				</div>
								<!--Footer-->
								  <div class="modal-footer justify-content-center">
									<button id="submit" type="submit" class="btn btn-primary waves-effect waves-light">Simpan
									  <i class="fa fa-paper-plane ml-1"></i>
									</button>
									<a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Cancel</a>
								  </div>
							</form>
					  </div>
					</div>
				  </div>
				</div>
				</div>
				<!-- Modal: modalPoll -->
		</section>


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
  $(document).ready(function(){
      //fungsi ini digunakan untuk cek kesamaan nilai antara inputan new dan confirm
      $('#confirm').change(function(){    
      var fnew = $('#new').val();  
      var fconfirm = $('#confirm').val();  
          if(fnew==fconfirm){
             document.getElementById("submit").disabled = false;
          }else{
            document.getElementById("submit").disabled = true;
          }
    
   });

});
</script>

