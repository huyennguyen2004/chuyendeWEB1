@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết sản phẩm</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Chi tiết sản phẩm</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-body">
            <h2>Thông tin chi tiết sản phẩm</h2>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td><strong>ID</strong></td>
                        <td>{{ $product->id }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tên sản phẩm</strong></td>
                        <td>{{ $product->name }}</td>
                    </tr>
                    <tr>
                        <td><strong>Slug</strong></td>
                        <td>{{ $product->slug }}</td>
                    </tr>
                    <tr>
                        <td><strong>Danh mục</strong></td>
                        <td>{{ $product->category->name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Thương hiệu</strong></td>
                        <td>{{ $product->brand->name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Giá</strong></td>
                        <td>{{ $product->price }}</td>
                    </tr>
                    <tr>
                        <td><strong>Giá sale</strong></td>
                        <td>{{ $product->pricesale }}</td>
                    </tr>
                    <tr>
                        <td><strong>Số lượng</strong></td>
                        <td>{{ $product->qty }}</td>
                    </tr>
                    <tr>
                        <td><strong>Hình ảnh</strong></td>
                        <td>
                            @if ($product->image)
                                <img src="{{ asset('images/product/' . $product->image) }}" class="img-fluid"
                                    style="max-width: 100px; height: 100px;">
                            @else
                                <p>Không có hình ảnh</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Mô tả</strong></td>
                        <td>{{ $product->description }}</td>
                    </tr>
                    <tr>
                        <td><strong>Chi tiết</strong></td>
                        <td>{{ $product->detail }}</td>
                    </tr>
                    <tr>
                        <td><strong>Trạng thái</strong></td>
                        <td>{{ $product->status == 1 ? 'Xuất bản' : 'Chưa xuất bản' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Ngày tạo</strong></td>
                        <td>{{ $product->created_at }}</td>
                    </tr>
                    <tr>
                        <td><strong>Người tạo</strong></td>
                        <td>{{ $product->created_by }}</td>
                    </tr>
                    <tr>
                        <td><strong>Ngày cập nhật</strong></td>
                        <td>{{ $product->updated_at }}</td>
                    </tr>
                    <tr>
                        <td><strong>Người cập nhật</strong></td>
                        <td>{{ $product->updated_by }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="text-right">
                <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">Quay lại</a>
            </div>
        </div>
    </div>
</section>
@endsection