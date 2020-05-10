<html>
	<head>
		<?php
			header("Content-type:application/octet-stream");
			header("Content-Disposition:attachment; filename= $title.xls");
			header("Pragma: no-chace");
			header("Expires:0");
		?>
	</head>
	<body>
<table border="1">
	<thead>
		<tr style="background-color:lavender;color:black;">
			<td><b>No</b></td>
			<td><b>ID Pembeli</b></td>
			<td><b>Nama</b></td>
			<td><b>Email</b></td>
			<td><b>Jenis Kelamin</b></td>
			<td><b>No Telepon</b></td>
			<td><b>Password</b></td>
		</tr>
	</thead>
	<tbody >
		<?php
		$no = 1 ;
		foreach($data as $a) {
		?>
		<tr class="text-center">
			<td class="align-middle"><?php echo $no++ ;?></td>
			<td class="align-middle"><?php echo $a->id_pembeli ;?></td>
			<td class="align-middle"><?php echo $a->nama ;?></td>
			<td class="align-middle"><?php echo $a->email ;?></td>
			<td class="align-middle"><?php echo $a->jenis_kelamin ;?></td>
			<td class="align-middle"><?php echo $a->no_telepon ;?></td>
			<td class="align-middle"><?php echo $a->password ;?></td>
		</tr>
		<?php }?>
	</tbody>
		</table>
	</body>
</html>		