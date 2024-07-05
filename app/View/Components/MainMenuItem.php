<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Menu;

class MainMenuItem extends Component
{
    public $menuitem;

    public function __construct($menuitem)
    {
        $this->menuitem = $menuitem;
    }

    public function render(): View|Closure|string
    {
        $args = [
            ['status', '=', '1'],
            ['position', '=', 'mainmenu'],
            ['parent_id', '=', $this->menuitem->id]
        ];
        $list_menu = Menu::where($args)
            ->orderBy('sort_order', 'desc')
            ->get();

        return view('components.main-menu-item', compact('list_menu'));
    }
}
