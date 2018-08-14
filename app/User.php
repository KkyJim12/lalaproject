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

    public function mycourse()
    {
        return $this->hasMany('App\Course','user_id','user_id');
    }

}
