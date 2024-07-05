@extends('layouts.site')
@section('content')
    <div class="row" style="background-color:aqua; padding: 15px 0;">
        <x-main-menu class="menu-large" />
    </div>
    <div class="container mt-5">
        <h2>{{ $brand->name }}</h2>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <a href="{{ route('site.product.detail', ['slug' => $product->slug]) }}">
                            <img src="{{ asset('img/product/' . $product->image) }}" class="card-img-top"
                                alt="{{ $product->name }}">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <ul class="pagination  justify-content-center">
            @if ($products->currentPage() > 1)
                <li class="page-item">
                    <a class="page-link" href="{{ $products->previousPageUrl() }}">«</a>
                </li>
            @endif

            @foreach (range(1, $products->lastPage()) as $page)
                <li class="page-item {{ $page == $products->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $products->url($page) }}">{{ $page }}</a>
                </li>
            @endforeach

            @if ($products->currentPage() < $products->lastPage())
                <li class="page-item">
                    <a class="page-link" href="{{ $products->nextPageUrl() }}">»</a>
                </li>
            @endif
        </ul>

    </div>
@endsection
