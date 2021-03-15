<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Blog;

class Contact extends Model
{
    //
    protected $table = 'contacts';
    protected $fillable = ['content', 'email'];
    
    
}