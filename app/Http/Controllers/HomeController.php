<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['home', 'about', 'contact']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.home');
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    function home()
    {
        return view('pages.welcome');
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    function about()
    {
        return view('pages.about');
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    function contact()
    {
        return view('pages.contact');
    }
}
