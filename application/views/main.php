<div id="left_panel" class="grid_7">
	
	
		<h6 class="left-marg">
			<?php if($this->session->userdata('is_logged_in') == 'true'){?>

			Welcome <?php echo $this->session->userdata('full_name'); ?>
			
			<?php }else{ ?>
			Welcome to Coterie!
			<?php } ?>
		</h6>
		<p>
			Welcome to Coterie, a site dedicated to allowing you to create clubs, join in on discussions, become a member of a club and much more.
		</p>
		
		<div id="about-you"></div>
	</div>
	<!-- end left_panel -->
	<div id="main_panel" class="grid_16">

			<div class="step">
				<h4>Join</h4>
				<p>Login using your facebook account info to access clubs, participate in discussions and become a member of your favourite clubs</p>
				
			</div>
			
		<div class="step">
			<h4>Create</h4>
			<p>Having trouble finding a club in something you are interested in? Try and create your own club where you can add information about your club, upload photos and contact your members.</p>
			
		</div>
		<div class="step">
			<h4>Browse</h4>
			<p>If your not sure what club to join, use our browse page to see the most popular clubs on the site.</p>
			
		</div>

<div class="step_link"><fb:login-button autologoutlink="true" perms="user_likes,friends_likes, email,user_checkins,user_activities,user_interests, friends_interests"></fb:login-button></div>
			
<div class="step_link"><a href="<?php echo base_url();?>addClub" class="buttons">Create</a></div>

<div class="step_link"><a href="<?php echo base_url();?>club/browse" class="buttons">Browse</a></div>
	</div>
	<!-- end main_panel -->
	
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
					   '<form name="interest_form" action="http://danu2.it.nuigalway.ie/DavidOrgansFYP/fypsite/recommend" method="POST">' +
					   '<textarea name="interests" id="interests">' + rows[0].interests + "</textarea><br />" +
					   '<input type="submit" name ="submit" value="Recommend" id="interests_submit" />' +
					   '</form>';
                     });
                });
				
				

      </script>
	  

