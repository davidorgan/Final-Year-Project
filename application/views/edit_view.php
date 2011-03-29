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
				

				<?php if($success != ""){ echo $success; } ?>

				
			    <?php 
				echo form_open('account/edit/'.$this->uri->segment(3), 'class="left-marg" id= "addclub"');		
				?>
								<fieldset>
    			<legend>Login Info:</legend>
				
				<?php foreach($club->result() as $c): ?>
				
				<?php
				echo "<span>Username</span><br/>";
				echo form_input('admin',$c->admin)."<br />";
				echo "<span>Passsword</span><br/>";
				echo form_password('password', $c->password)."<br />";

				?>
				</fieldset>
				
				<fieldset>
    			<legend>Club Info:</legend>
				
				<?php
				echo "<span>Club Name</span><br/>";	
				echo form_input('name', $c->name)."<br />";
				$data = array('name' => 'desc', 'cols' => 55, 'rows' => 3, 'id'=> 'desc');
				echo "<span>Club Description</span><br/>";
				echo form_textarea($data, $c->desc)."<br />";
				?>
				</fieldset>
				
				
				<fieldset>
				<legend>Your Info:</legend>
				

				
				<?php
				echo "<span>First Name</span><br/>";	
				echo form_input('first_name',$c->first_name)."<br />";
				echo "<span>Last Name</span><br/>";	
				echo form_input('last_name',$c->last_name)."<br />";
				echo "<span>Email</span><br/>";
				echo form_input('email',$c->email)."<br />";
				
				?>
				
				<?php endforeach; ?>
				</fieldset>
				
				<?php
				
				echo form_submit('update', 'Update')."<br />";
				echo form_close();
				?>
			
			
			</div>
			<div id='thank_msg'></div>
	</div>
	<!-- end main_panel -->



<!-- end contact_form-->
