<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';

    protected $primaryKey = 'user_id';

    public function mycourse()
    {
        return $this->hasMany('App\Course','user_id','user_id');
    }

}
