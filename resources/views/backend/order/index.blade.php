@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Đơn hàng</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Đơn hàng</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6 text-left">
                    <form action="{{ route('admin.order.search') }}" method="GET" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="query" class="form-control" placeholder="Tìm kiếm..." required>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary">
                                    <i class="fas fa-search"></i> Tìm kiếm
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ route('admin.order.trash') }}" class="btn btn-danger btn-sm"><i
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
                        <th class="text-center">Họ tên khách hàng</th>
                        <th class="text-center">Điện thoại</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Ngày đặt hàng</th>
                        <th class="text-center">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $order)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" name="checkId[]" id="checkId" value="{{ $order->id }}">
                            </td>
                            <td class="text-center">{{ $order->id }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td class="text-center">
                                @if ($order->status == 1)
                                    <a href="{{ route('admin.order.status', $order->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-toggle-on"></i>
                                    </a>
                                @else
                                    <a href="{{ route('admin.order.status', $order->id) }}" class="btn btn-dark btn-sm">
                                        <i class="fas fa-toggle-off"></i>
                                    </a>
                                @endif

                                <a class="btn btn-success btn-sm" href="{{ route('admin.order.show', $order->id) }}"><i
                                        class="far fa-eye"></i></a>

                                <form action="{{ route('admin.order.delete', $order->id) }}" method="GET"
                                    style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach            </tbody>
            </table>
        </div>
    </div>
</section>
@endsection