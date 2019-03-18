<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Auth;

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
		$show = json_decode($res->getBody()->getContents(),true);
        if($show['code'] == -8){
            return redirect('/account/logout');
        }
        $ticket = $show['tickets']['ticket'][0];

        $res = $client->get('/catalog/shows/'.$ticket['showId'].'.json',[ 'query' => [
            'theater'       => env('API_THEATER', 'palladium'),
            'agent'         => env('API_AGENT', 'testagent'),
            'group-by-date' => true,
            'format'        => 'json'
        ]]);
        $film = json_decode($res->getBody()->getContents(),true);

        $return = $client->get('/return/available-orders',[ 'query' => [
            'agent'         => env('API_AGENT', 'testagent'),
            'order-number'  => $ticket['orderNumber'],
            'account-id'    => session('account_id'),
            'format'        => 'json'
        ]]);
        $return = json_decode($return->getBody()->getContents(),true);

		$arr = array(
            'title'         => 'Билеты '.$ticket['name'],
            'body_class'    => 'movie-details',
            'tickets'       => $show,
            'film'          => $film,
            'ticket'        => $ticket,
            'return'        => isset($return['availableForReturn']['order'][0]) ? $return['availableForReturn']['order'][0] : array()
        );

        return view('tickets',$arr);
	}

    public function order_pay(Auth $auth,$order_id,$auth_code){
        $client = new Client([
            'base_uri'  => 'https://api.vkino.com.ua',
            'auth'      => [env('API_LOGIN', 'testagent'), env('API_PASS', 'testagent')],
            'headers'   => ['auth-token'    => session('token'), 'device-id'       => env('DEVICE_ID')]
        ]);

        $res = $client->get('/tickets-by-order/all',['query' => [
            'agent'         => env('API_AGENT','testagent'),
            'order-number'  => $order_id,
            'auth-code'     => $auth_code,
            'format'        => 'json'
        ]]);
        $tickets = json_decode($res->getBody()->getContents(), true);

        $showtime_id = $tickets['tickets']['ticket'][0]['showtimeId'];

        $res = $client->get('/find-showtime',['query' => [
            'agent'         => env('API_AGENT','testagent'),
            'theater'       => env('API_THEATER','palladium'),
            'showtime'      => $showtime_id,
            'format'        => 'json'
        ]]);
        $film = json_decode($res->getBody()->getContents(), true);

        $hall = $client->get('/hall-scheme',['query' => [
            'showtime'      => $showtime_id,
            'agent'         => env('API_AGENT','testagent'),
            'theater'       => env('API_THEATER','palladium'),        
            'format'        => 'json'
        ]]);
        $hall = json_decode($hall->getBody()->getContents(),true);

        $user = $auth->where('email',session('email'))->get();
        if(!empty($user[0]))
            $user = $user[0];

        foreach($tickets['tickets']['ticket'] as $ticket) {
            if($ticket['status'] == 'Canceled'){
                return redirect('/account');
            }
            $seats[] = $ticket['seatId'];
        }

        $arr = array(
            'title'         => 'Покупка билетов на '.$film['show']['name'],
            'body_class'    => 'movie-details',
            'showtime'      => $film,
            'hall'          => $hall,
            'seats'         => $seats,
            'user'          => $user,
            'order_id'      => $order_id
        );

        return view('order_pay',$arr);
    }

    public function sale_order(Request $request,$order_id){
        $client = new Client([
            'base_uri'  => 'https://api.vkino.com.ua',
            'auth'      => [env('API_LOGIN', 'testagent'), env('API_PASS', 'testagent')],
            'headers'   => ['auth-token'    => session('token'), 'device-id'       => env('DEVICE_ID')]
        ]);

        if($request->p_type == 'card')
            $payment_type = 'vkino-wayforpay-ticketservice';
        else
            $payment_type = 'palladium-bonus';
        
        $payment_type = 'vkino-liqpay3';
        

        $res=$client->post('/sale/create-payment',['query' => [
            'agent'         => env('API_AGENT','testagent'),
            'payee'         => $payment_type,
            'order-number'  => $order_id,
            'format'        => 'json'
        ]]);
        $res = json_decode($res->getBody()->getContents(),true);

        if($res['code'] != 1)
            return redirect($request->server('HTTP_REFERER'));
        
        $arr = array(
            'title' => '',
            'body_class' => '',
            'form'  => $res['invoice']['checkoutForm']
        );
        return view('pay',$arr);
    }

    public function return(Request $request){
        $client = new Client([
            'base_uri'  => 'https://api.vkino.com.ua',
            'auth'      => [env('API_LOGIN', 'testagent'), env('API_PASS', 'testagent')],
            'headers'   => ['auth-token'    => session('token'), 'device-id'       => env('DEVICE_ID')]
        ]);

        $return = $client->post('/return/request',['query' => [
            'agent'         => env('API_AGENT','testagent'),
            'order-number'  => $request->return_id,
            'account-id'    => session('account_id'),
            'reason'        => 'Возрат билета пользователем кинотеатра Palladium'
        ]]);
        $return = json_decode($return->getBody()->getContents(),true);
        
        return redirect('/account');
    }

}