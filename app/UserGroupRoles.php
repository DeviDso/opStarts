<?php

namespace opStarts;

use Illuminate\Database\Eloquent\Model;

class UserGroupRoles extends Model
{
    protected $table = 'user_group_roles';

    protected $fillable = ['name'];

    public $timestamps = false;

    public static function neutral()
    {

    }

    public static function moderator()
    {

    }

    public static function administrator()
    {

    }
}
