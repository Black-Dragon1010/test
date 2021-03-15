@extends('layouts.app') @section('page-styles')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> @endsection @section('content')

<!-- CONTENT -->
<div class="rh-container">
    <div class="rh-content-wrap clearfix">
        <!-- Main Side -->
        <div class="main-side page clearfix full_width" id="content">
            <div class="rh-post-wrapper">
                <article class="post mb0" id="page-3974">
                    <div class="title">
                        <h1 class="entry-title">Edit posts</h1>
                    </div>

                    <div class="wpfepp wpfepp-posts">

                        <ul class="nav nav-tabs">

                            @if(isset($active_tab) && $active_tab == 'live')
                            <li class="active">
                                <a class="active" href="?get_type=live">Live</a></li>
                            @else
                            <li>
                                <a href="?get_type=live">Live</a></li>
                            @endif 

                            @if(isset($active_tab) && $active_tab == 'pending')
                            <li class="active">
                                <a class="active" href="?get_type=pending">Pending</a></li>
                            @else
                            <li>
                                <a href="?get_type=pending">Pending</a></li>
                            @endif 

                            @if(isset($active_tab) && $active_tab == 'draft')
                            <li class="active">
                                <a class="active" href="?get_type=draft">Draft</a></li>
                            @else
                            <li>
                                <a href="?get_type=draft">Draft</a></li>
                            @endif

                        </ul>
                        <div class="wpfepp-post-table-container wpfepp-publish-posts-table-container">
                            
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">title</th>
                                        <th scope="col">created date</th>
                                        
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blogs as $blog)
                                    <tr class="wpfepp-row-{{$blog->id}} wpfepp-row" data-id="{{$blog->id}}" id="blog{{$blog->id}}">
                                        <td><a href="">{{$blog->title}}</a></td>
                                        <td>{{date("F d, Y",strtotime($blog->created_at))}}</td>
                                        
                                        <td class="wpfepp-fixed-td"><a href="?wpfepp_action=edit&amp;wpfepp_post=4169" title="Edit Post"><span class="dashicons dashicons-edit"></span></a>
                                        </td>
                                        <td class="post-delete wpfepp-fixed-td">
                                            <a href="?wpfepp_action=delete&amp;wpfepp_post=4169&amp;_wpnonce=445a1657f3" title="Delete Post"><span class="dashicons dashicons-trash"></span></a>
                                            <input type="hidden" id="wpfepp-delete-post-4169-nonce" name="wpfepp-delete-post-4169-nonce" value="445a1657f3"><input type="hidden" name="_wp_http_referer" value="/edit-posts/?wpfepp_type=publish"> <input type="hidden"
                                                class="post-id" value="4169">
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="wpfepp-nav">
                                <div style="clear:both;"></div>
                            </div>
                        </div>
                    </div>

                </article>
            </div>
        </div>
    </div>
</div>
@endsection @section('page-scripts')

@endsection