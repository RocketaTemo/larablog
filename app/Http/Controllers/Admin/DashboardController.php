<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\DateCheck;
use App\Facades\DateService;

class DashboardController extends Controller
{
    public function index(){

        return view('admin.dashboard');
    }
}
