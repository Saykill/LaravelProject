<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.png') }}">
</head>
<body>
<div class="container-scroller">
    {{-- 1. Sidebar en dıştaki scroller içinde olmalı --}}
    @include('admin.sidemenu')

    <div class="container-fluid page-body-wrapper">
        {{-- 2. Navbar (Header) bu wrapper'ın içinde olmalı --}}
        @include('admin.header')

        {{-- 3. İçerik alanı (main-panel index.blade.php içinde olduğu için burada yield yeterli) --}}
        @yield('content')

    </div> {{-- .page-body-wrapper sonu --}}
</div> {{-- .container-scroller sonu --}}

<script src="{{ asset('assets/admin/vendors/js/vendor.bundle.base.js') }}"></script>
{{-- Diğer plugin js dosyaları... --}}
</body>
</html>
