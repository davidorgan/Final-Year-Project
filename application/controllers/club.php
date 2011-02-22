<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Club extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['main_content'] = 'club_view';
		$this->load->view('/includes/template', $data);
	}
	
	function profile()
	{
		$this->db->where('id', $this->uri->segment(3));
		$data['query'] = $this->db->get('clubs');
		

		$data['main_content'] = 'club_view';
		$this->load->view('/includes/template', $data);
		

	}
}

/* End of file club.php */
/* Location: ./application/controllers/club.php */