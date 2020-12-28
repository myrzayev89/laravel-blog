@extends('front.layouts.main')
@section('title', 'Markedia'.' - '.$tag->name)
@section('content')
<div class="page-title db">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2>Taq - {{ $tag->name }}</h2>
            </div><!-- end col -->
            <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('front.index') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active">{{ $tag->name }}</li>
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
                        @foreach($posts as $post)
                            <div class="blog-box wow fadeIn">
                                <div class="post-media">
                                    <a href="{{ route('front.article', ['slug' => $post->slug]) }}" title="">
                                        <img src="{{ asset($post->getThumbnail()) }}" alt="" class="img-fluid">
                                        <div class="hovereffect">
                                            <span></span>
                                        </div>
                                    </a>
                                </div>
                                <div class="blog-meta big-meta text-center">
                                    <div class="post-sharing">
                                        <ul class="list-inline">
                                            <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                            <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                            <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                    <h4><a href="{{ route('front.article', ['slug' => $post->slug]) }}" title="">{{ $post->name }}</a></h4>
                                    <p>{!! $post->desc !!}</p>
                                    <small><a href="{{ route('front.category', ['slug' => $post->category->slug]) }}" title="">{{ $post->category->name }}</a></small>
                                    <small>{{ $post->getDateAgo() }}</small>
                                    <small><i class="fa fa-eye"></i> {{ $post->views }}</small>
                                </div>
                            </div>
                            <hr class="invis">
                        @endforeach
                    </div>
                </div>
                <hr class="invis">
                <!-- Pagination -->
                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                {{ $posts->links('vendor.pagination.bootstrap-4') }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            @include('front.layouts.sidebar')
        </div>
    </div>
</section>
@endsection
