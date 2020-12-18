@extends('layouts.user')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Dashboard</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">App</li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="content content-boxed">
        <div>
            <div class="row">
                <div class="col-md-6 col-xl-6 invisible" data-toggle="appear">
                    <a class="block block-rounded block-link-pop" href="{{url('workshop')}}">
                        <div
                            class="block-content block-content-full d-flex align-items-center justify-content-between text-primary">
                            <div>
                                <i class="fa fa-4x fa-chalkboard-teacher"></i>
                            </div>
                            <div class="ml-3 text-right mt-3">
                                <h2 class=" font-w700">
                                    Workshops
                                </h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-6 invisible" data-toggle="appear">
                    <a class="block block-rounded block-link-pop" href="{{url('articles')}}">
                        <div
                            class="block-content block-content-full d-flex align-items-center justify-content-between text-primary">
                            <div>
                                <i class="fa fa-4x fa-lightbulb"></i>
                            </div>
                            <div class="ml-3 text-right mt-3">
                                <h2 class=" font-w700">
                                    Inspiratie Materiaal
                                </h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xl-6 invisible" data-toggle="appear">
                    <a class="block block-rounded block-link-pop" href="{{url('one-on-one')}}">
                        <div
                            class="block-content block-content-full d-flex align-items-center justify-content-between text-primary">
                            <div>
                                <i class="fa fa-4x fa-door-closed"></i>
                            </div>
                            <div class="ml-3 text-right mt-3">
                                <h2 class=" font-w700">
                                    1 op 1
                                </h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-6 invisible" data-toggle="appear">
                    <a class="block block-rounded block-link-pop" href="{{url('topical')}}">
                        <div
                            class="block-content block-content-full d-flex align-items-center justify-content-between text-primary">
                            <div>
                                <i class="fa fa-4x fa-exclamation"></i>
                            </div>
                            <div class="ml-3 text-right mt-3">
                                <h2 class=" font-w700">
                                    Actueel
                                </h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xl-6 col-lg-6 col-12 col-xs-12 invisible" data-toggle="appear">
                   <a class="
                            block
                            block-transparent
                            block-link-pop
                            w-100
                            h-300
                            d-md-flex
                            align-items-md-stretch
                            bg-image"
                        style="
                        background-image : url(https://www.bravissamenvitaal.nl/wp-content/uploads/2020/02/iStock-1058457940-2-495x400.jpg); 
                        background-position: center; 
                        background-repeat: none;
                        "
                        href="{{route('download.calender')}}"
                        target="_blank"
                        data-toggle="click-ripple"
                    >
                        <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom">
                            <div class="ribbon-box">
                                Ribbon.
                            </div>
                            <div class="pt-4 pb-6 px-md-3">
                                <h3 class="h1 font-w700 text-white mb-1">Titel</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
