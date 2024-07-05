<?php
namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $query = User::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('phone', 'like', '%' . $search . '%');
        }

        $list = $query->orderBy('created_at', 'DESC')->get();
        return view('backend.user.index', compact('list'));
    }

    public function create()
    {
        return view('backend.user.create');
    }

    public function store(StoreUserRequest $request)
    {
        Log::info('Store request received', $request->all());

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->username = $request->username;
        $user->address = $request->address;
        $user->roles = $request->roles;
        $user->status = $request->status;
        $user->created_at = now();
        $user->created_by = Auth::id() ?? 1;
        $user->password = bcrypt($request->password);

        Log::info('Saving user', $user->toArray());

        $user->save();

        Log::info('User saved successfully');

        return redirect()->route('admin.user.index');
    }

    public function status($id)
    {
        $user = User::findOrFail($id);
        $user->status = !$user->status;
        $user->save();

        return redirect()->route('admin.user.index');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('backend.user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:ntbh_user,email,' . $user->id,
            'phone' => 'nullable|string|max:15',
            'username' => 'required|string|max:255|unique:ntbh_user,username,' . $user->id,
            'address' => 'nullable|string|max:255',
            'roles' => 'required|in:admin,customer',
            'status' => 'required|boolean',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->username = $request->username;
        $user->address = $request->address;
        $user->roles = $request->roles;
        $user->status = $request->status;
        $user->updated_at = now();
        $user->updated_by = Auth::id() ?? 1;

        $user->save();
        return redirect()->route('admin.user.index');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user.index');
    }

    public function trash()
    {
        $list = User::onlyTrashed()->get();
        return view('backend.user.trash', compact('list'));
    }

    public function restore($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();
        return redirect()->route('admin.user.trash');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->forceDelete();
        return redirect()->route('admin.user.index');
    }
}
