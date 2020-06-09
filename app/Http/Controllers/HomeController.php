<?php

namespace App\Http\Controllers;

use App\Services\DateCheck;
use App\Facades\DateService;
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
//      $this->userService = $userService;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//      dump(DateService::isValid('25/01/2018'));
        return view('home');
    }
}
