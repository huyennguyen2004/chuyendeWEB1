<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        $list = Contact::orderBy('created_at', 'DESC')->get();
        return view("backend.contact.index", compact("list"));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Contact::where('name', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->orWhere('phone', 'LIKE', "%{$query}%")
            ->get();

        return view('backend.contact.index', compact('results'));
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('backend.contact.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'content' => 'required',
            'reply_id' => 'required',
            'user_id' => 'required',
            'status' => 'nullable|boolean',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->created_at = date('Y-m-d H:i:s');
        $contact->created_by = Auth::id() ?? 1;
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->updated_by = Auth::id() ?? 1;
        $contact->status = $request->status;

        return redirect()->route('admin.contact.index')
            ->with('success', 'Thông tin liên hệ đã được cập nhật thành công.');
    }

    public function status($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->status = !$contact->status;
        $contact->save();

        return redirect()->route('admin.contact.index');
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view("backend.contact.show", compact("contact"));
    }

    public function delete($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('admin.contact.index')->with('success');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('admin.contact.index');
    }

    public function trash()
    {
        $list = Contact::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();
        return view('backend.contact.trash', compact('list'));
    }

    public function restore(Request $request, $id)
    {
        $contact = Contact::onlyTrashed()->findOrFail($id);
        $contact->restore();
        return redirect()->route('admin.contact.trash');
    }
}
