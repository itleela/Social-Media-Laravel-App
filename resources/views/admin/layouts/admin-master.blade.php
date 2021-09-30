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

@include('admin.layouts.admin-header')

<div id="layoutSidenav">


    @include('admin.layouts.admin-sidebar')


    @yield('content')


</div>


@yield('script')


</body>
</html>
