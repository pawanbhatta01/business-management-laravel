<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('frontend.business.index', $business->slug) ? 'active' : '' }}"
                        aria-current="page" href="{{ route('frontend.business.index', $business->slug) }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('frontend.business.about', $business->slug) ? 'active' : '' }}"
                        aria-current="page" href="{{ route('frontend.business.about', $business->slug) }}">About</a>
                </li>
                <li
                    class="nav-item {{ request()->routeIs('frontend.business.services', $business->slug) ? 'active' : '' }}">
                    <a class="nav-link" aria-current="page"
                        href="{{ route('frontend.business.services', $business->slug) }}">Services</a>
                </li>
                <li
                    class="nav-item {{ request()->routeIs('frontend.business.gallery', $business->slug) ? 'active' : '' }}">
                    <a class="nav-link" aria-current="page"
                        href="{{ route('frontend.business.gallery', $business->slug) }}">Gallery</a>
                </li>
                <li
                    class="nav-item {{ request()->routeIs('frontend.business.contact', $business->slug) ? 'active' : '' }}">
                    <a class="nav-link" aria-current="page"
                        href="{{ route('frontend.business.contact', $business->slug) }}">Contact</a>
                </li>
                @if (count($business->menus))
                    <div class="dropdown nav-item">
                        <a class=" dropdown-toggle nav-link" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Pages
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            @foreach ($business->menus as $menu)
                                <li><a class="dropdown-item" href="">{{ $menu->page->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </ul>
        </div>
    </div>
</nav>
