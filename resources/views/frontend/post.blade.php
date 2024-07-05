@extends('layouts.site')
@section('title', 'Tất Cả Bài Viết')
@section('content')
    <div class="row" style="background-color:aqua; padding: 15px 0;">
        <x-main-menu class="menu-large" />
    </div>
    <div class="container">
        <h1 class="text-left mb-4">Tất Cả Bài Viết</h1>

        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-img-wrapper" style="text-align: center;">
                            <img src="{{ asset('img/post/' . $post->image) }}" class="card-img-top img-fluid"
                                style="width: 100%; height: auto; max-height: 200px;" alt="{{ $post->title }}">
                        </div>
                        <div class="card-body d-flex flex-column text-center">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ Str::limit($post->content, 150) }}</p>
                            <a href="{{ route('site.post.detail', $post->slug) }}" class="btn btn-warning mt-auto">Đọc
                                Thêm</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item {{ $posts->currentPage() == 1 ? 'active' : '' }}">
                        <a class="page-link" href="{{ $posts->url(1) }}">1</a>
                    </li>
                    @if ($posts->lastPage() > 1)
                        <li class="page-item {{ $posts->currentPage() == 2 ? 'active' : '' }}">
                            <a class="page-link" href="{{ $posts->url(2) }}">2</a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
@endsection
