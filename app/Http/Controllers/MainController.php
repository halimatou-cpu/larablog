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
        return view('pages.articles',[
           'articles' => $articles,
        ]);
    }

    public function home()
    {
        return view('pages.home');
    }

}
