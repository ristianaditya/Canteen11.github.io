		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<style>
			.profile-pic {
				width: 230px;
				height: 257px;
				display: block;
				max-width: 100%;
			}
		</style>	
				<div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="ik ik-credit-card bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>Edit Akun Pembeli</h5>
                                            <span>Edit data akun Pembeli</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="<?php echo base_url() ;?>index.php/Admin/Admin"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="#">Data Akun Pembeli</a>
                                            </li>
											 <li class="breadcrumb-item">
                                                <a href="#">Edit Pembeli</a>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
						<div class="row">
							<div class="col-md-3">
								<div class="card">
									<div class="card-header"><h3>Upload Photo</h3></div>
										<div class="card-body">
										<?php echo form_open_multipart('Admin/Akun/update_foto/'.$data->id_pembeli) ;?>
										   <div class="small-12 medium-2 large-2 columns">
												<?php if(empty($data->foto)) {?>
														  <img class="profile-pic" src="<?php echo base_url() ;?>assets/image/loader1.gif"><br>
															 <?php } else { ?>
															<img class="profile-pic" src="<?php echo base_url() ;?><?php echo $data->foto ;?>"><br>
															 <?php }?>
											 </div>
											 <div>
												<input class="file-uploads" type="file" name="foto"><br><br>
												<button type="submit" class="btn btn-primary btn-block">Update</button>
											 </div>
											<?php echo form_close() ;?>
									</div>
								</div>
							</div>
							<div class="col-md-9">
								<?php echo form_open_multipart('Admin/Akun/aksi_edit_pembeli/'.$data->id_pembeli.'/'.$data->id_user) ;?>
									<div class="card">
										<div class="card-header"><h3>Input Form</h3></div>
										<div class="card-body">
												<div class="form-group row">
													<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="nama" placeholder="Masukan Nama" value="<?php echo $data->nama ;?>">
														 <div style="color:red;"><?php echo form_error ('nama'); ?></div>
													</div>
												</div>
												<div class="form-group row">
													<label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
													<div class="col-sm-9">
														<input type="email" class="form-control" id="exampleInputEmail2" name="email" value="<?php echo $data->email ;?>" placeholder="Masukan Email">
														<div style="color:red;"><?php echo form_error ('email'); ?></div>
													</div>
												</div>
												<div class="form-group row">
													<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Jenis Kelamin</label>
													<div class="col-sm-9">
														<select class="form-control" name="jenis_kelamin">
															<?php 
																$jk = $data->jenis_kelamin;
																if($jk == "Perempuan") { ?>
																<option name="jenis_kelamin" value=""> Masukan Jenis Kelamin</option>
																<option name="jenis_kelamin" value="Perempuan" selected> Perempuan</option>
																<option name="jenis_kelamin" value="Laki-laki" > Laki-Laki</option>
																<?php } else {?>
																<option name="jenis_kelamin" value=""> Masukan Jenis Kelamin</option>
																<option name="jenis_kelamin" value="Perempuan"> Perempuan</option>
																<option name="jenis_kelamin" value="Laki-laki" selected> Laki-Laki</option>
																<?php }?>
														</select>
														<div style="color:red;"><?php echo form_error ('jenis_kelamin'); ?></div>
													</div>
												</div>
												<div class="form-group row">
													<label for="exampleInputEmail2" class="col-sm-3 col-form-label">No Telepon</label>
													<div class="col-sm-9">
														<input type="number" class="form-control" id="exampleInputEmail2" name="no_telepon" value="<?php echo $data->no_telepon ;?>" placeholder="Masukan Nomer Telepon">
														<div style="color:red;"><?php echo form_error ('no_telepon'); ?></div>
													</div>
												</div>
												<button type="submit" class="btn btn-primary mr-2">Submit</button>
												<a href="#" class="btn btn-danger col-sm-3" data-toggle='modal' data-target='#<?php echo $data->id_user ;?>'><i class="fa fa-key" aria-hidden="true"></i> Ubah Password</a>
										</div>
									</div>
								<?php echo form_close() ;?>
								</div>
							</div>
							<div class='modal fade' id='<?php echo $data->id_user ;?>' aria-labelledby='exampleModalLabel' >
							<div class='modal-dialog modal-lg ' role='document'>
								<div class='modal-content' style="width:600px; margin-left:100px; margin-top:-20px;">
									<div class="modal-header" style="background-color:rgb(119, 136, 153);">
										<div class="c">
										<h4 style="color:white;" class="modal-title" id="exampleModalLabel"><b>UBAH PASSWORD</b></h4>
										</div>
									</div>
									<form id="form_barang"  method="post" action="<?php echo base_url(); ?>index.php/Admin/Akun/ganti_password_pembeli/<?php echo $data->id_user ;?>/<?php echo $data->id_pembeli ;?>">
										<div class='modal-body'>
												  <div class="form-group">
													<label>New Password :</label>
													<input id="confirm" type="password" class="form-control" name="new_password">
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