@foreach($blogs as $blog)    
    <div class="news-community clearfix">
        <div class="rh_grid_image_wrapper" id="blog{{$blog->id}}">
            <div class="newsimage rh_gr_img">
                <figure>
                    <div class="favorrightside wishonimage">
                        
                    </div>

                    <a href="">
                        <img class=" lazyloaded" data-src="" width="160" height="160" alt="Title inside Image" src="{{$blog->thumbnail}}" data-image-blur-on-load-update-occured="true" style="filter: opacity(1); visibility: visible;" data-nsfw-filter-status="sfw"> 
                    </a>
                </figure>
                <div class="priced_block clearfix  mobile_block_btnclock mb0">
                    <span class="rh_button_wrapper">
                        <a href="{{$blog->link}}" class="btn_offer_block re_track_btn" target="_blank" rel="nofollow sponsored">
                                                        Visit Site			            			            		            </a>
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
                                <span class="flowhidden cell_wishlist">
                                    <span class="heartplus" data-post_id="{{$blog->id}}" data-informer="{{$blog->score}}"></span>
                                </span>
                                <span id="wishcount{{$blog->id}}" class="temperatur" style="position: relative;">{{$blog->credits}}</span>
                            </span>
                        </span>
                        
                        
                    </div>
                </div>
            </div>
            <div class="newsdetail newstitleblock rh_gr_right_sec">
                <h2 class="font130 mt0 mb10 mobfont120 lineheight25">
                    <a href="">{{$blog->title}}</a>
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
                            <a class="admin" href="https://remag.wpsoul.net/author/supervendor/">
                                <img alt="" src="/{{$blog->avatar}}" srcset="https://remag.wpsoul.net/wp-content/uploads/avatars/1/600c7dfbdc17c-bpthumb.jpg 2x" class="avatar avatar-22 photo" height="22" width="22" loading="lazy" data-image-blur-on-load-update-occured="true" style="filter: opacity(1);">
                                {{$blog->name}}
                            </a>
                        </span>
                        <span class="date_meta">
                        {{date("F d, y",strtotime($blog->created_at))}}</span>

                    </div>
                    <div class="rh-flex-right-align">
                        <a href="https://remag.wpsoul.net/asmos-room/" class="btn_more">READ MORE +</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endforeach