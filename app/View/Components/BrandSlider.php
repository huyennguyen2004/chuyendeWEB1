<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Brand;

class BrandSlider extends Component
{
    public $brands;

    public function __construct()
    {
        $this->brands = Brand::where('status', 1)->get();
    }

    public function render()
    {
        return view('components.brand-slider');
    }

    public function chunkBrands($chunkSize)
    {
        return $this->brands->chunk($chunkSize);
    }
}