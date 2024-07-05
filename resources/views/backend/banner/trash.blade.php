@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Banner - Thùng rác</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Trash</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('admin.banner.index') }}"><i
                            class="fas fa-arrow-left"></i> Quay lại</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">ID</th>
                        <th class="text-center">Hình</th>
                        <th class="text-center">Tên</th>
                        <th class="text-center">Liên kết</th>
                        <th class="text-center">Vị trí</th>
                        <th class="text-center">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $row)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $row->id }}</td>
                            <td class="text-center">
                                <img src="{{ asset('storage/' . $row->image) }}" alt="{{ $row->name }}"
                                    style="width: 50px; height: 50px;">
                            </td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->link }}</td>
                            <td class="text-center">{{ $row->position }}</td>
                            <td class="text-center">
                                <a class="btn btn-success btn-sm" href="{{ route('admin.banner.restore', $row->id) }}"><i
                                        class="fas fa-undo"></i></a>

                                <form action="{{ route('admin.banner.destroy', $row->id) }}" method="POST"
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