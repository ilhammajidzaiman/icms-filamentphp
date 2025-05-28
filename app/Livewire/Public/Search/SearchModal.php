<?php

namespace App\Livewire\Public\Search;

use Livewire\Component;
use Illuminate\Support\Str;

class SearchModal extends Component
{
    public $keyword;

    public function search()
    {
        $keyword = Str::of($this->keyword)->trim();
        if (empty($keyword)) :
            return;
        endif;
        $keyword = Str::slug($keyword);
        return $this->redirectRoute('search.show', $keyword, navigate: true);
    }

    public function render()
    {
        return view('livewire.public.search.search-modal');
    }
}
