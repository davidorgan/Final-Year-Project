<div id="left_panel" class="grid_7">
		<h6 class="left-marg">
			Welcome to our <br /> Browse Section
		</h6>
		<p>
			From here you can have a look at all our clubs which are sorted by popularity so you only see the best ones first. Just click on a club that looks interesting to you to see their profile.
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