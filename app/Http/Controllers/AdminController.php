<?php

namespace opStarts\Http\Controllers;

use Illuminate\Support\Facades\URL;
use opStarts\Categories;
use opStarts\CategoryProfessions;
use opStarts\Profession;
use opStarts\Services;
use opStarts\Subcategories;
use Illuminate\Http\Request;

use opStarts\Http\Requests;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //CATEGORIES
    public function categories()
    {
        $data['categories'] = Categories::all();

        return view('admin.category.all', $data);
    }

    public function addCategory()
    {
        return view('admin.category.add');
    }

    public function postCategory(Request $r)
    {
        $data = $r->all();

        (isset($data['icon'])) ? true : $data['icon'] = '';

        $validator = Validator::make($data,[
            'name' => 'required|min:1|unique:categories',
            'name_dk' => 'required|min:1|unique:categories',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        Categories::create([
            'name' => $data['name'],
            'name_dk' => $data['name_dk'],
            'slug' => str_slug($data['name']),
            'slug_dk' => str_slug($data['name_dk']),
            'icon' => $data['icon']
        ]);

        return redirect()->back()->with('status', 'You successfully added new category: ', $data['name'] . '!');
    }

    public function deleteCategory($id)
    {
        Categories::destroy($id);

        return redirect()->back()->with('status', 'You have deleted category!');
    }

    public function category($id)
    {
        $data['category'] = Categories::find($id);

        return view('admin.category.edit', $data);
    }

    public function editCategory(Request $r, $id)
    {
        $data = $r->all();

        (isset($data['icon'])) ? true : $data['icon'] = '';

        $validator = Validator::make($data,[
            'name' => 'required|min:1|unique:categories,name,'. $id,
            'name_dk' => 'required|min:1|unique:categories,name_dk,' .$id,
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        Categories::find($id)->update([
            'name' => $data['name'],
            'name_dk' => $data['name_dk'],
            'slug' => str_slug($data['name']),
            'slug_dk' => str_slug($data['name_dk']),
            'icon' => $data['icon']
        ]);

        return redirect(URL::route('adminCategories'))->with('status', 'You have updated ' . $data['name'] . ' category!');
    }

    public function categoryProfession($id)
    {
        $data['category'] = Categories::find($id);
        $data['professions'] = Profession::all();

        return view('admin.category.assign', $data);
    }

    public function postCategoryProfession(Request $r, $id)
    {
        $data = $r->all();

        $cat = Categories::find($id);
        $cat->professions()->sync($data['professions']);

        return redirect(URL::route('adminCategories'))->with('status', 'You have attached new professions to this category!');
    }

    //PROFESSION

    public function professions()
    {
        $data['professions'] = Profession::all();

        return view('admin.profession.all', $data);
    }

    public function addProfession()
    {
        return view('admin.profession.add');
    }

    public function postProfession(Request $r)
    {
        $data = $r->all();

        $validator = Validator::make($data,[
            'name' => 'required|min:1|unique:professions',
            'name_dk' => 'required|min:1|unique:professions',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        Profession::create([
            'name' => $data['name'],
            'name_dk' => $data['name_dk'],
            'slug' => str_slug($data['name']),
            'slug_dk' => str_slug($data['name_dk']),
        ]);

        return redirect()->back()->with('status', 'You successfully added new profession: ', $data['name'] . '!');
    }

    public function deleteProfession($id)
    {
        Profession::destroy($id);

        return redirect()->back()->with('status', 'You have deleted profession!');
    }

    public function adminProfession($id)
    {
        $data['profession'] = Profession::find($id);

        return view('admin.profession.edit', $data);
    }

    public function professionService($id)
    {
        $data['profession'] = Profession::find($id);
        $data['services'] = Services::all();

        return view('admin.profession.assign', $data);
    }

    public function postProfessionService(Request $r, $id)
    {
        $data = $r->all();

        $prof = Profession::find($id);
        $prof->services()->sync($data['services']);

        return redirect(URL::route('adminProfessions'))->with('status', 'You have attached new services to this profession!');
    }

    public function editProfession(Request $r, $id)
    {
        $data = $r->all();

        $validator = Validator::make($data,[
            'name' => 'required|min:1|unique:professions,name,'. $id,
            'name_dk' => 'required|min:1|unique:professions,name_dk,' .$id,
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        Profession::find($id)->update([
            'name' => $data['name'],
            'name_dk' => $data['name_dk'],
            'slug' => str_slug($data['name']),
            'slug_dk' => str_slug($data['name_dk']),
        ]);

        return redirect(URL::route('adminProfessions'))->with('status', 'You have updated ' . $data['name'] . ' profession!');
    }

    //SERVICES

    public function services()
    {
        $data['services'] = Services::all();

        return view('admin.service.all', $data);
    }

    public function addService()
    {
        return view('admin.service.add');
    }

    public function postService(Request $r)
    {
        $data = $r->all();

        $validator = Validator::make($data,[
            'name' => 'required|min:1|unique:services',
            'name_dk' => 'required|min:1|unique:services',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        Services::create([
            'name' => $data['name'],
            'name_dk' => $data['name_dk'],
            'slug' => str_slug($data['name']),
            'slug_dk' => str_slug($data['name_dk']),
        ]);

        return redirect()->back()->with('status', 'You successfully added new service: ', $data['name'] . '!');
    }

    public function deleteService($id)
    {
        Services::destroy($id);

        return redirect()->back()->with('status', 'You have deleted service!');
    }

    public function adminService($id)
    {
        $data['service'] = Services::find($id);

        return view('admin.service.edit', $data);
    }

    public function editService(Request $r, $id)
    {
        $data = $r->all();

        $validator = Validator::make($data,[
            'name' => 'required|min:1|unique:services,name,' . $id,
            'name_dk' => 'required|min:1|unique:services,name_dk,' .$id,
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        Services::find($id)->update([
            'name' => $data['name'],
            'name_dk' => $data['name_dk'],
            'slug' => str_slug($data['name']),
            'slug_dk' => str_slug($data['name_dk']),
        ]);

        return redirect(URL::route('adminServices'))->with('status', 'You have updated ' . $data['name'] . ' service!');
    }

}
