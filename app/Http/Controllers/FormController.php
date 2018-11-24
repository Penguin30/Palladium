<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class FormController extends Controller
{ 
	public function index(Request $request){
		$valid = $request->validate([
			'name'	=> 'required',
            'email' => 'required',
            'msg'	=> 'required'
        ]);
        $name 	= $valid['name'];
        $email 	= $valid['email'];
        $msg 	= $valid['msg'];

        $client = new Client([ 
    		'base_uri' 	=> 'http://api.vkino.com.ua',
    		'auth' 		=> [env('API_LOGIN','testagent'),env('API_PASS','testagent')],
    	]);

    	$res = $client->post('/feedback',[ 'query' => [
    		'agent'			=> env('API_AGENT', 'testagent'),
    		'email' 		=> $email,
    		'name' 			=> $name,
    		'message' 		=> $msg,
    		'format'		=> 'json'	
    	]]);
    	$res = json_decode($res->getBody()->getContents(),true);   
    	if($res['code'] == 1)
    		return redirect($request->server('HTTP_REFERER'));    	
	}
}