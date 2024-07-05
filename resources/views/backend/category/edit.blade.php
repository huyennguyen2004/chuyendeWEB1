@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chỉnh sửa danh mục</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Chỉnh sửa danh mục</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.category.update', $category->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Tên danh mục</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control" value="{{ $category->slug }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="description">Mô tả</label>
                    <textarea name="description" id="description" class="form-control"
                        rows="3">{{ $category->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="parent_id">Danh mục cha</label>
                    <select name="parent_id" id="parent_id" class="form-control">
                        <option value="">Chọn danh mục cha</option>
                        {!! $htmlparentid !!}
                    </select>
                </div>
                <div class="form-group">
                    <label for="sort_order">Sắp xếp</label>
                    <select name="sort_order" id="sort_order" class="form-control">
                        <option value="">None</option>
                        {!! $htmlsortorder !!}
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Hình ảnh</label>
                    @if($category->image)
                        <div>
                            <img src="{{ asset('images/category/' . $category->image) }}" class="img-thumbnail" width="150">
                        </div>
                    @endif
                    <input type="file" name="image" id="image" class="form-control-file mt-2">
                </div>
                <div class="form-group">
                    <label for="status">Trạng thái</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                        <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Chưa xuất bản</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="{{ route('admin.category.index') }}" class="btn btn-default">Quay lại</a>
            </form>
        </div>
    </div>
</section>
@endsection