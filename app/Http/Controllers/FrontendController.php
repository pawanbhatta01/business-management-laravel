<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function businessSearch(Request $request)
    {
        return $request->q;
    }

    public function business(string $slug)
    {
        $business = Business::where('slug', $slug)->with('address')->with('contact')->with('ratings')->first();
        if ($business) {
            return view('frontend.listing-detail', compact('business'));
        } else {
            return abort(404);
        }
    }
}
