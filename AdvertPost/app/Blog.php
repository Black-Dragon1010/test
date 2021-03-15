<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Comment;

class Blog extends Model
{
    //
    protected $table = 'blogs';
    protected $fillable = ['title', 'credits'];
    public static function getTop5Latests($cate_id = 0)
    {
        $model = new Blog;
        if($cate_id == 0){
            return $model->where('permission', 1)->orderBy('created_at', 'DESC')->limit(5)->get();
        } else{
            return $model->where('permission', 1)->where('category_id', $cate_id)->orderBy('created_at', 'DESC')->limit(5)->get();
        }
    }
    public static function getLatests($count, $cate_id = 0)
    {
        $model = new Blog;
        if($cate_id == 0){
            return DB::table('blogs_with_comment_counts')
                ->join('blog_categories', 'blogs_with_comment_counts.category_id', '=', 'blog_categories.id')
                ->where('permission', 1)
                ->orderBy('created_at', 'DESC')
                ->select('blogs_with_comment_counts.*','blog_categories.name')->limit($count)->get();
        } else{
            return DB::table('blogs_with_comment_counts')
                ->join('blog_categories', 'blogs_with_comment_counts.category_id', '=', 'blog_categories.id')
                ->where('permission', 1)
                ->where('category_id', $cate_id)
                ->orderBy('created_at', 'DESC')
                ->select('blogs_with_comment_counts.*','blog_categories.name')->limit($count)->get();
        }
    }
    public static function getCateName($cate_id)
    {
        echo DB::table('blog_categories')->find($cate_id)->name;
    }
    public static function setCredit($id, $value)
    {
        $model = new Blog;
        if($model->find($id)){
            $model->find($id)->update(array('credits'=>$value));
        }
    }
    public static function blogCategories()
    {
        $cates = DB::table('blog_categories')->get();
        $html = '';
        foreach($cates as $cate){
            $html .= '<li id="menu-item-'.$cate->id.'" class="menu-item menu-item-type-custom menu-item-object-custom">
            <a href="/category/'.$cate->name.'">'.$cate->name.'</a>
        </li>';
        }
        echo $html;
    }
    public static function getMostViewed($count, $cate_id=0)
    {
        $model = new Blog;
        if($cate_id == 0)
            $blogs = DB::table('blogs_with_comment_counts')->where('permission', 1)->orderBy('visits', 'DESC')->limit($count)->get();
        else
            $blogs = DB::table('blogs_with_comment_counts')->where('permission', 1)->where('category_id', $cate_id)->orderBy('visits', 'DESC')->limit($count)->get();
        return $blogs;
    }
    public static function getMostCredits($count)
    {
        $model = new Blog;
        $blogs = $model->where('permission', 1)->orderBy('credits', 'DESC')->limit($count)->get();
        return $blogs;
    }
    public static function getMostAnswered($count)
    {
        $comment_model = new Comment;
        try{
            $rows = DB::table('blogs_with_comment_counts')->where('comment_counts', '!=', NULL)->orderBy('comment_counts', 'DESC')->limit($count)->get();
        } catch (\Exception $e){
            $rows = DB::table('blogs_with_comment_counts')->where('comment_counts', '!=', NULL)->orderBy('comment_counts', 'DESC')->get();
        }
        return $rows;
    }
    public static function getCategoryWithCount()
    {
        return DB::table('category_info')->get();
    }
    public static function confirmUser($id, $user_id)
    {
        if(!empty(Blog::find($id)) && Blog::find($id)->user_id == $user_id)
            return true;
        return false;
    }
}
