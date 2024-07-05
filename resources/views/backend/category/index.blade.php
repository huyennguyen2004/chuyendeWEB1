@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Danh mục</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Danh mục</li>
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
                    <a class="btn btn-danger btn-sm" href="{{route('admin.category.trash')}}"><i class="fas fa-trash">
                            Thùng rác</i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên danh mục</label>
                            <input type="text" value="{{old('name')}}" name="name" id="name" class="form-control"
                                placeholder="Nhập tên danh mục">
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Mô tả</label>
                            <textarea name="description" id="description" class="form-control" rows="3"
                                placeholder="Nhập mô tả"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="parent_id">Danh mục cha</label>
                            <select name="parent_id" id="parent_id" class="form-control">
                                <option value="">Chọn danh mục cha</option>
                                {!!$htmlparentid!!}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sort_order">Sắp xếp</label>
                            <select name="sort_order" id="sort_order" class="form-control">
                                <option value="">None</option>
                                {!!$htmlsortorder!!}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Hình ảnh</label>
                            <input type="file" name="image" id="image" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label for="status">Trạng thái</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1">Xuất bản</option>
                                <option value="0">Chưa xuất bản</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm danh mục</button>
                    </form>
                </div>
                <div class="col-md-9">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 30px;">#</th>
                                <th class="text-center" style="width:30px">ID</th>
                                <th class="text-center" style="width: 90px;">Hình</th>
                                <th class="text-center">Tên danh mục</th>
                                <th class="text-center">Slug</th>
                                <th class="text-center" style="width:250px">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $row)
                                                        <tr>
                                                            @php
                                                                $args = ['id' => $row->id]
                                                            @endphp
                                                            <td class="text-center">
                                                                <input type="checkbox" name="checkId[]" id="checkId" value="{{ $row->id }}">
                                                            </td>
                                                            <td class="text-center">{{ $row->id }}</td>

                                                            <td class="text-center">
                                                                @if ($row->image)
                                                                    <img src="{{ asset('images/category/' . $row->image) }}" class="img-fluid"
                                                                        style="max-width: 100px; max-height: 100px;">
                                                                @else
                                                                    <img src="{{ asset('images/default.jpg') }}" class="img-fluid"
                                                                        style="max-width: 100px; max-height: 100px;">
                                                                @endif
                                                            </td>

                                                            <td>{{ $row->name }}</td>
                                                            <td>{{ $row->slug }}</td>

                                                            <td class="text-center">

                                                                @if ($row->status == 1)
                                                                    <a href="{{ route('admin.category.status', $args) }}"
                                                                        class="btn btn-primary btn-sm">
                                                                        <i class="fas fa-toggle-on"></i>
                                                                    </a>
                                                                @else
                                                                    <a href="{{ route('admin.category.status', $args) }}" class="btn btn-dark btn-sm">
                                                                        <i class="fas fa-toggle-off"></i>
                                                                    </a>
                                                                @endif

                                                                <a class="btn btn-success btn-sm"
                                                                    href="{{ route('admin.category.show', $args) }}"><i class="far fa-eye"></i></a>
                                                                <a href="{{ route('admin.category.edit', $args) }}"
                                                                    class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                                                                <form action="{{ route('admin.category.delete', $args) }}" method="GET"
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