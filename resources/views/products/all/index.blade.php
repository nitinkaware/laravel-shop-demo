@extends('vendor.tabler.layouts.main')

@section('content')
    <div class="my-3 my-md-5">
        <div class="container">
            <product-listing :route="`{{ route('api.products.all.index') }}`">
            </product-listing>
        </div>
    </div>
@endsection