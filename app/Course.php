<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{

    use SoftDeletes;

    protected $table = 'course';

    protected $primaryKey = 'course_id';

    protected $dates = ['deleted_at'];

    public function course_category()
    {
        return $this->hasOne('App\Category','category_id','category_id');
    }

    public function myuser()
    {
       return $this->belongsTo('App\User','user_id','user_id');
    }

    public function study()
    {
        return $this->belongsToMany('App\User','study','course_id','user_id');
    }

    public function course_other_img()
    {
        return $this->hasMany('App\CourseOtherImg','course_other_img_id','course_id');
    }
}
