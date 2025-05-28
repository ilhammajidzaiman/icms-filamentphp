<?php

namespace App\Livewire\Public\Search;

use Livewire\Component;
use Illuminate\Support\Str;

class SearchModal extends Component
{
    public $keyword;

    public function search()
    {
        $keyword = trim($this->keyword);
        if (empty($keyword)) :
            return $this->redirectRoute('search.index', navigate: true);
        endif;
        $slugKeyword = Str::slug($keyword);
        return $this->redirectRoute('search.show', $slugKeyword, navigate: true);
    }

    public function render()
    {
        return view('livewire.public.search.search-modal');
    }
}
