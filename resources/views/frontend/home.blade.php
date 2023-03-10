@extends('layouts.frontend')

@section('content')
    <div class="row">
        <div class="col-xl-6">
            @include('frontend.components.welcome')
        </div>

        <div class="col-xl-6">
            @include('frontend.components.carousel')
        </div>
    </div>
@endsection
