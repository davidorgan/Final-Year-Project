<div id="left_panel" class="grid_7">
		<h6 class="left-marg">
			Create a Club
		</h6>
		<p>
			Welcome to the Create a Club page. Your just one step away from owning your own club on our site. <br />
			Just fill in the information on the right, click submit and your done.
		</p>
		<p>
			Note: The description of your club is important. This helps us reccommend you to people who may be interest in joining your club.
		</p>
	</div>
	<!-- end left_panel -->
	<div id="main_panel" class="grid_16">

			<div id="contact_form">
				

				

				
			    <?php 
				echo form_open('addClub/insert', 'class="left-marg" id= "addclub"');		
				?>
								<fieldset>
    			<legend>Login Info:</legend>
				
				<?php
				echo "<span>Username</span><br/>";
				echo form_input('admin')."<br />";
				echo "<span>Passsword</span><br/>";
				echo form_input('password')."<br />";

				?>
				</fieldset>
				
				<fieldset>
    			<legend>Club Info:</legend>
				
				<?php
				echo "<span>Club Name</span><br/>";	
				echo form_input('name')."<br />";
				$data = array('name' => 'desc', 'cols' => 55, 'rows' => 3, 'id'=> 'desc');
				echo "<span>Club Description</span><br/>";
				echo form_textarea($data)."<br />";
				?>
				</fieldset>
				
				
				<fieldset>
				<legend>Your Info:</legend>
				
				<?php
				echo "<span>First Name</span><br/>";	
				echo form_input('first_name')."<br />";
				echo "<span>Last Name</span><br/>";	
				echo form_input('last_name')."<br />";
				echo "<span>Email</span><br/>";
				echo form_input('email')."<br />";
				?>
				</fieldset>
				
				<?php
				
				echo form_submit('submit', 'Submit')."<br />";
				echo form_close();
				?>
			
			
			</div>
			<div id='thank_msg'></div>
	</div>
	<!-- end main_panel -->



<!-- end contact_form-->