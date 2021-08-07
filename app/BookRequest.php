<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookRequest extends Model
{
    function getBook()
    {
        return $this->hasOne('App\Book', "id", "book_id");
    }
}
