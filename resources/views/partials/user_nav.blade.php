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
            <a class="nav-main-link" href="{{url('workshop')}}">
                <i class="nav-main-link-icon fa fa-chalkboard-teacher"></i>
                <span class="nav-main-link-name">Workshops</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link" href="{{url('articles')}}">
                <i class="nav-main-link-icon fa fa-lightbulb"></i>
                <span class="nav-main-link-name">Inspiratie Materiaal</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link" href="{{url('one-on-one')}}">
                <i class="nav-main-link-icon fa fa-door-closed"></i>
                <span class="nav-main-link-name">1 op 1</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link" href="{{url('topical')}}">
                <i class="nav-main-link-icon fa fa-exclamation"></i>
                <span class="nav-main-link-name">Actueel</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link" href="https://www.johan.nl" target="_blank">
                <i class="nav-main-link-icon fa fa-clipboard-list"></i>
                <span class="nav-main-link-name">Vragenlijst invullen</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link" href="{{route('faq')}}">
                <i class="nav-main-link-icon fa fa-question"></i>
                <span class="nav-main-link-name">FAQ</span>
            </a>
        </li>
    </ul>
</div>
