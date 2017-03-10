<?php

namespace opStarts;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = 'portfolio';

    protected $fillable = ['page_id', 'title', 'description', 'url'];

    public function page()
    {
        return $this->belongsTo('opStarts\Pages');
    }
}
