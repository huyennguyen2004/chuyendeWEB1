<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Tìm kiếm sản phẩm
        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->get();
        // Tìm kiếm danh mục
        $categories = Category::where('name', 'LIKE', "%{$query}%")
            ->get();
        // Trả về view với kết quả tìm kiếm
        return view('frontend.search_results', compact('products', 'categories', 'query'));
    }
}
