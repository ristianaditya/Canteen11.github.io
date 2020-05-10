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
                                            <h5>Data Saldo</h5>
                                            <span>Kelola semua data Saldo</span>
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
                                                <a href="#">Data Pengajuan Saldo</a>
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
														<td><b>ID User</b></td>
														<td><b>Email</b></td>
														<td><b>Nominal</b></td>
														<td><b>Info</b></td>
													</tr>
												</thead>
												<?php foreach($data as $a){;?>	
												<tr>
													<td class="align-middle"><?= ++$start ;?></td>
													<td class="align-middle" style="width:-10px;"><?php echo $a->id_user ;?></td>
													<td class="align-middle"><?php echo $a->email ;?></td>
													<td class="align-middle"><?php echo $a->nominal ;?></td>
													<td class="align-middle" style="width:20px;">
														<a class="badge badge-pill badge-primary mb-1" href="#" data-toggle="modal" data-target="#<?php echo $a->id_user ;?>"><i class="ik ik-upload" aria-hidden="true"></i> Saldo</a>
													</td>
												</tr>
											   <!-------Modal Hapus ------>
												<div class="modal fade" id="<?php echo $a->id_user ;?>"  aria-labelledby="exampleModalLabel" >
													<div class="modal-dialog" role="document">
													  <div class="modal-content">
														<div class="modal-header">
															<div class="c">
															<h4 class="modal-title" id="exampleModalLabel"><b>Isi Saldo </b></h4>
															</div>
														</div>
														<form method="post" action="<?= base_url();?>index.php/Admin/Saldo/isi_saldo/<?php echo $a->id_user ;?>">
															<div class="modal-body">
																<div class="form-group">
																<label>Pilih Nominal Saldo</label>
																<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
																	<select class="form-control" name="nominal" required>
																		<option >Masukan Metode Pembayaran</option>
																		<option value="10000">Rp. 10.000</option>
																		<option value="20000">Rp. 20.000</option>
																		<option value="30000">Rp. 30.000</option>
																		<option value="40000">Rp. 40.000</option>
																		<option value="50000">Rp. 50.000</option>
																		<option value="100000">Rp. 100.000</option>
																		<option value="200000">Rp. 200.000</option>
																	</select>
																	<div class="dropDownSelect2"></div>
																</div>
																</div>
															</div>
															<div class="modal-footer">
															  <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
															  <button type="submit" class="btn btn-primary">Isi Saldo</button>
															</div>
														</form>
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
    