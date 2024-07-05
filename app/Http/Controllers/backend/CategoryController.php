<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $list = Category::orderBy('created_at', 'DESC')
            ->select("id", "image", "name", "slug", "status", "sort_order")
            ->get();
        $htmlparentid = "";
        $htmlsortorder = "";
        foreach ($list as $row) {
            $htmlparentid .= "<option value='{$row->id}'>{$row->name}</option>";
            $htmlsortorder .= "<option value='{$row->sort_order}'>Sau: {$row->name}</option>";
        }
        return view("backend.category.index", compact("list", "htmlparentid", "htmlsortorder"));
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->description = $request->description;
        $category->status = $request->status;
        $category->sort_order = $request->sort_order;
        $category->parent_id = $request->parent_id;
        $category->created_at = date('Y-m-d H:i:s');
        $category->created_by = Auth::id() ?? 1;
        //upload
        if ($request->image) {
            $exten = ['png', 'jpg', 'jpeg', 'gif', 'webp'];
            $extension = $request->image->extension();

            if (in_array($extension, $exten)) {
                $fileName = date('YmdHis') . '.' . $extension;
                $request->image->move(public_path('images/category/'), $fileName);
                $category->image = $fileName;
            } else {
                return redirect()->back()->with('error', 'Chỉ cho phép các loại file hình ảnh: png, jpg, jpeg, gif, webp');
            }
        }
        //
        $category->save();
        return redirect()->route('admin.category.index');
    }

    public function status($id)
    {
        $category = Category::findOrFail($id);
        $category->status = !$category->status;
        $category->save();
        return redirect()->route('admin.category.index');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::all();
        $htmlparentid = "";
        $htmlsortorder = "";

        foreach ($categories as $row) {
            $htmlparentid .= "<option value='{$row->id}'" . ($row->id == $category->parent_id ? ' selected' : '') . ">{$row->name}</option>";
            $htmlsortorder .= "<option value='{$row->sort_order}'" . ($row->sort_order == $category->sort_order ? ' selected' : '') . ">Sau: {$row->name}</option>";
        }

        return view('backend.category.edit', compact('category', 'htmlparentid', 'htmlsortorder'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|boolean',
            'parent_id' => 'required|integer|exists:ntbh_category,id',
            'sort_order' => 'required|integer',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->description = $request->description;
        $category->status = $request->status;
        $category->parent_id = $request->parent_id;
        $category->sort_order = $request->sort_order;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = Auth::id() ?? 1;
        //
        if ($request->image) {
            $exten = ['png', 'jpg', 'jpeg', 'gif', 'webp'];
            $extension = $request->image->extension();

            if (in_array($extension, $exten)) {
                $fileName = date('YmdHis') . '.' . $extension;
                $request->image->move(public_path('images/category/'), $fileName);
                $category->image = $fileName;
            } else {
                return redirect()->back()->with('error', 'Chỉ cho phép các loại file hình ảnh: png, jpg, jpeg, gif, webp');
            }
        }
        //
        $category->save();
        return redirect()->route('admin.category.index');
    }
    public function trash()
    {
        $list = Category::onlyTrashed()->get();
        return view('backend.category.trash', compact('list'));
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.category.index');
    }

    public function restore($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->restore();
        return redirect()->route('admin.category.trash');
    }

    public function destroy($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();
        return redirect()->route('admin.category.trash');
    }
}
