<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reccomend extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['main_content'] = 'reccomend_view';
		$this->load->view('/includes/template', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */