@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết thương hiệu</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.brand.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Chi tiết thương hiệu</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-body">
            <h2>Thông tin chi tiết thương hiệu</h2>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td><strong>ID</strong></td>
                        <td>{{ $brand->id }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tên thương hiệu</strong></td>
                        <td>{{ $brand->name }}</td>
                    </tr>
                    <tr>
                        <td><strong>Slug</strong></td>
                        <td>{{ $brand->slug }}</td>
                    </tr>
                    <tr>
                        <td><strong>Hình ảnh</strong></td>
                        <td>
                            @if ($brand->image)
                                <img src="{{ asset('images/brand/' . $brand->image) }}" class="img-fluid"
                                    style="max-width: 200px; height: auto;">
                            @else
                                <p>Không có hình ảnh</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Thứ tự sắp xếp</strong></td>
                        <td>{{ $brand->sort_order }}</td>
                    </tr>
                    <tr>
                        <td><strong>Mô tả</strong></td>
                        <td>{{ $brand->description }}</td>
                    </tr>
                    <tr>
                        <td><strong>Ngày tạo</strong></td>
                        <td>{{ $brand->created_at }}</td>
                    </tr>
                    <tr>
                        <td><strong>Người tạo</strong></td>
                        <td>{{ $brand->created_by }}</td>
                    </tr>
                    <tr>
                        <td><strong>Ngày cập nhật</strong></td>
                        <td>{{ $brand->updated_at }}</td>
                    </tr>
                    <tr>
                        <td><strong>Người cập nhật</strong></td>
                        <td>{{ $brand->updated_by }}</td>
                    </tr>
                    <tr>
                        <td><strong>Trạng thái</strong></td>
                        <td>{{ $brand->status == 1 ? 'Xuất bản' : 'Chưa xuất bản' }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="text-right">
                <a href="{{ route('admin.brand.index') }}" class="btn btn-secondary">Quay lại</a>
            </div>
        </div>
    </div>
</section>
@endsection