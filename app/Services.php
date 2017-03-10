<?php

namespace opStarts;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $fillable = ['name', 'name_dk', 'slug', 'slug_dk'];

    public function professions()
    {
        return $this->belongsToMany('opStarts\Profession', 'profession_service', 'service_id', 'profession_id');
    }

    public function pages()
    {
        return $this->belongsToMany('opStarts\Pages', 'page_service', 'service_id', 'page_id');
    }

}
