<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * showing home page
     */
    public function index()
    {
        return view('frontend.index');
    }


    /**
     * showing login page
     */
    public function login()
    {
        return view('frontend.login');
    }


    /**
     * showing register page
     */
    public function register()
    {
        return view('frontend.register');
    }
}
