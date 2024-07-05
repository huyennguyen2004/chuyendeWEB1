@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm mới sản phẩm</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thêm mới sản phẩm</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Tên sản phẩm</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control">
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="detail">Chi tiết</label>
                            <textarea name="detail" class="form-control" rows="4"></textarea>
                            @error('detail')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Mô tả</label>
                            <textarea name="description" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category_id">Danh mục</label>
                            <select class="form-control" id="category_id" name="category_id">
                                <option value="">Chọn danh mục</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="brand_id">Thương hiệu</label>
                            <select class="form-control" id="brand_id" name="brand_id">
                                <option value="">Chọn thương hiệu</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Giá</label>
                            <input type="number" name="price" class="form-control">
                            @error('price')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pricesale">Giá khuyến mãi</label>
                            <input type="number" name="pricesale" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="qty">Số lượng</label>
                            <input type="number" name="qty" class="form-control">
                            @error('qty')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Hình ảnh</label>
                            <input type="file" name="image" class="form-control-file">
                            @error('image')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Trạng thái</label>
                            <select name="status" class="form-control" required>
                                <option value="1">Xuất bản</option>
                                <option value="0">Chưa xuất bản</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <a href="{{ route('admin.product.index') }}" class="btn btn-default">Quay về</a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection