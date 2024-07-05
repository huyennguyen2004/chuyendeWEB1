<div id="brand-slider" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner border-top border-bottom">
        @foreach ($chunkBrands(4) as $key => $brandChunk)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <div class="row">
                    @foreach ($brandChunk as $brand)
                        <div class="col-md-3">
                            <a href="{{ route('site.product.brand', ['brand_id' => $brand->id]) }}">
                                <img src="{{ asset('img/brand/' . $brand->image) }}" class="d-block w-100">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#brand-slider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#brand-slider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<style>
    #brand-slider {
        margin-bottom: 30px;
    }

    #brand-slider .carousel-item img {
        max-height: 150px;
        object-fit: contain;
    }
</style>
