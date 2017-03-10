<?php

namespace opStarts;

use Illuminate\Database\Eloquent\Model;

class UserGroupInvitation extends Model
{
    protected $table = 'user_group_invitation';

    protected $fillable = ['group_id', 'email'];
}
