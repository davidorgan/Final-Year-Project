

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
						'<input value="' + rows[0].uid + '" type="hidden" name="uid" id="uid" />'+
						 '<input value="' + rows[0].name + '" type="hidden" name="u_name" id="u_name" />'+
						  '<input value="' + rows[0].pic_square + '" type="hidden" name="u_pic" id="u_pic" />'+
						 '<input value="' + rows[0].email + '" type="hidden" name="u_email" id="u_email" />';
						
                     });
					
                });
				

      </script>

				<?php
			echo form_hidden('club_id',$this->uri->segment(3));
			echo form_submit('join', 'Join this club', 'id="join"');
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
						'<input value="' + rows[0].uid + '" type="hidden" name="ajax_user_id" id="ajax_user_id" />'+
						 '<input value="' + rows[0].name + '" type="hidden" name="ajax_name" id="ajax_name" />'+
						  '<input value="' + rows[0].pic_square + '" type="hidden" name="ajax_img" id="ajax_img" />'+
						 '<input value="' + rows[0].email + '" type="hidden" name="ajax_email" id="ajax_email" />';
						
                     });
					
                });
				

      </script>
		      	<input type="hidden" name="club_id" id="club_id" value="<?php echo $this->uri->segment(3); ?>" />
		    
				 <textarea name='message' id='message' rows="2" cols="40"></textarea> 

				  
				  <br/>

		          <input type="submit" value="Post" name="login_submit" id="login_submit" />
		
		      </form>
			  
			  <div id="form_messages">
			  	<?php if($records != null): ?>
				  <?php foreach($records as $r): ?>
				  
				 <div class="message">
				  	<?php if($r->img != null || $r->img != "") :?>
				  	<img src="<?php echo $r->img; ?>" />
					<?php else: ?>
					<img src="http://b.static.ak.fbcdn.net/rsrc.php/v1/yo/r/UlIqmHJn-SK.gif" />
					<?php endif; ?>
					
					<?php if($r->u_name != null || $r->u_name != "") :?>
				  	<span class="author"><strong><?php echo $r->u_name; ?></strong> wrote:</span><br />
					<?php else: ?>
						<span class="author">Sent by: Unkown</span><br />
					<?php endif; ?>
					
				  	<?php echo $r->msg; ?><br />
					<div class="clear"></div>
				</div>
				  <?php endforeach; ?>
				 <?php else: ?>
				 	No comments have been added to the message board!
				 <?php endif; ?>
			  </div>
			  
			  <?php echo $this->pagination->create_links(); ?>

	</div>

	</div>
	<!-- end main_panel -->
	
	  <script type="text/javascript">
			$(document).ready(function(){			
			$("#user_id").val($('#uid_temp span').text());	
		});

      </script>

