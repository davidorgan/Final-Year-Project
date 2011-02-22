<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AddClub extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['main_content'] = 'addClub_view';
		$this->load->view('/includes/template', $data);
	}
	
	function insert()
	{
		
		$name  = $_POST['name'];
        $admin = $_POST['admin'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $desc = $_POST['desc'];
    	$aData = array('name' => $name, 'admin' => $admin, 'password' => $password, 'email' => $email, 'desc' => $desc);
    	if($this->db->insert('clubs', $aData))
    	{	
			echo "Insert Successful";
    	}
    	else
    	{
    		echo "Insert Failed!!";
    	}

	}
}

/* End of file addClub.php */
/* Location: ./application/controllers/addClub.php */