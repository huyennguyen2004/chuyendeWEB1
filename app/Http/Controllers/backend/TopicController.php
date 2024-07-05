<?php
namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTopicRequest;
use Illuminate\Http\Request;
use App\Models\Topic;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    public function index()
    {
        $list = Topic::orderBy('created_at', 'DESC')->get();
        $htmlsortorder = "";
        foreach ($list as $row) {
            $htmlsortorder .= "<option value='{$row->sort_order}'>Sau: {$row->name}</option>";
        }
        return view('backend.topic.index', compact('list', 'htmlsortorder'));
    }

    public function store(StoreTopicRequest $request)
    {
        $topic = new Topic();
        $topic->name = $request->name;
        $topic->slug = Str::slug($request->name);
        $topic->description = $request->description;
        $topic->sort_order = $request->sort_order;
        $topic->status = $request->status;
        $topic->created_at = date('Y-m-d H:i:s');
        $topic->created_by = Auth::id() ?? 1;

        $topic->save();
        return redirect()->route('admin.topic.index');
    }

    public function status($id)
    {
        $topic = Topic::findOrFail($id);
        $topic->status = !$topic->status;
        $topic->save();

        return redirect()->route('admin.topic.index');
    }
    public function edit(string $id)
    {
        $topic = Topic::findOrFail($id);
        $topics = Topic::all();
        $htmlsortorder = "";
        foreach ($topics as $row) {
            $htmlsortorder .= "<option value='{$row->sort_order}'" . ($row->sort_order == $topic->sort_order ? ' selected' : '') . ">Sau: {$row->name}</option>";
        }

        return view('backend.topic.edit', compact('topic', 'htmlsortorder'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
            // 'sort_order' => 'required|int'
        ]);

        $topic = Topic::findOrFail($id);
        $topic->name = $request->name;
        $topic->slug = Str::slug($request->name);
        // $topic->sort_order = $request->sort_order;
        $topic->description = $request->description;
        $topic->status = $request->status;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = Auth::id() ?? 1;

        $topic->save();
        return redirect()->route('admin.topic.index');
    }

    public function show(string $id)
    {
        $topic = Topic::findOrFail($id);
        return view('backend.topic.show', compact('topic'));
    }
    public function delete($id)
    {
        $topic = Topic::findOrFail($id);
        $topic->delete();
        return redirect()->route('admin.topic.index');
    }

    public function trash()
    {
        $list = Topic::onlyTrashed()->get();
        return view('backend.topic.trash', compact('list'));
    }

    public function restore($id)
    {
        $topic = Topic::onlyTrashed()->findOrFail($id);
        $topic->restore();
        return redirect()->route('admin.topic.trash');
    }

    public function destroy(string $id)
    {
        $topic = Topic::findOrFail($id);
        $topic->forceDelete();
        return redirect()->route('admin.topic.index');
    }
}
