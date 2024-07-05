@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết Banner</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.banner.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Chi tiết Banner</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-body">
            <h2>Thông tin chi tiết Banner</h2>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td><strong>ID</strong></td>
                        <td>{{ $banner->id }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tên Banner</strong></td>
                        <td>{{ $banner->name }}</td>
                    </tr>
                    <tr>
                        <td><strong>Liên kết</strong></td>
                        <td>{{ $banner->link }}</td>
                    </tr>
                    <tr>
                        <td><strong>Thứ tự sắp xếp</strong></td>
                        <td>{{ $banner->sort_order }}</td>
                    </tr>
                    <tr>
                        <td><strong>Vị trí</strong></td>
                        <td>{{ $banner->position }}</td>
                    </tr>
                    <tr>
                        <td><strong>Hình ảnh</strong></td>
                        <td>
                            @if ($banner->image)
                                <img src="{{ asset('images/banner/' . $banner->image) }}" class="img-fluid"
                                    style="max-width: 200px; height: auto;">
                            @else
                                <p>Không có hình ảnh</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Mô tả</strong></td>
                        <td>{{ $banner->description }}</td>
                    </tr>
                    <tr>
                        <td><strong>Ngày tạo</strong></td>
                        <td>{{ $banner->created_at }}</td>
                    </tr>
                    <tr>
                        <td><strong>Người tạo</strong></td>
                        <td>{{ $banner->created_by }}</td>
                    </tr>
                    <tr>
                        <td><strong>Ngày cập nhật</strong></td>
                        <td>{{ $banner->updated_at }}</td>
                    </tr>
                    <tr>
                        <td><strong>Người cập nhật</strong></td>
                        <td>{{ $banner->updated_by }}</td>
                    </tr>
                    <tr>
                        <td><strong>Trạng thái</strong></td>
                        <td>{{ $banner->status == 1 ? 'Xuất bản' : 'Chưa xuất bản' }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="text-right">
                <a href="{{ route('admin.banner.index') }}" class="btn btn-secondary">Quay lại</a>
            </div>
        </div>
    </div>
</section>
@endsection