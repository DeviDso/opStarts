<?php

namespace opStarts;

use Illuminate\Database\Eloquent\Model;

class CurrentStatus extends Model
{
    protected $table = 'current_status';

    protected $fillable = ['name'];

    public static function getName($id)
    {
        $status = CurrentStatus::find($id);

        return $status->name;
    }
}
