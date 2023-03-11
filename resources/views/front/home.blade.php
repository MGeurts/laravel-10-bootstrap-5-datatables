@extends('layouts.front')

@section('content')
    <div class="row">
        <div class="col-xl-6">
            @include('front.components.welcome')
        </div>

        <div class="col-xl-6">
            @include('front.components.carousel')
        </div>
    </div>
@endsection
