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
            <d class="row">
                <div class="col-12 text-right">
                    <a class="btn btn-danger btn-sm" href="{{route('admin.contact.trash')}}"><i class="fas fa-trash">
                            Thùng rác</i></a>
                </div>
                <div class="row">
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

                                @if ($row->status == 1)
                                    <a href="{{ route('admin.contact.status', $row->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-toggle-on"></i>
                                    </a>
                                @else
                                    <a href="{{ route('admin.contact.status', $row->id) }}" class="btn btn-dark btn-sm">
                                        <i class="fas fa-toggle-off"></i>
                                    </a>
                                @endif

                                <a class="btn btn-success btn-sm" href="{{ route('admin.contact.show', $row->id) }}"><i
                                        class="far fa-eye"></i></a>
                                <a class="btn btn-warning btn-sm" href="{{ route('admin.contact.edit', $row->id) }}"><i
                                        class="far fa-edit"></i>Trả lời</a>

                                <form action="{{ route('admin.contact.delete', $row->id) }}" method="GET"
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
</section>
@endsection