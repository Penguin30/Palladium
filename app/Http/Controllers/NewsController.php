<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class NewsController extends Controller
{ 
	public function index(){
		$sliders = \TCG\Voyager\Models\Post::select('posts.*')
		->join('categories','posts.category_id', '=', 'categories.id')
		->where('categories.slug','slajder-nvoostej')
		->get();

		$posts = \TCG\Voyager\Models\Post::select('posts.*')
		->join('categories','posts.category_id', '=', 'categories.id')
		->where('categories.slug', '=', 'novosti')
		->get();

		$arr = array(
			'body_class' => '',
			'title'		 => 'Новости',
			'sliders'	 => $sliders,
			'posts'		 => $posts
		);
		return view('news',$arr);
	}

	public function single($slug){
		$post = \TCG\Voyager\Models\Post::where('slug', $slug)->get();
		$post = $post[0];
		$arr = array(
			'body_class' => '',
			'title'		 => $post->title,
			'post'		 => $post
		);
		return view('single_news',$arr);
	}
}