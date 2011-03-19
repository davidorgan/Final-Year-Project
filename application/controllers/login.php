<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('is_logged_in') == 'true')
		{
			redirect('');
		}
	
	}

	function index()
	{
		$this->load->view('login_view');

	}
	
	function validate()
	{
		$this->load->model('membership_model');
		$query = $this->membership_model->validate_user();
		
		if($query) //if user validated..
		{
			$query = $this->membership_model->get_user();
			
			foreach ($query->result() as $row)
			{
					$id = $row->id;
					$username = $row->admin;
					$club_name = $row->name;
					$description = $row->desc;
					$email = $row->email;
					$members_no = $row->no_members;
					$first_name = $row->first_name;
					$last_name = $row->last_name;
				
			}

			$data = array(
				'id' => $id,
				'username' => $username,
				'club_name' => $club_name,
				'description' => $description,
				'email' => $email,
				'members_no' => $members_no,
				'first_name' => $first_name,
				'last_name' => $last_name,
				'full_name' => $first_name." ".$last_name,
				'is_logged_in' => 'true'
				
			);
			
			$this->session->set_userdata($data);
			redirect('club/profile/'.$id);
		}
		else
		{
			$this->index();
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */