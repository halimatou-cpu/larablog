<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        //$articles = Article::all();
        $articles = Article::paginate(4);
        //dd($articles);
        return view('pages.articles.articles',[
           'articles' => $articles,
        ]);
    }

    public function show($slug){
        $article = Article::where('slug',$slug)->firstOrFail();
        return view('pages.articles.article',[
            'article'=>$article,
        ]);
    }

    public function home()
    {
        return view('pages.home');
    }

}
