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
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
           <div class="card-header border-0">
				 <div class="row align-items-center">
						<div class="col">
						  <h3 class="mb-0">Feedback</h3>
						</div>
						 <form method="post" action="<?php echo base_url(); ?>index.php/Penjual/Utama/search_feedback">
							  <div class="input-group input-group-rounded input-group-merge container">
								<input style="z-index:0" type="search" name="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
								<div class="input-group-prepend">
								  <button type="submit" class="input-group-text">
									<span class="fa fa-search"></span>
								  </button>
								</div>
							  </div>
							</form>		
				  </div>
            </div>
            <div class="table-responsive">
              <table class="table table-hover text-center align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pembeli</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Rating</th>
                  </tr>
                </thead>
                <tbody>
					<?php foreach($feedback as $feedback){?>
                  <tr>
                    <th>
                     <?= ++$start;?>
                    </th>
                    <td>
                      <?= strtoupper($feedback->nama);?>
                    </td>
                    <td>
						<?= $feedback->deskripsi;?>
                    </td>
					   <td>
						<?= $feedback->penilaian;?>
                    </td>
                  </tr>
					<?php }?>
                </tbody>
              </table>
            </div>
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                		<?php echo $this->pagination->create_links(); ?>
				</ul>
              </nav>
            </div>
			</div>
		  </div>
		</div>