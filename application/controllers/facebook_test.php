<?php
	class Facebook_test extends CI_Controller {
		
		function __construct()
		{
			parent::__construct();
			
			// $this->load->add_package_path('/Users/elliot/github/codeigniter-facebook/application/');
			$this->load->library('facebook');
			$this->facebook->enable_debug(TRUE);
		}
		
		function index()
		{
			// We can use the open graph place meta data in the head.
			// This meta data will be used to create a facebook page automatically
			// when we 'like' the page.
			// 
			// For more details see: http://developers.facebook.com/docs/opengraph
			
			$opengraph = 	array(
								'type'				=> 'website',
								'title'				=> 'My Awesome Site',
								'url'				=> site_url(),
								'image'				=> '',
								'description'		=> 'The best site in the whole world'
							);

			$this->load->vars('opengraph', $opengraph);
			$this->load->view('facebook_view');
			
			// Example call structure:
			// $this->facebook->call($http_method, $request_uri, $params);
 
			$elliots_band = $this->facebook->call('get', 'david.sorgan?access_token=2227470867|2.er8xb_cywezjQ83m6QQo7Q__.3600.1299790800-708736884|28IczEkYBWHGROGfUAtVVy1rdMM');
			var_dump($elliots_band);
			

 
// Basic post request requiring addition parameteters
// $attend = $this->facebook->call('post', $event_id.'/attending');
 
// Post request requiring additional parameters
// $status = $this->facebook->call('post', 'me/feed', array('message' => 'Elliot Haughin just my code a Facebook orgasm'));
		}
		
		function login()
		{
			// This is the easiest way to keep your code up-to-date. Use git to checkout the 
			// codeigniter-facebook repo to a location outside of your site directory.
			// 
			// Add the 'application' directory from the repo as a package path:
			// $this->load->add_package_path('/var/www/haughin.com/codeigniter-facebook/application/');
			// 
			// Then when you want to grab a fresh copy of the code, you can just run a git pull 
			// on your codeigniter-facebook directory.

			if ( !$this->facebook->logged_in() )
			{
				// From now on, when we call login() or login_url(), the auth
				// will redirect back to this url.

				$this->facebook->set_callback(site_url('facebook_test'));

				// Header redirection to auth.

				$this->facebook->login();

				// You can alternatively create links in your HTML using
				// $this->facebook->login_url(); as the href parameter.
			}
			else
			{
				redirect('facebook_test');
			}
		}
		
		function logout()
		{
			$this->facebook->logout();
			redirect('facebook_test');
		}
	}