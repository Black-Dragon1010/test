<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Blog;

class SiteInfo extends Model
{
    //
    protected $table = 'company_info';  
    protected $id = 1;
    public static function getVisits()
    {
        $model = new SiteInfo;
        return $model->find(1)->visits;
    }
    public static function increaseVisits()
    {
        $model = SiteInfo::find(1   );
        $model->visits += 1;
        $model->save();
    }
}
