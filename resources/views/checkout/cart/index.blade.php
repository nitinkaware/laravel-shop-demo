@extends('vendor.tabler.layouts.main')

@section('content')
    <div class="my-3 my-md-5">
        <div class="container">
            <cart-checkout :prop-items-in-cart="{{ $itemsInCart->response()->getContent() }}">
            </cart-checkout>
        </div>
    </div>
@endsection