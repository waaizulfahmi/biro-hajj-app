<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <title>
        {{ env('APP_NAME') }} - @yield('title', 'Login')
    </title>
    {{-- Fonts and icons --}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    {{-- Nucleo Icons --}}
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    {{-- Font Awesome Icons --}}
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    {{-- CSS Files --}}
    <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css') }}?v=1.0.7" rel="stylesheet" />
    {{-- Nepcha Analytics (nepcha.com) --}}
    {{-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. --}}
    <script defer data-site="{{ env('APP_URL') }}" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>

    {{-- custom --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    @php
        // Get the current route URI
        $currentRoute = \Illuminate\Support\Facades\Route::current()->uri();

        // Split the route URI into segments
        $routeSegments = explode('/', $currentRoute);

        // Extract the main page and subpage
        $page = $routeSegments[0] ?? null;
        $sub = $routeSegments[1] ?? null;
        $pageUc = Str::ucfirst($page);
        $subUc = Str::ucfirst($sub);
    @endphp
</head>

<body class="@if (auth()->guard('web')->check()) g-sidenav-show bg-gray-100 @endif">
    {{-- if logined include header --}}
    @if (auth()->guard('web')->check())
        @include('Layouts.admin.sidebar')
        {{-- @include('Layouts.header') --}}


        <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
            @include('Layouts.admin.navbar')
        @else
            <main class="main-content mt-0">
    @endif

    {{-- error allert --}}
    @if (session('success'))
        <div class="container">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @elseif(session('error'))
        <div class="container">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    @yield('main')
    </main>

    @guest
        @include('Layouts.admin.footer')
    @endguest

    {{-- Core JS Files --}}
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @yield('scripts')
    {{-- Notifications Plugin --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- Github buttons --}}
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    {{-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc --}}
    <script src="{{ asset('assets/js/soft-ui-dashboard.min.js') }}?v=1.0.7"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
