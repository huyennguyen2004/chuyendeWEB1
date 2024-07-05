@extends('layouts.admin')

@section('content')
<section class="content-header">
</section>
<section class="content">
    <div class="card">
        <div class="card-body">
            <h2>Thông tin chi tiết danh mục</h2>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td><strong>ID</strong></td>
                        <td>{{ $category->id }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tên danh mục</strong></td>
                        <td>{{ $category->name }}</td>
                    </tr>
                    <tr>
                        <td><strong>Slug</strong></td>
                        <td>{{ $category->slug }}</td>
                    </tr>
                    <tr>
                        <td><strong>Hình ảnh</strong></td>
                        <td>
                            @if ($category->image)
                                <img src="{{ asset('images/category/' . $category->image) }}" class="img-fluid"
                                    style="max-width: 200px; height: auto;">
                            @else
                                <p>Không có hình ảnh</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Parent ID</strong></td>
                        <td>{{ $category->parent_id }}</td>
                    </tr>
                    <tr>
                        <td><strong>Sort Order</strong></td>
                        <td>{{ $category->sort_order }}</td>
                    </tr>
                    <tr>
                        <td><strong>Mô tả</strong></td>
                        <td>{{ $category->description }}</td>
                    </tr>
                    <tr>
                        <td><strong>Created_at</strong></td>
                        <td>{{ $category->created_at }}</td>
                    </tr>
                    <tr>
                        <td><strong>Created_by</strong></td>
                        <td>{{ $category->created_by }}</td>
                    </tr>
                    <tr>
                        <td><strong>Updated_at</strong></td>
                        <td>{{ $category->updated_at }}</td>
                    </tr>
                    <tr>
                        <td><strong>Updated_by</strong></td>
                        <td>{{ $category->updated_by }}</td>
                    </tr>
                    <tr>
                        <td><strong>Trạng thái</strong></td>
                        <td>{{ $category->status == 1 ? 'Xuất bản' : 'Chưa xuất bản' }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="text-right">
                <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Quay lại</a>
            </div>
        </div>
    </div>
</section>
@endsection