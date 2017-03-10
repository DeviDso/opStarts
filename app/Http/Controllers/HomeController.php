<?php

namespace opStarts\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use opStarts\UserGroupInvitation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        (!empty(Auth::user()->surname)) ? $data['profile'] = false : $data['profile'] = true;

        return view('home', $data);
    }
}
