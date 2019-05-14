<?php

namespace Tierlist\System;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    const API_NEWS = 'https://news.tierlist.gg/wp-json/wp/v2/posts?categories=';

    public function index() {
        $posts = json_decode(file_get_contents(self::API_NEWS. env('API_NEWS_CATEGORY')), true);
        return view('g.news.index', compact('posts'));

    }

    public function post($post) {
        $posts = json_decode(file_get_contents(self::API_NEWS. env('API_NEWS_CATEGORY')), true);
        $the_post = json_decode(file_get_contents('https://news.tierlist.gg/wp-json/wp/v2/posts?slug='. $post));
        $the_post = $the_post[0];
        if(isset($the_post->better_featured_image->source_url)) {
            $the_post->image = $the_post->better_featured_image->source_url;
        } else {
            $the_post->image = 0;
        }

        $the_post->content->rendered = str_replace('"/app', '"https://news.tierlist.gg/app', $the_post->content->rendered);
        return view('g.news.the-post', compact('the_post', 'posts'));
    }
}
