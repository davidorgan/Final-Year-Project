
<div id="left_panel" class="grid_7">
		  <div class="side_links">
	  	<h5><?php echo anchor('club/profile/'.$this->uri->segment(3), 'Profile'); ?></h5>
	  </div>
	  
	  <div class="side_links">
	  	<h5><?php echo anchor('club/gallery/'.$this->uri->segment(3), 'Photos'); ?></h5>
	  </div>
	<div id="about-club">

	</div>
	<div id="about-you"></div>
		      <div id="fb-root"></div>
      <script src="http://connect.facebook.net/en_US/all.js"></script>
      <script>
         FB.init({ 
            appId:'182794741757028', cookie:true, 
            status:true, xfbml:true 
         });

		 FB.api('/me', function(response) {
                     var query = FB.Data.query('select name, interests, sex, pic_square from user where uid={0}', response.id);
                     query.wait(function(rows) {
                       document.getElementById('about-you').innerHTML =
					   '<h4>About You:</h4>' +
					   '<img src="' + rows[0].pic_square + '" alt="" />' +
					   rows[0].name + "<br />" +
					   'Interests!: ' + rows[0].interests + "<br />" +
					   'Sex: ' + rows[0].sex + "<br />";
                     });
                });
				
				

      </script>


	</div>
	<!-- end left_panel -->
	<div id="main_panel" class="grid_16">

	<div id="message_main">
		
		<div id="gallery">
			<?php if(isset($images) && count($images)): 
				foreach($images as $image): ?>
				<div class="thumb">
					<?php if($image['url'] != '') : ?>
					<a class="group" rel="images" href="<?php echo $image['url']; ?>" rel="lightbox">
						<img src="<?php echo $image['thumb_url']; ?>"/>
					</a>
					<?php endif; ?>
				</div>


			<?php endforeach; else: ?>
				<div id="blank_gallery">No Images Uplaoded</div>
			<?php endif; ?>
			
			<div class="clear"></div>
		</div>
		
		<?php if($this->session->userdata('is_logged_in') == true &&  $this->session->userdata('id') == $this->uri->segment(3)){?>
			<div id="upload">
							<?php
				echo form_open_multipart('club/gallery/'.$this->uri->segment(3)); 
				echo form_upload('userfile');
				echo form_submit('upload', 'Upload');
				echo form_close();
				?>
			</div>
		<?php } ?>
	</div>
	

	</div>
	<!-- end main_panel -->

	