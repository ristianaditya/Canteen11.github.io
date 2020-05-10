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
			.circle {
				border-radius: 10px !important;
				overflow: hidden;
				width: 228px;
				height: 270px;
				border: 8px solid rgba(255, 255, 255, 0.7);
				position: absolute;
				top: 72px;
			}
			img {
				max-width: 100%;
				height: auto;
			}
			.p-image {
			  position: absolute;
			  top: 347px;
			 
			  color: #666666;
			  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
			}
			.p-image:hover {
			  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
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
                                            <h5>Tambah data Produk</h5>
                                            <span>Tambah semua data Produk</span>
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
                                                <a href="#">Tambah Produk</a>
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
												<?php echo form_open_multipart('Admin/Produk/aksi_tambah_produk') ?>;
												<div class="small-12 medium-2 large-2 columns">
													<img class="profile-pic" src="<?php echo base_url() ;?>assets/image/loader1.gif">
													<div>
														<input class="file-uploads" type="file" name="foto" />
														<div style="color:red;"><?php if(empty($error)){}else{ echo $error;}?></div>
													</div>
												</div>
										</div>
									</div>
							</div>
							<div class="col-md-9">
									<div class="card">
										<div class="card-header"><h3>Input Form</h3></div>
										<div class="card-body">
												<div class="form-group row">
													<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Id Kantin</label>
													<div class="col-sm-9">
														<select class="js-example-disabled-results" name="id_kantin" style="height:40px;width:100%">
															<?php foreach($data as $a){ ;?>
															<option name="id_kantin" value="<?php echo $a->id_kantin ;?>"><?php echo $a->nama_kantin ;?></option>
														<?php } ;?>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label for="exampleInputEmail2" class="col-sm-3 col-form-label">Kategori</label>
													<div class="col-sm-9">
														<select class="js-example-disabled-results" name="kategori" style="height:40px;width:100%">
															<?php foreach($kategori as $a){ ;?>
																<option value="<?php echo $a->id_kategori ;?>"><?php echo $a->nama_kategori ;?></option>
															<?php } ;?>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama Produk</label>
													<div class="col-sm-9">
														<input type="text" class="form-control " name="nama_produk" placeholder="Masukan Nama Produk">
														<div style="color:red;"><?php echo form_error ('nama_produk'); ?></div>	
													</div>
												</div>
												<div class="form-group row">
													<label for="exampleInputEmail2" class="col-sm-3 col-form-label">Harga</label>
													<div class="col-sm-9">
														<input type="number" class="form-control" name="harga" placeholder="Masukan Harga">
														<div style="color:red;"><?php echo form_error ('harga'); ?></div>
													</div>
												</div>
												<div class="form-group row">
													<label for="exampleInputEmail2" class="col-sm-3 col-form-label">Deskripsi</label>
													<div class="col-sm-9">
														<textarea name="deskripsi" class="form-control col-sm-12" style="height:100px;" placeholder="Masukan Deskripsi"></textarea>
														<div style="color:red;"><?php echo form_error ('deskripsi'); ?></div>
													</div>
												</div>
													<button type="submit" class="btn btn-primary mr-2">Submit</button>
													<button class="btn btn-light">Cancel</button>
													<?php echo form_close() ;?>
												</div>
										</div>
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