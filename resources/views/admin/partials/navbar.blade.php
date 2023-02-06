<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                {{-- <a class="nav-link {{ Route::currentRouteName() === 'admin.dashboard' ? 'active' : '' }}"
                    aria-current="page" href="{{ route('admin.dashboard') }}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a> --}}
            </li>
            <hr>
            <li class="nav-item">
                {{-- <a class="nav-link {{ Route::currentRouteName() === 'admin.projects.index' ? 'active' : '' }}"
                    href="{{ route('admin.projects.index') }}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Projects
                </a> --}}
                <ul class="">
                    <li class="nav-item">
                        {{-- <a class="nav-link {{ Route::currentRouteName() === 'admin.technologies.index' ? 'active' : '' }}"
                            href="{{ route('admin.technologies.index') }}">
                            <span data-feather="file" class="align-text-bottom"></span>
                            Technologies
                        </a> --}}
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
