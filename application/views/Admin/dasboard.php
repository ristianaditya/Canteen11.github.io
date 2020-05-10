
						<div class="row clearfix">
							<div class="col-xl-3 col-md-6">
                                <div class="card prod-p-card card-yellow">
                                    <div class="card-body">
                                        <div class="row align-items-center mb-30">
                                            <div class="col">
                                                <h6 class="mb-5 text-white">Kantin</h6>
                                                <h3 class="mb-0 fw-700 text-white"><?= $kantin->jml_data;?></h3>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-tags text-warning f-18"></i>
                                            </div>
                                        </div>
                                        <p class="mb-0 text-white">Jumlah Semua Kantin</p>
                                    </div>
                                </div>
                            </div>
							<div class="col-xl-3 col-md-6">
                                <div class="card prod-p-card card-green">
                                    <div class="card-body">
                                        <div class="row align-items-center mb-30">
                                            <div class="col">
                                                <h6 class="mb-5 text-white">Produk</h6>
                                                <h3 class="mb-0 fw-700 text-white"><?= $produk->jml_data;?></h3>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-box text-green f-18"></i>
                                            </div>
                                        </div>
                                        <p class="mb-0 text-white">Jumlah Semua Akun Produk</p>
                                    </div>
                                </div>
                            </div>
							 <div class="col-xl-3 col-md-6">
                                <div class="card prod-p-card card-blue">
                                    <div class="card-body">
                                        <div class="row align-items-center mb-30">
                                            <div class="col">
                                                <h6 class="mb-5 text-white">Akun Pembeli</h6>
                                                <h3 class="mb-0 fw-700 text-white"><?= $pembeli->jml_data;?></h3>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa fa-users text-blue f-18"></i>
                                            </div>
                                        </div>
                                        <p class="mb-0 text-white">Jumlah Semua Akun Pembeli</p>
                                    </div>
                                </div>
                            </div>
							<div class="col-xl-3 col-md-6">
                                <div class="card prod-p-card card-red">
                                    <div class="card-body">
                                        <div class="row align-items-center mb-30">
                                            <div class="col">
                                                <h6 class="mb-5 text-white">Pesanan</h6>
                                                <h3 class="mb-0 fw-700 text-white"><?= 12;?></h3>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa fa-map text-red f-18"></i>
                                            </div>
                                        </div>
                                        <p class="mb-0 text-white">Jumlah Semua Pesanan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="row clearfix">
							<div id="chartContainer" style="height: 400px; width: 100%;"></div>
						</div><br><br>
						<div class="row clearfix">
							<div id="chartsa" style="height: 400px; width: 100%;"></div>
						</div>

<script>	
window.onload = function () {
	
var chart = new CanvasJS.Chart("chartContainer", {
	exportEnabled: true,
	animationEnabled: true,
	title:{
		text: "Jumlah Transaksi Tahun <?= date('Y')?>"
	},
	legend:{
		cursor: "pointer",
	},
	data: [{
		type: "column",
		dataPoints: [
			{ y: 
			 	<?php 
					if(empty($januari))
						{
							echo "0";
						}
						else
						{
							echo $januari;
						}
				?>
			 , label: "Januari"},
			{ y: 
			 	<?php 
					if(empty($februari))
						{
							echo "0";
						}
						else
						{
							echo $februari;
						}
				?>
			 , label: "Februari"},
			{ y: 
			 	<?php 
					if(empty($maret))
						{
							echo "0";
						}
						else
						{
							echo $maret;
						}
				?>
			 , label: "Maret"},
			{ y: 
			 	<?php 
					if(empty($april))
						{
							echo "0";
						}
						else
						{
							echo $april;
						}
				?>
			 , label: "April"},
			{ y: 
			 	<?php 
					if(empty($mei))
						{
							echo "0";
						}
						else
						{
							echo $mei;
						}
				?>
			 , label: "Mei"},
			{ y: 
			 	<?php 
					if(empty($juni))
						{
							echo "0";
						}
						else
						{
							echo $juni;
						}
				?>
			 , label: "Juni"},
			{ y: 
			 	<?php 
					if(empty($juli))
						{
							echo "0";
						}
						else
						{
							echo $juli;
						}
				?>
			 , label: "Juli"},
			{ y: 
			 <?php 
					if(empty($agustus))
						{
							echo "0";
						}
						else
						{
							echo $agustus;
						}
				?>
			 , label: "Agustus"},
			{ y: 
			 	<?php 
					if(empty($september))
						{
							echo "0";
						}
						else
						{
							echo $september;
						}
				?>
			 , label: "September"},
			{ y: 
			 	<?php 
					if(empty($oktober))
						{
							echo "0";
						}
						else
						{
							echo $oktober;
						}
				?>
			 , label: "Oktober"},
			{ y: 
			 	<?php 
					if(empty($november))
						{
							echo "0";
						}
						else
						{
							echo $november;
						}
				?>
			 , label: "November"},
			{ y: 
			 	<?php 
					if(empty($desember))
						{
							echo "0";
						}
						else
						{
							echo $desember;
						}
				?>
			 , label: "Desember"},
		]
	}]
});

var chart12 = new CanvasJS.Chart("chartsa", {
	theme: "dark2",
	exportFileName: "Doughnut Chart",
	exportEnabled: true,
	animationEnabled: true,
	title:{
		text: "Transaksi Tahun <?= date('Y')?>"
	},
	legend:{
		cursor: "pointer",
		itemclick: explodePie
	},
	data: [{
		type: "column",
		innerRadius: 90,
		dataPoints: [
								{ y: 
									<?php 
										if(empty($januari1->jumlah))
											{
												echo "0";
											}
											else
											{
												echo $januari1->jumlah;
											}
									?>
								 , label: "Januari"},
								{ y: 
									<?php 
										if(empty($februari1->jumlah))
											{
												echo "0";
											}
											else
											{
												echo  $februari1->jumlah;
											}
									?>
								 , label: "Februari"},
								{ y: 
									<?php 
										if(empty($maret1->jumlah))
											{
												echo "0";
											}
											else
											{
												echo $maret1->jumlah;
											}
									?>
								 , label: "Maret"},
								{ y: 
									<?php 
										if(empty($april1->jumlah))
											{
												echo "0";
											}
											else
											{
												echo $april1->jumlah;
											}
									?>
								 , label: "April"},
								{ y: 
									<?php 
										if(empty($mei1->jumlah))
											{
												echo "0";
											}
											else
											{
												echo $mei1->jumlah;
											}
									?>
								 , label: "Mei"},
								{ y: 
									<?php 
										if(empty($juni1->jumlah))
											{
												echo "0";
											}
											else
											{
												echo $juni1->jumlah;
											}
									?>
								 , label: "Juni"},
								{ y: 
									<?php 
										if(empty($juli1->jumlah))
											{
												echo "0";
											}
											else
											{
												echo $juli1->jumlah;
											}
									?>
								 , label: "Juli"},
								{ y: 
								 <?php 
										if(empty($agustus1->jumlah))
											{
												echo "0";
											}
											else
											{
												echo $agustus1->jumlah;
											}
									?>
								 , label: "Agustus"},
								{ y: 
									<?php 
										if(empty($september1->jumlah))
											{
												echo "0";
											}
											else
											{
												echo  $september1->jumlah;
											}
									?>
								 , label: "September"},
								{ y: 
									<?php 
										if(empty($oktober1->jumlah))
											{
												echo "0";
											}
											else
											{
												echo $oktober1->jumlah;
											}
									?>
								 , label: "Oktober"},
								{ y: 
									<?php 
										if(empty($november1->jumlah))
											{
												echo "0";
											}
											else
											{
												echo $november1->jumlah;
											}
									?>
								 , label: "November"},
								{ y: 
									<?php 
										if(empty($desember1->jumlah))
											{
												echo "0";
											}
											else
											{
												echo $desember1->jumlah;
											}
									?>
								 , label: "Desember"},
							]
	}]
});
function explodePie (e) {
	if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
	} else {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
	}
	e.chart.render();
}
	
chart.render();
chart12.render();
}
</script>