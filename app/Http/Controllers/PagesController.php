<?php

namespace opStarts\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use opStarts\Cities;
use opStarts\CompanyTypes;
use opStarts\CurrentStatus;
use opStarts\Http\Requests;
use opStarts\Pages;
use opStarts\Categories;
use opStarts\Portfolio;
use opStarts\Services;
use opStarts\Skills;

class   PagesController extends Controller
{

    public function home()
    {
        $data['categories'] = Categories::all();

        return view('home', $data);
    }

    public function confirmation()
    {
        return view('auth.confirmation');
    }

    public function profile()
    {
        $data['user'] = User::find(Auth::user()->id);
        $data['current_status'] = CurrentStatus::all();
        $data['skills'] = Auth::user()->skills()->get();

        return view('profile.main', $data);
    }

    public function newPage()
    {
        $data['categories'] = Categories::all();
        $data['company_types'] = CompanyTypes::all();

        return view('user.pages.new', $data);
    }

    public function myIndividualPage($id)
    {
        $data['page'] = Pages::find($id);
        $data['skills'] = $data['page']->skills()->get();

        return view('user.pages.individual', $data);
    }

    public function myCompanyPage($id)
    {
        $data['page'] = Pages::find($id);
        $data['skills'] = $data['page']->skills()->get();

        return view('user.pages.company', $data);
    }

    public function myPages()
    {
        $data['pages'] = Auth::user()->pages()->get();
//        $data['toast'] = true;

        return view('user.pages.myList', $data);
    }

    public function category($slug)
    {
        $category = Categories::where('slug', $slug)->first();

        $data['category'] = $category;

        $data['pages'] = $category->pages()->where('status', 1)->get();

        return view('user.pages.all', $data);
    }

    public function categoryCity($category, $city)
    {
        $data['city'] = Cities::where('slug', $city)->first();
        $data['category'] = Categories::where('slug', $category)->first();

        $data['pages'] = Pages::where('city', $data['city']->id)->where('category_id', $data['category']->id)->get();

        return view('user.pages.all', $data);
    }

    public function categorySkill($category, $skill)
    {
        $data['category'] = Categories::where('slug', $category)->first();
        $data['skill'] = Skills::where('slug', $skill)->first();

        $pages = Pages::where('category_id', $data['category']->id)->get();

        $listOfPages = [];

        foreach($pages as $page)
        {
            foreach($page->skills()->get() as $pageSkill)
            {
                if($pageSkill->id == $data['skill']->id)
                {
                    $listOfPages[] = $page->id;
                }
            }
        }

        $data['pages'] = Pages::whereIn('id', $listOfPages)->get();

        return view('user.pages.all', $data);
    }

    public function categoryCitySkill($category, $city, $skill)
    {
        $data['city'] = Cities::where('slug', $city)->first();
        $data['category'] = Categories::where('slug', $category)->first();
        $data['skill'] = Skills::where('slug', $skill)->first();

        $pages = Pages::where('city', $data['city']->id)->where('category_id', $data['category']->id)->get();

        $listOfPages = [];

        foreach($pages as $page)
        {
            foreach($page->skills()->get() as $pageSkill)
            {
                if($pageSkill->id == $data['skill']->id)
                {
                    $listOfPages[] = $page->id;
                }
            }
        }

        $data['pages'] = Pages::whereIn('id', $listOfPages)->get();

        return view('user.pages.all', $data);
    }

    public function viewPage($category, $city, $slug, $id)
    {
        $data['category'] = Categories::where('slug', $category)->first();
        $data['city'] = Cities::where('slug', $city)->first();
        $data['page'] = Pages::find($id);
        $data['gallery_items'] = Portfolio::where('page_id', $id)->get();

        return view('user.pages.pageView.main', $data);
    }

    public function about()
    {
        return view('about');
    }

    public function user($id)
    {
        $data['user'] = User::find($id);

        return view('user.view', $data);
    }
}
