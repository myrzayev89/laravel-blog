@extends('front.layouts.main')
@section('title', 'Markedia - Bizimlə əlaqə')
@section('content')
    <div class="page-title db">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2>Bizimlə əlaqə</h2>
                </div><!-- end col -->
                <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.index') }}"><i class="fa fa-home"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Bizimlə əlaqə</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="section lb">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="blog-custom-build">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    <i class="fa fa-check"></i> {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ route('front.contact') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="fullname">Ad Soyad</label>
                                    <input type="text" name="fullname" class="form-control" id="fullname"
                                           aria-describedby="emailHelp">
                                    <small id="emailHelp" class="form-text text-muted">Vacib deyil</small>
                                </div>
                                <div class="form-group">
                                    <label for="email">E-Mail</label>
                                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                           placeholder="example@example.com">
                                </div>
                                <div class="form-group">
                                    <label for="content">Bizə sözünüz</label>
                                    <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" rows="10"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Göndər</button>
                            </form>
                                <style>
                                    .form-control.is-invalid {
                                        border: 2px solid red;
                                    }
                                </style>
                        </div>
                    </div>
                </div>
                @include('front.layouts.sidebar')
            </div>
        </div>
    </section>
@endsection
