<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Category;

class ProductCategoryHome extends Component
{
    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        $args_category = [
            ['status', '=', 1],
            ['parent_id', '=', 0],
        ];
        $category_list = Category::where($args_category)
            ->orderBy('sort_order', 'asc')
            ->get();
        return view('components.product-category-home', compact('category_list'));
    }
}
