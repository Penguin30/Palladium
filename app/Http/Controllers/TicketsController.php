<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TicketsController extends Controller
{
	public function index($order_id,$auth_code){
		$client = new Client([
            'base_uri'  => 'https://api.vkino.com.ua',
            'auth'      => [env('API_LOGIN', 'testagent'), env('API_PASS', 'testagent')],
            'headers'   => ['auth-token'    => session('token'), 'device-id'     => env('DEVICE_ID')]
        ]);
        $res = $client->get('/tickets-by-order/all',['query' => [
            'version'       => '3.34',
            'agent'         => env('API_AGENT','testagent'),
            'order-number' 	=> $order_id,
            'auth-code'		=> $auth_code,
            'format'        => 'json',
        ]]);
		$res = json_decode($res->getBody()->getContents(),true);
		dd($res);
	}
}