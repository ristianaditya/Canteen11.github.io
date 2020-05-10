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
                                            <h5>Data Akun Pembeli</h5>
                                            <span>Kelola semua data akun Pembeli</span>
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
													<a href="<?php echo base_url() ;?>index.php/Admin/Akun/tambah_pembeli" class="btn btn-primary">
													<i class="fa fa-plus" aria-hidden="true"></i> Tambah
													</a>
													  <a href="<?php echo base_url() ;?>index.php/Admin/Akun/report_akun_pembeli" class="btn btn-danger">
													  <i class="fa fa-print" aria-hidden="true"></i> Excel
													</a>
												</div>

												<div class="col-sm-3">
													<form method="post" action="<?php echo base_url(); ?>index.php/Admin/Akun/search_pembeli">
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
														<tr >
															<td class="align-middle"><b>No</b></td>
															<td class="align-middle"><b>ID Pembeli</b></td>
															<td class="align-middle"><b>Nama</b></td>
															<td class="align-middle"><b>Email</b></td>
															<td class="align-middle"><b>Jenis Kelamin</b></td>
															<td class="align-middle"><b>No Telepon</b></td>
															<td class="align-middle" colspan="2"><b>Info</b></td>
														</tr>
													</thead>
													<?php $i=1; foreach($data as $a){;?>	
													<tr>
														<td><?php echo $i++ ;?></td>
														<td class="align-middle"><?php echo $a->id_pembeli ;?></td>
														<td class="align-middle"><?php echo $a->nama ;?></td>
														<td class="align-middle"><?php echo $a->email ;?></td>
														<td class="align-middle"><?php echo $a->jenis_kelamin ;?></td>
														<td class="align-middle"><?php echo $a->no_telepon ;?></td>
														<td class="align-middle" style="width:20px;">
															<a class="badge badge-pill badge-primary mb-2" href="<?php echo base_url() ;?>index.php/Admin/Akun/edit_pembeli/<?php echo $a->id_pembeli ;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
														</td>
														<td style="width:20px;">
															<a class="badge badge-pill badge-danger mb-2"  href="#" data-toggle="modal" data-target="#<?php echo $a->id_pembeli ;?>"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
														</td>
													</tr>
								   <!-------Modal Hapus ------>
									<div class="modal fade" id="<?php echo $a->id_pembeli ;?>"  aria-labelledby="exampleModalLabel">
										<div class="modal-dialog" role="document">
										  <div class="modal-content">
											<div class="modal-header">
												<div class="c">
												<h4 class="modal-title" id="exampleModalLabel"><b>Yakin ingin menghapus data ini ?</b></h4>
												</div>
											</div>
											<div class="modal-body">Klik "Hapus" Jika ingin menghapus data ini.</div>
											<div class="modal-footer">
											  <button class="btn btn-secondary " type="button" data-dismiss="modal">Batal</button>
											  <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/Admin/Akun/delete_pembeli/<?php echo $a->id_pembeli ;?>">Hapus</a>
											</div>
										  </div>
										</div>
									  </div>
									<?php };?>
								</table>
                            </div>
                            <div>
							</div>
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
    