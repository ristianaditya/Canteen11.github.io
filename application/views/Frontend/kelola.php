<style>
		#map {
			width: 100%;
			height: 200px;
			
		}
</style>
<link rel="stylesheet" href="<?php echo base_url() ;?>assets_frontend/style.css">
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('<?php echo base_url() ;?>assets_frontend/images/bg-04.jpg');">
	<h2 class="ltext-105 cl0 txt-center">
		Chart
	</h2>
</section>
<!-- Shoping Cart -->
	<?php foreach($keranjang as $id_kantin) {
		$id_kantin = $id_kantin->id_kantin; }
	?>	<form method="post" action="<?php echo base_url() ;?>index.php/Utama/checkout/<?php if(empty($id_kantin)){ }else{ echo $id_kantin;}?>" class="bg0 p-t-75 p-b-85">	
		<div class="container">
				<div class=" m-lr-auto m-b-50">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart table-hover">
								<tr class="table_head" style="background-color:rgb(245, 245, 245)">
									<th class="text-center">Product</th>
									<th class="text-center">Product Name</th>
									<th class="text-center">Price</th>
									<th class="text-center">Quantity</th>
									<th class="text-center">Total</th>
								</tr>
								<?php foreach($keranjang as $produk) {
								$data_kantin = $produk->alamat_sekolah;
								?>
								
								<tr class="table_row">
									<td class="column-1">
											<img style="height:50px;width:70px;" src="<?php echo base_url().$produk->foto_produk?>" alt="IMG">
									</td>
									<td class="text-center"><?= $produk->nama_produk ;?></td>
									<td class="text-center"><?= number_format($produk->harga,2,",",".");?></td>
									<td class="text-center"><?= $produk->jumlah_pesanan;?></td>
									<td class="text-center"><?= number_format($produk->total_harga,2,",",".");?></td>
								</tr>
								<?php }?>
							</table>
						</div>
				</div>
		</div>

</form>

