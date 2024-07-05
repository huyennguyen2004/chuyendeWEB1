@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chỉnh sửa bài viết</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Chỉnh sửa bài viết</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('admin.post.update', $post->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}"
                                required>
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="detail">Chi tiết</label>
                            <textarea class="form-control" id="detail" name="detail" rows="5"
                                required>{{ $post->detail }}</textarea>
                            @error('detail')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Mô tả</label>
                            <textarea class="form-control" id="description" name="description"
                                rows="3">{{ $post->description }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="topic_id">Chủ đề</label>
                        <select name="topic_id" id="category_id" class="form-control" required>
                            @foreach($topics as $topic)
                                <option value="{{ $topic->id }}" {{ $post->topic_id == $topic->id ? 'selected' : '' }}>
                                    {{ $topic->name }}
                                </option>
                            @endforeach

                        </select>
                        @error('topic_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="type">Kiểu</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="post" {{ $post->type == 'post' ? 'selected' : '' }}>Bài viết</option>
                            <option value="page" {{ $post->type == 'page' ? 'selected' : '' }}>Trang đơn</option>
                        </select>
                        @error('type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Hình ảnh</label>
                        @if($post->image)
                            <div>
                                <img src="{{ asset('images/post/' . $post->image) }}" class="img-thumbnail" width="150">
                            </div>
                        @endif
                        <input type="file" name="image" id="image" class="form-control-file mt-2">
                    </div>
                    <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="1" {{ $post->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                            <option value="0" {{ $post->status == 0 ? 'selected' : '' }}>Chưa xuất bản</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <a href="{{ route('admin.post.index') }}" class="btn btn-secondary">Quay lại</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection