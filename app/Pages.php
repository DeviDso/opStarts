<?php

namespace opStarts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Pages extends Model
{

    protected $fillable = ['user_id', 'type', 'category_id', 'name', 'company_type', 'cvr_number', 'description', 'post_code', 'city',
        'street', 'number', 'country', 'address', 'map_lat', 'map_long', 'work_experience', 'phone_number', 'email', 'website', 'facebook',
        'linkedin', 'google', 'logo', 'cover', 'slug'];

    public function user()
    {
        return $this->belongsTo('opStarts\User');
    }

    public function skills()
    {
        return $this->belongsToMany('opStarts\Skills', 'page_skills', 'page_id', 'skill_id');
    }

    public function category()
    {
        return $this->belongsTo('opStarts\Categories');
    }

    public static function status($id)
    {
        $page = Pages::find($id);

        ($page->status == 0) ? $status = 'Inactive' : $status = 'Active';

        return $status;
    }

    public static function hasService($page, $service)
    {
        $page = Pages::find($page);
        $check = $page->services()->where('service_id', '=', $service)->exists();

        if($check)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
