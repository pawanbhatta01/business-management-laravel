<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin.dashboard');
    }

    public function users()
    {
        return view('admin.admin.users');
    }

    public function business()
    {
        return view('admin.admin.business');
    }
    public function testimonials()
    {
        return view('admin.admin.testmonials');
    }
    public function settings()
    {
        return view('admin.admin.settings');
    }
}
