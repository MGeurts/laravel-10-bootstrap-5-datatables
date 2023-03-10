@extends('layouts.backend')

@section('title')
    &vert; Customer
@endsection

@section('content')
    <form method="POST" action="{{ route('backend.customers.update', [$customer->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-7">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">Customert - Edit</div>

                            <div class="col text-center">
                                <strong>{{ str_pad($customer->id, 5, '0', STR_PAD_LEFT) }}</strong>
                            </div>

                            <div class="col fs-5 text-end">
                                <img src="{{ asset('img/icons/person.png') }}" />
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row mb-2">
                            <label for="customer_last_name" class="col-md-3 col-form-label">Last name :</label>

                            <div class="col-md-8">
                                <input id="customer_last_name" name="customer_last_name" type="text"
                                    class="form-control @error('customer_last_name') is-invalid @enderror"
                                    value="{{ $customer->customer_last_name }}" autofocus>

                                @error('customer_last_name')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="customer_first_name" class="col-md-3 col-form-label">First name :</label>

                            <div class="col-md-8">
                                <input id="customer_first_name" name="customer_first_name" type="text"
                                    class="form-control @error('customer_first_name') is-invalid @enderror"
                                    value="{{ $customer->customer_first_name }}">

                                @error('customer_first_name')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <hr class="narrow" />

                        <div class="row mb-2">
                            <label for="company_name" class="col-md-3 col-form-label">Company :</label>

                            <div class="col-md-8">
                                <input id="company_name" name="company_name" type="text"
                                    class="form-control @error('company_name') is-invalid @enderror"
                                    value="{{ $customer->company_name }}">

                                @error('company_name')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="company_vat" class="col-md-3 col-form-label">VAT N° :</label>

                            <div class="col-md-8">
                                <input id="company_vat" name="company_vat" type="text"
                                    class="form-control @error('company_vat') is-invalid @enderror"
                                    value="{{ $customer->company_vat }}">

                                @error('company_vat')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <hr class="narrow" />

                        <div class="row mb-2">
                            <label for="address_street" class="col-md-3 col-form-label">
                                Street, number :
                            </label>

                            <div class="col-md-6">
                                <input id="address_street" name="address_street" type="text"
                                    class="form-control @error('address_street') is-invalid @enderror"
                                    value="{{ $customer->address_street }}">

                                @error('address_street')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-2">
                                <input id="address_number" name="address_number" type="text"
                                    class="form-control @error('address_number') is-invalid @enderror"
                                    value="{{ $customer->address_number }}">

                                @error('address_number')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="address_country" class="col-md-3 col-form-label">
                                Country, postal code, place :
                            </label>

                            <div class="col-md-2">
                                <select name="address_country" id="address_country" class="form-select">
                                    <option value="">Choose ...</option>
                                    @foreach ($countries as $country)
                                        @if ($country->iso2 == $customer->address_country)
                                            <option value="{{ $country->iso2 }}" selected>{{ $country->name }}
                                            </option>
                                        @else
                                            <option value="{{ $country->iso2 }}">{{ $country->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('address_country')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-2">
                                <input id="address_postal_code" name="address_postal_code" type="text"
                                    class="form-control @error('address_postal_code') is-invalid @enderror"
                                    value="{{ $customer->address_postal_code }}">

                                @error('address_postal_code')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="address_place" name="address_place" type="text"
                                    class="form-control @error('address_place') is-invalid @enderror"
                                    value="{{ $customer->address_place }}">

                                @error('address_place')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-1">
                                <button type="button" class="btn btn-outline-secondary btn-sm" id="btnMapFacturation"
                                    name="btnMapFacturation" title="Show address on map" tabindex="-1">
                                    <img src="{{ asset('img/icons/google-maps-location.png') }}"
                                        class="img-fluid mx-auto d-block" />
                                </button>
                            </div>
                        </div>
                        <hr class="narrow" />

                        <div class="row mb-2">
                            <label for="phone" class="col-md-3 col-form-label">Phone :</label>

                            <div class="col-md-8">
                                <div class="input-group">
                                    <input id="phone" name="phone" type="text"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ $customer->phone }}">
                                    <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                </div>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <label for="email" class="col-md-3 col-form-label">E-mail :</label>

                            <div class="col-md-8">
                                <div class="input-group">
                                    <input id="email" name="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ $customer->email }}">
                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
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
                                <button type="submit" class="btn btn-primary text-white btn-sm" tabindex="-1">Send</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">Delivery address</div>

                            <div class="col text-center">
                                <button type="button" class="btn btn-outline-secondary btn-sm me-3" id="btnClear"
                                    name="btnClear" title="Delete delivery address" tabindex="-1">
                                    <i class="bi bi-trash"></i>
                                </button>

                                <button type="button" class="btn btn-outline-secondary btn-sm" id="btnCopy" name="btnCopy"
                                    title="Copy delivery address" tabindex="-1">
                                    <i class="bi bi-clipboard-plus"></i>
                                </button>
                            </div>

                            <div class="col fs-5 text-end">
                                <img src="{{ asset('img/icons/delivery.png') }}" />
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row mb-2">
                            <label for="delivery_address_street" class="col-md-3 col-form-label">
                                Street, number :
                            </label>

                            <div class="col-md-6">
                                <input id="delivery_address_street" name="delivery_address_street" type="text"
                                    class="form-control @error('delivery_address_street') is-invalid @enderror"
                                    value="{{ $customer->delivery_address_street }}">

                                @error('delivery_address_street')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-2">
                                <input id="delivery_address_number" name="delivery_address_number" type="text"
                                    class="form-control @error('delivery_address_number') is-invalid @enderror"
                                    value="{{ $customer->delivery_address_number }}">

                                @error('delivery_address_number')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="delivery_address_country" class="col-md-3 col-form-label">
                                Country, postal code, place :
                            </label>

                            <div class="col-md-2">
                                <select name="delivery_address_country" id="delivery_address_country"
                                    class="form-select">
                                    <option value="">Choose ...</option>
                                    @foreach ($countries as $country)
                                        @if ($country->iso2 == $customer->delivery_address_country)
                                            <option value="{{ $country->iso2 }}" selected>{{ $country->name }}
                                            </option>
                                        @else
                                            <option value="{{ $country->iso2 }}">{{ $country->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('delivery_address_country')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-2">
                                <input id="delivery_address_postal_code" name="delivery_address_postal_code" type="text"
                                    class="form-control @error('delivery_address_postal_code') is-invalid @enderror"
                                    value="{{ $customer->delivery_address_postal_code }}">

                                @error('delivery_address_postal_code')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="delivery_address_place" name="delivery_address_place" type="text"
                                    class="form-control @error('delivery_address_place') is-invalid @enderror"
                                    value="{{ $customer->delivery_address_place }}">

                                @error('delivery_address_place')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-1">
                                <button type="button" class="btn btn-outline-secondary btn-sm" id="btnMapDelivery"
                                    name="btnMapDelivery" title="Show address on map" tabindex="-1">
                                    <img src="{{ asset('img/icons/google-maps-location.png') }}"
                                        class="img-fluid mx-auto d-block" />
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <small>Delivery address should only be used if different from facturation address above.</small>
                    </div>
                </div>
            </div>

            <div class="col-5">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">System</div>

                            <div class="col fs-5 text-end">
                                <img src="{{ asset('img/icons/system.png') }}" />
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row mb-2">
                            <label for="created_at" class="col-md-5 col-form-label">Date created :</label>
                            <div class="col-md-6">
                                <input type="text" readonly class="form-control-plaintext" id="created_at"
                                    value="{{ $customer->created_at }}">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="updated_at" class="col-md-5 col-form-label">Date updated :</label>
                            <div class="col-md-6">
                                <input type="text" readonly class="form-control-plaintext" id="updated_at"
                                    value="{{ $customer->updated_at }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
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

@section('scripts')
    <script>
        $(function() {
            /* -------------------------------------------------------------------------------------------- */
            $('#btnMapFacturation').click(function() {
                var href = "https://www.google.nl/maps/place/";

                var place = [
                    ($('#address_street').val() ?? ''),
                    ($('#address_number').val() ?? '') + ',',
                    ($('#address_postal_code').val() ?? ''),
                    ($('#address_place').val() ?? '')
                ].filter(Boolean).join("+");

                if (place > ',') {
                    window.open(href + place).focus();
                } else {
                    showToast({
                        type: 'info',
                        title: 'Show address ...',
                        message: 'No address available.',
                    });
                }
            });
            /* ------------------------------------------- */
            $('#btnMapDelivery').click(function() {
                var href = "https://www.google.nl/maps/place/";

                var place = [
                    ($('#delivery_address_street').val() ?? ''),
                    ($('#delivery_address_number').val() ?? '') + ',',
                    ($('#delivery_address_postal_code').val() ?? ''),
                    ($('#delivery_address_place').val() ?? '')
                ].filter(Boolean).join("+");

                if (place > ',') {
                    window.open(href + place).focus();
                } else {
                    showToast({
                        type: 'info',
                        title: 'Show address ...',
                        message: 'No address available.',
                    });
                }
            });
            /* -------------------------------------------------------------------------------------------- */
            $('#btnClear').click(function() {
                $('#delivery_address_street').val('');
                $('#delivery_address_number').val('');
                $('#delivery_address_country').val('').trigger('change');
                $('#delivery_address_postal_code').val('');
                $('#delivery_address_place').val('');
            });
            /* ------------------------------------------- */
            $('#btnCopy').click(function() {
                $('#delivery_address_street').val($('#address_street').val());
                $('#delivery_address_number').val($('#address_number').val());
                $('#delivery_address_country').val($('#address_country').find("option:selected").val())
                    .trigger('change');
                $('#delivery_address_postal_code').val($('#address_postal_code').val());
                $('#delivery_address_place').val($('#address_place').val());
            });
            /* -------------------------------------------------------------------------------------------- */
        })
    </script>
@endsection
