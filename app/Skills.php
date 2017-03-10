<?php

namespace opStarts;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    protected $table = 'skills';

    protected $fillable = ['name', 'slug', 'category'];

    public static function getSkill($id)
    {
        $skill = Skills::find($id);

        return $skill;
    }

    public static function getSuggestedSkill($id)
    {
        $getService = Skills::find($id);

        $category = $getService->category;

        $pages = Pages::where('category_id', $category)->get();

        $listOfServices = [];

        foreach($pages as $page)
        {
            foreach($page->skills()->get() as $pageSkill)
            {
                if($pageSkill->category == $category)
                {
                    $listOfServices[] = $pageSkill->id;
                }
            }
        }

        $suggestedServices = Skills::whereIn('id', $listOfServices)->get();

        return $suggestedServices;
    }
}
