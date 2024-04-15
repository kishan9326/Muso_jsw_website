<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap 5 CSS link -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>

<!-- Sidebar -->
<div class="d-flex" id="wrapper">
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="list-group list-group-flush">
            <a href="{{ route('home') }}" class="list-group-item list-group-item-action">Home</a>
            <a href="{{ route('about') }}" class="list-group-item list-group-item-action">About Us</a>
            <a href="{{ route('work') }}" class="list-group-item list-group-item-action">Work</a>
            <a href="{{ route('solutions') }}" class="list-group-item list-group-item-action">Solutions</a>
        </div>
    </div>

    <!-- Page content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS links (Place these before the closing body tag) -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
