<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $list = Menu::orderBy('created_at', 'DESC')->get();
        return view('backend.menu.index', compact('list'));
    }
    public function status($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->status = !$menu->status;
        $menu->save();

        return redirect()->route('admin.menu.index');
    }
    public function store(Request $request)
    {
        Menu::create($request->all());
        return redirect()->route('admin.menu.index');
    }

    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        return view('backend.menu.show', compact('menu'));
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('backend.menu.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->update($request->all());
        return redirect()->route('admin.menu.index');
    }

    public function delete($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return redirect()->route('admin.menu.index');
    }

    public function destroy($id)
    {
        $menu = Menu::onlyTrashed()->findOrFail($id);
        $menu->forceDelete();
        return redirect()->route('admin.menu.trash')->with('success', 'Xóa vĩnh viễn menu thành công');
    }

    public function trash()
    {
        $list = Menu::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();
        return view('backend.menu.trash', compact('list'));
    }

    public function restore($id)
    {
        $menu = Menu::onlyTrashed()->findOrFail($id);
        $menu->restore();
        return redirect()->route('admin.menu.trash')->with('success', 'Khôi phục menu thành công');
    }
}
