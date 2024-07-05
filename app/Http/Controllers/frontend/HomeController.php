<?php
namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Menu;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $menus = Menu::all();

        return view('frontend.home', compact('products', 'menus'));
    }
}
