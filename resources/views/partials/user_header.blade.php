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
                <a class="btn btn-dual" href="{{url('/')}}">
                    <span class="nav-main-link-name">Home</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="btn btn-dual" href="{{url('generatie-management')}}">
                    <span class="nav-main-link-name">Thema's</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="btn btn-dual" href="{{url('faq')}}">
                    <span class="nav-main-link-name">FAQ</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="btn btn-dual" href="{{url('contact')}}">
                    <span class="nav-main-link-name">Contact</span>
                </a>
            </li>
        </ul>
    </div>
    <div>
        @if(!auth()->user())
            <a class="btn btn-dual" href="{{url('login')}}">
                <span class="d-sm-inline-block d-sm-none">Log in</span>
            </a>
        @else

            <div class="dropdown d-inline-block">
                <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    <span class="d-none d-sm-inline-block">{{auth()->user()->getFullname()}}</span>
                    <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                    <a class="dropdown-item" href="{{url('/me')}}">
                        <i class="far fa-fw fa-user mr-1"></i> Profiel
                    </a>
                    <div role="separator" class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        <i class="far fa-fw fa-arrow-alt-circle-left mr-1"></i> Sign Out
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
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
