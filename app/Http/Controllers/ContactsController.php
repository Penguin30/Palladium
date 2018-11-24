<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ContactsController extends Controller
{   
    public function index(){
        $arr = array(
            'body_class' => 'contacts-custom',
            'title'      => 'Контакты'
        );
        return view('contacts', $arr);
    }
}
