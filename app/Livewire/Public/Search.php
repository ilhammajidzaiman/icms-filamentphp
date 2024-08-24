<?php

namespace App\Livewire\Public;

use Livewire\Component;
use Illuminate\Support\Str;

class Search extends Component
{
    public $keyword;

    public function search()
    {
        $keyword = Str::slug($this->keyword);
        return $this->redirectRoute('article.search', $keyword, navigate: true);
    }

    public function render()
    {
        return view('livewire.public.search');
    }
}
