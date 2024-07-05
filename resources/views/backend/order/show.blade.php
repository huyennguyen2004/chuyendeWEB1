@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết đơn hàng</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.order.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Trạng thái
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Đơn hàng mới</a>
                        <a class="dropdown-item" href="#">Đã xác nhận</a>
                        <a class="dropdown-item" href="#">Đóng gói</a>
                        <a class="dropdown-item" href="#">Vận chuyển</a>
                        <a class="dropdown-item" href="#">Đã giao hàng</a>
                        <a class="dropdown-item" href="#">Đã hủy</a>
                    </div>
                </div>
                <div class="col-4 text-right">
                    <button class="btn btn-primary" onclick="changeStatus()">Đổi trạng thái</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <!-- Thông tin đơn hàng -->
            <div class="form-group">
                <label for="name">Họ tên</label>
                <input type="text" id="name" class="form-control" value="{{ $order->name }}" readonly>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control" value="{{ $order->email }}" readonly>
            </div>
            <div class="form-group">
                <label for="phone">Điện thoại</label>
                <input type="text" id="phone" class="form-control" value="{{ $order->phone }}" readonly>
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ</label>
                <input type="text" id="address" class="form-control" value="{{ $order->address }}" readonly>
            </div>
            <div class="form-group">
                <label for="order_date">Ngày đặt</label>
                <input type="text" id="order_date" class="form-control" value="{{ $order->created_at }}" readonly>
            </div>

            <!-- Chi tiết sản phẩm -->
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderDetails as $item)
                        <tr>
                            <td><img src="{{ $item->product->image_url }}" alt="Hình ảnh" class="img-fluid" width="100">
                            </td>
                            <td>
                                @if ($item->product)
                                    {{ $item->product->name }}
                                @else
                                    Sản phẩm không tồn tại
                                @endif
                            </td>
                            <td>{{ number_format($item->price) }} VND</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->price * $item->quantity) }} VND</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-right">
                <a href="{{ route('admin.order.index') }}" class="btn btn-success">Quay lại</a>
            </div>
        </div>
    </div>
</section>

<script>
    function changeStatus() {
        // Function to handle status change
    }
</script>
@endsection