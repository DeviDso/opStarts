<?php

namespace opStarts\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use opStarts\Http\Requests;
use opStarts\Portfolio;

class GalleryController extends Controller
{
    public function store(Request $r)
    {
        $mime = $r->file('file')->getClientOriginalExtension();
        $fileName = $string = str_random(15) . '.' . $mime;
        $path = 'pages/' . $r->input('pageId') . '/gallery/';

        $r->file('file')->storeAs($path, $fileName);

        Portfolio::store($r->input('pageId'), $path . $fileName);

        return $path . $fileName;
    }
}
