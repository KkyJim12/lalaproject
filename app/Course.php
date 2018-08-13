<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';

    protected $primaryKey = 'course_id';

    public function course_category()
    {
        return $this->hasOne('App\Category','category_id','category_id');
    }

    public function myuser()
    {
       return $this->belongsTo('App\User','user_id','user_id');
    }
}
