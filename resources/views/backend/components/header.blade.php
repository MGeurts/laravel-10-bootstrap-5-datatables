<nav class="navbar navbar-dark bg-secondary fixed-top d-print-none">
    <div class=" container-fluid">
        {{-- left --}}
        <div>
            <a class="btn btn-lg btn-primary text-white me-1" href="https://www.facebook.com/yourcompany/"
                target="_blank" title="Your Company Name on Facebook" role="button" tabindex="-1">
                <i class="bi bi-facebook"></i>
            </a>

            <a class="btn btn-lg btn-light me-1" href="https://www.yourcompany.com" target="_blank"
                title="yourcompany.com" role="button" tabindex="-1">
                <img src="{{ asset('img/logo/laravel-025.png') }}" alt="yourcompany.com">
            </a>


            <button class="btn btn-lg btn-outline-dark me-1" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" tabindex="-1" title="Menu">
                <i class="bi bi-list"></i>
            </button>

            <span class="text-white">{{ Auth::user()->name }}</span>
        </div>

        {{-- center --}}
        <div>
            @include('backend.components.year')
        </div>

        {{-- right --}}
        <div>
            <a class="btn btn-lg btn-success text-white me-1" href="/" title="Home" role="button" tabindex="-1">
                <i class="bi bi-house-fill"></i>
            </a>


            <div class="btn-group me-1" role="group">
                <a class="btn btn-lg btn-outline-dark" href="" title="Products (not implemented yet)" role="button"
                    tabindex="-1">
                    <img src="{{ asset('img/buttons/stock-025-wit.png') }}" class="img-fluid" />
                </a>
                <a class="btn btn-lg btn-outline-dark" href="" title="Deliveries (not implemented yet)" role="button"
                    tabindex="-1">
                    <img src="{{ asset('img/buttons/delivery-025-wit.png') }}" class="img-fluid" />
                </a>
                <a class="btn btn-lg btn-outline-dark" href="" title="Orders (not implemented yet)" role="button"
                    tabindex="-1">
                    <img src="{{ asset('img/buttons/reorder-025-wit.png') }}" class="img-fluid" />
                </a>
            </div>

            <div class="btn-group me-1" role="group">
                <a class="btn btn-lg btn-light" href="{{ route('backend.customers.index') }}" title="Customers"
                    role="button" tabindex="-1">
                    {{-- <img src="{{ asset('img/buttons/persons-025-wit.png') }}" class="img-fluid" /> --}}
                    <img src="{{ asset('img/icons/persons.png') }}" class="img-fluid" />
                </a>
                <a class="btn btn-lg btn-outline-dark" href="" title="Suppliers (not implemented yet)" role="button"
                    tabindex="-1">
                    <img src="{{ asset('img/buttons/supplier-025-wit.png') }}" class="img-fluid" />
                </a>
            </div>

            <a class="btn btn-lg btn-danger text-white" href="{{ route('logout') }}" title="Logout" role="button"
                tabindex="-1" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
            </a>
        </div>

        {{-- Offcanvas Menu --}}
        @include('backend.components.offcanvas')

        {{-- logout --}}
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</nav>
