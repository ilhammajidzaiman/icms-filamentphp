<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\Setting\NavigationMenu;

class Navigation extends Component
{
    public $data;
    public object $siteSetting;

    public function __construct($siteSetting)
    {
        $this->siteSetting = (object) $siteSetting;
        $this->data = NavigationMenu::show()
            ->where('parent_id', -1)
            ->withOnly(['parent', 'children'])
            ->orderBy('order')
            ->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.layouts.navigation', [
            'siteSetting' => $this->siteSetting,
            'menu' => $this->data,
        ]);
    }
}
