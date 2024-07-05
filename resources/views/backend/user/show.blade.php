@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thông tin người dùng</h1>
            </div>
            <div class="col-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Danh sách người dùng</a></li>
                    <li class="breadcrumb-item active">Thông tin người dùng</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $user->id }}</td>
                            </tr>
                            <tr>
                                <th>Họ tên</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>Giới tính</th>
                                <td>{{ $user->gender }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Số điện thoại</th>
                                <td>{{ $user->phone }}</td>
                            </tr>
                            <tr>
                                <th>Tên đăng nhập</th>
                                <td>{{ $user->username }}</td>
                            </tr>
                            <tr>
                                <th>Mật khẩu</th>
                                <td>{{ $user->password }}</td>
                            </tr>
                            <tr>
                                <th>Địa chỉ</th>
                                <td>{{ $user->address }}</td>
                            </tr>
                            <tr>
                                <th>Vai trò</th>
                                <td>{{ $user->roles }}</td>
                            </tr>
                            <tr>
                                <th>Hình ảnh</th>
                                <td>
                                    @if ($user->image)
                                        <img src="{{ asset('images/user/' . $user->image) }}" class="img-fluid"
                                            style="max-width: 100px; max-height: 100px;">
                                    @else
                                        <img src="{{ asset('images/default.jpg') }}" class="img-fluid"
                                            style="max-width: 100px; max-height: 100px;">
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Ngày tạo</th>
                                <td>{{ $user->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Người tạo</th>
                                <td>{{ $user->created_by }}</td>
                            </tr>
                            <tr>
                                <th>Ngày cập nhật</th>
                                <td>{{ $user->updated_at }}</td>
                            </tr>
                            <tr>
                                <th>Người cập nhật</th>
                                <td>{{ $user->updated_by }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Quay về</a>
        </div>
    </div>
</section>
@endsection