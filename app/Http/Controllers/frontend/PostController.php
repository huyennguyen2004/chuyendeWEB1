<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Topic;

class PostController extends Controller
{
    // tất cả bài viết
    public function index()
    {
        $posts = Post::where('status', '=', 1)
            ->with('topic')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('frontend.post', compact('posts'));
    }

    // chi tiết bài viết
    public function post_detail($slug)
    {

        $post = Post::where('slug', $slug)->firstOrFail();
        $relatedPosts = Post::where('topic_id', $post->topic_id)
            ->where('id', '!=', $post->id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('frontend.post_detail', compact('post', 'relatedPosts'));
    }
    // bài viết theo chủ đề
    public function topic($slug)
    {
        $topic = Topic::where([['slug', '=', $slug], ['status', '=', 1]])->firstOrFail();
        $posts = Post::where([['status', '=', 1], ['topic_id', '=', $topic->id]])
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('frontend.post_topic', compact('topic', 'posts'));
    }

}
