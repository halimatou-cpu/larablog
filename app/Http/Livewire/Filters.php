<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class Filters extends Component
{
    public $categories;
    public $activeFilters = [];
    public $search = "";

    public function render()
    {
        //filter array to save only when it's on true
        $this->activeFilters = array_filter($this->activeFilters, function($booleanVal){
            return $booleanVal; 
        });

        return view('livewire.filters', [
            // 'articles' => (empty($this->activeFilters))
            //     ? Article::all()
            //     : Article::whereIn('category_id', array_keys($this->activeFilters))->get(),
            'articles' => (empty($this->search))
                ? Article::all()
                // : Article::where('title', '%'.$this->search.'%')->get(),
                : Article::where('title', "like", "%$this->search%")->get(),
        ]);
    }
}
