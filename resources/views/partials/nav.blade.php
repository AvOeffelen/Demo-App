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
                <a class="nav-main-link nav-main-link-submenu"
                   data-toggle="submenu" aria-haspopup="true"
                   aria-expanded="false"
                   href="#">
                    <i class="nav-main-link-icon fa fa-chalkboard-teacher"></i>
                    <span class="nav-main-link-name">Workshop</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('backend/workshop/overview') ? ' active' : '' }}"
                           href="{{route('workshop.overview')}}">
                            <i class="nav-main-link-icon fa fa-clipboard"></i>
                            <span class="nav-main-link-name">Overzicht</span>
                            {{--                    <span class="nav-main-link-badge badge badge-pill badge-success">5</span>--}}
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('backend/workshop/add') ? ' active' : '' }}"
                           href="{{url('backend/workshop/add')}}">
                            <i class="nav-main-link-icon fa fa-plus-circle"></i>
                            <span class="nav-main-link-name">toevoegen</span>
                            {{--                    <span class="nav-main-link-badge badge badge-pill badge-success">5</span>--}}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu"
                   data-toggle="submenu" aria-haspopup="true"
                   aria-expanded="false"
                   href="#">
                    <i class="nav-main-link-icon fa fa-chalkboard-teacher"></i>
                    <span class="nav-main-link-name">Artikelen</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('backend/article/overview') ? ' active' : '' }}"
                           href="{{route('article.show.overview')}}">
                            <i class="nav-main-link-icon fa fa-clipboard"></i>
                            <span class="nav-main-link-name">Overzicht</span>
                            {{--                    <span class="nav-main-link-badge badge badge-pill badge-success">5</span>--}}
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('backend/article.create') ? ' active' : '' }}"
                           href="{{route('article.show.create')}}">
                            <i class="nav-main-link-icon fa fa-plus-circle"></i>
                            <span class="nav-main-link-name">toevoegen</span>
                            {{--                    <span class="nav-main-link-badge badge badge-pill badge-success">5</span>--}}
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- END Side Navigation -->
</nav>
