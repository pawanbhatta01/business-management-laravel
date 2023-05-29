<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\BusinessPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BusinessController extends Controller
{
    public function manageBusinesses()
    {
        if (Auth::user()->role == 1) {
            return view('admin.business.business');
        } else {
            return abort(401);
        }
    }
    public function dashboard()
    {
        if (Auth::user()->role == 1) {
            return view('admin.index');
        } elseif (Auth::user()->role == 0) {
            return redirect()->route('admin.dashboard');
        } else {
            return abort(401);
        }
    }

    public function index(string $slug)
    {
        $business = Business::where('slug', $slug)->where('status', 1)->first();
        if ($business) {
            if ($business->creator_id == Auth::id() && Auth::user()->role == 1) {
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
            if ($business->creator_id == Auth::id() && Auth::user()->role == 1) {
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
            if ($business->creator_id == Auth::id() && Auth::user()->role == 1) {
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
            if ($business->creator_id == Auth::id() && Auth::user()->role == 1) {
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
            if ($business->creator_id == Auth::id() && Auth::user()->role == 1) {
                return view('admin.business.file');
            } else {
                return abort(401);
            }
        } else {
            return abort(404);
        }
    }
    public function pages(string $slug)
    {
        $business = Business::where('slug', $slug)->where('status', 1)->first();
        if ($business) {
            if ($business->creator_id == Auth::id() && Auth::user()->role == 1) {
                return view('admin.business.page');
            } else {
                return abort(401);
            }
        } else {
            return abort(404);
        }
    }

    public function addPage(string $slug)
    {
        $business = Business::where('slug', $slug)->where('status', 1)->first();
        if ($business) {
            if ($business->creator_id == Auth::id() && Auth::user()->role == 1) {
                return view('admin.business.addpage', ['slug' => $slug]);
            } else {
                return abort(401);
            }
        } else {
            return abort(404);
        }
    }
    public function editPage($slug, $page_slug)
    {
        $business = Business::where('slug', $slug)->where('status', 1)->first();
        if ($business) {
            if ($business->creator_id == Auth::id() && Auth::user()->role == 1) {
                $page = BusinessPage::where('slug', $page_slug)->whereNotIn('slug', ['home', 'about', 'services', 'gallery', 'contact'])->first();
                if ($page) {
                    return view('admin.business.addpage', ['slug' => $slug, 'page' => $page]);
                } else {
                    return abort(404);
                }
            } else {
                return abort(401);
            }
        } else {
            return abort(404);
        }
    }

    public function storePage(string $slug, Request $request)
    {
        $business = Business::where('slug', $slug)->where('status', 1)->first();
        if ($business) {
            if ($business->creator_id == Auth::id() && Auth::user()->role == 1) {
                $page = new BusinessPage;
                $validatedData = $request->validate([
                    'title' => 'required|string',
                    'slug' => 'required|unique:business_pages,slug|alpha_dash',
                    'content' => 'required|min:1000'
                ]);
                $page->title = $request->title;
                $page->slug = $request->slug;
                $page->content = $request->content;
                $page->business_id = $business->id;

                if ($request->featured_image) {
                    $request->validate([
                        'featured_image' => 'image|mimes:png,jpg,jpeg|max:2048'
                    ]);
                    $name = strtolower($request->slug . "-" . time() . "." . $request->featured_image->extension());
                    $request->featured_image->move(public_path('images'), $name);

                    $page->featured_image = $name;
                }

                $page->save();

                return redirect()->route('business.pages', $slug);
            } else {
                return abort(401);
            }
        } else {
            return abort(404);
        }
    }
    public function updatePage(Request $request, $slug, $page_slug)
    {
        $business = Business::where('slug', $slug)->where('status', 1)->first();
        if ($business) {
            if ($business->creator_id == Auth::id() && Auth::user()->role == 1) {
                $page = BusinessPage::where('slug', $page_slug)->whereNotIn('slug', ['home', 'about', 'services', 'gallery', 'contact'])->first();
                if ($page) {
                    $validatedData = $request->validate([
                        'title' => 'required|string',
                        'slug' => 'required|alpha_dash|unique:business_pages,slug,' . $page->id,
                        'content' => 'required|min:1000'
                    ]);
                    $page->title = $request->title;
                    $page->slug = $request->slug;
                    $page->content = $request->content;
                    $page->business_id = $business->id;

                    if ($request->featured_image) {
                        $request->validate([
                            'featured_image' => 'image|mimes:png,jpg,jpeg|max:2048'
                        ]);
                        $name = strtolower($request->slug . "-" . time() . "." . $request->featured_image->extension());
                        $request->featured_image->move(public_path('images'), $name);

                        if ($page->featured_image) {
                            File::delete(public_path('images/' . $page->featured_image));
                        }
                        $page->featured_image = $name;
                    }
                    $page->update();
                    return redirect()->route('business.pages', $slug);
                } else {
                    return abort(404);
                }
            } else {
                return abort(401);
            }
        } else {
            return abort(404);
        }
    }

    public function menus(string $slug)
    {
        $business = Business::where('slug', $slug)->where('status', 1)->first();
        if ($business) {
            if ($business->creator_id == Auth::id() && Auth::user()->role == 1) {
                return view('admin.business.menus', ['slug' => $slug]);
            } else {
                return abort(401);
            }
        } else {
            return abort(404);
        }
    }
}
