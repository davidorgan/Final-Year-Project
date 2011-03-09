<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contact extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index() {
		
		$data['main_content'] = 'club_view';
		$this->load->view('includes/template', $data);
		
	}
	
	function submit() {
		
		$data['message'] = $this->input->post('message');

		
		if ($this->input->post('ajax')) {
			$this->load->view('contact_submitted',$data);			
		} else {
			$this->load->view('includes/template', $data);
		}
	}
	
}
