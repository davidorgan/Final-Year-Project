<div id="left_panel" class="grid_7">
		<h6 class="left-marg">
			Welcome to our <br /> Recommendation Section
		</h6>
		<p>
			Here's a list of recomenndations based on your interests from facebook.
		</p>
	</div>
	<!-- end left_panel -->
	<div id="main_panel" class="grid_16">


		<h1>Recommended Clubs</h1>
		<div id='browse_table'>
			
			
		<?php
		
		$interests = $this->input->post('interests');

		$arrInt = explode(",",$interests);
		
		$sql = "SELECT * FROM clubs";
		$query = $this->db->query($sql);
		
		 $data['records'] = array();
		foreach($arrInt as $v){
		
			$string = trim($v);	
			  
			  $needle = $string;
			  $needle = strtolower($needle);

			  if($query->num_rows() > 0){
				  foreach($query->result() as $row)
				  {

				  		$haystack = $row->desc;
				  		
				  		$haystack = strtolower($haystack);
				  	
				  		$pos = strpos($haystack,$needle);

						if($pos === false) {
						 // string needle NOT found in haystack
						}
						else {
						 // string needle found in haystack
						 echo '<a href="http://danu2.it.nuigalway.ie/DavidOrgansFYP/fypsite/club/profile/'.$row->id.'">';
						 echo '<div class="club_info">';
						 echo '<h6>'. $row->name .'</h6>';
						echo ' <span>Number of Members: '.$row->no_members.'</span><br />';
						echo '<span>Description:'.$row->desc.'</span>';
						echo '</div>';
						echo '</a>';
						}
				  	 
				  }
			  }

		}
		?>
		</div>






	</div>
	<!-- end main_panel -->

    
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>	

<script type="text/javascript" charset="utf-8">
	$('tr:odd').css('background', '#e3e3e3');
</script>