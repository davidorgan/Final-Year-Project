<div id="left_panel" class="grid_7">
		<h6 class="left-marg">
			Left panel.
		</h6>
		<p>
			Quis purus vestibulum, pellentesque vehicula ac, vehicula in ipsum ac odio vehicula, eros vitae a ac scelerisque phasellus. Aenean platea est vitae vivamus mi, elit orci ligula dictum rhoncus donec taciti, enim ac quisque volutpat feugiat justo. Hendrerit hymenaeos vitae ligula mauris condimentum, amet integer ut leo id, in do vestibulum. Fusce viverra sunt mattis, vel eros et erat pellentesque luctus. Feugiat urna, vivamus dictum fusce pulvinar, pellentesque dolor fermentum leo nullam eros, elementum et, eget quis.
		</p>
	</div>
	<!-- end left_panel -->
	<div id="main_panel" class="grid_16">

			<div id="contact_form">
				
				<h6 class="left-marg">Add Club</h6>
				
			    <?php 
				echo form_open('addClub/insert', 'class="left-marg"')."<br />";
				$data = array('name' => 'desc', 'cols' => 55, 'rows' => 3);
				echo form_input('name','Name')."<br />";
				echo form_input('admin','Admin')."<br />";
				echo form_input('password','Password')."<br />";
				echo form_input('email','Name')."<br />";
				echo form_textarea($data, 'Description', 'id="desc"')."<br />";
				
				echo form_submit('submit', 'Submit')."<br />";
				echo form_close();
				?>
			
			
			</div>
			<div id='thank_msg'></div>
	</div>
	<!-- end main_panel -->



<!-- end contact_form-->