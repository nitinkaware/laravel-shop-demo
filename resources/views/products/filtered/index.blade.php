@extends('vendor.tabler.layouts.main')

@section('content')
    <div class="my-3 my-md-5">
        <div class="container">
            <product-listing :route="`{{ route('api.category.products.index', request()->route('category')) }}`">
            </product-listing>
        </div>
    </div>
@endsection