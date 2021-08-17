<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Manager\ArticleManager;
use App\Http\Requests\ArticleRequest;
use App\Models\Category;

class ArticleController extends Controller
{
    private $articleManager;


    /**
     * override the class's constructor to consider the Manager
     *
     * @param  App\Manager\ArticleManager  $articleManager
     */
    public function __construct(ArticleManager $articleManager)
    {
        $this->articleManager = $articleManager;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate(10);
        return view('pages.articles.index',[
            'articles' => $articles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.articles.create', [
            "categories" => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Request\ArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $validated = $request->validated();
        
        $this->articleManager->build(new Article(), $request);
        
        return redirect()->route('articles.index')->with('success', "L'article a bien été sauvegardé");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::where('id',$id)->firstOrFail();
        return view('pages.articles.edit', [
            'article' => $article,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {

        //dd(get_class_methods( $this->articleManager));
        $this->articleManager->build($article, $request);

        return redirect()->route('articles.index')->with('warning', "L'article a bien été modifié");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::where('id',$id)->firstOrFail();
        $title = $article->title;
        $article->delete(); 
        return redirect()->route('articles.index')->with('success', "L'article ".$title." a bien été supprimer");
    }
}
