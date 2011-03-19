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
	    	$sql = "SELECT * FROM  `messages` WHERE  `club_id` = ? ORDER BY  `messages`.`date` DESC LIMIT 0 , 10";
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
	}