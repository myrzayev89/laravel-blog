<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Son Məqalələr</h2>
                    <div class="blog-list-widget">
                        <div class="list-group">
                            @foreach($recent_posts as $post)
                                <a href="{{ route('front.article', ['slug' => $post->slug]) }}"
                                   class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 last-item justify-content-between">
                                        <img src="{{ asset($post->getThumbnail()) }}" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">{{ $post->name }}</h5>
                                        <small>{{ $post->getDateAgo() }}</small>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Top 3</h2>
                    <div class="blog-list-widget">
                        <div class="list-group">
                            @foreach($popular_posts as $post)
                                <a href="{{ route('front.article', ['slug' => $post->slug]) }}"
                                   class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{ asset($post->getThumbnail()) }}" alt=""
                                             class="img-fluid float-left">
                                        <h5 class="mb-1">{{ $post->name }}</h5>
                                        <span class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Bölmələr</h2>
                    <div class="link-widget">
                        <ul>
                            @foreach($cats as $cat)
                                <li><a href="{{ route('front.category', ['slug' => $cat->slug]) }}">{{ $cat->name }}
                                        <span>({{ $cat->posts_count }})</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <br>
                <br>
                <div class="copyright">&copy; Markedia. Design: <a href="http://html.design">HTML Design</a>.</div>
            </div>
        </div>
    </div>
</footer>
