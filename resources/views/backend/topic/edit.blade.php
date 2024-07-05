@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chỉnh sửa chủ đề</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.topic.index') }}">Danh sách chủ đề</a></li>
                    <li class="breadcrumb-item active">Chỉnh sửa chủ đề</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.topic.update', $topic->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Tên chủ đề</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $topic->name }}" required
                        autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" class="form-control" id="slug" value="{{ $topic->slug }}" required
                        autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="description">Mô tả</label>
                    <textarea name="description" class="form-control" id="description" rows="3"
                        autocomplete="off">{{ $topic->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="status">Trạng thái</label>
                    <select name="status" id="status" class="form-control" required autocomplete="off">
                        <option value="1" {{ $topic->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                        <option value="0" {{ $topic->status == 0 ? 'selected' : '' }}>Chưa xuất bản</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="{{ route('admin.topic.index') }}" class="btn btn-secondary">Quay về</a>
            </form>
        </div>
    </div>
</section>
@endsection