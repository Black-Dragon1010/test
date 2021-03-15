@extends('admin.layouts.app')
@section('page-styles')
<!-- <link rel="stylesheet" type="text/css" href="{{asset('admin/css/jquery.dataTables.css')}}"> -->
<link type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/sl-1.2.5/datatables.min.css" rel="stylesheet" />
<link type="text/css" href="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
<style>
th, td{
    text-align:center;
}
td img{
    width: 30px;
}
</style>
@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="icon fa fa-picture-o "></i> Posts</h1>
            <p>Enyxa.hu- Posts Administration page</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-picture-o fa-lg"></i></li>
            <li class="breadcrumb-item"><a>Posts</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-picture-o fa-3x"></i>
                <div class="info">
                    <h4>Posts</h4>
                    <p><b>{{$blog_counts}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon"><i class="icon fa fa-check-circle-o fa-3x"></i>
                <div class="info">
                    <h4>Published Posts</h4>
                    <p><b>{{$allowed_counts}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon"><i class="icon fa fa-angellist fa-3x"></i>
                <div class="info">
                    <h4>New Posts</h4>
                    <p><b>{{$new_counts}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon"><i class="icon fa fa-edit fa-3x"></i>
                <div class="info">
                    <h4>Drafts</h4>
                    <p><b>{{$draft_counts}}</b></p>
                </div>
            </div>
        </div>
    </div>
    <form id="frm-example" action="/path/to/your/script.php" method="POST" style="background: white; padding: 0.5em">
    @csrf
        <table id="blog_table" class="display"  width="100%">
            <thead>
                <tr>
                    <th></th>
                    <th>id</th>
                    <th>category</th>
                    <th>title</th>
                    <th>content</th>
                    <th>user_id</th>
                    <th>credits</th>
                    <th>visits</th>
                    <th>comments</th>
                    <th>link_url</th>
                    <th>thumbnail</th>
                    <th>created_at</th>
                    <th>status</th>
                    <th>type</th>

                </tr>
            </thead>
            <tbody>
                @foreach($blogs as $blog)
                <tr id="blog{{$blog->id}}" data-id="{{$blog->id}}">
                    <td></td>
                    <td>{{$blog->id}}</td>
                    <td>{{$blog->category_name}}</td>
                    <td><a 
                    @if($blog->permission == 1)
                    href="{{route('post_view', $blog->id)}}" target="_blank"
                    @endif
                    >{{ (strlen($blog->title) > 40) ? substr($blog->title,0,37).'...' : $blog->title }}</a></td>
                    <td>{{ (strlen($blog->strip_content) > 40) ? substr($blog->strip_content,0,37).'...' : $blog->strip_content }}</td>
                    <td>{{$blog->user_id}}</td>
                    <td>{{$blog->credits}}</td>
                    <td>{{$blog->visits}}</td>
                    <td>{{$blog->comment_counts}}</td>
                    <td><a href="{{$blog->link}}" target="_blank">{{$blog->link}}</a></td>
                    <td><img src="{{$blog->thumbnail}}"></td>
                    <td>{{date("F d, Y",strtotime($blog->created_at))}}</td>
                    <td>
                    @if($blog->permission == 1)
                    <span class="badge badge-success">Published</span>
                    @elseif($blog->permission == 0)
                    <span class="badge badge-danger">Not allowed</span>    
                    @elseif($blog->permission == 2)
                    <span class="badge badge-dark">Draft</span>
                    @endif</td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <p class="text-right">
            <button class="btn btn-primary submit-btn" id="approve-btn">Approve</button>
            <button class="btn btn-warning submit-btn" id="reject-btn">Reject</button>
            <button class="btn btn-default submit-btn" id="delete-btn">Delete</button>
        </p>
    </form>
</main>
@endsection
@section('page-scripts')

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/sl-1.2.5/datatables.min.js"></script>
<script type="text/javascript" src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
<script type="text/javascript" src="{{asset('admin/js/admin-blog.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/bootstrap-notify.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/sweetalert.min.js')}}"></script>

<style>
    #user_table th{
        width:0!important;
    }
    </style>
@endsection