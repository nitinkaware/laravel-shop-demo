@extends('vendor.tabler.layouts.main')

@section('content')
    <div class="my-3 my-md-5">
        <div class="container">
            <product-view :product="{{ $product->toJson() }}" :top-products="{{ $topProducts->toJson() }}">
            </product-view>
        </div>
    </div>
@endsection