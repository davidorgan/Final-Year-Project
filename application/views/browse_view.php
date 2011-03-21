<div id="left_panel" class="grid_7">
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


		<h1>Popular Clubs</h1>
		<div id='browse_table'>
			
		<?php foreach($records->result() as $record): ?>
			<a href="http://danu2.it.nuigalway.ie/DavidOrgansFYP/fypsite/club/profile/<?php echo $record->id; ?>">
			<div class="club_info">
				<h6><?php echo $record->name; ?></h6>
				<span>Number of Members: <?php echo $record->no_members; ?></span><br />
				<span>Description: <?php echo $record->desc; ?></span>
			</div>
			</a>
		<?php endforeach; ?>
			
		
		</div>

		<?php echo $this->pagination->create_links(); ?>




	</div>
	<!-- end main_panel -->

    
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>	

<script type="text/javascript" charset="utf-8">
	$('tr:odd').css('background', '#e3e3e3');
</script>