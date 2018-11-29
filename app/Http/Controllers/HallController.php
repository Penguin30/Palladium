<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;
use GuzzleHttp\Client;
use App\Hall;

class HallController extends Controller
{
    public function vip(Film $film){
        $page = \TCG\Voyager\Models\Page::where('slug', 'vip-hall')->get();
        $page = $page[0];

        $films = $film->orderBy('created_at', 'rand')->paginate('24');
        $cats = \App\FilmCategory::all();
        $arr = array(
            'body_class' => 'movie-details',
            'title'      => 'Vip Зал',
            'page'       => $page,
            'films'      => $films,
            'cats'       => $cats
        );
        return view('vip_hall',$arr);
    }

    public function film(Film $film,$slug){
        $film = $film->where('slug', $slug)->get();
        $film = $film[0];
        $images = json_decode($film->images);
        $film->images = $images;
        $arr = array(
            'body_class' => 'movie-details',
            'title'      => $film->title,
            'film'       => $film
        );
        return view('vip_film', $arr);
    }

    public function price(Hall $hall){
        $parise = $hall->where('slug','parise')->get();
        $halls  = $hall->where('slug','!=','parise')->get();
        $page   = \TCG\Voyager\Models\Page::where('slug', 'sheme')->get();
        $slider = json_decode($page[0]->slider,true);

        $arr = array(
            'body_class' => '',
            'title'      => 'Схемы залов',
            'halls'      => $halls,
            'parise'     => $parise[0],
            'slides'     => $slider
        );
        return view('price', $arr);
    }

    public function search(Request $request,Film $films){
        if(!empty($request['search_word'])){
            $films = $films->where('title','like','%'.$request['search_word'].'%');
        }
        if(!empty($request['category'])){
            $films = $films->where('category_id',$request['category']);
        }
        $films = $films->orderBy('created_at',$request['sort'])->paginate(24);
        $data='';
        $data='<div class="row wow fadeInUpBig">';
        foreach($films as $fm){
            $data.='<div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-2">';
            $data.='<a href="/vip-film/'.$fm['slug'].'" class="vip-film-item text-center">';
            $data.='<img src="'.\Voyager::image($fm['poster']).'" alt="">';
            $data.='<span class="name-of-film">'.$fm['title'].'</span>';
            $data.='</a>';
            $data.='</div>';            
        }
        $data.='</div>';
        return $data;
    }
}
