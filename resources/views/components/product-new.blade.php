<section class="product-new py-5">
    <div class="container">
        <h3 class="d-inline-block rounded mb-4 bg-info" style="border: 2px; padding: 0.25em 0.5em;">Sản phẩm mới</h3>
        <div class="row">
            @foreach ($product_list as $product)
                <div class="col-md">
                    <x-product-card :product="$product" />
                </div>
            @endforeach
        </div>
        <div class="row mt-2">
            <div class="col-12 text-center">
                <a href="{{ route('site.product') }}" class="btn btn-warning px-5">Xem thêm</a>
            </div>
        </div>
    </div>
</section>
