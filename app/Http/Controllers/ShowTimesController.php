<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ShowTimesController extends Controller
{
	public function index($showtime_id){
		$client = new Client([
            'base_uri'  => 'https://api.vkino.com.ua',
            'auth'      => [env('API_LOGIN', 'testagent'), env('API_PASS', 'testagent')]
        ]);
        $res=$client->get('/find-showtime',['query' => [
            'showtime'		=> $showtime_id,
            'agent'         => env('API_AGENT','testagent'),
            'theater'		=> env('API_THEATER','palladium'),
            'format'        => 'json'
        ]]);
        $res = json_decode($res->getBody()->getContents(),true);        
        $hall = $client->get('/hall-scheme',['query' => [
            'showtime'		=> $showtime_id,
            'agent'         => env('API_AGENT','testagent'),
            'theater'		=> env('API_THEATER','palladium'),        
            'format'        => 'json'
        ]]);
        $hall = json_decode($hall->getBody()->getContents(),true);
        if($hall['code'] != 1){
            return redirect(\Request::server('HTTP_REFERER'));
        }
        $arr = array(
            'title'         => 'Покупка билетов на '.$res['show']['name'],
            'body_class'    => 'movie-details',
            'hall'			=> $hall,
            'show'			=> $res
        );
        return view('showtime', $arr);
	}
}