<!DOCTYPE html>
<html>
<head>
	<title>
  		Login Account
	</title>
  <!-- Favicon -->
    <link href="<?= base_url()?>/assets/image/serve.png" rel="icon" type="image/png">
	    <link href="<?= base_url()?>/assets_penjual/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Fonts -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>/assets_penjual/css/regis.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <!-- styling-->
    
</head>
<body>
	<img class="wave" src="<?= base_url()?>/assets_penjual/img/wave-2.png">
    <div id="background-wrap">
    <div class="x1">
        <div class="cloud"></div>
    </div>

    <div class="x2">
        <div class="cloud"></div>
    </div>

    <div class="x3">
        <div class="cloud"></div>
    </div>

    <div class="x4">
        <div class="cloud"></div>
    </div>

    <div class="x5">
        <div class="cloud"></div>
    </div>
</div>
	<div class="container">
		<div class="img">
			 <img src="<?= base_url()?>/assets_penjual/img/undraw_eating_together_tjhx.svg" class="d-block w-100" alt="...">
		</div>
		<div class="login-content">
			<form role="form" method="post" action="<?php echo base_url() ;?>index.php/Login/proseslogin">
				<img src="<?= base_url()?>/assets_penjual/img/avatar-f.svg">
				<h2 class="title" style="color:white">Login!</h2>
				
                <div class="input-div one">
                    <div class="i">
           		   		<i class="ni ni-email-83"></i>
           		   	</div>
                    <div class="div">
           		   		<h5>Email</h5>
           		   		<input type="email" name="email" class="input"  type="email" id="your_email" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
           		   	</div>
                </div>
				
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input name="password" class="input" type="password" id="password" required>
                   </div>
            	</div>
				 <a href="<?php echo base_url() ;?>index.php/Login/register_view" class="text-light" style="color:white;">
					 <span>Buat Akun Baru?</span>
				 </a>
                <input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>	
    <script type="text/javascript" src="<?= base_url()?>/assets_penjual/js/main.js"></script>
	
	<?php
	$data = $this->session->flashdata('data');
	if($data == 1)
	{ ?>
		<script>
			Swal.fire({
				position:'center',
				icon:'error',
				title:'Woops !',
				text:'Password atau Email yang anda masukan salah !!',
				showConfirmButton:true,
			});
		</script>
	<?php } 
	else if($data == 2)
	{ ?>
		<script>
			Swal.fire({
				position:'center',
				icon:'info',
				title:'Akun belum terverifikasi',
				text:'Akun anda belum terverifikasi tunggu hingga admin melakukan verifikasi terhadap akun anda',
				showConfirmButton:true,
			});
		</script>
	<?php }
	else if($data == 3)
	{ ?>
		<script>
			Swal.fire({
				position:'center',
				icon:'success',
				title:'Verifikasi Email',
				text:'Akun anda berhasil dibuat. Verifikasi sekarang agar anda bisa mengakses Canteen11',
				showConfirmButton:true,
			});
		</script>
	<?php }
	else if($data == 4)
	{ ?>
		<script>
			Swal.fire({
				position:'center',
				icon:'danger',
				title:'Verifikasi Email Gagal',
				text:'Email anda tidak Valid. anda tidak bisa melakukan Verifikasi',
				showConfirmButton:true,
			});
		</script>
	<?php }
	else if($data == 5)
	{ ?>
		<script>
			Swal.fire({
				position:'center',
				icon:'warning',
				title:'Verifikasi Email',
				text:'Akun anda belum terverikasi. cek email anda dan lakukan verifikasi sekarang !!',
				showConfirmButton:true,
			});
		</script>
	<?php } ?>
</body>
</html>