<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    function getUser()
    {
        return $this->hasOne('App\User', "id", "user_id");
    }

    function getComments()
    {
        return $this->hasMany('App\ForumComment', "forum_id", "id");
    }
}
