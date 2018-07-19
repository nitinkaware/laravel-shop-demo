@extends('vendor.tabler.layouts.main')

@section('content')
    <div class="my-3 my-md-5">
        <div class="container">
            <filtered-product-listing :prop-category="{{ json_encode(['type' => request()->route('category')]) }}"></filtered-product-listing>
        </div>
    </div>
@endsection