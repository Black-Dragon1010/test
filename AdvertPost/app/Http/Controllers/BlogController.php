<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Blog;
use App\Comment;
use App\BlogViewLog;
use App\SiteInfo;


class BlogController extends Controller
{
    //
    public function __construct(){
        $this->categories = DB::table('blog_categories')->get();
        $this->blog_model = new Blog;
    }
    public function postNewGet()
    {
        SiteInfo::increaseVisits();
        if(Auth::guest())
            return redirect('/login');
        else{
            return view('user.blog_create', ['categories'=>$this->categories]);
        }
    }
    public function blogListViewCategory(Request $request, $cate_name)
    {
        SiteInfo::increaseVisits();
        $model = new Blog;
        $search_query = "";
        if(isset($request->search))
            $search_query = $request->search;
        $cate_id = DB::table('blog_categories')->where('name', $cate_name)->get()[0]->id;
        $myquery = $model->where('blogs.permission', 1)
        ->where('category_id', $cate_id)
        ->where(function($query) use ($search_query){
            $query->where('title', 'LIKE', '%'.$search_query.'%')
            ->orwhere('strip_content', 'LIKE', '%'.$search_query.'%');
        })
        ->join('users', 'blogs.user_id', '=', 'users.id')
        ->select('blogs.*', 'users.name', 'users.avatar')
        ->orderBy('blogs.credits', 'DESC')
        ->orderBy('blogs.visits', 'DESC');
        $blogs = $myquery->limit(10)->offset(0)->get();
        $all_counts = $myquery->count();
        //$blogs = $model->where('blogs.permission', 1)->where('category_id', $cate_id)->join('users', 'blogs.user_id', '=', 'users.id')->select('blogs.*', 'users.name', 'users.avatar')->orderBy('blogs.credits', 'DESC')->orderBy('blogs.visits', 'DESC')->limit(10)->offset(0)->get();
        //$all_counts = $model->where('category_id', $cate_id)->count();
        $data['blogs'] = $blogs;
        $data['cate_name'] = $cate_name;
        $data['latest_blogs'] = Blog::getTop5Latests($cate_id);
        $data['most_viewed_blogs'] = Blog::getMostViewed(5, $cate_id);
        $data['all_counts'] = $all_counts;
        $data['query'] = $search_query;
        return view('user.blog_list', $data);
    }
    public function detailView($id)
    {
        SiteInfo::increaseVisits();
        //increase visits of blog
        $blog = Blog::find($id);
        $blog->visits += 1;
        $blog->save();
        //get prev and next blog
         // get previous blog id
            $previous = Blog::where('id', '<', $id)->max('id');

            // get next blog id
            $next = Blog::where('id', '>', $id)->min('id');
        //check if the user is visiting blog for the first time, if not, save log
        if(BlogViewLog::checkLogByUser($id, \Request::ip()) == "saved"){ //decrease the credits of blog and author
            $this_blog = Blog::find($id);
            $author = User::find($this_blog->user_id);
            if($this_blog->credits <= 0){
                $this_blog->credits = 0;
            } else {
                $this_blog->credits -= 10;
            }
            $author->credits -= 10;
            $this_blog->save();
            $author->save();
        }
        $data['blog'] = Blog::find($id);
        $data['cate_name'] = DB::table('blog_categories')->find($blog->category_id)->name;
        $data['user_name'] = User::find($blog->user_id)->name;
        $data['avatar'] = User::find($blog->user_id)->avatar;
        $data['comments'] = Comment::getComments($id);
        $data['latest_blogs'] = Blog::getTop5Latests($blog->category_id);
        $data['prev_blog'] = Blog::find($previous);
        $data['next_blog'] = Blog::find($next);
        
        return view('user.blog_detail', $data);
    }
    public function postComment(Request $request)
    {
        if(Auth::guest())
            return redirect('/login');
        else{
            $comment = new Comment;
            $comment->blog_id = $request->blog_id;
            $comment->user_id = Auth::user()->id;
            $comment->content = $request->comment;
            $comment->save();
            return redirect()->back();
        }
    }
    public function blogGetLimits(Request $request)
    {
        $model = new Blog;
        $offset = $request->offset;
        $cate_id = DB::table('blog_categories')->where('name', $request->cate_name)->get()[0]->id;
        $blogs = $model->where('category_id', $cate_id)->join('users', 'blogs.user_id', '=', 'users.id')->select('blogs.*', 'users.name', 'users.avatar')->orderBy('blogs.credits', 'DESC')->orderBy('blogs.visits', 'DESC')->limit(10)->offset($offset)->get();
        $data['blogs'] = $blogs;
        return view('layouts.partial.main_blogs_only', $data);
    }
    public function postNewPost(Request $request)
    {
        if(Auth::guest())
            return redirect('/login');
        else{
            $dom = new \DOMDocument();
            $dom->loadHTML($request->blog_content);
            $model = new Blog;
            $model->user_id = Auth::user()->id;
            $model->category_id = $request->blog_category;
            $model->title = $request->blog_title;
            $model->strip_content = $dom->textContent;
            $model->content = $this->saveImagesFromNewPost($dom);
            $model->link = $request->blog_url;
            $model->thumbnail = $this->saveThumbnail($request->blog_thumbnail); 
            if($request ->permission == 2){
                $model->credits = 0;
                if(isset($request->draft_id)){
                    
                    $this->checkDraft($request->draft_id);
                    Blog::find($request->draft_id)->delete();
                    $model->id = $request->draft_id;
                }
                
            } else if($model->permission == 1){
                $model->credits = 10;
            }
            $model->permission = $request->permission;
            $model->save();
            
            $res['message'] = "success";
            return json_encode($res);
        }
    }
    public function saveImagesFromNewPost($dom)
    {
        $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            $bs64='base64';
            if (strpos($data,$bs64) == true){
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode($data);
                $image_name= "/uploads/posts/images/" . time().$k.'.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        } 
        $detail = $dom->saveHTML();
        
        $dom2 = new \DOMDocument();
        $dom2->loadHTML('<?xml encoding="utf-8" ?>'.$detail);
        return $this->DOMinnerHTML($dom2->getElementsByTagName('body')[0]);
        
    }

    public function postDelete(Request $request)
    {
        $id = $request->delete_id;
        $row = Blog::find($id);
        $user_id = $row->user_id;
        $user = User::find($user_id);
        if(Auth::user()->id == $user_id){
            if($row->permission == 1){
                $user->credits += $row->credits;
                $user->save();
            }
            Blog::find($id)->delete();
        }
        
        return redirect()->back();
    }
    public function DOMinnerHTML(\DOMNode $element) 
    { 
        $innerHTML = ""; 
        $children  = $element->childNodes;

        foreach ($children as $child) 
        { 
            $innerHTML .= $element->ownerDocument->saveHTML($child);
        }

        return $innerHTML; 
    } 
    public function editPostsGet(Request $request)
    {
        SiteInfo::increaseVisits();
        if(Auth::guest())
            return redirect('/login');
        else{
            $model = new Blog;
            $active_tab = 'live';
            $special_msg = '';
            $error_msg = '';
            if(isset($request->get_type)){
                if($request->get_type == 'live'){
                    $blogs = $model->where('user_id', Auth::user()->id)->where('permission', 1)->orderBy('created_at', 'DESC')->get();
                    $data['blogs'] = $blogs;
                    $data['active_tab'] = $request->get_type;
                    $data['special_msg'] = $special_msg;
                    return view('user.blog_live_store', $data);
                } else if($request->get_type == 'pending'){
                    $blogs = $model->where('user_id', Auth::user()->id)->where('permission', 0)->orderBy('created_at', 'DESC')->get();
                    $data['blogs'] = $blogs;
                    $data['active_tab'] = $request->get_type;
                    return view('user.blog_pending_store', $data);
                } else if($request->get_type == 'draft'){
                    $blogs = $model->where('user_id', Auth::user()->id)->where('permission', 2)->orderBy('created_at', 'DESC')->get();
                    $data['blogs'] = $blogs;
                    $data['active_tab'] = $request->get_type;
                    return view('user.blog_draft_store', $data);
                }
            }
        }
    }
    public function postUpdateGet($id, Request $request)
    {
        
        if(Auth::guest())
            return redirect('/login');
        else{
            if(Blog::confirmUser($id, Auth::user()->id)){
                $blog = Blog::find($id);
                $data['blog'] = $blog;
                $data['categories'] = $this->categories;
                if(isset($request->type)){
                    $data['type'] = $request->type;
                }
                return view('user.blog_update', $data);
            } else{
                return redirect()->back()->with('error_msg', 'You are doing an illegal operation');
            }
        }
    }
    public function postUpdatePost(Request $request)
    {
        if(Auth::guest()){
            $res['message'] = "guest";
            $res['token'] = csrf_token();
            return json_encode($res);
        } else{
            $dom = new \DOMDocument();
            $dom->loadHTML('<?xml encoding="utf-8" ?>'.$request->blog_content);
            $model = Blog::find($request->blog_id);
            $model->category_id = $request->blog_category;
            $model->title = $request->blog_title;
            $model->strip_content = $dom->textContent;
            $model->content = $this->saveImagesFromNewPost($dom);
            $model->link = $request->blog_url;
            $thb = $request->blog_thumbnail;
            $bs64 = 'base64';
            if (strpos($thb,$bs64) == true){
                $model->thumbnail = $this->saveThumbnail($request->blog_thumbnail); 
            }
            $model->permission = 0;
            $model->save();
            
            $res['message'] = "success";
            $res['token'] = csrf_token();
            return json_encode($res);
        }
    }
    // find old draft, if not null, remove it and remove related images from public folder
    public function checkDraft($blog_id)
    {
        if(!empty(Blog::find($blog_id))){
            $old = Blog::find($blog_id);
            // //delete thumnail image
            // $thumbnail = public_path('$old->thumbnail');
            // if(\File::exists($thumbnail)) \File::delete($thumbnail);
            //delete old content images
            $old_imgs = $this->findImgsFromContent($old->content);
            foreach($old_imgs as $img){
                if(\File::exists($img)) \File::delete($thumbnail);
            }
        }
    }
    public function logCreditEdit()
    {
        if(Auth::guest())
            return redirect('/login');
        else{
            //insert new row to log table, action is 0 by default, if saved edit, 1.
            DB::table('credit_edit_logs')->insert(['user_id'=> Auth::user()->id, 'credits'=>Auth::user()->credits]);
            return Auth::user()->credits;
        }
    }
    public function logCreditEditSave(Request $request)
    {
        if(Auth::guest())
            return redirect('/login');
        else{
            $sum = 0;
            foreach($request->credit_obj as $key=>$value){
                $sum += (int)$value;
            }
            if($sum > Auth::user()->credits){
                return "exceeds";
            } else{
                foreach($request->credit_obj as $key=>$value){
                    Blog::setCredit($key, $value);
                }
                return "success";
            }
        }
    }

    public function saveThumbnail($img)
    {
        
        $folderPath = public_path();
        $bs64='base64';
        if (strpos($img,$bs64) == true){
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $d_name = "/uploads/posts/thumbnails/".uniqid(). '.'.$image_type;
            $file = $folderPath . $d_name; 

            file_put_contents($file, $image_base64);
            return $d_name;
        }
    }
    public function findImgsFromContent($content)
    {
        $dom = new \DOMDocument();
        $dom->loadHTML($content);
        $res = array();
        $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            array_push($res, $data);
        }
        return $res;
    }
    // blog randomly make
    public function bb()
    {
        $sam = Blog::find(125);
        for($i = 1; $i<30; $i++){
            $new_row = new Blog;
            $new_row->user_id = 1;
            $new_row->category_id = random_int(1,10);
            $new_row->title = substr(str_shuffle('0123456789ABCDEFGHI JKLMNOPQRSTUVWXYZ'),1,20);
            $new_row->strip_content = substr(str_shuffle('0123456789ABCDEFGHI JKLMNOPQRSTUVWXYZ'),1,60);
            $new_row->content = $sam->content;
            $new_row->link = 'https://'.substr(str_shuffle('0123456789ABCDEFGHI JKLMNOPQRSTUVWXYZ'),1,20);
            $new_row->thumbnail = $sam->thumbnail;
            $new_row->permission = 1;
            $new_row->credits = random_int(5, 1000);
            $new_row->save();
        }
        var_dump("OK");die;
    }
}
