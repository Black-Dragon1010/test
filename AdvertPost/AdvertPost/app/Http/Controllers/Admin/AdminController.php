<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Blog;
use App\Comment;
use App\BlogViewLog;
use App\SiteInfo;
class AdminController extends Controller
{
    //
    public function index()
    {
        $data['user_counts'] = User::count();
        $data['post_counts'] = Blog::count();
        $data['visits'] = SiteInfo::getVisits();
        return view('admin.index', $data);
    }
    public function usersGet()
    {
        $data['user_counts'] = User::count();
        $data['allowed_counts'] = User::where('permission', 1)->count();
        $data['new_counts'] = User::where('permission', 0)->count();
        $data['blocked_counts'] = User::where('permission', 3)->count();
        $data['users'] = User::orderBy('created_at', 'DESC')->get();
        return view('admin.users', $data);
    }
    public function blogsGet()
    {
        $data['blog_counts'] = Blog::count();
        $data['allowed_counts'] = Blog::where('permission', 1)->count();
        $data['new_counts'] = Blog::where('permission', 0)->count();
        $data['draft_counts'] = Blog::where('permission', 2)->count();
        $data['blogs'] = DB::table('blogs_with_comment_counts')->orderBy('created_at', 'DESC')->get();
        return view('admin.blogs', $data);
    }
    public function approvePosts(Request $request)
    {
        $ids = $request->ids;
        Blog::whereIn('id',$ids)
                  ->update(['permission' => 1]);
        $data['message'] = "success";
        return json_encode($data);
    }
    public function rejectPosts(Request $request)
    {
        $ids = $request->ids;
        Blog::whereIn('id',$ids)
                  ->update(['permission' => 0]);
        $data['message'] = "success";
        return json_encode($data);
    }
    public function deletePosts(Request $request)
    {
        $ids = $request->ids;
        Blog::whereIn('id',$ids)
                  ->delete();
        $data['message'] = "success";
        return json_encode($data);
    }
}
