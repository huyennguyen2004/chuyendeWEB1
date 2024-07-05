@extends('layouts.site')
@section('title', 'Chi tiết')
@section('content')
    <section id="product-detail" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('img/product/' . $product->image) }}" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h1>{{ $product->name }}</h1>
                    <p>{{ $product->description }}</p>
                    <div class="price-section mb-3">
                        @if ($product->pricesale == 0)
                            <p class="card-text">{{ number_format($product->price) }} VNĐ</p>
                        @else
                            <p class="card-text">
                                {{ number_format($product->pricesale) }} VNĐ<del
                                    class="ms-2">{{ number_format($product->price) }} VNĐ</del>
                            </p>
                        @endif
                    </div>
                    <div class="quantity-buttons mt-3">
                        <button class="btn btn-secondary" id="decrease-quantity">-</button>
                        <input type="number" id="qty" value="1" min="1" class="form-control d-inline"
                            style="width: 70px; text-align: center;">
                        <button class="btn btn-secondary" id="increase-quantity">+</button>
                    </div>
                    <div class="mt-3">
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-info" id="add-to-cart"
                                    onclick="handleAddCart({{ $product->id }})">Thêm vào giỏ hàng</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-success" id="buy-now">Đặt mua</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <h4>Chi tiết</h4>
                <p>{{ $product->detail }}</p>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-12">
                <h4>Sản phẩm liên quan</h4>
                <div class="row">
                    @foreach ($list_product as $productitem)
                        <div class="col-md-4 mb-4">
                            <x-product-card :product="$productitem" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection

@section('footer')
    <script>
        function handleAddCart(productid) {
            var qty = document.getElementById("qty").value;
            $.ajax({
                type: 'GET',
                url: "{{ route('site.cart.add') }}",
                data: {
                    productid: productid,
                    qty: qty
                },
                success: function(result) {
                    document.getElementById("showqty").innerHTML = result;
                    alert("Thêm thành công");
                },
                error: function(xhr) {
                    alert("Có lỗi xảy ra: " + xhr.responseText);
                }
            });
        }

        $(document).ready(function() {
            $('#increase-quantity').click(function() {
                var currentValue = parseInt($('#qty').val());
                $('#qty').val(currentValue + 1);
            });

            $('#decrease-quantity').click(function() {
                var currentValue = parseInt($('#qty').val());
                if (currentValue > 1) {
                    $('#qty').val(currentValue - 1);
                }
            });
        });
    </script>
@endsection
