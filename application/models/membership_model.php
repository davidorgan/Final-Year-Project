<?php

	class Membership_model extends CI_Model
	{
		function __construct()
	    {
	        // Call the Model constructor
	        parent::__construct();
	    }
		
		function validate_user()
		{
			$this->db->where('admin',$this->input->post('username'));
			$this->db->where('password',$this->input->post('password'));
			$query = $this->db->get('clubs');
			
			if($query->num_rows == 1)
			{
				return true;
			}
		}
		
		function get_user()
		{	
			$this->db->where('admin',$this->input->post('username'));
			$query = $this->db->get('clubs');
			return $query;
		}
		
		function get_no_members($club_id){
			$sql = "SELECT COUNT( club_id ) as num FROM memberships WHERE club_id = ?";
			$query = $this->db->query($sql,$club_id);

			return $count;
		}
	}