<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseOtherImg extends Model
{
    protected $table = 'course_other_img';

    protected $primaryKey = 'course_other_img_id';

    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
