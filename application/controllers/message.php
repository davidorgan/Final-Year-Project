<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
	        // redirect to view

	}
	    
	function index()
	  {
	    
	    $this->load->view('ajax_post');
	  }
	  
	  function post_action()
	  {
	  
	    if(($_POST['username'] == "") || ($_POST['password'] == ""))
	    {
	      $message = "Please fill up blank fields";
	      $bg_color = "#FFEBE8";
	    
	    }elseif(($_POST['username'] != "myusername") || ($_POST['password'] != "mypassword")){
	      $message = "Username and password do not match.";
	      $bg_color = "#FFEBE8";
	      
	    }else{
	      $message = "Username and password matched.";
	      $bg_color = "#FFA";
	    }
	    
	    $output = '{ "message": "'.$message.'", "bg_color": "'.$bg_color.'" }';
	    echo $output;
	  }
/* End of file message.php */
/* Location: ./application/controllers/message.php */