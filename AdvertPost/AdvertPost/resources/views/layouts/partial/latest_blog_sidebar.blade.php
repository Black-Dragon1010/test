<!-- Sidebar -->
<aside class="sidebar">
    <!-- SIDEBAR WIDGET AREA -->
    <div id="rehub_posts_widget-2" class="widget posts_widget">
        <div class="title">Latest Posts</div>
        <div class="color_sidebar ">
            <div class="tabs-item clearfix">
                @if(isset($latest_blogs))
                    @foreach($latest_blogs as $blog)
                    <div class="clearfix flowhidden mb15 pb15 border-grey-bottom">
                        <figure class="floatleft width-100 img-maxh-100 img-width-auto">
                            <a href="{{ route('post_view', $blog->id) }}" target="_blank">
                                <img src="{{$blog->thumbnail}}" data-src="" alt="Multiple Offers in Post and Top list" class="lazyload " width="100" height="35"> 
                            </a>
                        </figure>
                        <div class="detail floatright width-100-calc pl15 rtlpr15">
                            <h5 class="mt0 lineheight20 fontnormal font95">
                                <a href="{{ route('post_view', $blog->id) }}" target="_blank" >{{$blog->title}}</a>
                            </h5>

                            <div class="post-meta">
                                <span class="cat_link_meta"><a href="/category/{{app\Blog::getCateName($blog->category_id)}}" target="_blank" class="cat">{{ app\Blog::getCateName($blog->category_id) }}</a></span>
                                <span class=""><i class="fa fa-eye"></i> <a class="comm_meta">{{$blog->visits}}</a></span>
                            </div>

                            <div class="star-small"><span class="stars-rate"><span style="width: {{$blog->score}}%;"></span></span></div>
                        </div>
                    </div>
                    @endforeach
                @endif

            </div>
        </div>

    </div>
    <!-- SIDEBAR WIDGET AREA 2-->
    <div id="rehub_posts_widget-2" class="widget posts_widget">
        <div class="title">Most Viewed Posts</div>
        <div class="color_sidebar ">
            <div class="tabs-item clearfix">
                @if(isset($most_viewed_blogs))
                    @foreach($most_viewed_blogs as $blog)
                    <div class="clearfix flowhidden mb15 pb15 border-grey-bottom">
                        <figure class="floatleft width-100 img-maxh-100 img-width-auto">
                            <a href="{{ route('post_view', $blog->id) }}" target="_blank">
                                <img src="{{$blog->thumbnail}}" data-src="" alt="Multiple Offers in Post and Top list" class="lazyload " width="100" height="35"> 
                            </a>
                        </figure>
                        <div class="detail floatright width-100-calc pl15 rtlpr15">
                            <h5 class="mt0 lineheight20 fontnormal font95">
                                <a href="{{ route('post_view', $blog->id) }}" target="_blank" >{{$blog->title}}</a>
                            </h5>

                            <div class="post-meta">
                                <span class="cat_link_meta"><a href="/category/{{app\Blog::getCateName($blog->category_id)}}" target="_blank" class="cat">{{ app\Blog::getCateName($blog->category_id) }}</a></span>
                                <span class=""><i class="fa fa-eye"></i> <a class="comm_meta">{{$blog->visits}}</a></span>
                            </div>

                            <div class="star-small"><span class="stars-rate"><span style="width: {{$blog->score}}%;"></span></span></div>
                        </div>
                    </div>
                    @endforeach
                @endif

            </div>
        </div>

    </div>
</aside> <!-- /Sidebar -->