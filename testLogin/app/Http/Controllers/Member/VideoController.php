<?php

namespace App\Http\Controllers\Member;
// require 'vendor\autoload.php';
use Vimeo\Vimeo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
	public function index() {
		$client = new Vimeo("{client_id}", "{client_secret}", "{access_token}");
			
		$response = $client->request('/tutorial', array(), 'GET');
		echo "<pre>";
		print_r($response);
	}
    
}

