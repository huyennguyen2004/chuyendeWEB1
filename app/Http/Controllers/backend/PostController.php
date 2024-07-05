<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function index()
    {
        $list = Post::orderBy('created_at', 'DESC')
            ->join('ntbh_topic', 'ntbh_post.topic_id', '=', 'ntbh_topic.id')
            ->select('ntbh_post.*', 'ntbh_topic.name as topicname')
            ->get();
        return view('backend.post.index', compact('list'));
    }

    public function create()
    {
        $topics = Topic::all();
        return view('backend.post.create', compact('topics'));
    }
    public function store(StorePostRequest $request)
    {
        $validatedData = $request->validated();

        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->detail = $request->detail;
        $post->description = $request->description;
        $post->topic_id = $request->topic_id;
        $post->status = $request->status;
        $post->created_at = date('Y-m-d H:i:s');
        $post->created_by = Auth::id() ?? 1;
        //upload
        if ($request->image) {
            $exten = ['png', 'jpg', 'jpeg', 'gif', 'webp'];
            $extension = $request->image->extension();

            if (in_array($extension, $exten)) {
                $fileName = date('YmdHis') . '.' . $extension;
                $request->image->move(public_path('images/post/'), $fileName);
                $post->image = $fileName;
            } else {
                return redirect()->back()->with('error', 'Chỉ cho phép các loại file hình ảnh: png, jpg, jpeg, gif, webp');
            }
        }
        //
        $post->save();
        return redirect()->route('admin.post.index');
    }

    public function status($id)
    {
        $post = Post::findOrFail($id);
        $post->status = !$post->status;
        $post->save();

        return redirect()->route('admin.post.index');
    }
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $topics = Topic::all();
        return view('backend.post.edit', compact('post', 'topics'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->detail = $request->detail;
        $post->description = $request->description;
        $post->status = $request->status;
        $post->topic_id = $request->topic_id;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = Auth::id() ?? 1;

        if ($request->image) {
            $exten = ['png', 'jpg', 'jpeg', 'gif', 'webp'];
            $extension = $request->image->extension();

            if (in_array($extension, $exten)) {
                $fileName = date('YmdHis') . '.' . $extension;
                $request->image->move(public_path('images/post/'), $fileName);
                $post->image = $fileName;
            } else {
                return redirect()->back()->with('error', 'Chỉ cho phép các loại file hình ảnh: png, jpg, jpeg, gif, webp');
            }
        }

        $post->save();
        return redirect()->route('admin.post.index')->with('success', 'Bài viết đã được cập nhật thành công.');
    }


    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('backend.post.show', compact('post'));
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.post.index');
    }

    public function trash()
    {
        $list = Post::onlyTrashed()->get();
        return view('backend.post.trash', compact('list'));
    }

    public function restore($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->restore();
        return redirect()->route('admin.post.trash');
    }
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->forceDelete();
        return redirect()->route('admin.post.index');
    }

}