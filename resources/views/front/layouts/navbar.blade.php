<header class="market-header header">
    <div class="container-fluid">
        <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="{{ route('front.index') }}"><img src="{{ asset('assets/front/images/version/market-logo.png') }}" alt=""></a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    @foreach($navbar_cats as $cat)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('front.category', ['slug' => $cat->slug]) }}">
                            {{ $cat->name }}
                        </a>
                    </li>
                    @endforeach
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('front.contact') }}">bizimlə əlaqə</a>
                    </li>
                </ul>
                <form action="{{ route('front.search') }}" method="GET" class="form-inline">
                    <input name="q" class="form-control mr-sm-2 @error('q') is-invalid @enderror" type="text" placeholder="Buradan axtar...">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                </form>

                <style>
                    .market-header .form-inline .form-control.is-invalid {
                        border: 3px solid red;
                    }
                </style>
            </div>
        </nav>
    </div>
</header>
