@extends('layouts.backend')

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col">Session object</div>

                <div class="col fs-5 text-end">
                    <img src="{{ asset('img/icons/variable.png') }}" />
                </div>
            </div>
        </div>

        <div class="card-body">
            <pre>{{ print_r(session()->all(), true) }}</pre>
        </div>
    </div>
@endsection
