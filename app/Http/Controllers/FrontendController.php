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

    public function home(string $slug)
    {
        $business = Business::where('slug', $slug)->with('address')->with('contact')->with('ratings')->first();
        if ($business) {
            return view('frontend.business.listing-detail', compact('business'));
        } else {
            return abort(404);
        }
    }
    public function about(string $slug)
    {
        $business = Business::where('slug', $slug)->with('address')->with('contact')->with('ratings')->first();
        if ($business) {
            return view('frontend.business.about', compact('business'));
        } else {
            return abort(404);
        }
    }
    public function services(string $slug)
    {
        $business = Business::where('slug', $slug)->with('address')->with('contact')->with('ratings')->first();
        if ($business) {
            return view('frontend.business.services', compact('business'));
        } else {
            return abort(404);
        }
    }
    public function gallery(string $slug)
    {
        $business = Business::where('slug', $slug)->with('address')->with('contact')->with('ratings')->first();
        if ($business) {
            return view('frontend.business.gallery', compact('business'));
        } else {
            return abort(404);
        }
    }
    public function contact(string $slug)
    {
        $business = Business::where('slug', $slug)->with('address')->with('contact')->with('ratings')->first();
        if ($business) {
            return view('frontend.business.contact', compact('business'));
        } else {
            return abort(404);
        }
    }
}
