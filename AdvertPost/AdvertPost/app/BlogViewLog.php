<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Blog;
use User;

class BlogViewLog extends Model
{
    //
    protected $table = 'blog_view_logs';
    public static function checkLogByUser($blog_id, $ip_address)
    {
        $model = new BlogViewLog;
        if(count($model->where('blog_id', $blog_id)->where('ip_address', $ip_address)->get()) > 0){
            $row = $model->where('blog_id', $blog_id)->where('ip_address', $ip_address)->get()[0];
            if($model->getTimeDiff($row)){
                return "saved";
            } else{
                return "exists";
            }
        } else {
            $new_row = new BlogViewLog;
            $new_row->blog_id = $blog_id;
            $new_row->ip_address = $ip_address;
            $new_row->save();
            return "saved";
        }
    }
    public function getTimeDiff($row)
    {
        $now_time = new \DateTime();
        $start_date = new \DateTime($row->updated_at);
        $since_start = $start_date->diff($now_time);
        $diff = $since_start->i;
        if($diff > 60){ // update the view log table
            $row->updated_at = $now_time->getTimestamp();
            $row->save();
            return true;
        }
        //skip this action
        return false;
    }
    
}