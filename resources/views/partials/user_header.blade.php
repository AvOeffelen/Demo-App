<div id="page-header-loader" class="overlay-header bg-primary">
    <div class="content-header">
        <div class="w-100 text-center">
            <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
        </div>
    </div>
</div>
<div class="content-header">
    <div class="d-flex align-items-center">
        <a class="link-fx font-w600 font-size-lg text-white" href="/">
                            <span class="smini-visible">
                                <span class="text-white-50">{{config('app.name')}}</span>
                            </span>
            <span class="smini-hidden">
                                <span class="text-white-75">{{config('app.name')}}</span>
                            </span>
        </a>
        <ul class="nav-main nav-main-horizontal nav-main-hover d-none d-lg-block ml-3 d-inline-block d-sm-none bv-d-xs-down-none d-md-none">
            <li class="nav-main-item">
                <a class="btn btn-dual" href="{{route('workshop')}}">
                    <span class="nav-main-link-name">Workshops</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="btn btn-dual" href="https://www.johan.nl" target="_blank">
                    <span class="nav-main-link-name">Vragenlijst invullen</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="btn btn-dual" href="#" target="">
                    <span class="nav-main-link-name">FAQ</span>
                </a>
            </li>
        </ul>
    </div>
    <div>
        @if(!auth()->user())
            <a type="button" class="btn btn-dual" aria-expanded="false">
                <i class="fa fa-fw fa-lock d-sm-none"></i>
                <span class="d-none d-sm-inline-block">Log in</span>
            </a>
        @else
            <div class="dropdown d-inline-block">
                <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-user d-sm-none"></i>
                    <span class="d-none d-sm-inline-block">xx</span>
                    <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                    <a class="dropdown-item" href="{{url('/me')}}">
                        <i class="far fa-fw fa-user mr-1"></i> Profiel
                    </a>
                    <div role="separator" class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"
                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                        <i class="far fa-fw fa-arrow-alt-circle-left mr-1"></i> Log uit
                    </a>
                </div>
            </div>
        @endif
        <button type="button" class="btn btn-dual d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
            <i class="fa fa-fw fa-bars"></i>
        </button>
    </div>
</div>
<div id="page-header-loader" class="overlay-header bg-primary">
    <div class="content-header">
        <div class="w-100 text-center">
            <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
        </div>
    </div>
</div>
