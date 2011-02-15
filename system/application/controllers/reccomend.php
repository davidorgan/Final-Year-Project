<?php

class Reccomend extends Controller {

	function Reccomend()
	{
		parent::Controller();	
		$this->load->helper('url');
	}
	
	function index()
	{
		$this->load->view('reccomend_view');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */