<ul class="metismenu left-sidenav-menu slimscroll">
    <li class="menu-label"></li>

    <li class="menu-label"> Admin </li>
    <li class="leftbar-menu-item">
        <a href="{{ route('dashboard') }}" class="menu-link">
            <i data-feather="home" class="align-self-center vertical-menu-icon icon-dual-vertical"></i>
            <span>Dashboard</span>
        </a>
    </li>
    @if (userRole() == 0)
        <li class="leftbar-menu-item">
            <a href="{{ route('user.list') }}" class="menu-link">
                <i data-feather="users" class="align-self-center vertical-menu-icon icon-dual-vertical"></i>
                <span>Companies</span>
            </a>
        </li>
    @endif
    @if (in_array(userRole(), [0, 1]))
        <li class="leftbar-menu-item">
            <a href="{{ route('company.setting') }}" class="menu-link">
                <i data-feather="settings" class="align-self-center vertical-menu-icon icon-dual-vertical"></i>
                <span>Settings</span>
            </a>
        </li>
    @endif
</ul>
