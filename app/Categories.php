<?php

namespace opStarts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Categories extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name', 'name_dk', 'slug', 'slug_dk', 'icon'];

    public function skills()
    {
        return $this->hasMany('opStarts\Skills', 'category', 'id');
    }
    public function pages()
    {
        return $this->hasMany('opStarts\Pages', 'category_id', 'id');
    }
    public static function updateCat($data)
    {
        Categories::find($data['category'])
            ->update([
                'name' => $data['name'],
                'name_dk' => $data['nameDK'],
                'slug' => str_slug($data['name']),
                'slug_dk' => str_slug($data['nameDK']),
                'icon' => $data['icon'],
            ]);
    }

    public static function name($id)
    {
        $category = Categories::find($id);

        return $category->name;
    }

    public static function getSlug($id)
    {
        $category = Categories::find($id);

        return $category->slug;
    }

    public static function hasProfession($cat, $prof)
    {
        $cat = Categories::find($cat);
        $check = $cat->professions()->where('profession_id', '=', $prof)->exists();

        if($check)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function getCities($id)
    {
        $pages = Pages::where('category_id', $id)->get();

        $listOfCities = [];

        foreach($pages as $page)
        {
            $listOfCities[] = $page->city;
        }

        $cities = Cities::whereIn('id', $listOfCities)->orderBy('name', 'asc')->get();

        return $cities;
    }

    public static function getSkillsOLD($id)
    {
        $pages = Pages::where('category_id', $id)->get();

        $listOfSkills = [];

        foreach($pages as $page)
        {
            foreach($page->skills()->get() as $skill)
            {
                $listOfSkills[] = $skill->id;
            }
        }

        $listOfSkills = array_unique($listOfSkills);

        return $listOfSkills;
    }

    public static function getSkills($category, $city = NULL)
    {
        if($city !== NULL)
        {
            $pages = Pages::where('category_id', $category)->where('city', $city)->get();
        }
        else
        {
            $pages = Pages::where('category_id', $category)->get();
        }

        $listOfSkills = [];

        foreach($pages as $page)
        {
            foreach($page->skills()->get() as $pageSkill)
            {
                $listOfSkills[] = $pageSkill->id;
            }
        }

        $listOfSkills = array_unique($listOfSkills);

        return $listOfSkills;
    }

}
