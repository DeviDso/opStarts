<?php

namespace opStarts;

use Illuminate\Database\Eloquent\Model;

class SkillsCategory extends Model
{
    protected $table = 'skills_category';

    protected $fillable = ['name', 'slug'];
}
