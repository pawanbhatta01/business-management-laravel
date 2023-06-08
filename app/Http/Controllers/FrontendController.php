<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\BusinessPage;
use App\Models\SiteConfig;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        $settings = SiteConfig::all();
        return view('frontend.index', compact('testimonials', 'settings'));
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
    public function pages(string $slug, string $page_slug)
    {
        $business = Business::where('slug', $slug)->with('address')->with('contact')->with('ratings')->first();
        if ($business) {
            $page = BusinessPage::where('slug', $page_slug)->where('business_id', $business->id)->first();
            return view('frontend.business.page', compact('business', 'page'));
        } else {
            return abort(404);
        }
    }
}
