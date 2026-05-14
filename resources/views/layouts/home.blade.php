<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <title>@yield('title')</title>
    <title>@yield('keywords')</title>
    <title>@yield('description')</title>
@section('head')
        <!-- Favicon -->
        <link href="{{asset('assets')}}/img/favicon.ico" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="{{asset('assets')}}/https://fonts.gstatic.com">
        <link href="{{asset('assets')}}/https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- Font Awesome -->
        <link href="{{asset('assets')}}/https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{asset('assets')}}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{asset('assets')}}/css/style.css" rel="stylesheet">
        @show
    </head>
<body>

@section('header')
    @include('front.header')
@show
@section('front.menu')
    @yield('slider')
    @yield('content')
@include('front.menu')
@section('footer')
    @include('front.footer')
@show

</body>
</html>
