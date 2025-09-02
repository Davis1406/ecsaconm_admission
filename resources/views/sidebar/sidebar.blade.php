<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Menu</span>
                </li>

                <li class="{{ set_active(['home']) }}">
                    <a href="{{ route('home') }}">
                        <i class="la la-dashboard"></i>
                        <span> Dashboard</span>
                    </a>
                </li>

                {{-- <!-- Existing Applications Link -->
                <li class="nav-item @if (Request::segment(1) == 'applications' && (Request::segment(2) == 'list' || Request::segment(2) == 'view_application' || Request::segment(2) == 'update_application')) active @endif">
                    <a href="{{ route('applications') }}">
                        <i class="la la-files-o"></i>
                        <span>Applications</span>
                    </a>
                </li> --}}

                <!-- New Application Years Page Link -->
                <li class="nav-item @if (Request::segment(1) == 'applications' && Request::segment(2) == 'year') active @endif">
                    <a href="{{ route('applications.year') }}">
                        <i class="la la-calendar"></i>
                        <span>Applications</span>
                    </a>
                </li>

                @if (Auth::user()->role_name == 'Admin')
                    <li
                        class="{{ set_active(['userManagement']) }} {{ Request::is('employee/profile/*') ? 'active' : '' }}">
                        <a href="{{ route('userManagement') }}">
                            <i class="la la-gear"></i> <span> User Management</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
