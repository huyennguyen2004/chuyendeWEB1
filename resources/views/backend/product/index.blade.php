@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sản phẩm</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Product Page</li>
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
                    <a href="{{ route('admin.product.create') }}" class="btn btn-success btn-sm"><i
                            class="fas fa-plus"></i> Thêm mới</a>
                    <a class="btn btn-danger btn-sm" href="{{ route('admin.product.trash') }}"><i
                            class="fas fa-trash"></i> Thùng rác</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 30px;">#</th>
                                <th class="text-center" style="width:30px">ID</th>
                                <th class="text-center" style="width: 90px;">Hình</th>
                                <th class="text-center">Tên sản phẩm</th>
                                <th class="text-center">Danh mục</th>
                                <th class="text-center">Thương hiệu</th>
                                <th class="text-center" style="width:190px">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $row)
                                                        <tr>
                                                            @php
                                                                $args = ['id' => $row->id];
                                                            @endphp
                                                            <td class="text-center">
                                                                <input type="checkbox" name="checkId[]" value="{{ $row->id }}">
                                                            </td>
                                                            <td class="text-center">{{ $row->id }}</td>
                                                            <td class="text-center">
                                                                @if ($row->image)
                                                                    <img src="{{ asset('images/product/' . $row->image) }}" class="img-fluid"
                                                                        style="max-width: 100px; max-height: 100px;">
                                                                @else
                                                                    <img src="{{ asset('images/default.jpg') }}" class="img-fluid"
                                                                        style="max-width: 100px; max-height: 100px;">
                                                                @endif
                                                            </td>
                                                            <td>{{ $row->name }}</td>
                                                            <td>{{ $row->categoryname }}</td>
                                                            <td>{{ $row->brandname }}</td>
                                                            <td class="text-center">
                                                                @if ($row->status == 1)
                                                                    <a href="{{ route('admin.product.status', $args) }}" class="btn btn-primary btn-sm">
                                                                        <i class="fas fa-toggle-on"></i>
                                                                    </a>
                                                                @else
                                                                    <a href="{{ route('admin.product.status', $args) }}" class="btn btn-dark btn-sm">
                                                                        <i class="fas fa-toggle-off"></i>
                                                                    </a>
                                                                @endif
                                                                <a href="{{ route('admin.product.show', $args) }}" class="btn btn-success btn-sm"><i
                                                                        class="far fa-eye"></i></a>
                                                                <a href="{{ route('admin.product.edit', $args) }}" class="btn btn-warning btn-sm"><i
                                                                        class="far fa-edit"></i></a>
                                                                <form action="{{ route('admin.product.delete', $args) }}" method="GET"
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
    </div>
</section>
@endsection