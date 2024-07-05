  <div class="row">
      @foreach ($product_list as $product)
          <div class="col-md-2" style="padding: 10px; box-sizing: border-box;">
              <x-product-card :product="$product" />
          </div>
      @endforeach
  </div>
