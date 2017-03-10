<?php

namespace opStarts;

use Illuminate\Database\Eloquent\Model;

class UserSkills extends Model
{
    protected $table = 'user_skills';

    protected $fillable = ['name'];
}
