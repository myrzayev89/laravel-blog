@extends('front.layouts.main')
@section('title', 'Markedia'.' - '.$post->name)
@section('content')
<section class="section lb m3rem">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-title-area">
                        <ol class="breadcrumb hidden-xs-down">
                            <li class="breadcrumb-item"><a href="{{ route('front.index') }}"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{ route('front.category', ['slug' => $post->category->slug]) }}">{{ $post->category->name }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ $post->name }}</li>
                        </ol>
                        <span class="color-yellow">{{ $post->category->name }}</span>
                        <h3>{{ $post->name }}</h3>
                        <div class="blog-meta big-meta">
                            <small>{{ $post->getDateAgo() }}</small>
                            <small><i class="fa fa-eye"></i> {{ $post->views }}</small>
                        </div>
                        <div class="post-sharing">
                            <ul class="list-inline">
                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span
                                            class="down-mobile">Share on Facebook</span></a></li>
                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span
                                            class="down-mobile">Tweet on Twitter</span></a></li>
                                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-post-media">
                        <img src="{{ asset($post->getThumbnail()) }}" alt="" class="img-fluid">
                    </div>
                    <div class="blog-content">
                        {!! $post->content !!}
                    </div>
                    <div class="blog-title-area">
                        @if($post->tags->count())
                            <div class="tag-cloud-single">
                                <span>Taqlar</span>
                                @foreach($post->tags as $tag)
                                    <small><a href="{{ route('front.tag', ['slug' => $tag->slug]) }}"
                                              title="">{{ $tag->name }}</a></small>
                                @endforeach
                            </div>
                        @endif
                        <div class="post-sharing">
                            <ul class="list-inline">
                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span
                                            class="down-mobile">Share on Facebook</span></a></li>
                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span
                                            class="down-mobile">Tweet on Twitter</span></a></li>
                                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @include('front.layouts.sidebar')
        </div>
    </div>
</section>
@endsection
