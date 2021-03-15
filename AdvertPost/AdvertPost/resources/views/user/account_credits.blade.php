@extends('layouts.app') 
@section('page-styles')
<link rel="stylesheet" id="rehub-woocommerce-css" href="{{ asset('theme/wp-content/woocommerce.css') }}" type="text/css" media="all"> 
<link rel="stylesheet" id="rehub-woocommerce-css" href="{{ asset('theme/wp-content/elementor_frontend.min.css') }}" type="text/css" media="all">
@endsection 
@section('content')

<!-- CONTENT -->
<div class="rh-container">
    <div class="rh-content-wrap clearfix">
        <!-- Main Side -->
        <div class="page clearfix" id="content">
            <div class="wpsm-title position-relative flowhidden mb25 middle-size-title wpsm-cat-title" style="margin-bottom: 0!important">
                <h5 class="font140" id="cate_name">My Credits</h5>
            </div>
            <div class="woocommerce">
                <nav class="woocommerce-MyAccount-navigation">
                    <ul>
                        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard">
                            <a href="{{route('profile')}}">Personal details</a>
                        </li>
                        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
                            <a href="{{route('my_orders')}}">Orders</a>
                        </li>
                        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--downloads">
                            <a href="{{route('my_messages')}}">Messages</a>
                        </li>
                        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--woo-wallet is-active">
                            <a>My Credits</a>
                        </li>
                    </ul>
                </nav>


                <div class="woocommerce-MyAccount-content">
                    <div class="woocommerce-notices-wrapper"></div>
                    <div class="woo-wallet-my-wallet-container">

                        <div class="woo-wallet-content">
                            <div class="woo-wallet-content-heading">
                                <h3 class="woo-wallet-content-h3 float-left" id="balance">Balance</h3>
                                <p class="woo-wallet-price float-right"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol"></span>{{ Auth::user()->credits }}</bdi>
                                    </span>
                                </p>
                            </div>
                            <div style="clear: both"></div>
                            <hr>
                        </div>
                        <div data-elementor-type="wp-page" data-elementor-id="3976" class="elementor elementor-3976" data-elementor-settings="[]">
                            <div class="elementor-inner">
                                <div class="elementor-section-wrap">
                                    <section class="elementor-section elementor-top-section elementor-element elementor-element-66af05b5 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="66af05b5" data-element_type="section">
                                        <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-row">
                                                <div class="elementor-column elementor-col-33 elementor-top-column elementor-element credits-product elementor-element-4dacd453" data-id="4dacd453" data-element_type="column">
                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <div class="elementor-element elementor-align-center elementor-element-488ab54b elementor-widget elementor-widget-image" data-id="488ab54b" data-element_type="widget" data-widget_type="image.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-image">
                                                                        <img width="180" height="180" src="{{ asset('front/img/silver.jpg') }}" data-src="{{ asset('front/img/silver.jpg') }}" class="attachment-full size-full ls-is-cached lazyloaded" alt="" loading="lazy" data-nsfw-filter-status="sfw"
                                                                            style="visibility: visible; filter: opacity(1);" data-image-blur-on-load-update-occured="true"> </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-align-center elementor-element-4ad6adb5 elementor-widget elementor-widget-heading" data-id="4ad6adb5" data-element_type="widget" data-widget_type="heading.default">
                                                                <div class="elementor-widget-container">
                                                                    <h3 class="elementor-heading-title elementor-size-default">500 Credits</h3>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-align-center elementor-element-50724e8d elementor-widget elementor-widget-text-editor" data-id="50724e8d" data-element_type="widget" data-widget_type="text-editor.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-text-editor elementor-clearfix">
                                                                        <p class="vc_custom_heading fontnormal">Private messages<br>Follow users<br>Wishlists<br>Point gathering</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-align-center elementor-element-209bb6e8 elementor-widget elementor-widget-spacer" data-id="209bb6e8" data-element_type="widget" data-widget_type="spacer.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-spacer">
                                                                        <div class="elementor-spacer-inner"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-align-center elementor-element-38c4d16c elementor-widget elementor-widget-heading" data-id="38c4d16c" data-element_type="widget" data-widget_type="heading.default">
                                                                <div class="elementor-widget-container">
                                                                    <h3 class="elementor-heading-title elementor-size-default">$5</h3>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-align-center elementor-element-6e775015 elementor-widget elementor-widget-spacer" data-id="6e775015" data-element_type="widget" data-widget_type="spacer.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-spacer">
                                                                        <div class="elementor-spacer-inner"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-4a3a3a1d elementor-align-center elementor-widget elementor-widget-button" data-id="4a3a3a1d" data-element_type="widget" data-widget_type="button.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-button-wrapper">
                                                                        <a class="elementor-button elementor-size-md order-btn" role="button" product-id="1" product-price="5" product-name="500 Credits">
                                                                            <span class="elementor-button-content-wrapper">
                                                                                <span class="elementor-button-text">ORDER NOW</span>
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-51d01134 elementor-widget elementor-widget-spacer" data-id="51d01134" data-element_type="widget" data-widget_type="spacer.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-spacer">
                                                                        <div class="elementor-spacer-inner"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-column elementor-col-33 elementor-top-column elementor-element credits-product elementor-element-4dacd453" data-id="4dacd453" data-element_type="column">
                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <div class="elementor-element elementor-align-center elementor-element-488ab54b elementor-widget elementor-widget-image" data-id="488ab54b" data-element_type="widget" data-widget_type="image.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-image">
                                                                        <img width="180" height="180" src="{{ asset('front/img/gold.jpg') }}" data-src="{{ asset('front/img/gold.jpg') }}" class="attachment-full size-full ls-is-cached lazyloaded" alt="" loading="lazy" data-nsfw-filter-status="sfw"
                                                                            style="visibility: visible; filter: opacity(1);" data-image-blur-on-load-update-occured="true"> </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-align-center elementor-element-4ad6adb5 elementor-widget elementor-widget-heading" data-id="4ad6adb5" data-element_type="widget" data-widget_type="heading.default">
                                                                <div class="elementor-widget-container">
                                                                    <h3 class="elementor-heading-title elementor-size-default">1500 Credits</h3>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-align-center elementor-element-50724e8d elementor-widget elementor-widget-text-editor" data-id="50724e8d" data-element_type="widget" data-widget_type="text-editor.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-text-editor elementor-clearfix">
                                                                        <p class="vc_custom_heading fontnormal">Private messages<br>Follow users<br>Wishlists<br>Point gathering</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-align-center elementor-element-209bb6e8 elementor-widget elementor-widget-spacer" data-id="209bb6e8" data-element_type="widget" data-widget_type="spacer.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-spacer">
                                                                        <div class="elementor-spacer-inner"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-align-center elementor-element-38c4d16c elementor-widget elementor-widget-heading" data-id="38c4d16c" data-element_type="widget" data-widget_type="heading.default">
                                                                <div class="elementor-widget-container">
                                                                    <h3 class="elementor-heading-title elementor-size-default">$10</h3>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-align-center elementor-element-6e775015 elementor-widget elementor-widget-spacer" data-id="6e775015" data-element_type="widget" data-widget_type="spacer.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-spacer">
                                                                        <div class="elementor-spacer-inner"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-4a3a3a1d elementor-align-center elementor-widget elementor-widget-button" data-id="4a3a3a1d" data-element_type="widget" data-widget_type="button.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-button-wrapper">
                                                                        <a class="elementor-button elementor-size-md order-btn"  role="button" product-id="2" product-price="10" product-name="1500 Credits">
                                                                            <span class="elementor-button-content-wrapper">
                                                                                <span class="elementor-button-text">ORDER NOW</span>
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-51d01134 elementor-widget elementor-widget-spacer" data-id="51d01134" data-element_type="widget" data-widget_type="spacer.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-spacer">
                                                                        <div class="elementor-spacer-inner"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-column elementor-col-33 elementor-top-column elementor-element credits-product elementor-element-4dacd453" data-element_type="column">
                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <div class="elementor-element elementor-align-center elementor-element-488ab54b elementor-widget elementor-widget-image" data-element_type="widget" data-widget_type="image.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-image">
                                                                        <img width="180" height="180" src="{{ asset('front/img/crown.jpg') }}" data-src="{{ asset('front/img/crown.jpg') }}" class="attachment-full size-full ls-is-cached lazyloaded" alt="" loading="lazy" data-nsfw-filter-status="sfw"
                                                                            style="visibility: visible; filter: opacity(1);" data-image-blur-on-load-update-occured="true"> </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-align-center elementor-element-4ad6adb5 elementor-widget elementor-widget-heading" data-element_type="widget" data-widget_type="heading.default">
                                                                <div class="elementor-widget-container">
                                                                    <h3 class="elementor-heading-title elementor-size-default">4000 Credits</h3>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-align-center elementor-element-50724e8d elementor-widget elementor-widget-text-editor"data-element_type="widget" data-widget_type="text-editor.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-text-editor elementor-clearfix">
                                                                        <p class="vc_custom_heading fontnormal">Private messages<br>Follow users<br>Wishlists<br>Point gathering</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-align-center elementor-element-209bb6e8 elementor-widget elementor-widget-spacer" data-element_type="widget" data-widget_type="spacer.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-spacer">
                                                                        <div class="elementor-spacer-inner"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-align-center elementor-element-38c4d16c elementor-widget elementor-widget-heading" data-element_type="widget" data-widget_type="heading.default">
                                                                <div class="elementor-widget-container">
                                                                    <h3 class="elementor-heading-title elementor-size-default">$20</h3>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-align-center elementor-element-6e775015 elementor-widget elementor-widget-spacer" data-element_type="widget" data-widget_type="spacer.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-spacer">
                                                                        <div class="elementor-spacer-inner"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-4a3a3a1d elementor-align-center elementor-widget elementor-widget-button" data-element_type="widget" data-widget_type="button.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-button-wrapper">
                                                                        <a class="elementor-button elementor-size-md order-btn" role="button" product-id="3" product-price="20" product-name="4000 Credits">
                                                                            <span class="elementor-button-content-wrapper">
                                                                                <span class="elementor-button-text">ORDER NOW</span>
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-51d01134 elementor-widget elementor-widget-spacer" data-id="51d01134" data-element_type="widget" data-widget_type="spacer.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-spacer">
                                                                        <div class="elementor-spacer-inner"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section class="elementor-section elementor-top-section elementor-element elementor-element-991333b elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="991333b" data-element_type="section">
                                        <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-row">
                                                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-9538577" data-id="9538577" data-element_type="column">
                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <div class="elementor-element elementor-element-0b86944 elementor-widget-divider--separator-type-pattern elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="0b86944" data-element_type="widget" data-widget_type="divider.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-divider" style="--divider-pattern-url: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' preserveAspectRatio='none' overflow='visible' height='100%' viewBox='0 0 24 24' fill='none' stroke='black' stroke-width='1' stroke-linecap='square' stroke-miterlimit='10'%3E%3Cpolyline points='0,18 12,6 24,18 '/%3E%3C/svg%3E&quot;);">
                                                                        <span class="elementor-divider-separator">
                                                                                </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-752802f elementor-widget elementor-widget-text-editor" data-id="752802f" data-element_type="widget" data-widget_type="text-editor.default">
                                                                <div class="">
                                                                    <h3 id="your-order">Your order</h3>
                                                                    <div id="order_review" class="woocommerce-checkout-review-order">
                                                                        <table class="shop_table woocommerce-checkout-review-order-table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="product-name">Product</th>
                                                                                    <th class="product-total">Subtotal</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr class="cart_item">
                                                                                    <td class="product-name">
                                                                                        <span id="product-name"></span> <strong class="product-quantity"></strong> </td>
                                                                                    <td class="product-total">
                                                                                        <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span><span class="order-price">0.00</span></bdi></span>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                            <tfoot>
                                                                                <tr class="cart-subtotal">
                                                                                    <th>Subtotal</th>
                                                                                    <td><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span><span class="order-price">0.00</span></bdi></span></td>
                                                                                </tr>
                                                                                <tr class="order-total">
                                                                                    <th>Total</th>
                                                                                    <td><strong><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span><span class="order-price">0.00</span></bdi></span></strong> </td>
                                                                                </tr>
                                                                            </tfoot>
                                                                        </table>

                                                                        <div id="payment" class="woocommerce-checkout-payment">
                                                                            <ul class="wc_payment_methods payment_methods methods">
                                                                                <li class="wc_payment_method payment_method_cod">
                                                                                    <input id="payment_method_cod" type="radio" class="input-radio" name="payment_method" value="cod" data-order_button_text="">

                                                                                    <label for="payment_method_cod">
                                                                                        Credit Card </label>
                                                                                    <div class="payment_box payment_method_cod" style="display:none">
                                                                                        <p>Pay with cash upon delivery.</p>
                                                                                    </div>
                                                                                </li>
                                                                                <li class="wc_payment_method payment_method_paypal">
                                                                                    <input id="payment_method_paypal" type="radio" class="input-radio" name="payment_method" value="paypal" checked="checked" data-order_button_text="Proceed to PayPal">

                                                                                    <label for="payment_method_paypal">
                                                                                        PayPal <img src="https://www.paypalobjects.com/webstatic/mktg/Logo/AM_mc_vs_ms_ae_UK.png" alt="PayPal acceptance mark" data-nsfw-filter-status="sfw" style="visibility: visible; filter: opacity(1);" data-image-blur-on-load-update-occured="true">
                                                                                     </label>
                                                                                    <div class="payment_box payment_method_paypal" style="display: none;">
                                                                                        <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                                                                    </div>
                                                                                </li>
                                                                            </ul>
                                                                            @if ($message = Session::get('success'))
                                                                            <div class="custom-alerts alert alert-success fade in">
                                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                                                {!! $message !!}
                                                                            </div>
                                                                            <?php Session::forget('success');?>
                                                                            @endif

                                                                            @if ($message = Session::get('error'))
                                                                            <div class="custom-alerts alert alert-danger fade in">
                                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                                                {!! $message !!}
                                                                            </div>
                                                                            <?php Session::forget('error');?>
                                                                            @endif
                                                                            <form method="POST" id="payment-form" role="form" action="{{ route('paypal') }}">
                                                                            @csrf
                                                                                <button type="submit" class="button alt disabled" name="woocommerce_checkout_place_order" id="place_order" value="Place order" data-value="Place order">Place order</button>

                                                                                <input type="hidden" id="woocommerce-process-checkout-nonce" name="woocommerce-process-checkout-nonce" value="f5741c29e2">
                                                                                <input type="hidden" name="_wp_http_referer" value="/?wc-ajax=update_order_review">
                                                                                <input type="hidden" id="product-number" name="product-number" value="">
                                                                                <input type="hidden" id="product-amount" name="amount" value="">
                                                                            </form>
                                                                            <div class="clear-both"></div>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('page-scripts')
<script src="{{ asset('front/js/profile.js') }}"></script>
@endsection