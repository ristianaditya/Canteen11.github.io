	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<style>
			body {
			  background-color: #efefef;
			}

			.profile-pic {
				width: 230px;
				height: 257px;
				display: block;
			}

			.file-upload {
				display: none;
			}
			.upload-button {
			  font-size: 1.2em;
			}

			.upload-button:hover {
			  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
			  color: #999;
			}
		</style>
	</head>
	<body>
					<div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="ik ik-credit-card bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>Edit data Produk</h5>
                                            <span>Edit semua data Produk</span>
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
                                                <a href="#">Data Produk</a>
                                            </li>
											 <li class="breadcrumb-item">
                                                <a href="#">Edit Produk</a>
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
												<div class="small-12 medium-2 large-2 columns">
													<?php echo form_open_multipart('Admin/Produk/update_foto/'.$data->id_produk) ;?>
															 <?php if(empty($data->foto_produk)) {?>
														   <img class="profile-pic" src="<?php echo base_url() ;?>assets/image/loader1.gif"><br>
															 <?php } else { ?>
															 <img class="profile-pic" src="<?php echo base_url() ;?><?php echo $data->foto_produk ;?>"><br>
															 <?php }?>
														<div>
															<input class="file-uploads" type="file" name="foto" /><br><br>
														 	<button type="submit" class="btn btn-primary btn-block">Update</button>
														 </div>
														   <?php echo form_close() ;?>
												</div>
										</div>
									</div>
							</div>
							<div class="col-md-9">
								<?php echo form_open_multipart('Admin/Produk/aksi_edit_produk/'.$data->id_produk) ?>;
									<div class="card">
										<div class="card-header"><h3>Input Form</h3></div>
										<div class="card-body">
												<div class="form-group row">
													<label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama Produk</label>
													<div class="col-sm-9">
														<input type="text" class="form-control " name="nama_produk" placeholder="Masukan Nama Produk" value="<?= $data->nama_produk;?>">
														<div style="color:red;"><?php echo form_error ('nama_produk'); ?></div>	
													</div>
												</div>
												<div class="form-group row">
													<label for="exampleInputEmail2" class="col-sm-3 col-form-label">Harga</label>
													<div class="col-sm-9">
														<input type="number" class="form-control" name="harga" placeholder="Masukan Harga" value="<?= $data->harga;?>">
														<div style="color:red;"><?php echo form_error ('harga'); ?></div>
													</div>
												</div>
												<div class="form-group row">
													<label for="exampleInputEmail2" class="col-sm-3 col-form-label">Deskripsi</label>
													<div class="col-sm-9">
														<textarea name="deskripsi" class="form-control col-sm-12" style="height:100px;" placeholder="Masukan Deskripsi"><?= $data->deskripsi;?></textarea>
														<div style="color:red;"><?php echo form_error ('deskripsi'); ?></div>
													</div>
												</div>
													<button type="submit" class="btn btn-primary mr-2">Submit</button>
													<button class="btn btn-light">Cancel</button>
												</div>
										</div>
									<?php echo form_close() ;?>
									</div>
		</div>		
	</body>
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