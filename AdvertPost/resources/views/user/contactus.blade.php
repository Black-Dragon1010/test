@extends('layouts.app') 
@section('page-styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection 
@section('content')
<div class="rh_post_layout_fullimage mb25 lbg638839975">
    <div id="rh_post_layout_inimage" class="flowhidden rh-sceleton darkbg lazy-bg-loaded"  style="background:url({{asset('uploads/logo/my-london.jpg')}})  no-repeat center center transparent;     background-size: cover;">
        <style scoped="">
            #rh_post_layout_inimage {
                color: #fff;
                position: relative;
                width: 100%;
                z-index: 1;
            }

            .rh_post_layout_inner_image #rh_post_layout_inimage {
                min-height: 500px;
            }

            #rh_post_layout_inimage .breadcrumb a,
            #rh_post_layout_inimage h1,
            #rh_post_layout_inimage .post-meta span a,
            #rh_post_layout_inimage .post-meta a.admin,
            #rh_post_layout_inimage .post-meta a.cat,
            #rh_post_layout_inimage .post-meta {
                color: #fff;
                text-shadow: 0 1px 1px #000;
            }

            .rh_post_layout_fullimage .rh-container {
                overflow: hidden;
                z-index: 2;
                position: relative;
                min-height: 420px;
            }

            .rh_post_layout_inner_image .rh_post_header_holder {
                position: absolute;
                bottom: 0;
                padding: 0 20px 0;
                z-index: 2;
                color: white;
                width: 100%;
            }

            @media screen and (max-width: 1023px) and (min-width: 768px) {

                .rh_post_layout_inner_image #rh_post_layout_inimage,
                .rh_post_layout_fullimage .rh-container {
                    min-height: 370px;
                }

                #rh_post_layout_inimage .title_single_area h1 {
                    font-size: 28px;
                    line-height: 34px
                }
            }

            @media screen and (max-width: 767px) {

                .rh_post_layout_inner_image #rh_post_layout_inimage,
                .rh_post_layout_fullimage .rh-container {
                    min-height: 300px;
                }

                #rh_post_layout_inimage .title_single_area h1 {
                    font-size: 24px;
                    line-height: 24px
                }
            }

            .rtl #rh_post_layout_inimage .rh_post_breadcrumb_holder {
                left: auto;
                right: 0;
            }

            .rh_post_layout_fullimage .title_single_area h1 {
                font-size: 46px;
                line-height: 48px;
            }
        </style>
        <div class="rh-container rh-flex-center-align rh-flex-justify-center">
            <div class="rh_post_header_holder text-center">
                <div class="title_single_area mb25">
                    <h1 class="mb30">Title of Company</h1>
                    <div class="date_big_meta font120 mb30"> <span class="date_meta">
                            March 11, 2021 </span>
                    </div>
                    <div class="meta post-meta mb20 flowhidden font105">
                        <span class="admin_meta">
                            <a class="admin" href="https://remag.wpsoul.net/author/supervendor/">
                                <img alt="" src="{{asset('uploads/logo/face.png')}}" srcset="{{asset('uploads/logo/face.png')}}" class="avatar avatar-40 photo" height="40" width="40" loading="lazy" data-image-blur-on-load-update-occured="true" style="filter: opacity(1);">
                                Gabor F.
                            </a>
                        </span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <span class="rh-post-layout-image-mask"></span>
    </div>
</div>
<section class="collaborate rh-container">
    <div class="rh-content-wrap clearfix">
        <h2>We'd be happy to hear from you.</h2>
        <div class="main-side single clearfix">
            
            <div class="rh-post-wrapper">
                <form class="elementor-form" action="{{route('contact_post')}}" id="contact-form" method="post" name="New Form">
                    @csrf
                    
                    <div class="elementor-form-fields-wrapper elementor-labels-above">
                        <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-name elementor-col-50">
                            <input size="1" type="text" name="first_name" id="form-field-name" class="elementor-field elementor-size-xl  elementor-field-textual" placeholder="First name . . .">
                        </div>
                        <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_94ad619 elementor-col-50">
                            <input size="1" type="text" name="last_name" id="form-field-last" class="elementor-field elementor-size-xl  elementor-field-textual" placeholder="Last name . . .">
                        </div>
                        <div class="elementor-field-type-email elementor-field-group elementor-column elementor-field-group-email elementor-col-50 elementor-field-required">
                            <input size="1" type="email" name="email" id="form-field-email" class="elementor-field elementor-size-xl  elementor-field-textual" placeholder="Email address . . ." required="required" aria-required="true">
                        </div>
                        <div class="elementor-field-type-email elementor-field-group elementor-column elementor-field-group-field_1a4c306 elementor-col-50 elementor-field-required">
                            <input size="1" type="text" name="phone" id="form-field-field_1a4c306" class="elementor-field elementor-size-xl  elementor-field-textual" placeholder="Phone number . . ." required="required" aria-required="true">
                        </div>
                        <div class="elementor-field-type-textarea elementor-field-group elementor-column elementor-field-group-message elementor-col-100">
                            <textarea class="elementor-field-textual elementor-field  elementor-size-xl" name="content" id="form-field-content" rows="6" placeholder="Your message . . ."></textarea>
                        </div>
                        <div class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-100 e-form__buttons text-right">
                            <button type="submit" class="elementor-button elementor-size-lg" id="contact-submit">
                                <span>
                                    <span class=" elementor-button-icon">
                                    </span>
                                    <span class="elementor-button-text " >Send message</span>
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <aside class="sidebar">
            <img src="{{asset('uploads/logo/founder.jpg')}}" style="width:inherit">
        </aside>
    </div>
    <div class="rh-content-wrap clearfix touch-info">
        <h2>Get in touch</h2>
        <div class="text-center" >
            <span style="margin-right: 10em;">
                <span class="fa fa-envelope-o"> </span>&nbsp;
                <a> gabor.fulop@enyxa.com</a>
            </span>
            <span>
                <span class="fa fa-phone"> </span>&nbsp;
                <a> (308) 555 - 1212</a>
            </span>
        </div>
    </div>
    <div class="rh-content-wrap clearfix company-location">
        <h2>Location</h2>
        <div id="map-container" class="custom-container" style="width:100%;">
            <iframe id="map-canvas" width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=enyxa,%20london&t=&z=5&ie=UTF8&iwloc=&output=embed"></iframe>
        </div>
        <div class="clearfix"></div>
    </div>
</section>
<style>
    .elementor-field-textual{
        border-style: solid;
        border-width: 0px 0px 2px 0px!important;
        border-color: #D6D6D6;
        border-radius: 0px 0px 0px 0px!important;
        margin: 0.5em;
    }
    .elementor-field-textual:focus{
        border-style: solid;
        border-width: 0px 0px 2px 0px;
        border-color: #D6D6D6;
        border-radius: 0px 0px 0px 0px;
        border: none!important;
    }
    #contact-submit{
        background: none #7635f3 !important;
        color: #ffffff !important;
        fill: #ffffff !important;
        border: none !important;
        text-decoration: none !important;
        outline: 0;
        box-shadow: -1px 6px 19px rgba(118, 53, 243, 0.2) !important;
        border-radius: 4px !important;
        cursor:pointer;
        margin-left: 0.5em; 
    }
    .touch-info{
        background: #efebeb;
        padding-left: 1em;
    }
</style>
@endsection
@section('page-scripts')
<script>
    jQuery(document).ready(function($) {

        if ("fadeInSuccessMessage" in localStorage) {
            if (localStorage.fadeInSuccessMessage == "contact_success") {
                toastr['success']("Message submitted successfully");
                delete localStorage.fadeInSuccessMessage;
            }
        }
        $("#contact-form").submit(function(e) {
            if ($('#form-field-email').val() == "" || $('#form-field-content').val() == "" ) {
                toastr["error"]("Fill in the contact form.");
                return false;
            } else {
                localStorage.fadeInSuccessMessage = "contact_success"; //alert for draft saved
                $(this).submit();
            }
        });
    });
</script>

@endsection