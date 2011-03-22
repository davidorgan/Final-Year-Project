<?php

	class User_model extends CI_Model
	{
		var $gallery_path;
		var $gallery_path_url;
		
		function __construct()
	    {
	        // Call the Model constructor
	        parent::__construct();
	        
	    }
	    
	    function membership_exists($user_id,$club_id)
	    {
	    	$sql = "SELECT * from memberships WHERE user_id = ? AND club_id = ?";
	    	$query = $this->db->query($sql, array($user_id, $club_id));
	    	if($query->num_rows() > 0)
	  		{
	  			return true;
	  		}
	  		else{
	  			return false;
	  		}
	    }
		
	    function user_exists($user_id)
	    {
	    	$sql = "SELECT oauth_uid from users WHERE oauth_uid = ?";
	  		$query = $this->db->query($sql, $user_id);
	  		if($query->num_rows() > 0)
	  		{
	  			return true;
	  		}
	  		else{
	  			return false;
	  		}
	    }
	    
	    function create_membership($user_id, $club_id)
	    {
	    		$data = array(
				   'user_id' => $user_id ,
				   'club_id' => $club_id 
				);
				
				$this->db->insert('memberships', $data);

						$sql = "SELECT COUNT( club_id ) as num FROM memberships WHERE club_id = ?";
						$query = $this->db->query($sql,$club_id);

						foreach($query->result() as $row){
							$count = $row->num;
						}
						
						$sql = "UPDATE clubs SET `no_members`= ? WHERE id = ?";
						
						$query = $this->db->query($sql,array($count, $club_id));

				
	    }
	    
	    function create_user($user_id, $name, $email, $pic_url)
	    {
	    		$data = array(
				   'oauth_uid' => $user_id ,
				   'oauth_provider' => 'facebook' ,
	  			   'name' => $name ,
	  				'email' => $email ,
	  				'img_url' => $pic_url 	
				);
				
				$this->db->insert('users', $data);
	    }

	}