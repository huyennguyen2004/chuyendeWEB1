<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Product;

class Sale extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }
    public function render(): View|Closure|string
    {
        $args = [
            ['status', '=', '1'],
            ['pricesale', '>', '0']
        ];
        $product_list = Product::where($args)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        return view('components.sale', compact('product_list'));
    }
}
