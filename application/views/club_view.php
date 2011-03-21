

<div id="left_panel" class="grid_7">
		  <div class="side_links">
	  	<h5><?php echo anchor('club/profile/'.$this->uri->segment(3), 'Profile'); ?></h5>
	  </div>
	  
	  <div class="side_links">
	  	<h5><?php echo anchor('club/gallery/'.$this->uri->segment(3), 'Photos'); ?></h5>
	  </div>
	<div id="about-club">
	<?php foreach($query->result() as $row): ?>
				<h4><?php echo $row->name; ?></h4>
				<p>
				Description:<?php echo $row->desc; ?><br />
				Admin: <?php echo $row->admin; ?> <br />
				Email: <?php echo $row->email; ?>
				</p>
				
				
	<?php endforeach; ?>
	</div>
	

	<?php if($this->session->userdata('is_logged_in') != 'true'):?>
		<div class="join_form">
			<?php
				echo form_open('club/join')."<br />";

				
				?>

	  	<div id="about-you"></div>
		      <div id="fb-root"></div>
      <script src="http://connect.facebook.net/en_US/all.js"></script>
      <script>
         FB.init({ 
            appId:'182794741757028', cookie:true, 
            status:true, xfbml:true 
         });

		 FB.api('/me', function(response) {
                     var query = FB.Data.query('select uid,name, interests, sex, pic_square, email from user where uid={0}', response.id);
                     query.wait(function(rows) {
                       document.getElementById('about-you').innerHTML =
					   '<h4>About You:</h4>' +
					    'UID!: <span id="uid_temp">' + rows[0].uid + "</span><br />" +
					   '<img src="' + rows[0].pic_square + '" alt="" />' +
					   rows[0].name + "<br />" +
					   'Interests!: ' + rows[0].interests + "<br />" +
					   'Sex: ' + rows[0].sex + "<br />" +
					    'Email: ' + rows[0].email + "<br />"+
						'<input value="' + rows[0].uid + '" type="text" name="uid" id="uid" />'+ "<br />"+
						 '<input value="' + rows[0].name + '" type="text" name="u_name" id="u_name" />'+ "<br />"+
						  '<input value="' + rows[0].pic_square + '" type="text" name="u_pic" id="u_pic" />'+ "<br />"+
						 '<input value="' + rows[0].email + '" type="text" name="u_email" id="u_email" />';;
						
                     });
					
                });
				

      </script>

				<?php
			echo form_input('club_id',$this->uri->segment(3))."<br />";
			echo form_submit('join', 'Join this club', 'id="join"')."<br />";
				echo form_close();
			?>
		</div>
	<?php endif; ?>

	</div>
	<!-- end left_panel -->
	<div id="main_panel" class="grid_16">

	<div id="message_main">
			<h4>Message Board</h4>
		  
		      <form name="ajax_form" id ="ajax_form" method="post">
		      	<div id="message_uid"></div>
						      <div id="fb-root"></div>
      <script src="http://connect.facebook.net/en_US/all.js"></script>
      <script>
         FB.init({ 
            appId:'182794741757028', cookie:true, 
            status:true, xfbml:true 
         });

		 FB.api('/me', function(response) {
                     var query = FB.Data.query('select uid,name, interests, sex, pic_square, email from user where uid={0}', response.id);
                     query.wait(function(rows) {
                       document.getElementById('message_uid').innerHTML =
						'<input value="' + rows[0].uid + '" type="hidden" name="user_id" id="user_id" />';
						
                     });
					
                });
				

      </script>
		      	<input type="hidden" name="club_id" id="club_id" value="<?php echo $this->uri->segment(3); ?>" />
		    
				 <textarea name='message' id='message' rows="2" cols="40"></textarea> 

				  
				  <br/>

		          <input type="submit" value="Post" name="login_submit" id="login_submit" />
		
		      </form>
			  
			  <div id="form_messages">
			  	<?php if($rows != null): ?>
				  <?php foreach($rows as $r): ?>
				  <div class="message"><?php echo $r->message; ?></div>
				  <?php endforeach; ?>
				 <?php else: ?>
				 	No comments have been added to the message board!
				 <?php endif; ?>
			  </div>
			  
			  

	</div>

	</div>
	<!-- end main_panel -->
	
	  <script type="text/javascript">
			$(document).ready(function(){			
			$("#user_id").val($('#uid_temp span').text());	
		});

      </script>

