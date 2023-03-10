@extends('layouts.backend')

@section('content')
    <div class="row mb-3">
        <div class="col-md-6">
            @include('backend.components.home-links')
        </div>

        <div class="col-md-6">
            @include('backend.components.home-stats')
        </div>
    </div>
@endsection
