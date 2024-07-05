@extends('layouts.site')

@section('content')
    <div class="row" style="background-color:aqua; padding: 15px 0;">
        <x-main-menu class="menu-large" />
    </div>
    <div class="container">
        <h2>Kết quả tìm kiếm cho: "{{ $query }}"</h2>

        @if (!$products->isEmpty())
            <h3>Sản phẩm</h3>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('img/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ number_format($product->price, 0, ',', '.') }} đ</p>
                                <a href="{{ route('site.product.detail', ['slug' => $product->slug]) }}"
                                    class="btn btn-primary">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @elseif (!$categories->isEmpty())
            <h3>Danh mục</h3>
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{ asset('img/' . $category->image) }}" class="card-img-top">
                                <h5 class="card-title">{{ $category->name }}</h5>
                                <a href="{{ route('site.product.category', ['slug' => $category->slug]) }}"
                                    class="btn btn-primary">Xem sản phẩm</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>Không tìm thấy kết quả nào.</p>
        @endif
    </div>
@endsection
