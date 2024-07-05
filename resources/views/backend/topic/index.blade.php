@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Danh sách chủ đề</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh sách chủ đề</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <form action="{{ route('admin.topic.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên chủ đề</label>
                            <input type="text" name="name" class="form-control" id="name" autocomplete="off">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Mô tả</label>
                            <textarea name="description" class="form-control" id="description" autocomplete="off"
                                rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="sort_order">Sắp xếp</label>
                            <select name="sort_order" id="sort_order" class="form-control" autocomplete="off">
                                <option value="">None</option>
                                {!! $htmlsortorder !!}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Trạng thái</label>
                            <select name="status" id="status" class="form-control" required autocomplete="off">
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
                            <a href="{{route('admin.topic.trash')}}" class="btn btn-danger btn-sm"><i
                                    class="fas fa-trash"></i> Thùng rác</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 30px;">#</th>
                                <th class="text-center" style="width: 30px;">ID</th>
                                <th class="text-center">Tên chủ đề</th>
                                <th class="text-center">Slug</th>
                                <th class="text-center" style="width: 190px;">Chức năng</th>
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

                                        @if ($row->status == 1)
                                            <a href="{{ route('admin.topic.status', $row->id) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="fas fa-toggle-on"></i></a>
                                        @else
                                            <a href="{{ route('admin.topic.status', $row->id) }}" class="btn btn-dark btn-sm">
                                                <i class="fas fa-toggle-off"></i>
                                            </a>
                                        @endif

                                        <a href="{{ route('admin.topic.show', $row->id) }}"
                                            class="btn btn-success btn-sm"><i class="far fa-eye"></i></a>
                                        <a href="{{ route('admin.topic.edit', $row->id) }}"
                                            class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                                        <form action="{{ route('admin.topic.delete', $row->id) }}" method="GET"
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