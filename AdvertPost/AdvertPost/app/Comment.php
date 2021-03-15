<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Blog;

class Comment extends Model
{
    //
    protected $table = 'comments';
    protected $fillable = ['content'];
    public static function getComments($blog_id)
    {
        $comments = DB::table('comments_with_user')->where('blog_id', $blog_id)->get();
        return $comments;
    }
    
}