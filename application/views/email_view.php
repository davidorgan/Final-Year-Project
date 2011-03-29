<div id="left_panel" class="grid_7">
		  <div class="side_links">
	  	<h5><?php echo anchor('account/edit/'.$this->uri->segment(3), 'Edit Settings'); ?></h5>
	  </div>
	  
	  <div class="side_links">
	  	<h5><?php echo anchor('account/email/'.$this->uri->segment(3), 'Email Members'); ?></h5>
	  </div>
	</div>
	<!-- end left_panel -->
	<div id="main_panel" class="grid_16">

			<div id="contact_form">
				

					<?php if($email_success != ""){ echo $email_success; } ?>

				
			    <?php 
				echo form_open('account/email/'.$this->uri->segment(3), 'class="left-marg" id= "addclub"');		
				?>
								<fieldset>
    			<legend>Email to All Members:</legend>
				
				<?php
				echo "<span>Subject</span><br/>";
				echo form_input('subject')."<br />";

				$data = array('name' => 'message', 'cols' => 55, 'rows' => 4, 'id'=> 'message');
				echo "<span>Message</span><br/>";
				echo form_textarea($data)."<br />";

				?>
				</fieldset>
				
				<?php
				
				echo form_submit('send', 'Send')."<br />";
				echo form_close();
				?>
			
			
			</div>
			<div id='thank_msg'></div>
	</div>
	<!-- end main_panel -->



<!-- end contact_form-->