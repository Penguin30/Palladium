<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Auth;

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
        if($hall['code'] != 1 || $res['code'] != 1){
            return redirect('/showtime/'.$showtime_id);
        }
        $arr = array(
            'title'         => 'Покупка билетов на '.$res['show']['name'],
            'body_class'    => 'movie-details',
            'hall'			=> $hall,
            'show'			=> $res
        );
        return view('showtime', $arr);
	}

    public function order( Request $request, $showtime_id, Auth $auth ){
        $client = new Client([
            'base_uri'  => 'https://api.vkino.com.ua',
            'auth'      => [env('API_LOGIN', 'testagent'), env('API_PASS', 'testagent')]
        ]);
        $res=$client->get('/find-showtime',['query' => [
            'showtime'      => $showtime_id,
            'agent'         => env('API_AGENT','testagent'),
            'theater'       => env('API_THEATER','palladium'),
            'format'        => 'json'
        ]]);
        $res = json_decode($res->getBody()->getContents(),true);
        $hall = $client->get('/hall-scheme',['query' => [
            'showtime'      => $showtime_id,
            'agent'         => env('API_AGENT','testagent'),
            'theater'       => env('API_THEATER','palladium'),        
            'format'        => 'json'
        ]]);
        $hall = json_decode($hall->getBody()->getContents(),true);
        if($res['code'] != 1 || $hall['code'] != 1){
            return redirect('/showtime/'.$showtime_id);
        }
        $user = $auth->where('email',session('email'))->get();
        if(!empty($user[0]))
            $user = $user[0];
        $arr = array(
            'title'         => 'Покупка билетов на '.$res['show']['name'],
            'body_class'    => 'movie-details',
            'showtime'      => $res,
            'seats'         => $request->seats,
            'hall'          => $hall,
            'user'          => $user
        );
        return view('payment_method',$arr);
    }

    public function pay(Request $request, Auth $auth, $showtime_id){
        $client = new Client([
            'base_uri'  => 'https://api.vkino.com.ua',
            'auth'      => [env('API_LOGIN', 'testagent'), env('API_PASS', 'testagent')]
        ]);
        $payee = $client->get('/sale/payment-methods',['query' => [
            'theater'       => env('API_THEATER','palladium'),
            'agent'         => env('API_AGENT','testagent'),
            'showtime'      => $showtime_id,
            'format'        => 'json'
        ]]);
        $payee = json_decode($payee->getBody()->getContents(),true);
        
        if($request->p_type == 'card')
            $payment_type = 'vkino-wayforpay-ticketservice';
        else
            $payment_type = 'palladium-bonus';

        $user = $auth->where('email',session('email'))->get();
        $user = $user[0];


        $res=$client->get('/sale',['query' => [
            'theater'       => env('API_THEATER','palladium'),
            'agent'         => env('API_AGENT','testagent'),
            'payee'         => $payment_type,
            'showtime'      => $showtime_id,
            'account-id'    => session('account_id'),
            'seats'         => $request->seats,
            'email'         => $request->email,
            'phone-cell'    => $request->phone,
            'format'        => 'json'
        ]]);
        $res = json_decode($res->getBody()->getContents(),true);

        $arr = array(
            'title' => '',
            'body_class' => '',
            'form'  => $res['invoice']['checkoutForm']
        );
        return view('pay',$arr);
    }
}