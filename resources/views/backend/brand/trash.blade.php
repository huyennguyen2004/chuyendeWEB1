@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thùng rác thương hiệu</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Thùng rác thương hiệu</li>
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
                    <a href="{{ route('admin.brand.index') }}" class="btn btn-primary btn-sm"><i
                            class="fas fa-arrow-left"></i> Quay lại</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 30px;">#</th>
                            <th class="text-center" style="width:30px">ID</th>
                            <th class="text-center">Tên thương hiệu</th>
                            <th class="text-center">Slug</th>
                            <th class="text-center" style="width: 90px;">Hình</th>
                            <th class="text-center" style="width:250px">Chức năng</th>
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
                                <td>{{ $row->slug }}</td>
                                <td class="text-center">
                                    @if ($row->image)
                                        <img src="{{ asset('images/brand/' . $row->image) }}" class="img-fluid"
                                            style="max-width: 60px; max-height: 60px;">
                                    @else
                                        <img src="{{ asset('images/default.jpg') }}" class="img-fluid"
                                            style="max-width: 60px; max-height: 60px;">
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.brand.restore', $row->id) }}" class="btn btn-success btn-sm">
                                        <i class="fas fa-undo"></i>
                                    </a>
                                    <form action="{{ route('admin.brand.destroy', $row->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                class="fas fa-ban"></i></button>
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