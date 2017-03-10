<?php

namespace opStarts\Http\Controllers;

use Illuminate\Http\Request;

use opStarts\Categories;
use opStarts\Http\Requests;
use opStarts\Pages;
use opStarts\Profession;
use opStarts\Services;
use opStarts\Skills;
use opStarts\User;

class ExportController extends Controller
{
    public function categories()
    {
        $categories = Categories::select('id', 'name', 'name_dk')->get();

        $response = 200;

        $header = [
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        ];

        return response()->json($categories, $response, $header, JSON_UNESCAPED_UNICODE);
    }

    public function professions(Request $r)
    {
        if($r->input('key') != '')
        {
            $professions = Profession::where('name', 'LIKE', '%' . $r->input('key') . '%')->select('id', 'name', 'name_dk')->get();
        }
        else
        {
            $professions = Profession::select('id', 'name', 'name_dk')->get();
        }

        $response = 200;

        $header = [
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        ];

        return response()->json($professions, $response, $header, JSON_UNESCAPED_UNICODE);
    }

    public function services()
    {
        $services = Services::select('id', 'name', 'name_dk')->get();

        $response = 200;

        $header = [
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        ];

        return response()->json($services, $response, $header, JSON_UNESCAPED_UNICODE);
    }

    public function pageGeo($id)
    {
        $page = Pages::find($id)->select('map_lat', 'map_long')->get();

        $response = 200;

        $header = [
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        ];

        return response()->json($page, $response, $header, JSON_UNESCAPED_UNICODE);
    }

    public function allSkills()
    {
        $skills = Skills::all();

        $response = 200;

        $header = [
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        ];

        return response()->json($skills, $response, $header, JSON_UNESCAPED_UNICODE);
    }

    public function allMembers()
    {
        $users = User::select('id', 'email', 'name', 'surname')->get();

        $response = 200;

        $header = [
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        ];

        return response()->json($users, $response, $header, JSON_UNESCAPED_UNICODE);
    }

    public function searchService($name)
    {
        $pages = Pages::all();

        $response = 200;

        $header = [
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        ];

        return response()->json($pages, $response, $header, JSON_UNESCAPED_UNICODE);
    }
}
