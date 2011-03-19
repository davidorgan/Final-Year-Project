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
<script language="javascript" src="<?php echo base_url(); ?>js/ajax_post.js"></script>


</head>
<body>
	<div id="top_banner"> 
			<div class="container_24">
				<div class="grid_3">
				<h1>
					Coterie
				</h1>
				</div>
				<div id="banner_right" class="grid_10"><?php echo anchor('', 'Home', 'title="Home"'); ?> &nbsp;&nbsp; <?php echo anchor('/club/browse', 'Browse', 'title="Browse"'); ?> &nbsp;&nbsp; <?php if($this->session->userdata('is_logged_in') == 'true'){ echo anchor('club/profile/'.$this->session->userdata('id'), 'My Club', 'title="My Club"');} ?> </div>
				<div id="banner_right_float" class="grid_6">
					<?php if($this->session->userdata('is_logged_in') != 'true'){?>
					<a href="<?php echo base_url(); ?>index.php/login">Login</a>
					<?php }else{ ?>
					<a href="<?php echo base_url(); ?>index.php/account/<?php echo $this->session->userdata('id'); ?>">Account</a>
					 | <a href="<?php echo base_url(); ?>index.php/logout">Logout</a>
					<?php } ?>
				</div>
			</div>
	</div>
	<!-- End top_banner -->
<div id="main_container" class="container_24">