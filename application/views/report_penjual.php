<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <link rel="stylesheet" href="style.css" media="all" />
	  <style>
	  	.clearfix:after {
		  content: "";
		  display: table;
		  clear: both;
		}

		a {
		  color: #5D6975;
		  text-decoration: underline;
		}

		body {
		  position: relative;
		  width: 21cm;  
		  height: 29.7cm; 
		  margin: 0 auto; 
		  color: #001028;
		  background: #FFFFFF; 
		  font-family: Arial, sans-serif; 
		  font-size: 12px; 
		  font-family: Arial;
		}

		header {
		  padding: 10px 0;
		  margin-bottom: 30px;
		}

		#logo {
		  text-align: center;
		  margin-bottom: 10px;
		}

		#logo img {
		  width: 90px;
		}

		h1 {
		  border-top: 1px solid  #5D6975;
		  border-bottom: 1px solid  #5D6975;
		  color: #5D6975;
		  font-size: 2.4em;
		  line-height: 1.4em;
		  font-weight: normal;
		  text-align: center;
		  margin: 0 0 20px 0;
		  background: url(dimension.png);
		}

		#project {
		  float: left;
		}

		#project span {
		  color: #5D6975;
		  text-align: right;
		  width: 52px;
		  margin-right: 10px;
		  display: inline-block;
		  font-size: 0.8em;
		}

		#company {
		  float: right;
		  text-align: right;
		}

		#project div,
		#company div {
		  white-space: nowrap;        
		}

		table {
		  width: 100%;
		  border-collapse: collapse;
		  border-spacing: 0;
		  margin-bottom: 20px;
		}

		table tr:nth-child(2n-1) td {
		  background: #F5F5F5;
		}

		table th,
		table td {
		  text-align: center;
		}

		table th {
		  padding: 5px 20px;
		  color: #5D6975;
		  background: solid #E6E6FA;
		  white-space: nowrap;        
		  font-weight: normal;
		}

		table .service,
		table .desc {
		  text-align: left;
		}

		table td {
		  padding: 20px;
		  text-align: right;
		}

		table td.service,
		table td.desc {
		  vertical-align: top;
		}

		table td.unit,
		table td.qty,
		table td.total {
		  font-size: 1.2em;
		}

		table td.grand {
		  border-top: 1px solid #5D6975;;
		}

		#notices .notice {
		  color: #5D6975;
		  font-size: 1.2em;
		}

		footer {
		  color: #5D6975;
		  width: 100%;
		  height: 30px;
		  position: absolute;
		  bottom: 0;
		  border-top: 1px solid #C1CED9;
		  padding: 8px 0;
		  text-align: center;
		}
	  </style>
  </head>
  <body>
	  
    <header class="clearfix" style="width:88%;">
      <div id="logo">
        <img src="assets_frontend/images/icons/logo09.png"  height="80px;" style="width:230px;" alt="IMG-LOGO">
      </div>
      <h1>Omset Produk Bulan <?= date("M");?></h1>
	  <div id="project" class="clearfix">
        <div>Canteen11 Company,<br /> Jln Budi Cilember Bandung Jawa Barat</div>
        <div>(+62) 85352585451</div>
        <div><a href="mailto:canteen11@gmail.com">canteen11@gmail.com</a></div>
      </div>
      <div id="project" style="float:right">
        <div><?= $user->nama_kantin;?></div>
        <div><?= $user->nama;?></div>
        <div><a href="mailto:<?= $user->email;?>"><?= $user->email;?></a></div>
        <div><?= date("d-M-Y");?></div>
      </div>
    </header>
      <table style="width:88%">
        <thead>
          <tr>
            <th class="service">Nama Produk</th>
            <th class="desc">Kategori</th>
            <th class="service">Harga</th>
            <th class="service">Transaksi</th>
            <th class="service">Total</th>
          </tr>
        </thead>
        <tbody>
			<?php foreach($produk as $produk){?>
          <tr>
            <td class="service"><?= $produk->nama_produk ;?></td>
            <td class="desc"><?= $produk->nama_kategori ;?></td>
            <td class="service"><?= $produk->harga;?></td>
            <td class="service"><?= $produk->jml_transaksi ;?></td>
            <td class="service"><?= $produk->jumlah_harga ;?></td>
          </tr>
			<?php }?>
        </tbody>
      </table><br><br>
	  <header class="clearfix" style="width:88%;">
      <h1>Omset Kantin Tahun <?= date("Y");?></h1>
      </header>
	  <table style="width:70%;margin-left:150px;margin-right:auto;margin-top:-40px;">
        <thead>
          <tr>
            <th class="service" style="width:90px">Januari</th>
			<td>
			  <?php 
				if(empty($januari->jumlah))
					{
						echo "Belum ada data";
					}
					else
					{
						echo $januari->jumlah;
					}
				?>
			</td>
          </tr>
		  <tr>
            <th class="service">Februari</th>
			<td>
			  <?php 
				if(empty($februari->jumlah))
					{
						echo "Belum ada data";
					}
					else
					{
						echo $februari->jumlah;
					}
				?>
			</td>
          </tr>
		  <tr>
            <th class="service">Maret</th>
			<td>
			  <?php 
				if(empty($maret->jumlah))
					{
						echo "Belum ada data";
					}
					else
					{
						echo $maret->jumlah;
					}
				?>
			</td>
          </tr>
		  <tr>
            <th class="service">April</th>
			<td>
			  <?php 
				if(empty($april->jumlah))
					{
						echo "Belum ada data";
					}
					else
					{
						echo $april->jumlah;
					}
				?>
			</td>
          </tr>
		   <tr>
            <th class="service">Mei</th>
			<td>
			  <?php 
				if(empty($mei->jumlah))
					{
						echo "Belum ada data";
					}
					else
					{
						echo $mei->jumlah;
					}
				?>
			</td>
          </tr>
		   <tr>
            <th class="service">Juni</th>
			<td>
			  <?php 
				if(empty($juni->jumlah))
					{
						echo "Belum ada data";
					}
					else
					{
						echo $juni->jumlah;
					}
				?>
			</td>
          </tr>
		   <tr>
            <th class="service">Juli</th>
			<td>
			  <?php 
				if(empty($juli->jumlah))
					{
						echo "Belum ada data";
					}
					else
					{
						echo $juli->jumlah;
					}
				?>
			</td>
          </tr>
		   <tr>
            <th class="service">Agustus</th>
			<td>
			  <?php 
				if(empty($agustus->jumlah))
					{
						echo "Belum ada data";
					}
					else
					{
						echo $agustus->jumlah;
					}
				?>
			</td>
          </tr>
		   <tr>
            <th class="service">September</th>
			<td>
			  <?php 
				if(empty($september->jumlah))
					{
						echo "Belum ada data";
					}
					else
					{
						echo $september->jumlah;
					}
				?>
			</td>
          </tr>
		   <tr>
            <th class="service">Oktober</th>
			<td>
			  <?php 
				if(empty($oktober->jumlah))
					{
						echo "Belum ada data";
					}
					else
					{
						echo $oktober->jumlah;
					}
				?>
			</td>
          </tr>
		   <tr>
            <th class="service">November</th>
			<td>
			  <?php 
				if(empty($november->jumlah))
					{
						echo "Belum ada data";
					}
					else
					{
						echo $november->jumlah;
					}
				?>
			</td>
          </tr>
		   <tr>
            <th class="service">Desember</th>
			<td>
			  <?php 
				if(empty($desember->jumlah))
					{
						echo "Belum ada data";
					}
					else
					{
						echo $desember->jumlah;
					}
				?>
			</td>
          </tr>
        </thead>
        <tbody>
          <tr>
          </tr>
        </tbody>
      </table>
    <footer  style="width:88%">
      Copyright © SAIBER TIM SMKN 11 BANDUNG <?= date("Y") ;?>
    </footer>
  </body>
</html>