<!-- CUSTOM STYLES-->
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="<?php echo base_url(); ?>assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />        
<!-- /. NAV SIDE  -->
					<div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="ik ik-credit-card bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>Data Kantin</h5>
                                            <span>Kelola semua data Kantin</span>
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
                                                <a href="#">Data Kantin</a>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
       <div id="page-wrapper" >
            <div class="card">
				<div class="card-header"><h3>Data Table</h3></div>
                     <div class="card-body">
						<div class="row">
							<div class="col-md-12">
									  <div class="panel-body">
										<div class="row">
											<div class="col-sm-9">
												<a href="<?php echo base_url() ;?>index.php/Admin/Kantin/tambah" class="btn btn-primary">
												<i class="fa fa-plus" aria-hidden="true"></i> Tambah
												</a>
											</div>
											<div class="col-sm-3">
												<form method="post" action="<?php echo base_url(); ?>index.php/Admin/Kantin/search">
													<div class="form-group input-group">
														<input type="text" name="search"  class="form-control" placeholder="Search">
															<span class="input-group-btn">
																<button class="btn btn-default" style="height:35px;" name="submit" type="submit" value="Submit"><i class="fa fa-search"></i>
																</button>
															</span>
													</div>
												</form>
											</div>
										</div>
										 <div class="card-body p-0 table-border-style">
											<div class="table-responsive">
											   <table class="table table-hover text-center">
												<thead  style="background-color:#E6E6FA;">
													<tr>
														<td><b>No</b></td>
														<td><b>ID Kantin</b></td>
														<td><b>Pemilik</b></td>
														<td><b>Nama Kantin</b></td>
														<td><b>Deskripsi</b></td>
														<td colspan="2"><b>Info</b></td>
													</tr>
												</thead>
												<?php foreach($data as $a){;?>	
												<tr>
													<td class="align-middle"><?= ++$start ;?></td>
													<td class="align-middle" style="width:-10px;"><?php echo $a->id_kantin ;?></td>
													<td class="align-middle"><?php echo $a->nama ;?></td>
													<td class="align-middle"><?php echo $a->nama_kantin ;?></td>
													<td class="align-middle"><?php echo $a->deskripsi ;?></td>
													<td class="align-middle" style="width:20px;">
														<a class="badge badge-pill badge-primary mb-1" href="<?php echo base_url() ;?>index.php/Admin/Kantin/edit_kantin/<?php echo $a->id_kantin ;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
													</td>
													<td class="align-middle" style="width:20px;">
														<a class="badge badge-pill badge-danger mb-1" href="#" data-toggle="modal" data-target="#<?php echo $a->id_kantin ;?>"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
													</td>
												</tr>
											   <!-------Modal Hapus ------>
												<div class="modal fade" id="<?php echo $a->id_kantin ;?>"  aria-labelledby="exampleModalLabel" >
													<div class="modal-dialog" role="document">
													  <div class="modal-content">
														<div class="modal-header">
															<div class="c">
															<h4 class="modal-title" id="exampleModalLabel"><b>Yakin ingin menghapus data ini ?</b></h4>
															</div>
														</div>
														<div class="modal-body">Klik "Hapus" Jika ingin menghapus data ini.</div>
														<div class="modal-footer">
														  <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
														  <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/Admin/Kantin/delete_kantin/<?php echo $a->id_kantin ;?>">Hapus</a>
														</div>
													  </div>
													</div>
												  </div>
												<?php };?>
												</table>
												<div style="float:right;">
														<?php echo $this->pagination->create_links(); ?>
													</div>
											 </div>
											</div>
											<div>
										  </div>
										</div>
									</div>
								</div>
							</div>
            </div>
    </div>
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables/dataTables.bootstrap.js"></script>
       
         <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
    