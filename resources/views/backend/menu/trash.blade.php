@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thùng rác Menu</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Thùng rác Menu</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12 text-right">
                            <a href="{{ route('admin.menu.index') }}" class="btn btn-primary btn-sm">
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
                                <th class="text-center">Tên menu</th>
                                <th class="text-center">Liên kết</th>
                                <th class="text-center">Vị trí</th>
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
                                    <td>{{ $row->link }}</td>
                                    <td class="text-center">{{ $row->position }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.menu.restore', $row->id) }}"
                                            class="btn btn-success btn-sm">
                                            <i class="fas fa-undo"></i>
                                        </a>
                                        <form action="{{ route('admin.menu.destroy', $row->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection