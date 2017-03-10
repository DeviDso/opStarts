<?php

namespace opStarts;

use Illuminate\Database\Eloquent\Model;

class UserGroupInterests extends Model
{
    protected $table = 'user_group_interests';

    protected $fillable = ['name'];
}
