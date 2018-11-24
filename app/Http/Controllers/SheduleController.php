<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SheduleController extends Controller
{
    public function index(){
    	$Carbon=new \Carbon\Carbon; 
    	$client = new Client([ 
    		'base_uri' 	=> 'http://api.vkino.com.ua',
    		'auth' 		=> [env('API_LOGIN','testagent'), env('API_PASS','testagent')]
    	]);

    	$res = $client->get('/catalog/theaters/palladium/shows/actual-long.json');

		$films=json_decode($res->getBody()->getContents(), true);
        $dates = $films['showsDates']['date'];
        sort($dates);
        $i = 0;
        $k = 0;
        foreach($dates as $time){            
            foreach($films['shows']['show'] as $film){
                if($time && !empty($time)){
                    $res = $client->get('/find-showtime',['query' => [
                        'theater'       => env('API_THEATER','palladium'),
                        'agent'         => env('API_AGENT','testagent'),
                        'show-alias'    => $film['alias'],
                        'format'        => 'json',
                        'group-by-date' => 1,
                        'datetime'      => $time
                    ]]);
                    $result[$k]['films'][] = json_decode($res->getBody()->getContents(),true);
                }
            }
            $result[$k]['date'] = $time;
            $k++;
        }
		$res = $client->get('/catalog/theaters/palladium/shows/soon-long.json',[
            'query' => [
                'theater'   => env('API_THEATER','palladium'),
                'agent'     => env('API_AGENT','testagent')
            ]
        ]);
        $soon = json_decode($res->getBody(),true);

		$arr=array(
			'films' 		=> $result,
			'title'			=> 'Расписание',
			'soon'			=> $soon,
			'body_class' 	=> '',
		);
    	return view('shedule',$arr);
    }
}
