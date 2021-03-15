<!-- FOOTER -->

<div class="footer-bottom dark_style">
    <style scoped>
        .footer-bottom.dark_style {
            background-color: #000000;
        }

        .footer-bottom.dark_style .footer_widget {
            color: #ccc;
        }

        .footer-bottom.dark_style .footer_widget .title,
        .footer-bottom.dark_style .footer_widget h2,
        .footer-bottom.dark_style .footer_widget a,
        .footer-bottom .footer_widget.dark_style ul li a {
            color: #f1f1f1;
        }

        .footer-bottom.dark_style .footer_widget .widget_categories ul li:before,
        .footer-bottom.dark_style .footer_widget .widget_archive ul li:before,
        .footer-bottom.dark_style .footer_widget .widget_nav_menu ul li:before {
            color: #fff;
        }
    </style>
    <div class="rh-container clearfix">
        <div class="rh-flex-eq-height col_wrap_three mb0">
            <div class="footer_widget mobileblockdisplay pt25 col_item mb0">
                <div id="media_image-2" class="widget widget_media_image">
                    <img width="200" height="30" src="{{asset('uploads/logo/MAG-logo.png')}}" class="image wp-image-701  attachment-full size-full" alt="" loading="lazy" style="max-width: 100%; height: auto;" srcset="{{asset('uploads/logo/MAG-logo.png')}}" sizes="(max-width: 200px) 100vw, 200px" /></div>
                <div id="text-2" class="widget widget_text">
                    <div class="textwidget">
                        <p>
                        This site may contain third party advertisements and links to third party sites. Enyxa does not make any representation as to the accuracy or suitability of any of the information
contained in those advertisements or sites and does not accept any responsibility or liability for the conduct or content of those advertisements and sites and the offerings
made by the third parties.</p>
                    </div>
                </div>
            </div>
            <div class="footer_widget mobileblockdisplay disablemobilepadding pt25 col_item mb0">
                <div id="text-3" class="widget widget_text">
                    <div class="textwidget">
                        <div class="centered_form  rehub_chimp rehub-sec-smooth">
                            <h3 class="chimp_title">Subscribe to our list</h3>
                            <!-- Begin MailChimp Signup Form -->
                            <div id="mc_embed_signup">
                                <form action="{{route('subscribe_post')}}" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" novalidate>
                                    @csrf
                                    <div id="mc_embed_signup_scroll">
                                        <input type="email" value="" name="email" class="email" id="mce-EMAIL" placeholder="Email address" required>
                                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_4b4bbda55bb6deb367e6f52d9_6b32851a5b" tabindex="-1" value=""></div>
                                        <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                                    </div>
                                </form>
                            </div>
                            <!--End mc_embed_signup-->
                            <p class="chimp_subtitle">Don't worry, we don't spam</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_widget mobileblockdisplay pt25 col_item last mb0">
                <div id="text-4" class="widget last widget_text">
                    <div class="textwidget">
                        <div class="wpsm-one-half wpsm-column-first">
                            <div class="widget_recent_entries">
                                <div class="title">For visitors</div>
                                <ul>
                                    <li><a href="{{route('home')}}">Home</a></li>
                                    <li><a href="{{route('contact')}}">Contact Us</a></li>
                                </ul>
                            </div>
                            <p>
                        </div>
                        <div class="clearfix"></div>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- FOOTER -->