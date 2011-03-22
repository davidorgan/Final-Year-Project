<?php

	class Message_model extends CI_Model
	{
		function __construct()
	    {
	        // Call the Model constructor
	        parent::__construct();
	    }
	    
	    function add($data)
	    {
	        $this->db->insert('messages', $data);
	    }
	    
	    function get($limit=5, $offset=0)
	    {
	        $this->db->orderby('id', 'DESC');
	        $this->db->limit($limit, $offset);
	        
	        return $this->db->get('messages')->result();
	    }
	    
	    function get_latest($club_id)
	    {
	    	
	    	$sql = "SELECT messages.user_id as u_id, messages.message as msg, messages.date as date, users.name as u_name, users.img_url as img FROM messages LEFT JOIN users ON messages.user_id = users.oauth_uid WHERE  `club_id` = ? ORDER BY  `messages`.`date` DESC LIMIT 0 , 10";
	    	
	    	$query = $this->db->query($sql, $club_id);
	    	
	    	if($query->num_rows() > 0)
	    	{
	    		foreach($query->result() as $row)
	    		{
	    			$data[] = $row;
	    		}
	    		return $data;
	    	}
	    }
	    
		function get_messages($club_id, $limit, $offset)
	    {
	    	
	    	$sql = "SELECT messages.user_id as u_id, messages.message as msg, messages.date as date, users.name as u_name, users.img_url as img FROM messages LEFT JOIN users ON messages.user_id = users.oauth_uid WHERE  `club_id` = ? ORDER BY  `messages`.`date` DESC LIMIT ?, ?";
	    	
	    	$vars = array($club_id, $offset, $limit);
	    	$query = $this->db->query($sql, $vars);
	    	
	    	if($query->num_rows() > 0)
	    	{
	    		foreach($query->result() as $row)
	    		{
	    			$data[] = $row;
	    		}
	    		return $data;
	    	}
	    }
	}