@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Liên hệ</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Liên hệ</li>
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
                    <form action="{{ route('admin.contact.search') }}" method="GET" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="query" class="form-control" placeholder="Tìm kiếm..." required>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary">
                                    <i class="fas fa-search"></i> Tìm kiếm
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ route('admin.contact.index') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-arrow-left"></i> Quay lại
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">ID</th>
                        <th class="text-center">Họ Tên</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Số điện thoại</th>
                        <th class="text-center">Tiêu đề</th>
                        <th class="text-center">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $row)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" name="checkId[]" id="checkId" value="{{ $row->id }}">
                            </td>
                            <td class="text-center">{{ $row->id }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>{{ $row->title }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.contact.restore', $row->id) }}" class="btn btn-primary btn-sm"><i
                                        class="fas fa-undo"></i></a>

                                <form action="{{ route('admin.contact.destroy', $row->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-ban"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection