<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Club extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('message_model');
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
		
	  	$data['rows'] = $this->message_model->get_latest($this->uri->segment(3));
		

		$data['main_content'] = 'club_view';
		$this->load->view('/includes/template', $data);
		

	}
	
	function browse()
	{
		$this->load->library('pagination');
		$this->load->library('table');
		
		//$this->table->set_heading('Id', 'The Title', 'The Content');
		
		$config['base_url'] = 'http://danu2.it.nuigalway.ie/DavidOrgansFYP/fypsite/club/browse';
		$config['total_rows'] = $this->db->get('clubs')->num_rows();
		$config['per_page'] = 10;
		$config['num_links'] = 20;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		
		$this->pagination->initialize($config);
		
		$this->db->select('name, desc, no_members');
		$this->db->order_by("no_members", "desc"); 
		$data['records'] = $this->db->get('clubs', $config['per_page'], $this->uri->segment(3));
		
		
		$data['main_content'] = 'browse_view';
		$this->load->view('/includes/template', $data);

	}
	
	  function post_action()
	  {
	  	

	    if($_POST['message'] == "")
	    {
	      
	    
	    }else{
	    	
	    $this->user_id = $_POST['user_id']; 
        $this->club_id = $_POST['club_id'];
        $this->message = $_POST['message'];

	   
	      $this->message_model->add($this);
	      $message = $_POST['message'];
	      $bg_color = "#FFA";
	    }
	    
	    $output = '{ "message": "'.$message.'", "bg_color": "'.$bg_color.'" }';
	    echo $output;
	  }
	  
	  function get_messages()
	  {

			  
	    if($_POST['club_id'] == "")
	    {
	      $allmessages = "Please fill up blank fields";
	      $bg_color = "#FFEBE8";
	    
	    }else{
	      $allmessages = $results;
	      $bg_color = "#FFA";
	      $bg2 = "#FFF";
	    }
	    
	    $output = '{ "message": "'.$allmessages.'", "bg_color": "'.$bg_color.'", "bg2": "'.$bg2.'" }';
	    echo $output;
	  }
}

/* End of file club.php */
/* Location: ./application/controllers/club.php */