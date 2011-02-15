<?php

class Register extends Controller {

	function Register()
	{
		parent::Controller();	
		$this->load->helper('url');
	}
	
	function index()
	{
		$this->load->view('register_view');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */