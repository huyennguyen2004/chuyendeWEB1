@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết bài viết</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Chi tiết bài viết</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-body">
            <h2>Thông tin chi tiết bài viết</h2>
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><strong>ID</strong></td>
                                <td>{{ $post->id }}</td>
                            </tr>
                            <tr>
                                <td><strong>Tiêu đề</strong></td>
                                <td>{{ $post->title }}</td>
                            </tr>
                            <tr>
                                <td><strong>Slug</strong></td>
                                <td>{{ $post->slug }}</td>
                            </tr>
                            <tr>
                                <td><strong>Chủ đề</strong></td>
                                <td>{{ $post->topic->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Kiểu</strong></td>
                                <td>{{ $post->type == 'post' ? 'Bài viết' : 'Trang đơn' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Hình ảnh</strong></td>
                                <td>
                                    @if ($post->image)
                                        <img src="{{ asset('images/post/' . $post->image) }}" class="img-fluid"
                                            style="max-width: 100px; height: 100px;">
                                    @else
                                        <p>Không có hình ảnh</p>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><strong>Chi tiết</strong></td>
                                <td>{{ $post->detail }}</td>
                            </tr>
                            <tr>
                                <td><strong>Mô tả</strong></td>
                                <td>{{ $post->description }}</td>
                            </tr>
                            <tr>
                                <td><strong>Ngày tạo</strong></td>
                                <td>{{ $post->created_at }}</td>
                            </tr>
                            <tr>
                                <td><strong>Người tạo</strong></td>
                                <td>{{ $post->created_by }}</td>
                            </tr>
                            <tr>
                                <td><strong>Ngày cập nhật</strong></td>
                                <td>{{ $post->updated_at }}</td>
                            </tr>
                            <tr>
                                <td><strong>Người cập nhật</strong></td>
                                <td>{{ $post->updated_by }}</td>
                            </tr>
                            <tr>
                                <td><strong>Trạng thái</strong></td>
                                <td>{{ $post->status == 1 ? 'Xuất bản' : 'Chưa xuất bản' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-right">
                <a href="{{ route('admin.post.index') }}" class="btn btn-secondary">Quay lại</a>
            </div>
        </div>
    </div>
</section>
@endsection