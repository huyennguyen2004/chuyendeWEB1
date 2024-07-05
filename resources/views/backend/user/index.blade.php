@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Danh sách người dùng</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <form action="{{ route('admin.user.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm người dùng..."
                                value="{{ request()->get('search') }}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Tìm kiếm</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ route('admin.user.create') }}" class="btn btn-success btn-sm"><i
                            class="fas fa-plus"></i> Thêm mới</a>
                    <a href="{{ route('admin.user.trash') }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                        Thùng rác</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 30px;">#</th>
                            <th class="text-center">ID</th>
                            <th class="text-center">Họ tên</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Điện thoại</th>
                            <th class="text-center">Quyền</th>
                            <th class="text-center">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $row => $user)
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" name="ids[]" value="{{ $user->id }}">
                                </td>
                                <td class="text-center">{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td class="text-center">{{ $user->roles }}</td>
                                <td class="text-center">
                                    @if ($user->status == 1)
                                        <a href="{{ route('admin.user.status', $user->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-toggle-on"></i></a>
                                    @else
                                        <a href="{{ route('admin.user.status', $user->id) }}" class="btn btn-dark btn-sm">
                                            <i class="fas fa-toggle-off"></i>
                                        </a>
                                    @endif
                                    <a href="{{ route('admin.user.show', $user->id) }}" class="btn btn-success btn-sm">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.user.delete', $user->id) }}" method="GET"
                                        style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    document.getElementById('checkAll').addEventListener('change', function (e) {
        const checkboxes = document.querySelectorAll('input[name="ids[]"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = e.target.checked;
        });
    });
</script>
@endsection