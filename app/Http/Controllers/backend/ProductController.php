<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $list = Product::orderBy('ntbh_product.created_at', 'DESC')
            ->join('ntbh_category', 'ntbh_product.category_id', '=', 'ntbh_category.id')
            ->join('ntbh_brand', 'ntbh_product.brand_id', '=', 'ntbh_brand.id')
            ->select("ntbh_product.id", "ntbh_product.image", "ntbh_product.name", "ntbh_product.status", "ntbh_category.name as categoryname", "ntbh_brand.name as brandname")
            ->get();
        return view("backend.product.index", compact("list"));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('backend.product.create', compact('categories', 'brands'));
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('backend.product.edit', compact('product', 'categories', 'brands'));
    }
    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->detail = $request->input('detail');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');
        $product->price = $request->input('price');
        $product->pricesale = $request->input('pricesale');
        $product->qty = $request->input('qty');
        $product->slug = Str::slug($request->name);
        $product->status = $request->status;
        $product->created_at = date('Y-m-d H:i:s');
        $product->created_by = Auth::id() ?? 1;
        //upload
        if ($request->image) {
            $exten = ['png', 'jpg', 'jpeg', 'gif', 'webp'];
            $extension = $request->image->extension();

            if (in_array($extension, $exten)) {
                $fileName = date('YmdHis') . '.' . $extension;
                $request->image->move(public_path('images/product/'), $fileName);
                $product->image = $fileName;
            } else {
                return redirect()->back()->with('error', 'Chỉ cho phép các loại file hình ảnh: png, jpg, jpeg, gif, webp');
            }
        }
        //
        $product->save();
        return redirect()->route('admin.product.index');
    }

    public function status($id)
    {
        $product = Product::findOrFail($id);
        $product->status = !$product->status;
        $product->save();

        return redirect()->route('admin.product.index');
    }

    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->detail = $request->detail;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->pricesale = $request->pricesale;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id() ?? 1;
        $product->status = $request->status;
        //upload
        if ($request->image) {
            $exten = ['png', 'jpg', 'jpeg', 'gif', 'webp'];
            $extension = $request->image->extension();

            if (in_array($extension, $exten)) {
                $fileName = date('YmdHis') . '.' . $extension;
                $request->image->move(public_path('images/product/'), $fileName);
                $product->image = $fileName;
            } else {
                return redirect()->back()->with('error', 'Chỉ cho phép các loại file hình ảnh: png, jpg, jpeg, gif, webp');
            }
        }
        //

        $product->save();
        return redirect()->route('admin.product.index');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('backend.product.show', compact('product', 'categories', 'brands'));
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.product.index');
    }

    public function trash()
    {
        $list = Product::onlyTrashed()
            ->join('ntbh_category', 'ntbh_product.category_id', '=', 'ntbh_category.id')
            ->join('ntbh_brand', 'ntbh_product.brand_id', '=', 'ntbh_brand.id')
            ->select("ntbh_product.id", "ntbh_product.image", "ntbh_product.name", "ntbh_category.name as categoryname", "ntbh_brand.name as brandname")
            ->get();
        return view('backend.product.trash', compact('list'));
    }
    public function restore($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();
        return redirect()->route('admin.product.trash');
    }
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->forceDelete();
        return redirect()->route('admin.product.index');
    }

}
