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
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Transaksi</h5>
                      <span class="h2 font-weight-bold mb-0"><?= $transaksi;?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                    <span class="text-nowrap">Since last yesterday</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Omset</h5>
                      <span class="h2 font-weight-bold mb-0"><?= $omset->jumlah;?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Produk</h5>
                      <span class="h2 font-weight-bold mb-0"><?= $produk->jml_produk;?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                    <span class="text-nowrap">Since yesterday</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Virtual Money</h5>
                      <span class="h2 font-weight-bold mb-0"><?= $profile->saldo ;?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-percent"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i></span>
                    <span class="text-nowrap">Since yesterday</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
        <div class="col-xl-13 mb-5 mb-xl-0">
           <div class="card shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                  <h2 class="mb-0">Grafik Omset</h2>
                </div>
              </div>
				<script type="text/javascript">
					window.onload = function () {

					var chart = new CanvasJS.Chart("chartContainer", {
						exportEnabled: true,
						animationEnabled: true,
						title:{
							text: "Omset Tahun <?= date('Y')?>"
						},
						legend:{
							cursor: "pointer",
						},
						data: [{
							type: "column",
							dataPoints: [
								{ y: 
									<?php 
										if(empty($januari->jumlah))
											{
												echo "0";
											}
											else
											{
												echo $januari->jumlah;
											}
									?>
								 , label: "Januari"},
								{ y: 
									<?php 
										if(empty($februari->jumlah))
											{
												echo "0";
											}
											else
											{
												echo  $februari->jumlah;
											}
									?>
								 , label: "Februari"},
								{ y: 
									<?php 
										if(empty($maret->jumlah))
											{
												echo "0";
											}
											else
											{
												echo $maret->jumlah;
											}
									?>
								 , label: "Maret"},
								{ y: 
									<?php 
										if(empty($april->jumlah))
											{
												echo "0";
											}
											else
											{
												echo $april->jumlah;
											}
									?>
								 , label: "April"},
								{ y: 
									<?php 
										if(empty($mei->jumlah))
											{
												echo "0";
											}
											else
											{
												echo $mei->jumlah;
											}
									?>
								 , label: "Mei"},
								{ y: 
									<?php 
										if(empty($juni->jumlah))
											{
												echo "0";
											}
											else
											{
												echo $juni->jumlah;
											}
									?>
								 , label: "Juni"},
								{ y: 
									<?php 
										if(empty($juli->jumlah))
											{
												echo "0";
											}
											else
											{
												echo $juli->jumlah;
											}
									?>
								 , label: "Juli"},
								{ y: 
								 <?php 
										if(empty($agustus->jumlah))
											{
												echo "0";
											}
											else
											{
												echo $agustus->jumlah;
											}
									?>
								 , label: "Agustus"},
								{ y: 
									<?php 
										if(empty($september->jumlah))
											{
												echo "0";
											}
											else
											{
												echo  $september->jumlah;
											}
									?>
								 , label: "September"},
								{ y: 
									<?php 
										if(empty($oktober->jumlah))
											{
												echo "0";
											}
											else
											{
												echo $oktober->jumlah;
											}
									?>
								 , label: "Oktober"},
								{ y: 
									<?php 
										if(empty($november->jumlah))
											{
												echo "0";
											}
											else
											{
												echo $november->jumlah;
											}
									?>
								 , label: "November"},
								{ y: 
									<?php 
										if(empty($desember->jumlah))
											{
												echo "0";
											}
											else
											{
												echo $desember->jumlah;
											}
									?>
								 , label: "Desember"},
							]
						}]
					});
					var chart1 = new CanvasJS.Chart("chart1", {
					animationEnabled: true,
					data: [{
						type: "doughnut",
						startAngle: 60,
						//innerRadius: 60,
						indexLabelFontSize: 12,
						toolTipContent: "<b>{label}:</b> {y} ",
						dataPoints: [
							{ y: <?php 
										if(empty($januari1->jml_transaksi))
											{
												echo "0";
											}
											else
											{
												echo $januari1->jml_transaksi;
											}
									?>, label: "Januari" },
							{ y: <?php if(empty($februari1->jml_transaksi))
											{
												echo "0";
											}
											else
											{
												echo $februari1->jml_transaksi;
											}
									?>, label: "Februari" },
							{ y: <?php 
										if(empty($maret1->jml_transaksi))
											{
												echo "0";
											}
											else
											{
												echo $maret1->jml_transaksi;
											}
									?>, label: "Maret" },
							{ y: <?php 
										if(empty($april1->jml_transaksi))
											{
												echo "0";
											}
											else
											{
												echo $april1->jml_transaksi;
											}
									?>, label: "April"},
							{ y: <?php 
										if(empty($mei1->jml_transaksi))
											{
												echo "0";
											}
											else
											{
												echo $mei1->jml_transaksi;
											}
									?>, label: "Mei"},
							{ y: <?php 
										if(empty($juni1->jml_transaksi))
											{
												echo "0";
											}
											else
											{
												echo $juni1->jml_transaksi;
											}
									?>, label: "Juni"},
							{ y: <?php 
										if(empty($juli1->jml_transaksi))
											{
												echo "0";
											}
											else
											{
												echo $juli1->jml_transaksi;
											}
									?>, label: "Juli"},
							{ y: <?php 
										if(empty($agustus1->jml_transaksi))
											{
												echo "0";
											}
											else
											{
												echo $agustus1->jml_transaksi;
											}
									?>, label: "Agustus"},
							{ y: <?php 
										if(empty($september1->jml_transaksi))
											{
												echo "0";
											}
											else
											{
												echo $september1->jml_transaksi;
											}
									?>, label: "September"},
							{ y: <?php 
										if(empty($oktober1->jml_transaksi))
											{
												echo "0";
											}
											else
											{
												echo $oktober1->jml_transaksi;
											}
									?>, label: "Oktober"},
							{ y: <?php 
										if(empty($november1->jml_transaksi))
											{
												echo "0";
											}
											else
											{
												echo $november1->jml_transaksi;
											}
									?>, label: "November"},
							{ y: <?php 
										if(empty($desember1->jml_transaksi))
											{
												echo "0";
											}
											else
											{
												echo $desember1->jml_transaksi;
											}
									?>, label: "Desember"},
						]
					}]
				});
						var chart12 = new CanvasJS.Chart("chartper", {
						animationEnabled: true,
						axisX:{
							interval: 1
						},
						data: [{
							type: "bar",
							name: "companies",
							axisYType: "secondary",
							color: "#014D65",
							dataPoints: [
								<?php foreach($januari12 as $januari){ ?>
								{ y: <?= $januari->jumlah;?>, label: "<?= $januari->nama_kantin;?>" },
								<?php }?>
							]
						}]
					});
					chart.render();
					chart1.render();
					chart12.render();
					};
			   </script>
			   <div id="chartContainer" style="height: 400px; width: 100%;"></div>
            </div>
          </div>
			
    <div >
      <div class="row mt-5">
        <div class="col-xl-8 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                  <h2 class="mb-0">Omset Kantin Tertinggi</h2>
                </div>
              </div>
				 <div id="chartper" style="height: 400px; width: 100%;"></div>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                  <h2 class="mb-0">Jumlah Transaksi <?=date("Y");?></h2>
                </div>
              </div>
				 <div id="chart1" style="height: 400px; width: 100%;"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>