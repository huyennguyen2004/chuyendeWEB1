@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Menu</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Menu</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="row">
        <!-- Left Sidebar Menu -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <div class="form-group">
                        <label for="status">Vị trí</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1">Xuất bản</option>
                            <option value="0">Chưa xuất bản</option>
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <div class="menu-item" onclick="toggleCheckbox(this)">
                        <label>Danh mục</label>
                        <div class="extra-options" style="display: none;">
                            <div>
                                <input type="checkbox" class="form-control-inline"> Default checkbox
                            </div>
                            <button class="btn btn-primary btn-sm mt-2">Thêm</button>
                        </div>
                    </div>
                    <div class="menu-item" onclick="toggleCheckbox(this)">
                        <label>Thương hiệu</label>
                        <div class="extra-options" style="display: none;">
                            <div>
                                <input type="checkbox" class="form-control-inline"> Default checkbox
                            </div>
                            <button class="btn btn-primary btn-sm mt-2">Thêm</button>
                        </div>
                    </div>
                    <div class="menu-item" onclick="toggleCheckbox(this)">
                        <label>Chủ đề</label>
                        <div class="extra-options" style="display: none;">
                            <div>
                                <input type="checkbox" class="form-control-inline"> Default checkbox
                            </div>
                            <button class="btn btn-primary btn-sm mt-2">Thêm</button>
                        </div>
                    </div>
                    <div class="menu-item" onclick="toggleCheckbox(this)">
                        <label>Trang đơn</label>
                        <div class="extra-options" style="display: none;">
                            <div>
                                <input type="checkbox" class="form-control-inline"> Default checkbox
                            </div>
                            <button class="btn btn-primary btn-sm mt-2">Thêm</button>
                        </div>
                    </div>
                    <div class="menu-item" onclick="toggleCheckbox(this)">
                        <label>Tùy biến liên kết</label>
                        <div class="extra-options" style="display: none;">
                            <div class="form-group">
                                <label for="menuName">Tên menu</label>
                                <input type="text" class="form-control" id="menuName" placeholder="Enter menu name">
                            </div>
                            <div class="form-group">
                                <label for="menuLink">Liên kết</label>
                                <input type="text" class="form-control" id="menuLink" placeholder="Enter menu link">
                            </div>
                            <button class="btn btn-primary">Thêm</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1">Xuất bản</option>
                            <option value="0">Chưa xuất bản</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12 text-right">
                            <a class="btn btn-danger btn-sm" href="{{route("admin.menu.trash")}}"><i
                                    class="fas fa-trash"></i> Thùng rác</a>
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

                                        @if ($row->status == 1)
                                            <a href="{{ route('admin.menu.status', $row->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-toggle-on"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('admin.menu.status', $row->id) }}" class="btn btn-dark btn-sm">
                                                <i class="fas fa-toggle-off"></i>
                                            </a>
                                        @endif


                                        <a class="btn btn-success btn-sm" href="{{ route('admin.menu.show', $row->id) }}"><i
                                                class="far fa-eye"></i></a>
                                        <a class="btn btn-warning btn-sm" href="{{ route('admin.menu.edit', $row->id) }}"><i
                                                class="far fa-edit"></i></a>

                                        <form action="{{ route('admin.menu.delete', $row->id) }}" method="GET"
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

<script>
    function toggleCheckbox(element) {
        var extraOptions = element.querySelector('.extra-options');
        if (extraOptions.style.display === "none") {
            extraOptions.style.display = "block";
        } else {
            extraOptions.style.display = "none";
        }
    }
</script>
@endsection