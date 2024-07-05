@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chỉnh sửa thương hiệu</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.brand.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Chỉnh sửa thương hiệu</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Tên thương hiệu</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $brand->name }}" required>
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control" value="{{ $brand->slug }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Mô tả</label>
                    <textarea name="description" id="description" class="form-control"
                        rows="3">{{ $brand->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">Hình ảnh</label>
                    @if($brand->image)
                        <div>
                            <img src="{{ asset('images/brand/' . $brand->image) }}" class="img-thumbnail" width="150">
                        </div>
                    @endif
                    <input type="file" name="image" id="image" class="form-control-file mt-2">
                </div>
                <div class="form-group">
                    <label for="sort_order">Sắp xếp</label>
                    <select name="sort_order" id="sort_order" class="form-control">
                        <option value=""></option>
                        {!!$htmlsortorder!!}
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Trạng thái</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1" {{ $brand->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                        <option value="0" {{ $brand->status == 0 ? 'selected' : '' }}>Chưa xuất bản</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="{{ route('admin.brand.index') }}" class="btn btn-default">Quay lại</a>
            </form>
        </div>
    </div>
</section>
@endsection