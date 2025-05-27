<?php

namespace App\Livewire\Public\Search;

use Livewire\Component;
use Illuminate\Support\Str;

class SearchInput extends Component
{

    public $keyword;

    public function search()
    {
        $keyword = Str::slug($this->keyword);
        return $this->redirectRoute('search', $keyword, navigate: true);
    }

    public function render()
    {
        return view('livewire.public.search.search-input');
    }
}
