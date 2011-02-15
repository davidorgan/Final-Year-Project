<?php

class Login extends Controller {

	function Login()
	{
		parent::Controller();	
		$this->load->helper('url');
	}
	
	function index()
	{
		$this->load->view('login_view');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */