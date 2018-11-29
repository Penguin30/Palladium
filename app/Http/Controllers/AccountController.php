<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Socialite;
use Google_Client;

class AccountController extends Controller
{   
    /*
    *
    * Go to aacount
    *
    */
    public function index(){
        if(empty(session('device_id')))
            $device_id = 'webcli-'.str_random(57);
        else
            $device_id = session('device_id');
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
            return redirect('/account/login');
        }else{
            session(['account_id' => $session['userAccount'][0]['id']]);
            $res = $client->get('/orders-by-account/all',[ 'query' => [
                'account_id' => session('account_id'),
                'format'     => 'json'
            ]]);
            $tickets = json_decode($res->getBody()->getContents(),true);
            $res = $client->get('/auth/status',[ 'query' => [
                'format'    => 'json',
                'version'   => '3.34'
            ]]);
            $account = json_decode($res->getBody()->getContents(),true);
            $arr = array(
                'title'         => 'Личный кабинет',
                'body_class'    => 'movie-details',
                'tickets'       => $tickets,
                'account'       => $account
            );
            return view('account',$arr);
        }
    }

    public function login(){
        if(empty(session('device_id')))
            $device_id = 'webcli-'.str_random(57);
        else
            $device_id = session('device_id');
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
        if(empty(session('device_id')))
            $device_id = 'webcli-'.str_random(57);
        else
            $device_id = session('device_id');
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
        session(['email' => $email,'device_id' => $device_id]);
        return redirect('/account/auth');
    }

    public function auth(){
        if(empty(session('device_id')))
            $device_id = 'webcli-'.str_random(57);
        else
            $device_id = session('device_id');
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
        $validate = $request->validate([
            'code' => 'required'
        ]);
        $code = $validate['code'];        
        $email = session('email');
        $client = new Client([
            'base_uri'  => 'https://api.vkino.com.ua',
            'auth'      => [env('API_LOGIN', 'testagent'), env('API_PASS', 'testagent')],
            'headers'   => ['device-id' => session('device_id')]
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
        $client = new Client([
            'base_uri'  => 'https://api.vkino.com.ua',
            'auth'      => [env('API_LOGIN', 'testagent'), env('API_PASS', 'testagent')],
            'headers'   => ['auth-token'    => session('token'), 'device-id'     => session('device_id')]
        ]);
        $res = $client->post('/auth/logout',['query' => [
            'version'       => '3.34',
            'format'        => 'json'
        ]]);
        $res = json_decode($res->getBody()->getContents(),true);
        if($res['code'] == 1)
            \Session::flush();
        return redirect('/');
    }

    public function google_redirect(){
       return Socialite::with('google')->redirect();
    }

    public function google_callback()
    {   
        $user = Socialite::with('google')->user();
        $token = $user->accessTokenResponseBody['access_token'];

        // dd($token);

        if(!empty($token)){
            if(empty(session('device_id')))
                $device_id = 'webcli-'.str_random(57);
            else
                $device_id = session('device_id');

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
}
