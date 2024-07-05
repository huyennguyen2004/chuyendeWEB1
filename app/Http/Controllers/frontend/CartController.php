<?php
namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $list_cart = session('carts', []);
        return view('frontend.cart.index', compact('list_cart'));
    }

    public function addToCart(Request $request)
    {
        $productid = $request->query('productid');
        $qty = $request->query('qty');
        $product = Product::find($productid);

        if (!$product) {
            return response()->json(['error' => 'Sản phẩm không tồn tại'], 404);
        }

        $cartItems = [
            'id' => $productid,
            'image' => $product->image,
            'name' => $product->name,
            'price' => ($product->pricesale > 0) ? $product->pricesale : $product->price,
            'qty' => $qty,
        ];

        $carts = session('carts', []);
        $check = true;
        foreach ($carts as $key => $cart) {
            if ($cart['id'] == $productid) {
                $carts[$key]['qty'] += $qty;
                $check = false;
                break;
            }
        }

        if ($check) {
            $carts[] = $cartItems;
        }

        session(['carts' => $carts]);

        return response()->json(['totalItems' => count($carts)]);
    }
}
