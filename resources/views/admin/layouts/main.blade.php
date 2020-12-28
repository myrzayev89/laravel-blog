<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/adminlte.css') }}">
    @yield('header')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('admin.layouts.navbar')
    @include('admin.layouts.sidebar')
    @yield('content')
</div>
<script src="{{ asset('assets/admin/js/adminlte.js') }}"></script>
@yield('footer')
</body>
</html>
