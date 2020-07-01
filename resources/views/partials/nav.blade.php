<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="bg-header-dark">
        <div class="content-header bg-white-10">
            <!-- Logo -->
            <a class="link-fx font-w600 font-size-lg text-white" href="/">
                            <span class="smini-visible">
                                <span class="text-white-75">{{config('app.name')}}</span>
                            </span>
                <span class="smini-hidden">
                                <span class="text-white-75">{{config('app.name')}}</span>
                            </span>
            </a>
            <!-- END Logo -->

            <!-- Options -->
            <div>
                <!-- Toggle Sidebar Style -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
{{--                <a class="js-class-toggle text-white-75" data-target="#sidebar-style-toggler"--}}
{{--                   data-class="fa-toggle-off fa-toggle-on" data-toggle="layout" data-action="sidebar_style_toggle"--}}
{{--                   href="javascript:void(0)">--}}
{{--                    <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>--}}
{{--                </a>--}}
                <!-- END Toggle Sidebar Style -->

                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <a class="d-lg-none text-white ml-2" data-toggle="layout" data-action="sidebar_close"
                   href="javascript:void(0)">
                    <i class="fa fa-times-circle"></i>
                </a>
                <!-- END Close Sidebar -->
            </div>
            <!-- END Options -->
        </div>
    </div>
    <!-- END Side Header -->

    <!-- Side Navigation -->
    <div class="content-side content-side-full">
        <ul class="nav-main">
            <li class="nav-main-item">
                <a class="nav-main-link{{ request()->is('dashboard') ? ' active' : '' }}" href="/dashboard">
                    <i class="nav-main-link-icon fa fa-tachometer-alt"></i>
                    <span class="nav-main-link-name">Dashboard</span>
                    {{--                    <span class="nav-main-link-badge badge badge-pill badge-success">5</span>--}}
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link{{ request()->is('workshop/add') ? ' active' : '' }}" href="{{url('workshop/add')}}">
                    <i class="nav-main-link-icon fa fa-plus-circle"></i>
                    <span class="nav-main-link-name">Workshops toevoegen</span>
                    {{--                    <span class="nav-main-link-badge badge badge-pill badge-success">5</span>--}}
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link{{ request()->is('workshop') ? ' active' : '' }}" href="{{route('workshop')}}">
                    <i class="nav-main-link-icon fa fa-chalkboard-teacher"></i>
                    <span class="nav-main-link-name">Workshops</span>
                    {{--                    <span class="nav-main-link-badge badge badge-pill badge-success">5</span>--}}
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link{{ request()->is('me') ? ' active' : '' }}" href="{{route('me')}}">
                    <i class="nav-main-link-icon fa fa-user"></i>
                    <span class="nav-main-link-name">Mijn profiel</span>
                    {{--                    <span class="nav-main-link-badge badge badge-pill badge-success">5</span>--}}
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link{{ request()->is('workshop/show') ? ' active' : '' }}" href="{{route('workshop.show')}}">
                    <i class="nav-main-link-icon fa fa-search"></i>
                    <span class="nav-main-link-name">Workshop item</span>
                    {{--                    <span class="nav-main-link-badge badge badge-pill badge-success">5</span>--}}
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link" href="https://www.johan.nl" target="_blank">
                    <i class="nav-main-link-icon fa fa-clipboard-list"></i>
                    <span class="nav-main-link-name">Vragenlijst invullen</span>
                    {{--                    <span class="nav-main-link-badge badge badge-pill badge-success">5</span>--}}
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link{{ request()->is('login') ? ' active' : '' }}" href="{{route('login')}}" target="_blank">
                    <i class="nav-main-link-icon fa fa-sign-in-alt"></i>
                    <span class="nav-main-link-name">Login</span>
                    {{--                    <span class="nav-main-link-badge badge badge-pill badge-success">5</span>--}}
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link{{ request()->is('register') ? ' active' : '' }}" href="{{route('register')}}" target="_blank">
                    <i class="nav-main-link-icon fa fa-user-plus"></i>
                    <span class="nav-main-link-name">Registreren</span>
                    {{--                    <span class="nav-main-link-badge badge badge-pill badge-success">5</span>--}}
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link{{ request()->is('faq') ? ' active' : '' }}" href="{{route('faq')}}">
                    <i class="nav-main-link-icon fa fa-question"></i>
                    <span class="nav-main-link-name">FAQ</span>
                    {{--                    <span class="nav-main-link-badge badge badge-pill badge-success">5</span>--}}
                </a>
            </li>
        </ul>
    </div>
    <!-- END Side Navigation -->
</nav>
