@extends('layouts.app') 
@section('page-styles')
<link rel="stylesheet" id="rehub-woocommerce-css" href="{{ asset('theme/wp-content/woocommerce.css') }}" type="text/css" media="all"> 
<link rel="stylesheet" id="rehub-woocommerce-css" href="{{ asset('theme/wp-content/elementor_frontend.min.css') }}" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/font-awesome.min.css') }}">
<style>
    .avatar-upload {
  position: relative;
  max-width: 205px;
  margin: 50px auto;
}
.avatar-upload .avatar-edit {
  position: absolute;
  right: 12px;
  z-index: 1;
  top: 10px;
}
.avatar-upload .avatar-edit input {
  display: none;
}
.avatar-upload .avatar-edit input + label {
  display: inline-block;
  width: 34px;
  height: 34px;
  margin-bottom: 0;
  border-radius: 100%;
  background: #FFFFFF;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
}
.avatar-upload .avatar-edit input + label:hover {
  background: #f1f1f1;
  border-color: #d6d6d6;
}

.avatar-upload .avatar-preview {
  width: 192px;
  height: 192px;
  position: relative;
  border-radius: 100%;
  border: 6px solid #F8F8F8;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-upload .avatar-preview > div {
  width: 100%;
  height: 100%;
  border-radius: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}
.error {
    color: red;
}
</style>
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
                        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard is-active">
                            <a href="{{route('profile')}}">Personal details</a>
                        </li>
                        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
                            <a href="{{route('my_orders')}}">Orders</a>
                        </li>
                        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--downloads">
                            <a href="{{route('my_messages')}}">Messages</a>
                        </li>
                        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--woo-wallet ">
                            <a href="{{route('my_credits')}}">My Credits</a>
                        </li>
                    </ul>
                </nav>


                <div class="woocommerce-MyAccount-content">
                    <div class="woocommerce-notices-wrapper"></div>
                    <form class="woocommerce-EditAccountForm edit-account" id="frm-personal" action="" method="post">
                        @csrf
                        <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                            <label for="account_first_name">First name&nbsp;</label>
                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="{{Auth::user()->firstname}}">
                        </p>
                        <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                            <label for="account_last_name">Last name&nbsp;</label>
                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" autocomplete="family-name" value="{{Auth::user()->lastname}}">
                        </p>
                        <div class="clear"></div>

                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="account_display_name">Display name&nbsp;<span class="required">*</span></label>
                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_display_name" id="account_display_name" value="{{Auth::user()->name}}" required> <span><em>This will be how your name will be displayed in the account section and in reviews</em></span>
                        </p>
                        <div class="clear"></div>

                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="account_email">Email address&nbsp;<span class="required">*</span></label>
                            <input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="{{Auth::user()->email}}" disabled>
                            
                        </p>
                        <p>
                            <button type="submit" class="woocommerce-Button button profile-submit" id="info-change" name="save_account_details" value="Save changes">Save changes</button>
                        </p>
                    </form>
                    <fieldset>
                        <legend>Password change</legend>
                        <form id="frm-password" method="post" action="">
                        @csrf
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="password_current">Current password (leave blank to leave unchanged)</label>
                                <span class="password-input">
                                    <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" autocomplete="off">
                                    <span class="show-password-input"></span>
                                </span>
                            </p>
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="password_1">New password (leave blank to leave unchanged)</label>
                                <span class="password-input">
                                    <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" autocomplete="off">
                                    <span class="show-password-input"></span>
                                </span>
                            </p>
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="password_2">Confirm new password</label>
                                <span class="password-input">
                                    <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" autocomplete="off">
                                    <span class="show-password-input"></span>
                                </span>
                            </p>
                            <p>
                                <button type="submit" class="woocommerce-Button button profile-submit" name="save_account_details" value="Save changes">Save changes</button>
                            </p>
                        </form>
                    </fieldset>
                    <div class="clear"></div>
                    <legend>Profile image change</legend>
                    <form id="frm-avatar" method="post" action="">
                    @csrf
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" id="new_avatar" name="new_avatar" value="">
                                <label for="imageUpload" class="text-center" style="padding-top: 3px;">
                                    <i class="fa fa-pencil"></i>
                                </label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url({{asset(Auth::user()->avatar)}});">
                                </div>
                            </div>
                        </div>
                        <p>
                            <button type="submit" class="woocommerce-Button button profile-submit" name="save_account_details" value="Save changes">Save changes</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('page-scripts')
<script src="{{ asset('front/js/profile.js') }}"></script>
<script>
    jQuery(document).ready(function($){
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#new_avatar').val(e.target.result);
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });
    });
</script>
@endsection