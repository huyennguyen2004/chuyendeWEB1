<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Menu;

class MainMenu extends Component
{
    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        $args = [
            ['status', '=', '1'],
            ['position', '=', 'mainmenu'],
            ['parent_id', '=', '0']
        ];
        $list_menu = Menu::where($args)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('components.main-menu', compact('list_menu'));
    }
}
