<?php
namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use \App\Models\Brand;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'default');

        $query = Product::where('status', '=', 1);

        switch ($sort) {
            case 'price-asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price-desc':
                $query->orderBy('price', 'desc');
                break;
            case 'name-asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name-desc':
                $query->orderBy('name', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
        }

        $list_product = $query->paginate(16);

        return view('frontend.product', compact('list_product', 'sort'));
    }

    public function getlistcategoryid($rowid)
    {
        $listcatid = [];
        array_push($listcatid, $rowid);
        $list1 = Category::where([['parent_id', '=', $rowid], ['status', '=', 1]])->select("id")->get();
        if (count($list1) > 0) {
            foreach ($list1 as $row1) {
                array_push($listcatid, $row1->id);
                $list2 = Category::where([['parent_id', '=', $row1->id], ['status', '=', 1]])->select("id")->get();
                if (count($list2) > 0) {
                    foreach ($list2 as $row2) {
                        array_push($listcatid, $row2->id);
                    }
                }
            }
        }
        return $listcatid;
    }

    public function category($slug, Request $request)
    {
        $sort = $request->input('sort', 'default');

        $row = Category::where([['slug', '=', $slug], ['status', '=', 1]])->select("id", "name", "slug")->first();
        $listcatid = [];
        if ($row != null) {
            $listcatid = $this->getlistcategoryid($row->id);
        }

        $query = Product::where('status', '=', 1)
            ->whereIn('category_id', $listcatid);

        switch ($sort) {
            case 'price-asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price-desc':
                $query->orderBy('price', 'desc');
                break;
            case 'name-asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name-desc':
                $query->orderBy('name', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
        }

        $list_product = $query->paginate(9);

        return view('frontend.product', compact('list_product', 'row', 'sort'));
    }

    public function product_detail($slug)
    {
        $product = Product::where([['status', '=', 1], ['slug', '=', $slug]])->first();
        if (!$product) {
            abort(404);
        }

        $listcatid = $this->getlistcategoryid($product->category_id);
        $list_product = Product::where([['status', '=', 1], ['id', '!=', $product->id]])
            ->whereIn('category_id', $listcatid)
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->get();

        return view('frontend.product_detail', compact('product', 'list_product'));
    }

    public function showByBrand($brand_id)
    {
        $brand = Brand::findOrFail($brand_id);
        $products = Product::where('brand_id', $brand_id)
            ->paginate(5);

        return view('frontend.product_brand', compact('products', 'brand'));
    }
}
