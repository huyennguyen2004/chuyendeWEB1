<section class="product-sale py-5" style="background-color: rgb(243, 73, 73);">
    <div class="container">
        <h3 class="p-3 mb-2 bg-white text-danger" style="padding: 0.25em 0.5em">Flash Sale</h3>
        <div class="row">
            @foreach ($product_list as $product)
                <div class="col-sm">
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
