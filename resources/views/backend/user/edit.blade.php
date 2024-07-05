@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chỉnh sửa người dùng</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Chỉnh sửa người dùng</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thông tin người dùng</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="id">ID</label>
                    <input type="text" class="form-control" value="{{ $user->id }}" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Họ tên</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                </div>
                <div class="form-group">
                    <label for="username">Tên đăng nhập</label>
                    <input type="text" name="username" class="form-control" value="{{ $user->username }}">
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input type="text" name="address" class="form-control" value="{{ $user->address }}">
                </div>
                <div class="form-group">
                    <label for="roles">Vai trò</label>
                    <select name="roles" class="form-control">
                        <option value="admin" {{ $user->roles == 'admin' ? 'selected' : '' }}>Quản lý</option>
                        <option value="customer" {{ $user->roles == 'customer' ? 'selected' : '' }}>Khách hàng
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Trạng thái</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Hoạt động</option>
                        <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Không hoạt động</option>
                    </select>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <a href="{{ route('admin.user.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection