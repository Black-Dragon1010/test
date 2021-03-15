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
                        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders is-active">
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
                @if(isset($oders))
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">order_number</th>
                                <th scope="col">item_name</th>
                                <th scope="col" style="width:120px">price</th>
                                <th scope="col">payment</th>
                                <th scope="col">date</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($orders as $order)
                            <tr class="wpfepp-row" data-id="{{$order->id}}" id="order{{$blog->id}}">
                                <td>{{$order->order_number}}</td>
                                <td>{{$order->product}}</td>
                                <td>{{$order->amount}}</td>
                                <td>{{$order->type}}</td>
                                <td>{{date("F d, Y",strtotime($order->created_at))}}</td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                @else
                <p>You have no order yet.</p>
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