<?php

namespace opStarts;

use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    protected $table = 'favorites';

    protected $fillable = ['user_id', 'page_id'];
}
