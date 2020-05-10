<!DOCTYPE html>
<html>
<head>
	<title>
  		Register Account
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
			<form role="form" method="post" action="<?php echo base_url() ;?>index.php/Login/prosesregis">
			<h2 class="title" style="color:white;">register!</h2>
				
           		<div class="input-div one">
                    <div class="i">
           		       <i class="fas fa-user"></i>
                    </div>
                	<div class="div">
           		   		<h5>Username</h5>
           		   		<input name="nama" class="input" type="text" required>
           		   </div>
                </div>
				<?php if(form_error('nama') == true){?><div style="color:red;margin-top:-25px;"><?php echo form_error ('nama'); ?></div><?php }?>
				
                <div class="input-div one">
                    <div class="i">
           		   		<i class="ni ni-email-83"></i>
           		   	</div>
                    <div class="div">
           		   		<h5>Email</h5>
           		   		<input type="email" name="email" class="input"  type="email" id="your_email" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
           		   	</div>
                </div>
				<?php if(form_error('email') == true){?><div style="color:red;margin-top:-25px;"><?php echo form_error ('email'); ?></div><?php }?>
				
                <div class="input-div one">
                    <div class="i">
           		   		<i class="ni ni-mobile-button"></i>
           		   	</div>
                    <div class="div">
           		   		<h5>Telefon</h5>
           		   		<input name="no_telepon" type="text" name="no_telepon"  id="number_phone" class="input" required>
           		   	</div>
                 </div>
				 <?php if(form_error('no_telepon') == true){?><div style="color:red;margin-top:-25px;margin-bottom:-25px;"><?php echo form_error ('no_telepon'); ?></div><?php }?>
				
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input name="password" class="input" type="password" id="password" required>
                   </div>
            	</div>
				<?php if(form_error('password') == true){?><div style="color:red;margin-top:10px;margin-bottom:-25px;"><?php echo form_error ('password'); ?></div><?php }?>
				
				<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Confirm Password</h5>
           		    	<input name="confirm" class="input" type="password" id="password" required>
                   </div>
            	</div>
				<?php if(form_error('confirm') == true){?><div style="color:red;margin-top:10px;"><?php echo form_error ('confirm'); ?></div><?php }?>
				
                <input type="submit" class="btn" value="Daftar">   
            </form>
        </div>
    </div>
    
    <script type="text/javascript" src="<?= base_url()?>/assets_penjual/js/main.js"></script>
</body>
</html>