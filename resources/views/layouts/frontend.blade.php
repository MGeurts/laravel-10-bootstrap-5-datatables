<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon -->
    <link rel="icon" type="image/png" href="{{ asset('img/favicon/favicon-16x16.png') }}" sizes="16x16">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon/favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon/favicon-96x96.png') }}" sizes="96x96">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.1.1/dist/select2-bootstrap-5-theme.min.css" />

    <style>
        body {
            /* Margin bottom by footer height */
            margin-bottom: 55px;
        }

        .footer {
            position: fixed;
            width: 100%;
            left: 0;
            bottom: 0;
            /* Set the fixed height of the footer here */
            height: 55px;
        }
    </style>

    <!-- JS -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.7/dayjs.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>

<body class="d-flex flex-column h-100">
    <div id="app">
        <header>
            @include('frontend.components.header')
        </header>

        <main role="main" class="flex-shrink-0">
            <div class="container-fluid mb-2">
                @include('frontend.components.alerts')

                @yield('content')
            </div>
        </main>

        <footer class="footer mt-auto bg-light">
            @include('frontend.components.footer')
        </footer>
    </div>

    @yield('scripts')
</body>

</html>
