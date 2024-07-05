<section class="post">
    <div class="container">
        <div class="row border-top">
            <h3>Tin tức-Bài viết</h3>
            @if ($posts->count() > 0)
                @foreach ($posts as $post)
                    <div class="col-sm mt-3">
                        <a href="{{ route('site.post.detail', $post->slug) }}">
                            <img src="{{ asset('img/post/' . $post->image) }}"
                                style="height: auto; max-width: 100%; width: auto;">
                            <h5 class="mt-3">{{ $post->title }}</h5>
                        </a>
                        <div class="time-post">
                            Ngày đăng:
                            @if ($post->created_at)
                                <span>{{ $post->created_at->format('d/m/Y') }}</span>
                            @else
                                <span>Không có ngày đăng</span>
                            @endif
                        </div>
                        <p class="mt-3">
                            {{ Str::limit($post->content, 100) }}
                        </p>

                    </div>
                @endforeach
            @else
                <p>Không có bài viết nào.</p>
            @endif
        </div>
        <div class="row mt-4 mb-5">
            <div class="col-12 text-center">
                <a href="{{ route('site.post') }}" class="btn btn-warning px-5">Xem Thêm</a>
            </div>
        </div>

        <div class="row mt-4 mb-5">
            <div class="col-12 text-left">
                <h3>Các chủ đề</h3>
                @foreach ($topics as $topic)
                    <li class="list-inline-item border border-rounded bg-info link-dark">
                        <a href="{{ route('topic.posts', $topic->slug) }}"style="color: black;">{{ $topic->name }}</a>
                    </li>
                @endforeach
            </div>
        </div>

    </div>
</section>
