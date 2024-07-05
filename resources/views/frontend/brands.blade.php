@extends('layouts.site')

@section('content')
    <div class="container">
        <h1>Sản phẩm của thương hiệu {{ $brand->name }} trong danh mục {{ $category->name }}</h1>

        <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <a href="{{ route('site.product.detail', ['slug' => $product->slug]) }}"><img class="card-img-top"
                                src="{{ $product->image }}" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a
                                    href="{{ route('site.product.detail', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
                            </h4>
                            <h5>{{ $product->price }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $products->links() }}
    </div>
@endsection
