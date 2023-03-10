<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
    <!-- application -->
    <li class="nav-item">
        <a class="nav-link disabled" aria-current="page" href="/">Application</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('backend.customers.index') }}">Customers</a>
    </li>
    <hr class="narrow">

    <!-- developer -->
    @can('developer')
        <li class="nav-item">
            <a class="nav-link disabled" aria-current="page" href="/">Administration</a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Developer
            </a>
            <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                <li><a class="dropdown-item" href="{{ route('backend.users.index') }}">Users</a></li>
                <li>
                    <hr class="narrow">
                </li>
                <li><a class="dropdown-item" href="{{ route('backend.developer.impressum') }}">Impressum</a></li>
                <li><a class="dropdown-item" href="{{ route('backend.developer.session') }}">Session</a></li>
            </ul>
        </li>
    @endcan
</ul>
