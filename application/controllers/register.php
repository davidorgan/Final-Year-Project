<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->view('register_view');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */