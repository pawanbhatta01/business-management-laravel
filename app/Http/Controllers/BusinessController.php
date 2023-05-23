<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function manageBusinesses()
    {
        return view('admin.business.business');
    }

    public function about()
    {
        return view('admin.business.business');
    }
}
