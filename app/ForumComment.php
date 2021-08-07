<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumComment extends Model
{
    function getForum()
    {
        return $this->hasOne('App\Forum', "id", "forum_id");
    }

    function getUser()
    {
        return $this->hasOne('App\User', "id", "user_id");
    }
}
