<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Validator;
class FormController extends Controller
{ 
	public function index(Request $request){
        $messages = [
            'min' =>  'Сообщение меньше :min символов.',
        ];
        $rules = array(
            'name'  => 'required',
            'email' => 'required|email',
            'msg'   => 'required|min:6'
        );
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect($request->server('HTTP_REFERER'))
                ->withErrors($validator)
                ->withInput();
        }
		$valid = $request->validate([
			'name'	=> 'required',
            'email' => 'required|email',
            'msg'	=> 'required|min:6'
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

        return redirect($request->server('HTTP_REFERER')); 

	}
}