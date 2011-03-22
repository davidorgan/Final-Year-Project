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
		$this->load->library('pagination');
		
		$this->db->where('id', $this->uri->segment(3));
		$data['query'] = $this->db->get('clubs');
		
	  	//$data['rows'] = $this->message_model->get_latest($this->uri->segment(3));
	  	


		
		//$this->table->set_heading('Id', 'The Title', 'The Content');
		
		$config['base_url'] = 'http://danu2.it.nuigalway.ie/DavidOrgansFYP/fypsite/club/profile/'.$this->uri->segment(3);
		$config['total_rows'] = $this->db->query('SELECT id FROM messages WHERE club_id ="'.$this->uri->segment(3).'"')->num_rows();
		$config['per_page'] = 10;
		$config['num_links'] = 20;
		$config['uri_segment'] = 4;
		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<span class="curr_page">';
		$config['cur_tag_close'] = '</span>';
		
		
		$offset = (int) $this->uri->segment(4, 0);
		$club_id = (int) $this->uri->segment(3);
		
		$this->pagination->initialize($config);
	
	  	$data['records'] = $this->message_model->get_messages($club_id,$config['per_page'],$offset);
		

		$data['main_content'] = 'club_view';
		$this->load->view('/includes/template', $data);
		

	}
	
	function browse()
	{
		$this->load->library('pagination');

		
		//$this->table->set_heading('Id', 'The Title', 'The Content');
		
		$config['base_url'] = 'http://danu2.it.nuigalway.ie/DavidOrgansFYP/fypsite/club/browse';
		$config['total_rows'] = $this->db->get('clubs')->num_rows();
		$config['per_page'] = 10;
		$config['num_links'] = 20;
		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<span class="curr_page">';
		$config['cur_tag_close'] = '</span>';
		
		$this->pagination->initialize($config);
		
		$this->db->select('id ,name, desc, no_members');
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
		    $this->load->model('user_model');
		    	
		    $this->user_id = $_POST['ajax_user_id']; 
	        $this->club_id = $_POST['club_id'];
	        $this->message = $_POST['message'];
	        
	        $user_id = $_POST['ajax_user_id'];
		    $name = $_POST['ajax_name'];
		    $email = $_POST['ajax_email'];
		    $pic_url = $_POST['ajax_img'];
	
	        
	        if($this->user_model->user_exists($this->user_id))
	        {	   
		      	$this->message_model->add($this);
		      
		      	$message = $_POST['message'];
		    	$bg_color = "#FFA";
		    
		    	$output = '{ "message": "'.$message.'", "bg_color": "'.$bg_color.'", "name": "'.$name.'" , "img": "'.$pic_url.'" }';
		    	echo $output;
		    }
		    else if(is_numeric($user_id)){
		    	$this->user_model->create_user($user_id,$name,$email,$pic_url);    	
		    	$this->message_model->add($this);
		    	
		    	$message = $_POST['message'];
		    	$bg_color = "#FFA";
		    
		   		$output = '{ "message": "'.$message.'", "bg_color": "'.$bg_color.'", "name": "'.$name.'" , "img": "'.$pic_url.'" }';
		    	echo $output;
		    }
		    else{
		    	
		    	$name = "Error";
		    	$pic_url = "http://www.tutorialized.com/upload/(2006.05.25-03:43:31)50x50.png";
		    	$message = "You must be logged in to leave a comment";
		     	$bg_color = "#FFA";
		    
		   		$output = '{ "message": "'.$message.'", "bg_color": "'.$bg_color.'", "name": "'.$name.'" , "img": "'.$pic_url.'" }';
		    	echo $output;
		    	
		    }
	    }
	    

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
	  
	  function gallery()
	  {
	  	$this->load->model('gallery_model');
	  	$club_id = $this->uri->segment(3);
	  	
	  	if($this->input->post('upload'))
	  	{
	  		$this->gallery_model->do_upload($club_id);
	  	}
	  	
	  	$data['images'] = $this->gallery_model->get_images($club_id);
	  	
	  	$data['main_content'] = 'gallery_view';
		$this->load->view('/includes/template', $data);
	  }
	  
	  function join()
	  {
	  	if($this->input->post('join'))
	  	{
	  		$this->load->model('user_model');
	  		
	  		$user_id = $this->input->post('uid');
	  		$club_id = $this->input->post('club_id');
	  		$name = $this->input->post('u_name');
	  		$email = $this->input->post('u_email');
	  		$pic_url = $this->input->post('u_pic');
	  		

	  		if($this->user_model->user_exists($user_id))
	  		{
	  			if(!$this->user_model->membership_exists($user_id,$club_id))
	  			{
					$this->user_model->create_membership($user_id, $club_id);
	  			}
	  		}
	  		else{
				$query = $this->user_model->create_user($user_id,$name,$email,$pic_url);
				$this->user_model->create_membership($user_id, $club_id);
			}
	  		
	  		redirect('club/profile/'.$club_id);
	  	}
	  }
}

/* End of file club.php11 */
/* Location: ./application/controllers/club.php */