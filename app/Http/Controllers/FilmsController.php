<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class FilmsController extends Controller
{
    public function film($alias){

    	$client = new Client([ 
    		'base_uri' 	=> 'http://api.vkino.com.ua',
    		'auth' 		=> [env('API_LOGIN','testagent'),env('API_PASS','testagent')],
    	]);

    	$res = $client->get('/find-showtime',[ 'query' => [
    		'theater' 		=> env('API_THEATER', 'palladium'),
    		'agent'			=> env('API_AGENT', 'testagent'),
    		'show-alias' 	=> $alias,
    		'group-by-date' => true,
    		'format' 		=> 'json'
    	]]);

    	$res = json_decode($res->getBody()->getContents(),true);

        if($res['code'] == 1){

            $showtimes = $res['showtimes']['by-date']['date'];
            $show = $res['show'];
            $arr = array(
                'film'       => $show,
                'title'      => $show['name'],
                'body_class' => 'movie-details',
                'showtimes'  => $showtimes
            );

        }else{

            $res = $client->get('/catalog/theaters/'.env('API_THEATER', 'palladium').'/shows/soon-long.json',[ 'query' => [
                'theater'       => env('API_THEATER', 'palladium'),
                'agent'         => env('API_AGENT', 'testagent'),
                'show-alias'    => $alias,
                'group-by-date' => true,
                'format'        => 'json'
            ]]);
           $shows = json_decode($res->getBody()->getContents(), true);
           foreach( $shows['shows-soon']['show'] as $show ){
               if( $show['alias'] == $alias){
                    $film = $show;
               }
           }
           $arr = array(
                'film'  => $film,
                'title' => $film['name'],
                'body_class'    => 'movie-details'
           );

        }

    	return view('film',$arr);
    }
}
