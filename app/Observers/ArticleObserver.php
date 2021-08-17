<?php

namespace App\Observers;

use App\Models\Article;
//use Cocur\Slugify\Slugify;
use Illuminate\Support\Str;

class ArticleObserver
{
    /**
     * Handle the Article "created" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function created(Article $article)
    {
        //$instance = new Slugify();
        $article->slug = Str::slug($article->title, '-'); // this function is a helper
        // composer require laravel/helpers 
        //$article->slug = $instance->slugify($article->title);
        $article->save();
    }

    /**
     * Handle the Article "updated" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function updated(Article $article)
    {
        $article->slug = Str::slug($article->title, '-');
        //$article->save(); create infinite loop
        $article->saveQuietly(); //use this instead
    }

    /**
     * Handle the Article "deleted" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function deleted(Article $article)
    {
        //
    }

    /**
     * Handle the Article "restored" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function restored(Article $article)
    {
        //
    }

    /**
     * Handle the Article "force deleted" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function forceDeleted(Article $article)
    {
        //
    }
}
