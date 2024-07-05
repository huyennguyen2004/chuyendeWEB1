@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chỉnh sửa sản phẩm</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Chỉnh sửa sản phẩm</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.product.update', $product->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Tên sản phẩm</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control" value="{{ $product->slug }}" required>
                </div>
                <div class="form-group">
                    <label for="category_id">Danh mục</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="brand_id">Thương hiệu</label>
                    <select name="brand_id" id="brand_id" class="form-control" required>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Giá</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="image">Hình ảnh</label>
                    @if($product->image)
                        <div>
                            <img src="{{ asset('images/product/' . $product->image) }}" class="img-thumbnail" width="150">
                        </div>
                    @endif
                    <input type="file" name="image" id="image" class="form-control-file mt-2">
                </div>
                <div class="form-group">
                    <label for="detail">Chi tiết</label>
                    <textarea name="detail" id="detail" class="form-control" rows="3">{{ $product->detail }}</textarea>
                </div>
                <div class="form-group">
                    <label for="description">Mô tả</label>
                    <textarea name="description" id="description" class="form-control"
                        rows="3">{{ $product->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="status">Trạng thái</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                        <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Chưa xuất bản</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">Quay về</a>
            </form>
        </div>
    </div>
</section>
@endsection