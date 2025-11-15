<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use App\Models\Post\BlogArticle;
use App\Models\Post\BlogCategory;

class SearchGlobal extends Component
{
    public $keyword = '';
    public $article = [];
    public $category = [];

    public function updatedKeyword()
    {
        $this->article = [];
        $this->category = [];
        if (strlen($this->keyword) > 2) {
            $this->article = BlogArticle::where('title', 'ilike', '%' . $this->keyword . '%')
                ->latest()
                ->take(20)
                ->get();
            $this->category = BlogCategory::where('title', 'ilike', '%' . $this->keyword . '%')
                ->latest()
                ->take(20)
                ->get();
        }
    }

    public function goToArticle($id)
    {
        return redirect()->route('article.show', $id);
    }

    public function goToCategory($id)
    {
        return redirect()->route('category.show', $id);
    }

    public function render()
    {
        return view('livewire.search-global');
    }
}
