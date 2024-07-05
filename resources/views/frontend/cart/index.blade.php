@extends('layouts.site')

@section('title', 'Giỏ hàng')

@section('content')
    <div class="container mt-4">
        <div class="text-left">
            <h2>Giỏ hàng</h2>
        </div>
        @if (count($list_cart) > 0)
            <div class="table-responsive mt-4">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Hình</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Thành tiền</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_cart as $row_cart)
                            <tr>
                                <td>{{ $row_cart['id'] }}</td>
                                <td>{{ $row_cart['name'] }}</td>
                                <td><img class="img-fluid" src="{{ asset('img/' . $row_cart['image']) }}"></td>
                                <td>{{ $row_cart['qty'] }}</td>
                                <td>{{ number_format($row_cart['price']) }} VNĐ</td>
                                <td>{{ number_format($row_cart['qty'] * $row_cart['price']) }} VNĐ</td>
                                <td>
                                    <form action="{{ route('cart.remove', ['id' => $row_cart['id']]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="text-center mt-4">
                <h4>Tổng tiền: {{ number_format($totalPrice) }} VNĐ</h4>
                <a href="{{ route('site.checkout') }}" class="btn btn-primary">Thanh toán</a>
            </div>
        @else
            <div class="text-center mt-4">
                <p>Giỏ hàng của bạn đang trống.</p>
                <a href="/" class="text-decoration-none">
                    <i class="fa-solid fa-cart-plus fa-5x"></i>
                </a>
            </div>
        @endif
    </div>
@endsection
