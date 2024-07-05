@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết Menu</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Chi tiết Menu</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Chi tiết Menu</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" class="form-control" id="id" value="{{ $menu->id }}" readonly>
            </div>
            <div class="form-group">
                <label for="table_id">Table ID</label>
                <input type="text" class="form-control" id="table_id" value="{{ $menu->table_id }}" readonly>
            </div>
            <div class="form-group">
                <label for="name">Tên</label>
                <input type="text" class="form-control" id="name" value="{{ $menu->name }}" readonly>
            </div>
            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" class="form-control" id="link" value="{{ $menu->link }}" readonly>
            </div>
            <div class="form-group">
                <label for="status">Trạng thái:</label>
                <input type="text" id="status" class="form-control"
                    value="{{ $menu->status == 1 ? 'Xuất bản' : 'Chưa xuất bản' }}" readonly>
            </div>
            <a href="{{ route('admin.menu.index') }}" class="btn btn-secondary">Quay về</a>
        </div>
    </div>
</section>
@endsection