@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm mới người dùng</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thêm mới người dùng</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Họ tên</label>
                    <input type="text" id="name" name="name" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="gender">Giới tính</label>
                    <select name="gender" class="form-control" id="gender" required>
                        <option value="male">Nam</option>
                        <option value="female">Nữ</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" id="phone" name="phone" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <textarea name="address" id="address" class="form-control" autocomplete="off" required></textarea>
                </div>
                <div class="form-group">
                    <label for="username">Tên đăng nhập</label>
                    <input type="text" autocomplete="off" id="username" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" name="password" class="form-control" id="password" autocomplete="off"
                        required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Xác nhận mật khẩu</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                        autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="roles">Quyền</label>
                    <select name="roles" class="form-control" autocomplete="off" id="roles" required>
                        <option value="customer">Khách hàng</option>
                        <option value="admin">Quản lý</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Trạng thái</label>
                    <select name="status" class="form-control" id="status" autocomplete="off" required>
                        <option value="1">Hoạt động</option>
                        <option value="0">Không hoạt động</option>
                    </select>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <a href="{{ route('admin.user.index') }}" class="btn btn-default">Quay về</a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection