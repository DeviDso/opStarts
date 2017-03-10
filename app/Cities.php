<?php

namespace opStarts;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $table = 'cities';

    protected $fillable = ['name', 'slug'];

    public static function slug($name)
    {
        $city = Cities::where('name', 'LIKE', '%' . $name . '%')->first();

        return $city->slug;
    }

    public function pages()
    {
        return $this->hasMany('opStarts\Pages', 'city', 'id');
    }

    public static function getName($id)
    {
        if(Cities::find($id))
        {
            $city = Cities::find($id);

            return $city->name;
        }

        return '';
    }

    public static function getSlug($id)
    {
        $city = Cities::find($id);

        return $city->slug;
    }
}
