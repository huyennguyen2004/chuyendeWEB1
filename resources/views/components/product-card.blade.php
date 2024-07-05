<div class="card product-card">
    <a href="{{ route('site.product.detail', ['slug' => $product->slug]) }}"
        style="text-decoration: none; color: inherit;">
        <img src="{{ asset('img/product/' . $product->image) }}" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <div class="pricesale">
                <div class="row">
                    @if ($product->pricesale == 0)
                        <p class="card-text">{{ number_format($product->price) }} VNĐ</p>
                    @else
                        <p class="card-text">
                            {{ number_format($product->pricesale) }} VNĐ<del>{{ number_format($product->price) }}
                                VNĐ</del>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </a>
</div>
