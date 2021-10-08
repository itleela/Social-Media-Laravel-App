<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>@yield('title','Admin Dashboard')</title>

    @yield('styles')

</head>

<body class="sb-nav-fixed">
@if (Route::has('admin-login-form'))
    @auth('admin')
        @include('admin.layouts.admin-header')
    @else
        @include('admin.layouts.a_user_header')
    @endauth
@endif


<div id="layoutSidenav">

    @if (Route::has('admin-login-form'))
        @auth('admin')
            @include('admin.layouts.admin-sidebar')
        @else
            @include('admin.layouts.a_user_sidebar')
        @endauth
    @endif


    <div id="layoutSidenav_content">

        @yield('content')


    </div>


</div>


@yield('script')


</body>
</html>
