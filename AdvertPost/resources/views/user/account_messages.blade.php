@extends('layouts.app') 
@section('page-styles')
<link rel="stylesheet" id="rehub-woocommerce-css" href="{{ asset('theme/wp-content/woocommerce.css') }}" type="text/css" media="all"> 
<link rel="stylesheet" id="rehub-woocommerce-css" href="{{ asset('theme/wp-content/elementor_frontend.min.css') }}" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/font-awesome.min.css') }}">

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
                        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--downloads  is-active">
                            <a href="{{route('my_messages')}}">Messages</a>
                        </li>
                        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--woo-wallet ">
                            <a href="{{route('my_credits')}}">My Credits</a>
                        </li>
                    </ul>
                </nav>


                <div class="woocommerce-MyAccount-content">
                @if(isset($messages))
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">content</th>
                                <th scope="col">date</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($messages as $message)
                            <tr class="wpfepp-row" data-id="{{$message->id}}" id="message{{$message->id}}">
                                <td>{{$message->id}}</td>
                                <td>{{$message->content}}</td>
                                <td>{{date("F d, Y",strtotime($message->created_at))}}</td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                @else
                <p>You haven't received any message yet.</p>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('page-scripts')
<script src="{{ asset('front/js/profile.js') }}"></script>
</script>
@endsection