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
                            <div class="wpfepp-message float-left">


                            </div>
                            <div class="clear-both"></div>
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
                                        <td><a href="/draft_update/{{$blog->id}}?type=draft">{{$blog->title}}</a></td>
                                        <td>{{date("F d, Y",strtotime($blog->created_at))}}</td>
                                        
                                        <td class="wpfepp-fixed-td"><a href="/draft_update/{{$blog->id}}?type=draft" title="Edit Draft"><span class="dashicons dashicons-edit"></span></a>
                                        </td>

                                        <td class="post-delete wpfepp-fixed-td" data-toggle="modal" id="smallButton" data-id="{{$blog->id}}" data-target="#smallModal" title="Delete Post">
                                            <a title="Delete Post">
                                                <span class="dashicons dashicons-trash"></span>
                                            </a>
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
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-sm" role="document">
        <form action="{{ route('post_delete') }}" method="post" id="post-delete-form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body" id="smallBody">
                    @csrf
                    <h5 class="text-center">Are you sure you want to delete the post?</h5>
                    <input type="hidden" name="delete_id" value="" />
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Yes, Delete a post</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection @section('page-scripts')
<script src="{{ asset('front/js/blog-list.js') }}"></script>
<script>
    var special_msg = '';
    var error_msg = '';
    @if(isset($special_msg))
    special_msg = '{{$special_msg}}';
    @endif
    @if(isset($error_msg))
    error_msg = '{{$error_msg}}';
    @endif
    jQuery(document).ready(function($) {
        toastr.options.timeOut = 1500; // 1.5s
        if (special_msg != "") {
            toastr['success'](special_msg);
        }
        if (error_msg != "") {
            toastr['error'](error_msg);
        }
    });
</script>
@endsection