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
		$file_name = "/home/nguyen.thi.minh.tam/Desktop/Docker/PHAN 1/test.mp4"; //{path to a video on the file system}

		$uri = $client->upload($file_name, array(
		  "name" => "Untitled",
		  "description" => "The description goes here."
		));

		$response = $client->request($uri . '?fields=transcode.status');
		if ($response['body']['transcode']['status'] === 'complete') {
		  print 'Your video finished transcoding.';
		} elseif ($response['body']['transcode']['status'] === 'in_progress') {
		  print 'Your video is still transcoding.';
		} else {
		  print 'Your video encountered an error during transcoding.';
		}
	}
    
}