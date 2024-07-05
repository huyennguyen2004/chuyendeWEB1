<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBannerRequest;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Auth;

class BannerController extends Controller
{
    public function index()
    {
        $list = Banner::orderBy('created_at', 'DESC')
            ->get();
        $htmlsortorder = "";
        foreach ($list as $row) {
            $htmlsortorder .= "<option value='{$row->sort_order}'>Sau: {$row->name}</option>";
        }
        return view('backend.banner.index', compact('list', 'htmlsortorder'));
    }

    public function store(StoreBannerRequest $request)
    {
        $banner = new Banner();
        $banner->name = $request->name;
        $banner->link = $request->link;
        $banner->description = $request->description;
        $banner->status = $request->status;
        $banner->sort_order = $request->sort_order;
        $banner->position = $request->position;
        $banner->created_at = date('Y-m-d H:i:s');
        $banner->created_by = Auth::id() ?? 1;
        //upload
        if ($request->image) {
            $exten = ['png', 'jpg', 'jpeg', 'gif', 'webp'];
            $extension = $request->image->extension();

            if (in_array($extension, $exten)) {
                $fileName = date('YmdHis') . '.' . $extension;
                $request->image->move(public_path('images/banner/'), $fileName);
                $banner->image = $fileName;
            } else {
                return redirect()->back()->with('error', 'Chỉ cho phép các loại file hình ảnh: png, jpg, jpeg, gif, webp');
            }
        }
        //
        $banner->save();
        return redirect()->route('admin.banner.index');
    }
    public function status($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->status = !$banner->status;
        $banner->save();
        return redirect()->route('admin.banner.index');
    }
    public function show($id)
    {
        $banner = Banner::findOrFail($id);
        return view('backend.banner.show', compact('banner'));
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        $banners = Banner::orderBy('created_at', 'DESC')->get();
        $htmlsortorder = "";
        foreach ($banners as $row) {
            $htmlsortorder .= "<option value='{$row->sort_order}'>Sau: {$row->name}</option>";
        }
        return view('backend.banner.edit', compact('banner', 'htmlsortorder'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'description' => 'nullable',
            'position' => 'required|string',
            'sort_order' => 'required|int',
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $banner = Banner::findOrFail($id);
        $banner->name = $request->name;
        $banner->description = $request->description;
        $banner->sort_order = $request->sort_order;
        $banner->position = $request->position;
        $banner->status = $request->status;
        $banner->link = $request->link;
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id() ?? 1;
        //upload
        if ($request->image) {
            $exten = ['png', 'jpg', 'jpeg', 'gif', 'webp'];
            $extension = $request->image->extension();

            if (in_array($extension, $exten)) {
                $fileName = date('YmdHis') . '.' . $extension;
                $request->image->move(public_path('images/banner/'), $fileName);
                $banner->image = $fileName;
            } else {
                return redirect()->back()->with('error', 'Chỉ cho phép các loại file hình ảnh: png, jpg, jpeg, gif, webp');
            }
        }
        //
        $banner->save();
        return redirect()->route('admin.banner.index');
    }

    public function delete($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();

        return redirect()->route('admin.banner.index');
    }

    public function trash()
    {
        $list = Banner::onlyTrashed()->get();
        return view('backend.banner.trash', compact('list'));
    }

    public function restore($id)
    {
        $banner = Banner::onlyTrashed()->findOrFail($id);
        $banner->restore();

        return redirect()->route('admin.banner.index')
            ->with('success', 'Banner đã được khôi phục thành công.');
    }

    public function destroy($id)
    {
        $banner = Banner::onlyTrashed()->findOrFail($id);
        $banner->forceDelete();

        return redirect()->route('admin.banner.trash')
            ->with('success', 'Banner đã được xóa vĩnh viễn.');
    }
}
