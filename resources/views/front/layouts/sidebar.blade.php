<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
    <div class="sidebar">
        @if(!Request::is('/'))
            <div class="widget-no-style">
                <div class="newsletter-widget text-center align-self-center">
                    <h3>Subscribe Today!</h3>
                    <p>Subscribe to our weekly Newsletter and receive updates via email.</p>
                    <form class="form-inline" method="post">
                        <input type="text" name="email" placeholder="Add your email here.." required=""
                               class="form-control">
                        <input type="submit" value="Subscribe" class="btn btn-default btn-block">
                    </form>
                </div>
            </div>
        @endif
        <div class="widget">
            <h2 class="widget-title">Top 5</h2>
            <div class="blog-list-widget">
                <div class="list-group">
                    @foreach($popular_posts as $post)
                        <a href="{{ route('front.article', ['slug' => $post->slug]) }}"
                           class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="w-100 justify-content-between">
                                <img src="{{ asset($post->getThumbnail()) }}" alt="" class="img-fluid float-left">
                                <h5 class="mb-1">{{ $post->name }}</h5>
                                <small>{{ $post->getDateAgo() }}</small>
                                <small>| <i class="fa fa-eye"></i> {{ $post->views }}</small>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="widget">
            <h2 class="widget-title">Bölmələr</h2>
            <div class="link-widget">
                <ul>
                    @foreach($cats as $cat)
                        <li><a href="{{ route('front.category', ['slug' => $cat->slug]) }}">{{ $cat->name }} <span>({{ $cat->posts_count }})</span></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
