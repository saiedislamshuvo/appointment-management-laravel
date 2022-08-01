<div class="left-side-menu">

    <div class="h-100" data-simplebar>
        <div id="sidebar-menu">
            <ul id="side-menu">
                <li class="@if(request()->routeIs('dashboard')) menuitem-active @endif">
                    <a href="{{ route('dashboard') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-airplay">
                            <path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path>
                            <polygon points="12 15 17 21 7 21 12 15"></polygon>
                        </svg>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="@if(request()->routeIs('appointments.index')) menuitem-active @endif">
                    <a href="{{ route('appointments.index') }}">
                        <i class="dripicons-clock"></i>
                        <span> Appointments </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Core</li>

                <li class="@if(request()->routeIs('contacts.index')) menuitem-active @endif">
                    <a href="{{ route('contacts.index') }}">
                        <i class="dripicons-user-group"></i>
                        <span class="badge bg-success rounded-pill float-end">.</span>
                        <span> Contacts </span>
                    </a>
                </li>

                <li class="@if(request()->routeIs('appearance.*')) menuitem-active @endif">
                    <a href="#appearanceDropdown" data-bs-toggle="collapse">
                        <i class="fe-grid"></i>
                        <span> Appearance </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse @if(request()->routeIs('appearance.*')) show @endif" id="appearanceDropdown">
                        <ul class="nav-second-level">
                            <li class="@if(request()->routeIs('appearance.settings.*')) menuitem-active @endif">
                                <a href="{{ route('appearance.settings.index') }}">Settings</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="@if (request()->routeIs('user.*') || request()->routeIs('users.*')) menuitem-active @endif">
                    <a href="#userDropdown" data-bs-toggle="collapse">
                        <i class="dripicons-user-group"></i>
                        <span> Users </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse @if (request()->routeIs('user.*') || request()->routeIs('users.*')) show @endif" id="userDropdown">
                        <ul class="nav-second-level">
                            <li class="@if (request()->routeIs('user.*')) menuitem-active @endif">
                                <a href="{{ route('user.profile') }}">Profile</a>
                            </li>
                            <li class="@if (request()->routeIs('users.*')) menuitem-active @endif">
                                <a href="{{ route('users.index') }}">Users</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="@if(request()->routeIs('admin.roles.index')) menuitem-active @endif">
                    <a href="{{ route('admin.roles.index') }}">
                        <i class="dripicons-network-3"></i>
                        <span> Role & Permission </span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
