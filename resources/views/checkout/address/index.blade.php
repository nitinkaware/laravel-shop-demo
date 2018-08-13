@extends('vendor.tabler.layouts.main')

@section('content')
    <div class="my-3 my-md-5">
        <div class="container">
            <address-checkout :prop-addresses="{{ $addresses }}"
                              :prop-cart="{{ $cart }}"
            >
            </address-checkout>
        </div>
    </div>
@endsection