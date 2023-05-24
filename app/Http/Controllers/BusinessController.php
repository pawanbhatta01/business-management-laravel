<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    public function manageBusinesses()
    {
        return view('admin.business.business');
    }

    public function index(string $slug)
    {
        $business = Business::where('slug', $slug)->where('status', 1)->first();
        if ($business) {
            if ($business->creator_id == Auth::id()) {
                return view('admin.business.index');
            } else {
                return abort(401);
            }
        } else {
            return abort(404);
        }
    }

    public function information(string $slug)
    {
        $business = Business::where('slug', $slug)->where('status', 1)->first();
        if ($business) {
            if ($business->creator_id == Auth::id()) {
                return view('admin.business.information');
            } else {
                return abort(401);
            }
        } else {
            return abort(404);
        }
    }

    public function schedule(string $slug)
    {
        $business = Business::where('slug', $slug)->where('status', 1)->first();
        if ($business) {
            if ($business->creator_id == Auth::id()) {
                return view('admin.business.schedules');
            } else {
                return abort(401);
            }
        } else {
            return abort(404);
        }
    }

    public function rating(string $slug)
    {
        $business = Business::where('slug', $slug)->where('status', 1)->first();
        if ($business) {
            if ($business->creator_id == Auth::id()) {
                return view('admin.business.rating');
            } else {
                return abort(401);
            }
        } else {
            return abort(404);
        }
    }

    public function files(string $slug)
    {
        $business = Business::where('slug', $slug)->where('status', 1)->first();
        if ($business) {
            if ($business->creator_id == Auth::id()) {
                return view('admin.business.file');
            } else {
                return abort(401);
            }
        } else {
            return abort(404);
        }
    }
}
