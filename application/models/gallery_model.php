<?php

	class Gallery_model extends CI_Model
	{
		var $gallery_path;
		var $gallery_path_url;
		
		function __construct()
	    {
	        // Call the Model constructor
	        parent::__construct();
	        
	        $this->gallery_path = realpath(APPPATH . '../images/user');
	        $this->gallery_path_url = base_url() . 'images/user/';
	    }
		
		function do_upload($club_id)
		{
			$gallery_path = $this->gallery_path.'/'.$club_id;
			$gallery_path_thumbs = $gallery_path . '/thumbs';
			if(is_dir($gallery_path) && is_dir($gallery_path_thumbs))
			{
				$mkdir_error = false;
			}
			else{
					if(mkdir($gallery_path, 0777) && mkdir($gallery_path_thumbs, 0777))
					{
						$mkdir_error = false;
					}
					else
					{
						$mkdir_error = true;
						echo "There was a problem creating directory";
					}
			}
			
			if($mkdir_error != true)
			{
				$config['upload_path'] = $gallery_path;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '500';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';
				$this->load->library('upload',$config);
					if ( ! $this->upload->do_upload())
					{
						$error = array('error' => $this->upload->display_errors());
			
						
						foreach($error as $e)
						{
							echo $e;
						}
	
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
			
					}
				$image_data = $this->upload->data();
				
				$config['source_image'] = $image_data['full_path'];	
				$config['new_image'] = $gallery_path_thumbs;
				$config['maintain_ratio'] = true;
				$config['width'] = 200;
				$config['height'] = 200;
				
				$this->load->library('image_lib',$config);
				$this->image_lib->resize();
			}
			return $data;
		}
		
		function get_images($club_id)
		{
			$gallery_path = $this->gallery_path.'/'.$club_id;
			$gallery_path_url = $this->gallery_path_url.$club_id;
			if(is_dir($gallery_path))
			{

				$files = scandir($gallery_path);
				$files = array_diff($files,array('.','..','thumbs'));
				
				$images = array();
				
				foreach($files as $file)
				{
					$images[] = array(
						'url' => $gallery_path_url .'/'. $file,
						'thumb_url' => $gallery_path_url . '/thumbs/' . $file
					);
				}
				
				
			}
			else
			{
				$images[] = array(
						'url' => '',
						'thumb_url' => ''
				);
			}
			
			return $images;
		}
		
		
		function remove_image($image_path)
		{
			unlink($image_path);
		}

	}