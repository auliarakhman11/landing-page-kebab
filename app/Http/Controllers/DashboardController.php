<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Auth::logout();
        return view('page.dashboard',['title' => 'Dashboard']);
    }
}
