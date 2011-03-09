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
				
				<h6 class="left-marg">Status!</h6>
				
			    <?php 
				echo form_open('contact/submit', 'class="left-marg"')."<br />";
				$data = array('name' => 'message', 'cols' => 55, 'rows' => 3);
				echo form_textarea($data, 'Message', 'id="message"')."<br />";
				echo form_submit('submit', 'Submit', 'id="submit"')."<br />";
				echo form_close();
				?>
			
			
			</div>
			<div id='thank_msg'></div>
	</div>
	<!-- end main_panel -->

<script type="text/javascript">
$('#submit').click(function() {
	
	var name = $('#name').val();
	
	
	var form_data = {
		name: $('#name').val(),
		email: $('#email').val(),
		message: $('#message').val(),
		ajax: '1'		
	};
	
	$.ajax({
		url: "<?php echo site_url('contact/submit'); ?>",
		type: 'POST',
		data: form_data,
		success: function(msg) {
			$('#thank_msg').hide().fadeIn("slow").html(msg+$('#thank_msg').html());
		}
	});
	
	$('#name').val("");
	$('#email').val("");
	$('#message').val("");
	
	return false;
});
	
	
</script>


<!-- end contact_form-->