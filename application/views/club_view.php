<div id="left_panel" class="grid_7">
	<?php foreach($query->result() as $row): ?>
				<h1 ><?php echo $row->name; ?></h1>
				<p>
				Description:<?php echo $row->desc; ?><br />
				Admin: <?php echo $row->admin; ?> <br />
				Email: <?php echo $row->email; ?>
				</p>
				
				
	<?php endforeach; ?>

	</div>
	<!-- end left_panel -->
	<div id="main_panel" class="grid_16">
		<h6 class='left-marg'>Main Pannel</h6>
		<p>
			Quis purus vestibulum, pellentesque vehicula ac, vehicula in ipsum ac odio vehicula, eros vitae a ac scelerisque phasellus. Aenean platea est vitae vivamus mi, elit orci ligula dictum rhoncus donec taciti, enim ac quisque volutpat feugiat justo. Hendrerit hymenaeos vitae ligula mauris condimentum, amet integer ut leo id, in do vestibulum. Fusce viverra sunt mattis, vel eros et erat pellentesque luctus. Feugiat urna, vivamus dictum fusce pulvinar, pellentesque dolor fermentum leo nullam eros, elementum et, eget quis.
		</p>

	</div>
	<!-- end main_panel -->
