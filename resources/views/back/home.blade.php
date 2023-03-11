@extends('layouts.back')

@section('content')
    <div class="row mb-2">
        <div class="col-xxl-6">
            @include('back.components.home-links')
        </div>

        <div class="col-xxl-6">
            @include('back.components.home-stats')
        </div>
    </div>
@endsection
