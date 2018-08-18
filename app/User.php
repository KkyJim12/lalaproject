<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{

    use SoftDeletes;

    protected $table = 'user';

    protected $primaryKey = 'user_id';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_fname','user_lname', 'user_email', 'user_password', 'facebook_id', 'user_img' , 'user_birthdate' ,'user_gender','course_qty_max'
    ];

    public function mycourse()
    {
        return $this->hasMany('App\Course','user_id','user_id');
    }

    public function addNew($input)
    {
        $check = static::where('facebook_id',$input['facebook_id'])->first();


        if(is_null($check)){
            return static::create($input);
        }


        return $check;
    }
}
