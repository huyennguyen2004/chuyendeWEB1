@extends('layouts.site')

@section('title', $post->title)

@section('content')
    <div class="container mb-5">
        <h1 class="text-center mb-4">{{ $post->title }}</h1>
        <img src="{{ asset('img/post/' . $post->image) }}" class="img-fluid">
        <div class="mt-4">
            {!! $post->content !!}
        </div>

        @extends('layouts.site')

    @section('title', $post->title)

    @section('content')
        <div class="container mb-5">
            <h1 class="text-center mb-4">{{ $post->title }}</h1>
            <img src="{{ asset('img/post/' . $post->image) }}" class="img-fluid">
            <div class="mt-4">
                {!! $post->detail !!}
            </div>
            <div class="mt-4">
                {!! $post->description !!}
            </div>
            <div class="mt-4">
                @if ($post->topic)
                    <h5>Chủ đề:</h5>
                    <a href="{{ route('topic.posts', ['slug' => $post->topic->slug]) }}" class="badge badge-primary">
                        {{ $post->topic->name }}
                    </a>
                @else
                    <p>Không có chủ đề nào cho bài viết này.</p>
                @endif
            </div>

            <div class="row my-4">
                <div class="col-12">
                    <h4>Bài viết cùng chủ đề </h4>
                    <div class="row">
                        @foreach ($relatedPosts as $relatedPost)
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <a href="{{ route('site.post.detail', $relatedPost->slug) }}">
                                        <img src="{{ asset('img/post/' . $relatedPost->image) }}" class="card-img-top"
                                            alt="{{ $relatedPost->title }}">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $relatedPost->title }}</h5>
                                        <div class="time-post">
                                            Ngày đăng:
                                            @if ($relatedPost->created_at)
                                                <span>{{ $relatedPost->created_at->format('d/m/Y') }}</span>
                                            @else
                                                <span>Không có ngày đăng</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="d-flex justify-content-center mt-4">
                <a href="{{ route('site.post') }}" class="btn btn-info">Quay Lại</a>
            </div>
        </div>
    @endsection
</div>
@endsection
