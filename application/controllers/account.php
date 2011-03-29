<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		

	}
	
	function index()
	{
		if($this->session->userdata('id') != '')
		{
			redirect(base_url().'account/edit/'.$this->session->userdata('id'));
		}
		else{
			redirect('');
		}
		
	}

	function edit()
	{
		if($this->uri->segment(3) == $this->session->userdata('id'))
		{	
			$club_id = $this->session->userdata('id');
			$this->load->model('membership_model');
			$data['success'] = "";
			
			
			if($this->input->post('update'))
			{
				$update_data = array(
					'name' => $this->input->post('name'),
					'admin' => $this->input->post('admin'),
					'password' => $this->input->post('password'),
					'desc' => $this->input->post('desc'),
					'email' => $this->input->post('email'),
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
				);
				
				$this->membership_model->update_club($club_id, $update_data);
				$data['success'] = "<div id='success'><h4>Update Successful!</h4></div>";
			}
			
			
			
			$data['club'] = $this->membership_model->get_user_by_id($club_id);

			
			$data['main_content'] = 'edit_view';
			$this->load->view('/includes/template', $data);
		}
		else{
			redirect('');
		}
		

	}
	
	function email()
	{
		if($this->uri->segment(3) == $this->session->userdata('id'))
		{	
			$club_id = $this->session->userdata('id');
			$this->load->model('membership_model');
		
			$data['email_success'] = "";
			$data['club'] = $this->membership_model->get_user_by_id($club_id);
			$data['members'] = $this->membership_model->get_members($club_id);
			
			if($this->input->post('send'))
			{
				$this->load->library('email');
				
				
				foreach($data['club']->result() as $c)
				{
					$club_email = $c->email;
					$club_name = $c->name;
				}
				
				$list = array();
				foreach($data['members']->result() as $m)
				{
					$list[] = $m->email;
				}
	
				$this->email->from($club_email, $club_name);
				
				
				$this->email->to($list); 

				
				$this->email->subject($this->input->post('subject'));
				$this->email->message($this->input->post('message'));	
				
				$this->email->send();
				
				$data['email_success'] = "<div id='email_success'><h4>Email Sent!</h4></div>";
			}
			
			
			$data['main_content'] = 'email_view';
			$this->load->view('/includes/template', $data);
		}
		else{
			redirect('');
		}
	}

}

/* End of file club.php11 */
/* Location: ./application/controllers/club.php */