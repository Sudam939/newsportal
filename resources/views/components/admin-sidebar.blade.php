<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html"> <img alt="image" src="/assets/img/logo.png" class="header-logo" />
            <span class="logo-name">Otika</span>
        </a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown {{ Request::routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="settings"></i><span>Settings</span></a>
            <ul class="dropdown-menu">
                <li class="{{ Request::routeIs('company*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('company.index') }}">Company Setup</a></li>
            </ul>
        </li>
        <li class="dropdown {{ Request::routeIs('category*') ? 'active' : '' }}">
            <a href="{{ route('category.index') }}" class="nav-link"><i data-feather="tag"></i><span>Category</span></a>
        </li>

        <li class="dropdown {{ Request::routeIs('post*') ? 'active' : '' }}">
            <a href="{{ route('post.index') }}" class="nav-link"><i data-feather="file-text"></i><span>Post</span></a>
        </li>

        <li class="dropdown {{ Request::routeIs('advertise*') ? 'active' : '' }}">
            <a href="{{ route('advertise.index') }}" class="nav-link"><i
                    data-feather="image"></i><span>Advertise</span></a>
        </li>
    </ul>
</aside>
