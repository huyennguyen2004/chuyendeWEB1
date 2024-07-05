@extends('layouts.site')
@section('title', 'Tất cả sản phẩm')
@section('header')
    <link rel="stylesheet" href="product.css">
    <style>
        .product-list .product-card {
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .product-list .product-card img {
            width: 150px;
            height: auto;
            margin-right: 20px;
        }

        .product-grid .product-card {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .product-grid .product-card img {
            width: 100%;
            height: auto;
        }

        .product-grid .row {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .product-grid .product-card {
            max-width: 22%;
            margin: 1%;
        }

        .sort-by {
            display: flex;
            align-items: center;
            position: relative;
        }

        .sort-by select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: white url('data:image/svg+xml;utf8,<svg fill="black" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/></svg>') no-repeat right center;
            padding-right: 30px;
        }

        .sort-by::after {
            content: "";
            position: absolute;
            top: 50%;
            right: 10px;
            width: 0;
            height: 0;
            pointer-events: none;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 5px solid black;
            transform: translateY(-50%);
        }

        .sort-label {
            margin-right: 10px;
        }
    </style>
@endsection
@section('content')
    <div class="row" style="background-color:aqua; padding: 15px 0;">
        <x-main-menu class="menu-large" />
    </div>
    <div class="section_product my-5">
        <div class="container">
            <div class="product-title py-5 mb-5">
                <h2 class="text-left d-inline-block rounded mb-4 bg-info" style="border: 2px; padding: 0.25em 0.5em;">
                    Tất cả sản phẩm
                </h2>
                <div class="view-toggle float-right">
                    <button id="grid-view" class="btn btn-secondary"><i class="fas fa-th"></i></button>
                    <button id="list-view" class="btn btn-secondary"><i class="fas fa-list"></i></button>
                </div>
                <div class="sort-by float-right mr-3">
                    <span class="sort-label">Sắp xếp theo:</span>
                    <select id="sort-select" class="form-control">
                        <option value="default" {{ $sort == 'default' ? 'selected' : '' }}>Mặc định</option>
                        <option value="price-asc" {{ $sort == 'price-asc' ? 'selected' : '' }}>Giá tăng dần</option>
                        <option value="price-desc" {{ $sort == 'price-desc' ? 'selected' : '' }}>Giá giảm dần</option>
                        <option value="name-asc" {{ $sort == 'name-asc' ? 'selected' : '' }}>Tên A-Z</option>
                        <option value="name-desc" {{ $sort == 'name-desc' ? 'selected' : '' }}>Tên Z-A</option>
                    </select>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="row product-grid" id="product-container">
                        @foreach ($list_product as $productitem)
                            <div class="col-md-3 mb-4 product-card">
                                <x-product-card :product="$productitem" />
                            </div>
                        @endforeach
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 d-flex justify-content-center">
                            <ul class="pagination justify-content-center">
                                @foreach ($list_product->links()->elements[0] as $page => $url)
                                    @if ($page == $list_product->currentPage())
                                        <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                    @else
                                        <li class="page-item"><a class="page-link"
                                                href="{{ $url }}&sort={{ $sort }}">{{ $page }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const gridViewButton = document.getElementById('grid-view');
            const listViewButton = document.getElementById('list-view');
            const productContainer = document.getElementById('product-container');
            const sortSelect = document.getElementById('sort-select');

            gridViewButton.addEventListener('click', function() {
                productContainer.classList.add('product-grid');
                productContainer.classList.remove('product-list');
            });

            listViewButton.addEventListener('click', function() {
                productContainer.classList.add('product-list');
                productContainer.classList.remove('product-grid');
            });

            sortSelect.addEventListener('change', function() {
                const sortValue = this.value;
                const url = new URL(window.location.href);
                url.searchParams.set('sort', sortValue);
                window.location.href = url.href;
            });
        });
    </script>
@endsection
