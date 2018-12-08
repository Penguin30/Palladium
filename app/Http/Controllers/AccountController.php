<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Socialite;
use Google_Client;
use App\Auth;

class AccountController extends Controller
{   
    /*
    *
    * Go to aacount
    *
    */
    public function index(Auth $auth){
        $device_id = env('DEVICE_ID');
        $client = new Client([
            'base_uri'  => 'https://api.vkino.com.ua',
            'auth'      => [env('API_LOGIN', 'testagent'), env('API_PASS', 'testagent')],
            'headers'   => ['auth-token' => session('token'),'device-id' => $device_id]
        ]);
        $res=$client->post('/auth/touch',['query' => [
            'version'       => '3.34',
            'agent'         => env('API_AGENT','testagent'),
            'format'        => 'json'
        ]]);
        $session = json_decode($res->getBody()->getContents(),true);
        if($session['code'] < 0){
            session()->forget('token');
            return redirect('/account/login');
        }else{
            $user = $auth->where('email',session('email'))->get();
            $user = $user[0];

            session(['account_id' => $session['userAccount'][0]['id']]);
            $res = $client->get('/orders-by-account/all',[ 'query' => [
                'account_id' => $session['userAccount'][0]['id'],
                'agent'      => env('API_AHGENT','testagent'),
                'format'     => 'json'
            ]]);
            $tickets = json_decode($res->getBody()->getContents(),true);

            $res = $client->get('/auth/status',[ 'query' => [
                'format'    => 'json',
                'version'   => '3.34'
            ]]);
            $account = json_decode($res->getBody()->getContents(),true);

            $res = $client->get('/customer/get-profile',[ 'query' => [
                'format'    => 'json',
                'version'   => '3.34',
                'agent'     => env('API_AGENT','testagent'),
                'theater'   => env('API_THEATER','palladium'),
                'customer'  => $user->card,
                'code'      => $user->phone
            ]]);

            $profile = json_decode($res->getBody()->getContents(),true);
            
            foreach($tickets['showtimes']['showtime'] as $ticket){
                $res = $client->get('/catalog/theaters/palladium/shows/'.$ticket['showId'].'.json');
                $res = json_decode($res->getBody()->getContents(),true);
                $films[] = $res['show'];
            }

            $res = $client->get('/user-account/loyality-cards/list',[ 'query' => [
                'format'    => 'json',
                'version'   => '3.34',
                'agent'     => env('API_AGENT','testagent')
            ]]);
            $res = json_decode($res->getBody()->getContents(), true);
            
            $arr = array(
                'title'         => 'Личный кабинет',
                'body_class'    => 'movie-details',
                'tickets'       => $tickets,
                'account'       => $account,
                'profile'       => $profile,
                'films'         => $films
            );

            return view('account',$arr);
        }
    }

    public function login(){
        if(empty(session('token'))){
            $arr = array(
                'title'         => 'Вход',
                'body_class'    => 'movie-details'
            );
            return view('login',$arr);
        }else{
            return redirect('/account');
        }
    }

    public function email(Request $request){
        $validate = $request->validate([
            'email' => 'required'
        ]);
        $email = $validate['email'];
        $device_id = env('DEVICE_ID');
        $client = new Client([
            'base_uri' => 'https://api.vkino.com.ua',
            'auth'      => [env('API_LOGIN', 'testagent'), env('API_PASS', 'testagent')],
            'headers'   => ['device-id' => $device_id],
        ]);
        $res = $client->post('/auth/email-otp/request',[ 'query' => [            
            'version'   => '3.34',
            'agent'     => env('API_AGENT','testagent'),
            'email'     => $email,
            'format'    => 'json'
        ]]);
        $result = json_decode($res->getBody()->getContents(),true);
        session(['email' => $email]);
        return redirect('/account/auth');
    }

    public function auth(){
        $device_id = env('DEVICE_ID');
        $client = new Client([
            'base_uri'  => 'https://api.vkino.com.ua',
            'auth'      => [env('API_LOGIN', 'testagent'), env('API_PASS', 'testagent')],
            'headers'   => ['auth-token' => session('token'),'device-id' => $device_id]
        ]);
        $res=$client->post('/auth/touch',['query' => [
            'version'       => '3.34',
            'agent'         => env('API_AGENT','testagent'),
            'format'        => 'json'
        ]]);
        $session = json_decode($res->getBody()->getContents(),true);
        if($session['code'] < 0){
            $arr = array(
                'title'         => 'Вход',
                'body_class'    => 'movie-details'
            );
            return view('auth',$arr);
        }else{
            return redirect('/account');
        }
    }

    public function login_code(Request $request){
        $device_id = env('DEVICE_ID');
        $validate = $request->validate([
            'code' => 'required'
        ]);
        $code = $validate['code'];        
        $email = session('email');
        $client = new Client([
            'base_uri'  => 'https://api.vkino.com.ua',
            'auth'      => [env('API_LOGIN', 'testagent'), env('API_PASS', 'testagent')],
            'headers'   => ['device-id' => $device_id]
        ]);
        $res = $client->post('/auth/email-otp/login',['query' => [
            'version'   => '3.34',
            'agent'     => env('API_AGENT','testagent'),
            'email'     => $email,
            'code'      => $code,
            'format'    => 'json'
        ]]);
        $res = json_decode($res->getBody()->getContents(),true);
        if( $res['code'] == 1){
            session(['token' => $res['auth']['session']['token']]);
            return redirect('/account');
        }else{
            return $res['code'];
        }
    }

    public function logout(){ 
        $device_id = env('DEVICE_ID');
        $client = new Client([
            'base_uri'  => 'https://api.vkino.com.ua',
            'auth'      => [env('API_LOGIN', 'testagent'), env('API_PASS', 'testagent')],
            'headers'   => ['auth-token'    => session('token'), 'device-id'     => $device_id]
        ]);
        $res = $client->post('/auth/logout',['query' => [
            'version'       => '3.34',
            'format'        => 'json'
        ]]);
        $res = json_decode($res->getBody()->getContents(),true);
        if($res['code'] == 1)
            session()->forget('token');
        return redirect('/');
    }

    public function google_redirect()
    {   
        return Socialite::with('google')->redirect();
    }

    public function google_callback()
    {   
        $user   = Socialite::with('google')->user();
        $token  = $user->accessTokenResponseBody;
        dd($token);
        if(!empty($token)){
            $device_id = env('DEVICE_ID');
            $client = new Client([
                'base_uri'  => 'https://api.vkino.com.ua',
                'auth'      => [env('API_LOGIN', 'testagent'), env('API_PASS', 'testagent')],
                'headers'   => ['device-id' => $device_id]
            ]);
            $res = $client->post('/auth/google/token',['query' => [
                'version'       => '3.34',
                'agent'         => env('API_AGENT','testagent'),
                'token'         => $token,
                'format'        => 'json'
            ]]);

            $res = json_decode($res->getBody()->getContents(),true);

            dd($res);
        }
    }

    public function facebook_redirect(){
        return Socialite::driver('facebook')->redirect();
    }

    public function facebook_callback()
    {   

        $leUser = Socialite::driver('facebook')->user();

    }

    public function create_profile(Request $request, Auth $auth){
        $valid = $request->validate([
            'phone' => 'required'
        ]);
        $phone = $valid['phone'];
        $client = new Client([
            'base_uri'  => 'https://api.vkino.com.ua',
            'auth'      => [env('API_LOGIN', 'testagent'), env('API_PASS', 'testagent')]
        ]);
        $body  = '{';
        $body .= '"phoneCell": "'.$phone.'",';
        $body .= '"email":"'.session('email').'",';
        $body .= '"firstName":"'.session('email').'",';
        $body .= '"city":"kharkov"';
        $body .= '}';

        $res = $client->post('/customer/store-profile',['query' => [
            'version'       => '3.34',
            'agent'         => env('API_AGENT','testagent'),
            'theater'       => env('API_THEATER','palladium'),
            'format'        => 'json',
        ], 'body' => $body]);

        $res = json_decode($res->getBody()->getContents(), true);
        $auth->card  = $res['card'];
        $auth->phone = $phone;
        $auth->email = session('email');
        $auth->save();
        return redirect('/account');
    }   
}
