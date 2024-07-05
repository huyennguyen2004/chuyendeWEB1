@extends('layouts.site')
@section('title', 'Bài Viết Theo Chủ Đề')
@section('content')
    <div class="container">
        <h1 class="text-left mb-4">Chủ Đề: {{ $topic->name }}</h1>

        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('img/post/' . $post->image) }}" class="card-img-top img-fluid"
                            alt="{{ $post->title }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ Str::limit($post->detail, 150) }}</p>
                            <a href="{{ route('site.post.detail', $post->slug) }}" class="btn btn-warning mt-auto">Đọc
                                Thêm</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <ul class="pagination  justify-content-center">
            @if ($posts->currentPage() > 1)
                <li class="page-item">
                    <a class="page-link" href="{{ $posts->previousPageUrl() }}">«</a>
                </li>
            @endif

            @foreach (range(1, $posts->lastPage()) as $page)
                <li class="page-item {{ $page == $posts->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $posts->url($page) }}">{{ $page }}</a>
                </li>
            @endforeach

            @if ($posts->currentPage() < $posts->lastPage())
                <li class="page-item">
                    <a class="page-link" href="{{ $posts->nextPageUrl() }}">»</a>
                </li>
            @endif
        </ul>

    </div>
@endsection
