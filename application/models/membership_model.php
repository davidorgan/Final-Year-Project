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
		
		function get_user_by_id($id)
		{
			$sql = "SELECT * FROM  `clubs` WHERE id = ?";
			$query = $this->db->query($sql, $id);
			return $query;
		}
		
		function get_no_members($club_id){
			$sql = "SELECT COUNT( club_id ) as num FROM memberships WHERE club_id = ?";
			$query = $this->db->query($sql,$club_id);

			return $count;
		}
		
		function get_members($club_id)
		{
			$sql = "SELECT * FROM users JOIN memberships ON users.oauth_uid = memberships.user_id WHERE memberships.club_id = ?";
			$query = $this->db->query($sql,$club_id);
			
			return $query;
		}
		
		function update_club($id,$data)
		{
			$this->db->where('id', $id);
			$this->db->update('clubs', $data); 
		}
	}