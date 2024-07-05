@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tạo bài viết mới</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Tạo bài viết mới</li>
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
                    <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{old('name')}}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="detail">Chi tiết</label>
                            <textarea class="form-control" id="detail" name="detail" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Mô tả</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="topic_id">Chủ đề</label>
                        <select class="form-control" id="topic_id" name="topic_id" required>
                            <option value="">Chọn chủ đề</option>
                            @foreach($topics as $topic)
                                <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="type">Kiểu</label>
                        <select class="form-control" id="type" name="type" value="{{old('type')}}" required>
                            <option value="">Chọn kiểu</option>
                            <option value="post">Bài viết</option>
                            <option value="page">Trang đơn</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Hình ảnh</label>
                        <input type="file" name="image" value="{{old('image')}}" class="form-control-file" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="1">Xuất bản</option>
                            <option value="0">Chưa xuất bản</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Tạo mới</button>
                    <a href="{{ route('admin.post.index') }}" class="btn btn-secondary">Quay lại</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection