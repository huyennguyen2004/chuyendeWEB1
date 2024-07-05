<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    public function index()
    {
        $list = Brand::orderBy('created_at', 'DESC')
            ->get();
        $htmlsortorder = "";
        foreach ($list as $row) {
            $htmlsortorder .= "<option value='{$row->sort_order}'>Sau: {$row->name}</option>";
        }
        return view("backend.brand.index", compact("list", "htmlsortorder"));
    }
    public function store(StoreBrandRequest $request)
    {
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->description = $request->description;
        $brand->status = $request->status;
        $brand->created_at = date('Y-m-d H:i:s');
        $brand->created_by = Auth::id() ?? 1;
        //
        if ($request->image) {
            $exten = ['png', 'jpg', 'jpeg', 'gif', 'webp'];
            $extension = $request->image->extension();

            if (in_array($extension, $exten)) {
                $fileName = date('YmdHis') . '.' . $extension;
                $request->image->move(public_path('images/brand/'), $fileName);
                $brand->image = $fileName;
            } else {
                return redirect()->back()->with('error', 'Chỉ cho phép các loại file hình ảnh: png, jpg, jpeg, gif, webp');
            }
        }
        //
        $brand->save();
        return redirect()->route('admin.brand.index');
    }

    public function show($id)
    {
        $brand = Brand::findOrFail($id);
        return view('backend.brand.show', compact('brand'));
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        $list = Brand::orderBy('created_at', 'DESC')->get();
        $htmlsortorder = "";
        foreach ($list as $row) {
            $htmlsortorder .= "<option value='{$row->sort_order}'>Sau: {$row->name}</option>";
        }
        return view('backend.brand.edit', compact('brand', 'htmlsortorder'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status' => 'required|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $brand = Brand::findOrFail($id);
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->description = $request->description;
        $brand->sort_order = $request->sort_order ?? 0;
        $brand->status = $request->status;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = Auth::id() ?? 1;

        if ($request->image) {
            $exten = ['png', 'jpg', 'jpeg', 'gif', 'webp'];
            $extension = $request->image->extension();

            if (in_array($extension, $exten)) {
                $fileName = date('YmdHis') . '.' . $extension;
                $request->image->move(public_path('images/brand/'), $fileName);
                $brand->image = $fileName;
            } else {
                return redirect()->back()->with('error', 'Chỉ cho phép các loại file hình ảnh: png, jpg, jpeg, gif, webp');
            }
        }

        $brand->save();
        return redirect()->route('admin.brand.index');
    }

    public function delete($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect()->route('admin.brand.index');
    }
    public function trash()
    {
        $list = Brand::onlyTrashed()->get();
        return view('backend.brand.trash', compact('list'));
    }

    public function restore($id)
    {
        $brand = Brand::onlyTrashed()->findOrFail($id);
        $brand->restore();

        return redirect()->route('admin.brand.index');
    }

    public function destroy($id)
    {
        $brand = Brand::onlyTrashed()->findOrFail($id);
        $brand->forceDelete();

        return redirect()->route('admin.brand.trash');
    }
    public function status($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->status = !$brand->status;
        $brand->save();
        return redirect()->route('admin.brand.index');
    }

}
