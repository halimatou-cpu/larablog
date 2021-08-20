<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('pages.articles.articles',[
           'articles' => Article::paginate(4),
           'categories' => Category::all(),
        ]);
    }

    public function show(Article $article){
        // $article = Article::where('slug',$slug)->firstOrFail();
        // return view('pages.articles.article',[
        //     'article'=>$article,
        // ]);
        return view('pages.articles.article',[
            'article'=>$article,
        ]);
    }

    public function home()
    {
        return view('pages.home');
    }

}
