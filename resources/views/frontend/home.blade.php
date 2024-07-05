@extends('layouts.site')
@section('title', 'Trang chủ')
@section('content')
    <div class="row" style="background-color:aqua; padding: 15px 0;">
        <x-main-menu class="menu-large" />
    </div>
    <x-slider />
    <x-product-new />
    <x-sale />
    <x-product-category-home />
    <x-post-component />
    <x-brand-slider />
@endsection
