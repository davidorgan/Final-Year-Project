<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Social Network for Clubs and Socs - 'Oh, so they have Internet on computers now!'</title>


<link rel="stylesheet" href= "<?php echo base_url(); ?>css/reset.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/text.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/font.css" type="text/css" charset="utf-8">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/960_24_col.css" />
<!--<link rel="stylesheet" href="<?php echo base_url(); ?>system/application/css/demo.css" />-->

<link rel="stylesheet/less" href="<?php echo base_url(); ?>css/style.less" /> 
<script src="http://lesscss.googlecode.com/files/less-1.0.18.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>	


</head>
<body>
	<div id="top_banner"> 
			<div class="container_24">
				<div class="grid_3">
				<h1>
					Coterie
				</h1>
				</div>
				<div id="banner_right" class="grid_10"><?php echo anchor('', 'Home', 'title="Home"'); ?> &nbsp;&nbsp; <?php echo anchor('/browse', 'Browse', 'title="Browse"'); ?> &nbsp;&nbsp; <?php if($this->session->userdata('is_logged_in') == 'true'){ echo anchor('club/profile/'.$this->session->userdata('id'), 'My Club', 'title="My Club"')."&nbsp;&nbsp; Account";} ?> </div>

			</div>
	</div>
	<!-- End top_banner -->

<div id="login_container">

	
		<h1>
			Login
		</h1>
	  	
		<?php
			echo form_open('login/validate');
			echo form_input('username','Username');
			echo form_password('password','Password');
			echo form_submit('submit', 'Login');
			echo anchor('register','Create Account');
		?>
	  
	<div class="clear"></div>
</div>
<!-- end .container_24 -->

</body>
</html>
	