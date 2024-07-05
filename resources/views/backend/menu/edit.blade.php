@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chỉnh sửa Menu</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Chỉnh sửa Menu</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Chỉnh sửa Menu</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.menu.update', $menu->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Tên Menu</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $menu->name }}" required>
                </div>
                <div class="form-group">
                    <label for="link">Liên kết</label>
                    <input type="text" name="link" class="form-control" id="link" value="{{ $menu->link }}" required>
                </div>
                <div class="form-group">
                    <label for="status">Trạng thái</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="1" {{ $menu->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                        <option value="0" {{ $menu->status == 0 ? 'selected' : '' }}>Chưa xuất bản</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="{{ route('admin.menu.index') }}" class="btn btn-secondary">Quay về</a>
            </form>
        </div>
    </div>
</section>
@endsection