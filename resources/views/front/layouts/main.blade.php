<!DOCTYPE html>
<html lang="az">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>@yield('title')</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet">
<link rel="shortcut icon" href="{{ asset('assets/front/images/favicon.ico') }}" type="image/x-icon"/>
<link rel="apple-touch-icon" href="{{ asset('assets/front/images/apple-touch-icon.png') }}">
<link rel="stylesheet" href="{{ asset('assets/front/css/main.css') }}">
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div id="wrapper">
    @include('front.layouts.navbar')
    @if(Request::is('/'))
        @include('front.layouts.manset')
    @endif
    @yield('content')
    @include('front.layouts.footer')
    <div class="dmtop">Scroll to Top</div>
</div>
<script src="{{ asset('assets/front/js/main.js') }}"></script>
@yield('js')
</body>
</html>
