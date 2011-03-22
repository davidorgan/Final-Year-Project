<div id="left_panel" class="grid_7">
	<div id="about-you"></div>
	
		<h6 class="left-marg">
			<?php if($this->session->userdata('is_logged_in') == 'true'){?>

			Welcome <?php echo $this->session->userdata('full_name'); ?>
			
			<?php }else{ ?>
			Welcome to Coterie!
			<?php } ?>
		</h6>
		<p>
			Quis purus vestibulum, pellentesque vehicula ac, vehicula in ipsum ac odio vehicula, eros vitae a ac scelerisque phasellus. Aenean platea est vitae vivamus mi, elit orci ligula dictum rhoncus donec taciti, enim ac quisque volutpat feugiat justo. Hendrerit hymenaeos vitae ligula mauris condimentum, amet integer ut leo id, in do vestibulum. Fusce viverra sunt mattis, vel eros et erat pellentesque luctus. Feugiat urna, vivamus dictum fusce pulvinar, pellentesque dolor fermentum leo nullam eros, elementum et, eget quis.
		</p>
	</div>
	<!-- end left_panel -->
	<div id="main_panel" class="grid_16">
		<h6 class="left-marg">
			Main panel.
		</h6>
		<p>
			<?php if($this->session->userdata('is_logged_in') != 'true'){?>
			<a href="<?php echo base_url(); ?>login">Login</a>
			<?php }else{ ?>
			<a href="<?php echo base_url(); ?>logout">Logout</a>
			<?php } ?> | 
			<a href="<?php echo base_url(); ?>register">Register</a> | 
			<a href="<?php echo base_url(); ?>facebook_test">Facebook Test</a> |
			<a href="<?php echo base_url(); ?>addClub">Create Club</a>
		</p>
		
		<p>
			
			
Nullam congue lacus id odio pharetra aliquet. Sed dignissim ipsum vitae purus eleifend facilisis. Morbi et justo quis dui aliquam placerat. Quisque congue, enim et ullamcorper dignissim, nisi odio viverra turpis, eu congue mi eros non libero. Maecenas non sapien interdum erat molestie egestas. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut at viverra tellus. Cras libero justo, tristique sed congue at, lacinia in nulla. Morbi tempor faucibus eros, vel vulputate metus porttitor vel. Maecenas non ligula risus. Aenean non lectus id augue dictum cursus.
		</p>
		
		      <div id="fb-root"></div>
      <script src="http://connect.facebook.net/en_US/all.js"></script>
      <script>
         FB.init({ 
            appId:'182794741757028', cookie:true, 
            status:true, xfbml:true 
         });

		 FB.api('/me', function(response) {
                     var query = FB.Data.query('select name, interests, sex, pic_square, email from user where uid={0}', response.id);
                     query.wait(function(rows) {
 
                       document.getElementById('about-you').innerHTML =
					   '<h4>About You:</h4>' +
					   '<img src="' + rows[0].pic_square + '" alt="" />' +
					   rows[0].name + "<br />" +
					   'Interests!: ' + rows[0].interests + "<br />" +
					   'Sex: ' + rows[0].sex + "<br />" +
					   'Email: ' + rows[0].email + "<br />";
                     });
                });
				
				

      </script>
	  
	  
      <fb:login-button autologoutlink="true" perms="email,user_checkins,user_activities,user_interests">Login with Facebook</fb:login-button>

	</div>
	<!-- end main_panel -->
