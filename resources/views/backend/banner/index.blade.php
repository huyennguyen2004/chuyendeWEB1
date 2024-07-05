@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Banner</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Banner</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h6>Thêm Banner Mới</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên Banner</label>
                            <input type="text" class="form-control" id="name" name="name">
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="link">Liên kết</label>
                            <input type="text" class="form-control" id="link" name="link">
                            @error('link')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Mô tả</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="position">Vị trí</label>
                            <input type="text" class="form-control" id="position" name="position">
                            @error('position')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
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
                            <select name="status" id="status" class="form-control" required>
                                <option value="1">Xuất bản</option>
                                <option value="0">Chưa xuất bản</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12 text-right">
                            <a class="btn btn-danger btn-sm" href="{{ route('admin.banner.trash') }}"><i
                                    class="fas fa-trash"></i> Thùng rác</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
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
                                        <td class="text-center">
                                            <input type="checkbox" name="checkId[]" id="checkId" value="{{ $row->id }}">
                                        </td>
                                        <td class="text-center">{{ $row->id }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset('images/banner/' . $row->image) }}" alt="{{ $row->name }}"
                                                style="width: 50px; height: 50px;">
                                        </td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->link }}</td>
                                        <td class="text-center">{{ $row->position }}</td>
                                        <td class="text-center">
                                            @if ($row->status == 1)
                                                <a href="{{ route('admin.banner.status', $row->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fas fa-toggle-on"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('admin.banner.status', $row->id) }}"
                                                    class="btn btn-dark btn-sm">
                                                    <i class="fas fa-toggle-off"></i>
                                                </a>
                                            @endif
                                            <a class="btn btn-success btn-sm"
                                                href="{{ route('admin.banner.show', $row->id) }}"><i
                                                    class="far fa-eye"></i></a>
                                            <a class="btn btn-warning btn-sm"
                                                href="{{ route('admin.banner.edit', $row->id) }}"><i
                                                    class="far fa-edit"></i></a>
                                            <form action="{{ route('admin.banner.delete', $row->id) }}" method="GET"
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
    </div>
</section>
@endsection