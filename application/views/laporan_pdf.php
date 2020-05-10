<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 2</title>
    <style>
	 	@font-face {
		  font-family: SourceSansPro;
		  src: url(<?= base_url();?>index.php/assets_frontend/SourceSansPro-Regular.ttf);
		}

		.clearfix:after {
		  content: "";
		  display: table;
		  clear: both;
		}

		a {
		  color: #0087C3;
		  text-decoration: none;
		}

		body {
		  position: relative;
		  width: 18cm;  
		  height: 29.7cm; 
		  margin: 0 auto; 
		  color: #555555;
		  background: #FFFFFF; 
		  font-family: Arial, sans-serif; 
		  font-size: 14px; 
		  font-family: SourceSansPro;
		}

		header {
		  padding: 10px 0;
		  margin-bottom: 20px;
		  border-bottom: 1px solid #AAAAAA;
		}

		#logo {
		  float: left;
		  margin-top: 8px;
		}

		#logo img {
		  height: 70px;
		}

		#company {
		  margin-right: 10px;
		  text-align: right;
		}


		#details {
		  margin-bottom: 50px;
		}

		#client {
		  padding-left: 6px;
		  border-left: 6px solid #0087C3;
		  float: left;
		}

		#client .to {
		  color: #777777;
		}

		h2.name {
		  font-size: 1.4em;
		  font-weight: normal;
		  margin: 0;
		}

		#invoice {
		  margin-right: 10px;
		  text-align: right;
		}

		#invoice h1 {
		  color: #0087C3;
		  font-size: 2.4em;
		  line-height: 1em;
		  font-weight: normal;
		  margin: 0  0 10px 0;
		}

		#invoice .date {
		  font-size: 1.1em;
		  color: #777777;
		}

		table {
		  width: 100%;
		  border-collapse: collapse;
		  border-spacing: 0;
		  margin-bottom: 20px;
		}

		table th,
		table td {
		  padding: 20px;
		  background: #EEEEEE;
		  text-align: center;
		  border-bottom: 1px solid #FFFFFF;
		}

		table th {
		  white-space: nowrap;        
		  font-weight: normal;
		}

		table td {
		  text-align: right;
		}

		table td h3{
		  color: #57B223;
		  font-size: 1.2em;
		  font-weight: normal;
		  margin: 0 0 0.2em 0;
		}

		table .no {
		  color: #FFFFFF;
		  font-size: 1.6em;
		  background: #57B223;
		}

		table .desc {
		  text-align: left;
		}

		table .unit {
		  background: #DDDDDD;
		}

		table .qty {
		}

		table .total {
		  background: #57B223;
		  color: #FFFFFF;
		}

		table td.unit,
		table td.qty,
		table td.total {
		  font-size: 1.2em;
		}

		table tbody tr:last-child td {
		  border: none;
		}

		table tfoot td {
		  padding: 10px 20px;
		  background: #FFFFFF;
		  border-bottom: none;
		  font-size: 1.2em;
		  white-space: nowrap; 
		  border-top: 1px solid #AAAAAA; 
		}

		table tfoot tr:first-child td {
		  border-top: none; 
		}

		table tfoot tr:last-child td {
		  color: #57B223;
		  font-size: 1.4em;
		  border-top: 1px solid #57B223; 

		}

		table tfoot tr td:first-child {
		  border: none;
		}

		#thanks{
		  font-size: 2em;
		  margin-bottom: 50px;
		}

		#notices{
		  padding-left: 6px;
		  border-left: 6px solid #0087C3;  
		}

		#notices .notice {
		  font-size: 1.2em;
		}

		footer {
		  color: #777777;
		  width: 100%;
		  height: 30px;
		  position: absolute;
		  bottom: 0;
		  border-top: 1px solid #AAAAAA;
		  padding: 8px 0;
		  text-align: center;
		}


	 </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
         <img src="assets_frontend/images/icons/logo09.png" height="150px;" alt="IMG-LOGO">
      </div>
      <div id="company">
        <h2 class="name">Canteen11 Company</h2>
        <div>Jln Budi Cilember Bandung Jawa Barat</div>
        <div>(+62) 85352585451</div>
        <div><a href="ristianaditya35@gmail.com">Canteen11@gmail.com</a></div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">INVOICE TO:</div>
			  <?php 
					foreach($data_payment as $tempat) {
						$tempat = $tempat->alamat_sekolah;
					} 
				?>
          <div class="address"><?= $tempat;?></div>
          <div class="email"><a href="<?php echo $this->session->userdata('email')?>"><?php echo $this->session->userdata('email')?></a></div>
        </div>
        <div id="invoice">
          <h1>INVOICE</h1>
          <div class="date">Date of Invoice:  <?php echo date('D-M-Y')?></div>
          <div class="date">Due Date:  <?php echo date('D-M-Y')?></div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">PRODUCT</th>
            <th class="unit">UNIT PRICE</th>
            <th class="qty">QUANTITY</th>
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tbody>
			<?php 
				$no=1; foreach($data_payment as $data) { $ongkir= $data->ongkir; $statuspesanan = $data->status; $id_kantin = $data->id_kantin ;
			?>
          <tr>
            <td class="no"><?= $no++;?></td>
            <td class="desc"><?= $data->nama_produk;?></td>
            <td class="unit"><?= "Rp. ".number_format($data->harga,2,",",".");?></td>
            <td class="qty"><?= $data->jumlah_pesanan;?></td>
            <td class="total"><?= "Rp. ".number_format($data->total_harga,2,",",".");?></td>
          </tr>
			<?php }?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td><?php echo "Rp. ".number_format($payment->jumlah,2,",",".");?></td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">ONGKIR</td>
            <td>
				<?php $ratusan = substr($ongkir, -3);
					if($ratusan<500){
						 $akhir = $ongkir - $ratusan;
						echo "Rp. ".number_format($akhir, 2, ',', '.');
					}else{
						 $akhir = $ongkir + (1000-$ratusan);
						echo "Rp. ".number_format($akhir, 2, ',', '.');
					};
				?>  
			</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td>
				<?php $ratusan = substr($ongkir, -3);
					if($ratusan<500){
						$akhir = $payment->jumlah + $ongkir - $ratusan;
						echo "Rp. ".number_format($akhir, 2, ',', '.');
						}else{
						 $akhir = $payment->jumlah + $ongkir + (1000-$ratusan);
						echo "Rp. ".number_format($akhir, 2, ',', '.');
					 };
				?>  
			</td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">Thank you!</div>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">Terima kasih telah Order di Kantin Kami.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>