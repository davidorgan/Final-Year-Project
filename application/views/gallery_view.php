
<div id="left_panel" class="grid_7">
		  <div class="side_links">
	  	<h5><?php echo anchor('club/profile/'.$this->uri->segment(3), 'Profile'); ?></h5>
	  </div>
	  
	  <div class="side_links">
	  	<h5><?php echo anchor('club/gallery/'.$this->uri->segment(3), 'Photos'); ?></h5>
	  </div>
	<div id="about-club">

	</div>
		<div id="about-club">
	<?php foreach($query->result() as $row): ?>
				<h4><?php echo $row->name; ?></h4>
				<p>
				Description:<?php echo $row->desc; ?><br />
				Admin: <?php echo $row->admin; ?> <br />
				Email: <?php echo $row->email; ?> <br />
				Members: <?php echo $row->no_members; ?>
				</p>
				
				
	<?php endforeach; ?>
	</div>



	</div>
	<!-- end left_panel -->
	<div id="main_panel" class="grid_16">

	<div id="message_main">
		
		<div id="gallery">
			<?php if(isset($images) && count($images)): 
				foreach($images as $image): ?>
				<div class="thumb">
					<?php if($image['url'] != '') : ?>
					<a class="group" rel="prettyPhoto['gallery']" href="<?php echo $image['url']; ?>">
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
<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		$("a[rel^='prettyPhoto']").prettyPhoto({theme: 'facebook',slideshow:5000, autoplay_slideshow:true});
	});
</script>
	