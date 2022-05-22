<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ url('/') }}" target="_blank">{{ config('settings.site_name') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/') }}">St</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li>
            <a class="nav-link" href="{{ route('home') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
        </li>
        <li>
            <a class="nav-link" href="{{ route('header.index') }}"><i class="fas fa-fire"></i>
                <span>Header</span></a>
        </li>
        <li class="nav-item dropdown ">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
                <span>About Page</span>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a class="nav-link" href="{{ route('welcome.index') }}"><i class="fas fa-fire ml-0 mr-1"></i>
                        <span>Welcome</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('about.index') }}"><i class="fas fa-fire ml-0 mr-1"></i>
                        <span>About</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('testimony.index') }}"><i class="fas fa-fire ml-0 mr-1"></i>
                        <span>Testimony</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a class="nav-link" href="{{ route('booking.index') }}"><i class="fas fa-fire"></i>
                <span>Booking</span>
            </a>
        </li>
        <li>
            <a class="nav-link" href="{{ route('destination.index') }}"><i class="fas fa-fire"></i>
                <span>Destination</span>
            </a>
        </li>
        <li>
            <a class="nav-link" href="{{ route('gallery.index') }}"><i class="fas fa-fire"></i>
                <span>Gallery</span>
            </a>
        </li>
        <li class="nav-item dropdown ">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
                <span>Post</span>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a class="nav-link" href="{{ route('post-category.index') }}">Post Category</a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('post.index') }}">Post</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="nav-link" href="{{ route('contact.index') }}"><i class="fas fa-fire"></i>
                <span>Contact</span>
            </a>
        </li>
        <li>
            <a class="nav-link" href="{{ route('user.index') }}"><i class="fas fa-fire"></i>
                <span>User</span>
            </a>
        </li>
        <li>
            <a class="nav-link" href="{{ route('setting.web') }}"><i class="fas fa-fire"></i>
                <span>Web Setting</span>
            </a>
        </li>
    </ul>
</aside>