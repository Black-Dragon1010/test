<!-- HEADER -->
<header id="main_header" class="white_style">
    <div class="header_wrap">
        <!-- Logo section -->
        <div class="rh-stickme header_five_style logo_section_wrap header_one_row">
            <div class="rh-container tabletblockdisplay mb0 disabletabletpadding">
                <div class="logo-section rh-flex-center-align tabletblockdisplay disabletabletpadding mb0">
                    <div class="logo hideontablet">
                        <a href="{{ route('home') }}" class="logo_image">
                            <img src="{{ asset('uploads/logo/MAG-logo.png') }}" alt="MAG" height="61" width="279" data-nsfw-filter-status="sfw" 
                            style="visibility: visible; filter: opacity(1);" data-image-blur-on-load-update-occured="true" />
                        </a>

                    </div>
                    <!-- Main Navigation -->
                    <div class="main-nav header_icons_menu mob-logo-enabled rh-flex-grow1 rh-flex-center-align rh-flex-justify-center  white_style">
                        <nav class="top_menu">
                            <ul id="menu-main-menu" class="menu" style="margin-bottom: 0">
                                <li id="menu-item-4032" class="menu-item menu-item-type-post_type menu-item-object-page">
                                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                                </li>
                                <li id="menu-item-4027" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children">
                                    <a><i class="fa fa-group"></i> Post Category</a>
                                    <ul class="sub-menu">
                                    {{ App\Blog::blogCategories() }}
                                    </ul>
                                </li>
                                <!-- <li id="menu-item-4032" class="menu-item menu-item-type-post_type menu-item-object-page">
                                    <a href="{{ route('home') }}"><i class="fa fa-group"></i> About Us</a>
                                </li> -->
                                <li id="menu-item-4032" class="menu-item menu-item-type-post_type menu-item-object-page">
                                    <a href="{{ route('contact') }}"><i class="fa fa-envelope"></i> Contact</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="responsive_nav_wrap rh_mobile_menu">
                            <div id="dl-menu" class="dl-menuwrapper rh-flex-center-align">
                                <button id="dl-trigger" class="dl-trigger" aria-label="Menu">
                                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <line stroke-linecap="round" id="rhlinemenu_1" y2="7" x2="29" y1="7" x1="3" />
                                            <line stroke-linecap="round" id="rhlinemenu_2" y2="16" x2="18" y1="16" x1="3" />
                                            <line stroke-linecap="round" id="rhlinemenu_3" y2="25" x2="26" y1="25" x1="3" />
                                        </g>
                                    </svg>
                                </button>
                                <div id="mobile-menu-icons" class="rh-flex-center-align rh-flex-right-align">
                                    <div id="slide-menu-mobile"></div>
                                </div>
                            </div>
                        </div>
                        <div class="search-header-contents">
                            <form role="search" method="get" class="search-form" action="https://remag.wpsoul.net/">
                                <input type="text" name="s" placeholder="Search" data-posttype="post">
                                <input type="hidden" name="post_type" value="post" /> <button type="submit" class="btnsearch" aria-label="Search"><i class="rhicon rhi-search"></i></button>
                            </form>
                        </div>
                    </div>


                    <div class="header-actions-logo">
                        <div class="rh-flex-center-align">
                        @guest
                            <a class="wpsm-button white medium  rh-flex-right-align mobileinmenu ml10 mr5" data-type="login" href="/login"><i class="rhicon rhi-sign-in"></i><span>Login / Register</span></a>
                        @else
                            <div class="user-dropdown-intop rh-flex-right-align mobileinmenu ml10 mr5">
                                <span class="user-ava-intop">
                                    <img alt="" src="{{asset(Auth::user()->avatar)}}" srcset="{{asset(Auth::user()->avatar)}}" class="avatar avatar-28 photo" height="28" width="28" loading="lazy" data-image-blur-on-load-update-occured="true" style="filter: opacity(1);"></span>
                                <ul class="user-dropdown-intop-menu">
                                    <li class="user-name-and-badges-intop">
                                        <span class="user-image-in-name">
                                            <img alt="" src="{{asset(Auth::user()->avatar)}}" srcset="{{asset(Auth::user()->avatar)}}" class="avatar avatar-35 photo" height="35" width="35" loading="lazy" data-image-blur-on-load-update-occured="true" style="filter: opacity(1);">
                                        </span>{{ Auth::user()->name }}
                                    </li>
                                    <li class="bp-profile-edit-menu-item menu-item">
                                        <a href="{{route('profile')}}">
                                            <i class="rhicon rhi-cogs"></i>
                                            <span>Edit Profile</span>
                                        </a>
                                    </li>
                                    <li class="user-addsome-link-intop menu-item">
                                        <a href="{{ route('post_new') }}">
                                            <i class="rhicon rhi-cloud-upload"></i>
                                            <span>Submit a Post</span>
                                        </a>
                                    </li>
                                    <li class="user-editposts-link-intop menu-item">
                                        <a href="/edit_posts?get_type=live">
                                            <i class="rhicon rhi-edit"></i>
                                            <span>Edit My Posts</span>
                                        </a>
                                    </li>
                                    <li class="user-editorders-link-intop menu-item">
                                        <a href="{{ route('my_credits') }}">
                                            <i class="rhicon rhi-shopping-bagfeather" aria-hidden="true"></i>
                                            <span>Manage Your Credits</span>
                                        </a>
                                    </li>
                                    <li class="user-logout-link-intop menu-item">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <i class="rhicon rhi-lock-alt"></i>
                                            <span>{{ __('Logout') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        @endguest
                            <a href="{{ route('post_new') }}" class="wpsm-button btncolor medium rh-flex-right-align addsomebtn mobileinmenu ml10 mr5 rehub_btn_color"><i class="rhicon rhi-plus"></i>Submit a post</a>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    <!-- /Main Navigation -->
                </div>
            </div>
        </div>
        <!-- /Logo section -->

    </div>
</header>