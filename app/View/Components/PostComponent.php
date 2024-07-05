<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Post;
use App\Models\Topic;

class PostComponent extends Component
{
    public $posts;
    public $topics;
    public function __construct()
    {
        $this->posts = Post::where('status', '=', 1)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();
        $this->topics = Topic::where('status', '=', 1)->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.post', [
            'topics' => $this->topics,
        ]);
    }
}
