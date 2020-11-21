<div class="bg-header-dark">
    <div class="content-header bg-white-10">
        <a class="link-fx font-w600 font-size-lg text-white" href="/">
                            <span class="smini-visible">
                                <span class="text-white-75">{{config('app.name')}}</span>
                            </span>
            <span class="smini-hidden">
                                <span class="text-white-75">{{config('app.name')}}</span>
                            </span>
        </a>
        <div>
            <a class="d-lg-none text-white ml-2" data-toggle="layout" data-action="sidebar_close"
               href="javascript:void(0)">
                <i class="fa fa-times-circle"></i>
            </a>
        </div>
    </div>
</div>
<div class="content-side content-side-full">
    <ul class="nav-main">
        <li class="nav-main-item">
            <a class="nav-main-link {{ request()->is('dashboard') ? ' active' : '' }}" href="/dashboard">
                <i class="nav-main-link-icon fa fa-chalkboard-teacher"></i>
                <span class="nav-main-link-name">Workshops</span>
            </a>
        </li>
    </ul>
</div>
