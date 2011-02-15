<?php
	define('FACEBOOK_APP_ID', '182794741757028');
	define('FACEBOOK_SECRET', '1f0c7633004945f9e13c0ce979b2b568');

	
	function parse_signed_request($signed_request, $secret) {
	  list($encoded_sig, $payload) = explode('.', $signed_request, 2); 
	
	  // decode the data
	  $sig = base64_url_decode($encoded_sig);
	  $data = json_decode(base64_url_decode($payload), true);
	
	  if (strtoupper($data['algorithm']) !== 'HMAC-SHA256') {
	    error_log('Unknown algorithm. Expected HMAC-SHA256');
	    return null;
	  }
	
	  // check sig
	  $expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
	  if ($sig !== $expected_sig) {
	    error_log('Bad Signed JSON signature!');
	    return null;
	  }
	
	  return $data;
	}
	
	function base64_url_decode($input) {
	    return base64_decode(strtr($input, '-_', '+/'));
	}
	
	if ($_REQUEST) {
	  echo '<p>signed_request contents:</p>';
	  $response = parse_signed_request($_REQUEST['signed_request'], 
	                                   FACEBOOK_SECRET);
	  echo '<pre>';
	  print_r($response);
	  echo '</pre>';
	} else {
	  echo '$_REQUEST is empty';
	}


?>