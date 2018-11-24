<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
class HomeController extends Controller
{
    public function index(){
        $Carbon=new \Carbon\Carbon;
    	$client = new Client([
            'base_uri'  => 'http://api.vkino.com.ua',
            'auth'      => [
                env('API_LOGIN','testagent'), 
                env('API_PASS','testagent')
            ]
        ]);

    	$res = $client->get('/catalog/theaters/palladium/shows/actual-long.json',[
            'query' => [
                'theater'   => env('API_THEATER','palladium'),
                'agent'     => env('API_AGENT','testagent')
            ]
		]);
		$actual = json_decode($res->getBody(),true);

        foreach($actual['shows']['show'] as $film){
            $res = $client->get('/find-showtime',[ 'query' => [
                'theater'  => env('API_THEATER', 'palladium'),
                'agent'    => env('API_AGENT', 'testagent'),
                'show'     => $film['id'],
                'format'   => 'json'
            ]]);

            $shows[] = json_decode( $res->getBody()->getContents(), true);
        }

        $res = $client->get('/catalog/theaters/palladium/shows/soon-long.json',[
            'query' => [
                'theater'   => env('API_THEATER','palladium'),
                'agent'     => env('API_AGENT','testagent')
            ]
        ]);
        $soon = json_decode($res->getBody(),true);

        $posts = \TCG\Voyager\Models\Post::where('featured','1')->limit(1)->get();
        $post = $posts[0];

    	$arr = array(
    		'films_actual'      => $shows,
            'films_soon'        => $soon,
            'post'             => $post,
    		'title'             => 'Home Page',
    		'body_class'        => ''
    	);
    	return view('home',$arr);  
    }
}
