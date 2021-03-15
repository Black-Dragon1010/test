<!-- CONTENT -->
<div class="rh-container">
    <div class="rh-content-wrap clearfix">
        <!-- Main Side -->
        <div class="main-side page clearfix" id="content">
            <div class="wpsm-title position-relative flowhidden mb25 middle-size-title wpsm-cat-title" style="margin-bottom: 0!important"><h5 class="font140" id="cate_name">{{$cate_name}}</h5></div>
            <div>
                <div class="float-left">
                    <span class="cat_link_meta float-left"><span id="all_counts">{{$all_counts}}</span> results</span>
                </div>
                <form action="" class="search-bar float-right">
                    <input type="search" name="search" value="{{$query}}" required>
                    <button class="search-btn" type="submit">
                        <span>Search</span>
                    </button>
                </form>
                <div class="clear-both"></div>
            </div><br>            
            <div class="" data-filterargs="{&quot;posts_per_page&quot;:12,&quot;cat&quot;:2,&quot;paged&quot;:1,&quot;post_type&quot;:&quot;post&quot;}" data-template="query_type1" id="blog_list_loop" data-innerargs="{&quot;exerpt_count&quot;:&quot;&quot;,&quot;disable_meta&quot;:&quot;&quot;,&quot;enable_btn&quot;:&quot;&quot;,&quot;disable_btn&quot;:1,&quot;disable_act&quot;:0,&quot;price_meta&quot;:&quot;1&quot;,&quot;aff_link&quot;:0,&quot;type&quot;:&quot;&quot;}">
            @foreach($blogs as $blog)    
                <div class="news-community clearfix">
                    <div class="rh_grid_image_wrapper" id="blog{{$blog->id}}">
                        <div class="newsimage rh_gr_img">
                            <figure>
                                <div class="favorrightside wishonimage">
                                    
                                </div>

                                <a href="{{ route('post_view', $blog->id) }}">
                                    <img class=" lazyloaded" data-src="" width="160" height="160" alt="Title inside Image" src="{{$blog->thumbnail}}" data-image-blur-on-load-update-occured="true" style="filter: opacity(1); visibility: visible;" data-nsfw-filter-status="sfw"> 
                                </a>
                            </figure>
                            <div class="priced_block clearfix  mobile_block_btnclock mb0">
                                <span class="rh_button_wrapper">
                                    @if(isset($blog->link))
                                    <a href="{{$blog->link}}" class="btn_offer_block re_track_btn" target="_blank" rel="nofollow sponsored"> Visit Site</a>
                                    @else
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="newsdetail rh_gr_top_right mb5">
                            <div class="hotmeter_wrap">
                                <div class="hotmeter">
                                    <span class="table_cell_hot first_cell">
                                        <span id="temperatur622" class="temperatur">
                                            <i class="rhicon rhi-fire"></i>{{$blog->credits}}
                                            <span class="gradus_icon hidden"></span>
                                        </span>
                                        <span class="heart_thumb_wrap">
                                            <span class="flowhidden cell_wishlist hidden">
                                                <span class="heartplus" data-post_id="{{$blog->id}}" data-informer="{{$blog->score}}"></span>
                                            </span>
                                            <span id="wishcount{{$blog->id}}" class="temperatur" style="position: relative;"><span class="fa fa-eye"></span> {{$blog->visits}}</span>
                                        </span>
                                    </span>
                                    
                                    
                                </div>
                            </div>
                        </div>
                        <div class="newsdetail newstitleblock rh_gr_right_sec">
                            <h2 class="font130 mt0 mb10 mobfont120 lineheight25">
                                <a href="{{ route('post_view', $blog->id) }}">{{$blog->title}}</a>
                            </h2>
                            <span class="more-from-store-a mt0 floatleft ml0 mr10 mb5 lineheight20"></span>
                            <div class="clearfix"></div>
                        </div>
                        <div class="newsdetail rh_gr_right_desc">
                            <p class="font90 mobfont80 lineheight20 moblineheight15 mb15">
                                {{ (strlen($blog->strip_content) > 100) ? substr($blog->strip_content,0,97).'...' : $blog->strip_content }}
                            </p>
                            
                        </div>
                        <div class="newsdetail newsbtn rh_gr_right_btn">
                            <div class="rh-flex-center-align mobileblockdisplay">
                                <div class="meta post-meta">
                                    <span class="admin_meta">
                                        <a class="admin" href="{{ route('post_view', $blog->id) }}" target="_blank" >
                                            <img alt="" src="/{{$blog->avatar}}" srcset="https://remag.wpsoul.net/wp-content/uploads/avatars/1/600c7dfbdc17c-bpthumb.jpg 2x" class="avatar avatar-22 photo" height="22" width="22" loading="lazy" data-image-blur-on-load-update-occured="true" style="filter: opacity(1);">
                                            {{$blog->name}}
                                        </a>
                                    </span>
                                    <span class="date_meta">
                                    {{date("F d, Y",strtotime($blog->created_at))}}</span>

                                </div>
                                <div class="rh-flex-right-align">
                                    <a href="{{ route('post_view', $blog->id) }}" target="_blank" class="btn_more">READ MORE +</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
        @include('layouts.partial.latest_blog_sidebar')
    </div>
</div>