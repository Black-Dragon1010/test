@extends('layouts.app') 
@section('page-styles')


@endsection 
@section('content')
<div class="rh-container">
    <div class="rh-content-wrap clearfix">
        <!-- Main Side -->
        <div class="main-side page clearfix" id="content">
            <div class="rh-post-wrapper">
                <article class="post-inner post post-572 type-post status-publish format-standard has-post-thumbnail hentry category-furniture category-gadgets category-house" id="post-572">
                    <!-- Title area -->
                    <div class="rh_post_layout_metabig">
                        <div class="title_single_area mb15">
                            <div class="breadcrumb font90 rh_opacity_7">
                                <a href="{{ route('home') }}">Home</a> » 
                                <span>
                                    <a href="/category/{{$cate_name}}">{{$cate_name}}</a>
                                </span> » 
                                <span class="current">{{$blog->title}}</span>
                            </div><!-- .breadcrumbs -->
                            
                            <h1>{{$blog->title}}</h1>
                            <div class="meta post-meta-big flowhidden mb15 pb15 greycolor border-grey-bottom">
                                <div class="floatleft mr15 rtlml15">
                                    <a href="" class="floatleft mr10 rtlml10">
                                        <img alt="" src="{{asset('')}}{{$avatar}}" srcset="{{asset('')}}{{$avatar}}" class="avatar avatar-40 photo roundborder50p" height="40" width="40" loading="lazy" data-image-blur-on-load-update-occured="true" style="filter: opacity(1);">
                                    </a>
                                    <span class="floatleft authortimemeta lineheight20 fontbold">
                                        <a href="">
                                        {{$user_name}}
                                        </a>
                                        <div class="date_time_post font80 fontnormal lineheight15">
                                        {{date("F d, Y",strtotime($blog->created_at))}} </div>
                                    </span>
                                </div>
                                <div class="floatright ml15 postviewcomm font15px lineheight25 mt5">
                                    <span class="postview_meta mr15 ml15"><strong>{{$blog->visits}}</strong> Views</span>
                                    <span class="comm_count_meta"><strong><a href="#comments" class="comm_meta">{{count($comments)}}</a></strong></span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="top_share hidden">
                                <div class="post_share">
                                    <div class="social_icon  row_social_inpost">
                                        <div class="favour_in_row favour_btn_red">
                                            <div class="heart_thumb_wrap text-center"><span class="flowhidden cell_wishlist"><span class="heartplus" data-post_id="572" data-informer="53"><span class="ml5 rtlmr5 wishaddwrap" id="wishadd572">Save</span><span class="ml5 rtlmr5 wishaddedwrap" id="wishadded572">Saved</span><span class="ml5 rtlmr5 wishremovedwrap" id="wishremoved572">Removed</span> </span></span><span id="wishcount572" class="thumbscount">53</span> </div>
                                        </div><span data-href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fremag.wpsoul.net%2Fhouse-hold-project-of-arman%2F" class="fb share-link-image" data-service="facebook"><i class="rhicon rhi-facebook"></i></span><span data-href="https://twitter.com/share?url=https%3A%2F%2Fremag.wpsoul.net%2Fhouse-hold-project-of-arman%2F&amp;text=Boxed+style+of+site" class="tw share-link-image" data-service="twitter"><i class="rhicon rhi-twitter"></i></span><span data-href="https://pinterest.com/pin/create/button/?url=https%3A%2F%2Fremag.wpsoul.net%2Fhouse-hold-project-of-arman%2F&amp;media=https://remag.wpsoul.net/wp-content/uploads/2016/12/house-753270_1280.jpg&amp;description=Boxed+style+of+site" class="pn share-link-image" data-service="pinterest"><i class="rhicon rhi-pinterest-p"></i></span><span data-href="mailto:?subject=Boxed+style+of+site&amp;body=Check out: https%3A%2F%2Fremag.wpsoul.net%2Fhouse-hold-project-of-arman%2F - Rehub+Magazine+demo" class="in share-link-image" data-service="email"><i class="rhicon rhi-envelope"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <figure class="top_featured_image">
                        <img width="1280" height="720" src="{{ $blog->thumbnail}}" class="attachment-full size-full wp-post-image" alt="" loading="lazy"  data-nsfw-filter-status="sfw" style="visibility: visible; filter: opacity(1);" data-image-blur-on-load-update-occured="true">
                    </figure>
                    {!! $blog->content !!}
                </article>
                <div class="clearfix"></div>


                <div class="post_share hidden">
                    <div class="social_icon  row_social_inpost">
                        <div class="favour_in_row favour_btn_red">
                            <div class="heart_thumb_wrap text-center"><span class="flowhidden cell_wishlist"><span class="heartplus" data-post_id="572" data-informer="53"><span class="ml5 rtlmr5 wishaddwrap" id="wishadd572">Save</span><span class="ml5 rtlmr5 wishaddedwrap" id="wishadded572">Saved</span><span class="ml5 rtlmr5 wishremovedwrap" id="wishremoved572">Removed</span> </span></span><span id="wishcount572" class="thumbscount">53</span> </div>
                        </div><span data-href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fremag.wpsoul.net%2Fhouse-hold-project-of-arman%2F" class="fb share-link-image" data-service="facebook"><i class="rhicon rhi-facebook"></i></span><span data-href="https://twitter.com/share?url=https%3A%2F%2Fremag.wpsoul.net%2Fhouse-hold-project-of-arman%2F&amp;text=Boxed+style+of+site" class="tw share-link-image" data-service="twitter"><i class="rhicon rhi-twitter"></i></span><span data-href="https://pinterest.com/pin/create/button/?url=https%3A%2F%2Fremag.wpsoul.net%2Fhouse-hold-project-of-arman%2F&amp;media=https://remag.wpsoul.net/wp-content/uploads/2016/12/house-753270_1280.jpg&amp;description=Boxed+style+of+site" class="pn share-link-image" data-service="pinterest"><i class="rhicon rhi-pinterest-p"></i></span><span data-href="mailto:?subject=Boxed+style+of+site&amp;body=Check out: https%3A%2F%2Fremag.wpsoul.net%2Fhouse-hold-project-of-arman%2F - Rehub+Magazine+demo" class="in share-link-image" data-service="email"><i class="rhicon rhi-envelope"></i></span>
                    </div>
                </div>


                <!-- PAGER SECTION -->
                <div class="float-posts-nav" id="float-posts-nav">
                @if(isset($prev_blog))
                    <div class="postNavigation prevPostBox">
                        <a href="post_view/{{$prev_blog->id}}">
                            <div class="inner-prevnext">
                                <div class="thumbnail">
                                    <img class=" lazyloaded" data-src="" width="70" height="70" alt="Boxed style of site" src="{{$prev_blog->thumbnail}}" data-nsfw-filter-status="nsfw" style="visibility: visible; filter: blur(25px);" data-image-blur-on-load-update-occured="true">
                                </div>
                                <div class="headline"><span>Previous</span>
                                    <h4>{{$prev_blog->title}}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
                @if(isset($next_blog))
                    <div class="postNavigation nextPostBox">
                        <a href="post_view/{{$next_blog->id}}">
                            <div class="inner-prevnext">
                                <div class="thumbnail">
                                    <img class=" lazyloaded" data-src="" width="70" height="70" alt="Boxed style of site" src="{{$next_blog->thumbnail}}" data-nsfw-filter-status="sfw" style="visibility: visible; filter: opacity(1);" data-image-blur-on-load-update-occured="true">
                                </div>
                                <div class="headline"><span>Next</span>
                                    <h4>{{$next_blog->title}}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
                </div>
                <!-- /PAGER SECTION -->

                <div class="tags mb25">
                    <p></p>
                </div>



                <div class="related_articles pt25 border-top mb0 clearfix hidden">
                    <div class="related_title rehub-main-font font120 fontbold mb35">
                        Related Articles </div>
                    <div class="columned_grid_module rh-flex-eq-height col_wrap_fourth mb0">

                        <article class="col_item column_grid rh-heading-hover-color rh-bg-hover-color no-padding two_column_mobile">
                            <div class="button_action abdposright pr5 pt5">
                                <div class="floatleft mr5">
                                    <div class="heart_thumb_wrap text-center"><span class="flowhidden cell_wishlist"><span class="heartplus" data-post_id="589" data-informer="176"><span class="ml5 rtlmr5 wishaddedwrap" id="wishadded589">Added to wishlist</span><span class="ml5 rtlmr5 wishremovedwrap" id="wishremoved589">Removed from wishlist</span> </span></span><span id="wishcount589" class="thumbscount">176</span> </div>
                                </div>
                            </div>

                            <figure class="mb20 position-relative text-center">
                                <a href="https://remag.wpsoul.net/favorable-look-in-office/" class="">
                                    <img src="https://remag.wpsoul.net/wp-content/uploads/2018/12/best-drones-e1594343986361-336x220.jpeg" data-src="https://remag.wpsoul.net/wp-content/uploads/2018/12/best-drones-e1594343986361-336x220.jpeg" alt="GutenCon – High Conversion blocks for Gutenberg in Rehub" class=" lazyloaded" width="336" height="220" data-nsfw-filter-status="sfw" style="visibility: visible; filter: opacity(1);" data-image-blur-on-load-update-occured="true"> </a>
                            </figure>
                            <div class="content_constructor">
                                <h3 class="mb15 mt0 font110 mobfont100 fontnormal lineheight20"><a href="https://remag.wpsoul.net/favorable-look-in-office/">GutenCon – High Conversion blocks for Gutenberg in Rehub</a></h3>


                                <div class="rh-flex-center-align mb15 mobileblockdisplay">
                                    <div>



                                        <div class="priced_block clearfix  pricefont110 rehub-btn-font rehub-main-color mobpricefont100 fontbold mb0 lineheight20">

                                            <span class="rh_price_wrapper">
                                                <span class="price_count">
                                                    <span class="rh_regular_price">$699.99</span>
                                                    <del>$999.99</del> </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div id="comments" class="clearfix">
                    <div class="post-comments">
                        <div class="title_comments">We will be happy to hear your thoughts</div>
                        <div id="tab-1">
                            <ol class="commentlist">
                                @if(isset($comments))
                                    @foreach($comments as $comment)
                                    <li class="comment even thread-even depth-1" id="comment-23">
                                        <div class="commbox">
                                            <div class="comment-author position-relative pt15 pb15 pl20 pr20 border-grey-bottom vcard clearfix">
                                                <img alt="" src="{{asset('')}}{{$comment->avatar}}" srcset="{{asset('')}}{{$comment->avatar}}" class="avatar avatar-50 photo" height="50" width="50" loading="lazy"style="visibility: visible; filter: opacity(1);">
                                                <div class="comm_meta_wrap">
                                                    <span class="fn">
                                                        <a href="" rel="external nofollow ugc" class="url">{{$comment->name}}</a>
                                                    </span>

                                                    <span class="time"><a href="#comment-23">{{date("g:ia \o\n l jS F Y",strtotime($blog->created_at))}} </a></span>

                                                </div>
                                            </div>

                                            <div class="comment-content">
                                                <p>{{$comment->content}}</p>
                                            </div>

                                        </div>
                                    </li><!-- #comment-## -->
                                    @endforeach
                                @endif
                            </ol>
                            <div id="comments_pagination">
                            </div>
                        </div>
                        <ol id="loadcomment-list" class="commentlist">
                        </ol>
                        <div id="respond" class="comment-respond">
                            <h3 id="reply-title" class="comment-reply-title">Leave a reply <small><a rel="nofollow" id="cancel-comment-reply-link" href="/house-hold-project-of-arman/#respond" style="display:none;">Cancel reply</a></small></h3>
                            <form action="{{route('post_comment')}}" method="post" id="commentform" class="comment-form">
                                @csrf
                                <textarea id="comment" name="comment" cols="30" rows="10" aria-required="true"></textarea>
                                <input type="hidden" name="blog_id" value="{{$blog->id}}">
                                <div class="clearfix"></div>
                                <p class="form-submit">
                                    <input name="submit" type="submit" id="submit" class="submit" value="Submit"> 
                                </p>
                            </form>
                        </div><!-- #respond -->
                    </div> <!-- end comments div -->
                </div>
            </div>
        </div>
        @include('layouts.partial.latest_blog_sidebar')
    </div>
</div>
@endsection
@section('page-scripts')
<script src="{{ asset('front/js/blog-detail.js') }}"></script>
@endsection