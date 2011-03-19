<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
	<script language="javascript">
		$(document).ready(function() {
			$("#form").submit(function() {
				var message = $("#message").val(); 
				$.post("/message/process", { message:message },
				function(data){
					$("#message_error").html(data.message);
				},'json');
			});
		});
	</script>

<div id="left_panel" class="grid_7">
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
	<div id="about-you"></div>
		      <div id="fb-root"></div>
      <script src="http://connect.facebook.net/en_US/all.js"></script>
      <script>
         FB.init({ 
            appId:'182794741757028', cookie:true, 
            status:true, xfbml:true 
         });

		 FB.api('/me', function(response) {
                     var query = FB.Data.query('select name, interests, sex, pic_square from user where uid={0}', response.id);
                     query.wait(function(rows) {
                       document.getElementById('about-you').innerHTML =
					   '<h4>About You:</h4>' +
					   '<img src="' + rows[0].pic_square + '" alt="" />' +
					   rows[0].name + "<br />" +
					   'Interests!: ' + rows[0].interests + "<br />" +
					   'Sex: ' + rows[0].sex + "<br />";
                     });
                });
				
				

      </script>

	</div>
	<!-- end left_panel -->
	<div id="main_panel" class="grid_16">

	<div id="message_main">
			<h4>Message Board</h4>
		  
		      <form name="ajax_form" id ="ajax_form" method="post">
		      	<input type="hidden" name="user_id" id="user_id" value="<?php echo $this->session->userdata('id'); ?>" />
		      	<input type="hidden" name="club_id" id="club_id" value="<?php echo $this->uri->segment(3); ?>" />
		    
				  <textarea name='message' id='message' rows="2" cols="40"></textarea>
				  
				  <br/>

		          <input type="submit" value="Post" name="login_submit" id="login_submit" />
		
		      </form>
			  
			  <div id="form_messages">
				  <?php foreach($rows as $r): ?>
				  <div class="message"><?php echo $r->message; ?></div>
				  <?php endforeach; ?>
			  </div>

	</div>

	</div>
	<!-- end main_panel -->
	

