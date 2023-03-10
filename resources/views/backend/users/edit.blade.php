@extends('layouts.backend')

@section('title')
    &vert; User
@endsection

@section('content')
    <form method="POST" action="{{ route('backend.users.update', [$user->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">User - Edit</div>

                            <div class="col fs-5 text-end">
                                <img src="{{ asset('img/icons/person.png') }}" />
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <input id="id" type="hidden" name="id" value="{{ $user->id }}">

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label">Name :</label>

                            <div class="col-md-7">
                                <input id="name" name="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}"
                                    required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label">E-mail :</label>

                            <div class="col-md-7">
                                <input id="email" name="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}"
                                    required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        @isset($create)
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label">Password :</label>

                                <div class="col-md-7">
                                    <input id="password" name="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" required>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password_confirmation" class="col-md-4 col-form-label">Confirm password :</label>

                                <div class="col-md-7">
                                    <input id="password_confirmation" name="password_confirmation" type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror" required>

                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        @endisset
                        <hr class="narrow" />

                        <div class="row mb-3">
                            <label for="is_developer" class="col-md-4 col-form-label">Developer ?</label>

                            <div class="col-md-2">
                                <select class="form-select" name="is_developer" id="is_developer">
                                    <option value="0" @if ($user->is_developer == 0) selected @endif>No</option>
                                    <option value="1" @if ($user->is_developer == 1) selected @endif>Yes</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-secondary text-white btn-sm" tabindex="-1"
                                    onclick="history.back();">
                                    <i class="bi bi-arrow-left-short"></i>
                                </button>
                            </div>

                            <div class="col text-end">
                                <button type="submit" class="btn btn-primary text-white btn-sm">Send</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <div class="row">
                            <div class="col">Help</div>

                            <div class="col fs-5 text-end"><i class="bi bi-question"></i></div>
                        </div>
                    </div>

                    <div class="card-body">
                        <ul>
                            <li>Specify the values.</li>
                            <li>Click the <strong>Send</strong> button to save.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
