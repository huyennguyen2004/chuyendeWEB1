@extends('layouts.admin')

@section('content')
<section class="content-header">
</section>
<section class="content">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Tên Banner</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $banner->name }}" required>
                </div>

                <div class="form-group">
                    <label for="link">Liên kết</label>
                    <input type="text" name="link" id="link" class="form-control" value="{{ $banner->link }}" required>
                </div>

                <div class="form-group">
                    <label for="description">Mô tả</label>
                    <textarea name="description" id="description" class="form-control"
                        rows="3">{{ $banner->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="position">Vị trí</label>
                    <input type="text" class="form-control" id="position" name="position" placeholder="Nhập vị trí"
                        required>
                </div>
                <div class="form-group">
                    <label for="sort_order">Sắp xếp</label>
                    <select name="sort_order" id="sort_order" class="form-control">
                        <option value=""></option>
                        {!!$htmlsortorder!!}
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Hình ảnh</label>
                    @if($banner->image)
                        <div>
                            <img src="{{ asset('images/banner/' . $banner->image) }}" class="img-thumbnail" width="150">
                        </div>
                    @endif
                    <input type="file" name="image" id="image" class="form-control-file mt-2">
                </div>
                <div class="form-group">
                    <label for="status">Trạng thái</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="1" {{ $banner->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                        <option value="0" {{ $banner->status == 0 ? 'selected' : '' }}>Chưa xuất bản</option>
                    </select>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <a href="{{ route('admin.banner.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection