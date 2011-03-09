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
