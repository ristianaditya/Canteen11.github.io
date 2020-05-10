
					<div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="ik ik-credit-card bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>Tambah Data Sekolah</h5>
                                            <span>Tambah semua data sekolah</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href=".<?php echo base_url() ;?>index.php/Admin/Admin"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="#">Data Sekolah</a>
                                            </li>
											 <li class="breadcrumb-item">
                                                <a href="#">Tambah Data Sekolah</a>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header"><h3>Input Form</h3></div>
                                    <div class="card-body">
										<form method="post" action="<?= base_url();?>index.php/Admin/Sekolah/aksi_edit_sekolah/<?= $data->id_sekolah;?>">
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Sekolah</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="nama_sekolah" placeholder="Masukan Nama Sekolah" value="<?= $data->nama_sekolah;?>">
													 <div style="color:red;"><?php echo form_error ('nama_sekolah'); ?></div>
                                                </div>
                                            </div>
											<div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Website Sekolah</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="website" placeholder="Masukan Website Sekolah" value="<?= $data->website;?>">
													 <div style="color:red;"><?php echo form_error ('website'); ?></div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Alamat</label>
                                                <div class="col-sm-9">
													<textarea style="height:200px;" class="form-control" id="exampleInputEmail2" name="alamat" placeholder="Masukan Alamat Sekolah"><?= $data->alamat_sekolah;?></textarea>
													<div style="color:red;"><?php echo form_error ('alamat'); ?></div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                            <a href="javascript:window.history.go(-1);" class="btn btn-light">Cancel</a>
										</form>
									</div>
                                </div>
                            </div>
                        </div>