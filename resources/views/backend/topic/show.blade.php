@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết chủ đề</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.topic.index') }}">Danh sách chủ đề</a></li>
                    <li class="breadcrumb-item active">Chi tiết chủ đề</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thông tin chủ đề</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $topic->id }}</td>
                    </tr>
                    <tr>
                        <th>Tên chủ đề</th>
                        <td>{{ $topic->name }}</td>
                    </tr>
                    <tr>
                        <th>Slug</th>
                        <td>{{ $topic->slug }}</td>
                    </tr>
                    <tr>
                        <th>Mô tả</th>
                        <td>{{ $topic->description }}</td>
                    </tr>
                    <tr>
                        <th>Thứ tự sắp xếp</th>
                        <td>{{ $topic->sort_order }}</td>
                    </tr>
                    <tr>
                        <th>Ngày tạo</th>
                        <td>{{ $topic->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Người tạo</th>
                        <td>{{ $topic->created_by }}</td>
                    </tr>
                    <tr>
                        <th>Ngày cập nhật</th>
                        <td>{{ $topic->updated_at }}</td>
                    </tr>
                    <tr>
                        <th>Người cập nhật</th>
                        <td>{{ $topic->updated_by }}</td>
                    </tr>
                    <tr>
                        <th>Trạng thái</th>
                        <td>{{ $topic->status == 1 ? 'Xuất bản' : 'Chưa xuất bản' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="text-right">
            <a href="{{ route('admin.topic.index') }}" class="btn btn-secondary">Quay về</a>
        </div>
    </div>
</section>
@endsection