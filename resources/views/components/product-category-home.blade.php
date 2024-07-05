@foreach ($category_list as $cat_row)
    <div class="section_product_category">
        <div class="container">
            <h2 class="d-inline-block rounded mb-4 bg-info mt-4" style="border: 2px; padding: 0.25em 0.5em;">
                {{ $cat_row->name }}</h2>
            <div class="row">
                <div class="col-12">
                    <x-product-category :catrow="$cat_row" />
                    <div class="row mt-5">
                        <div class="col-12 text-center">
                            <a href="{{ route('site.product.category', ['slug' => $cat_row->slug]) }}"
                                class="btn btn-warning px-5 mb-4">Xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
