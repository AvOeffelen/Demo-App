@extends('layouts.user')

@section('content')
    <!-- Hero -->
    <div class="bg-body-white">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center bravis-logo">
                <img src="storage/logo/logo.jpg" height="70">
            </div>
        </div>
    </div>
    <div class="content content-boxed">
        <div>
            <div class="row">
                <div class="col-md-6 col-xl-6 col-lg-6 col-12 col-xs-12 invisible" data-toggle="appear">
                   <a class="
                            block
                            block-transparent
                            block-link-pop
                            w-100
                            h-250
                            d-md-flex
                            align-items-md-stretch
                            bg-image
                            homepage-block
                            left-tile"
                        style="
                            background-image : url(storage/vakken/Vak01.jpg;
                        "
                        href="{{url('activiteitenkalender')}}"
                        target="_blank"
                        data-toggle="click-ripple"
                    >
                        <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom">
                            <div class="ribbon-box">
                                Activiteitenkalender.
                            </div>
                            <div class="pt-4 pb-6 px-md-3">
                                <h3 class="h1 font-w700 text-white mb-1">Activiteitenkalender</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-6 invisible" data-toggle="appear">
                    <a class="
                            block
                            block-transparent
                            block-link-pop
                            w-100
                            h-250
                            d-md-flex
                            align-items-md-stretch
                            bg-image
                            homepage-block
                            right-tile"
                        style="
                        background-image : url(storage/vakken/Vak02.jpg;
                        "
                        href="{{url('workshop')}}"
                        data-toggle="click-ripple"
                    >
                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom">
                            <div class="ribbon-box">
                                Workshops.
                            </div>
                            <div class="pt-4 pb-6 px-md-3">
                                <h3 class="h1 font-w700 text-white mb-1">Workshops</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xl-6 invisible" data-toggle="appear">
                    <a class="
                            block
                            block-transparent
                            block-link-pop
                            w-100
                            h-250
                            d-md-flex
                            align-items-md-stretch
                            bg-image
                            homepage-block
                            left-tile"
                        style="
                        background-image : url(storage/vakken/Vak03.jpg;
                        "
                        href="{{url('one-on-one')}}"
                        data-toggle="click-ripple"
                    >
                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom">
                            <div class="ribbon-box">
                                Persoonlijke begeleiding
                            </div>
                            <div class="pt-4 pb-6 px-md-3">
                                <h3 class="h1 font-w700 text-white mb-1">Persoonlijke begeleiding</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-6 invisible" data-toggle="appear">
                    <a class="
                            block
                            block-transparent
                            block-link-pop
                            w-100
                            h-250
                            d-md-flex
                            align-items-md-stretch
                            bg-image
                            homepage-block
                            right-tile"
                        style="
                        background-image : url(storage/vakken/Vak04.jpg;
                        "
                        href="{{route('covid')}}"
                        data-toggle="click-ripple"
                    >
                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom">
                            <div class="ribbon-box">
                                (na)zorg Corona
                            </div>
                            <div class="pt-4 pb-6 px-md-3">
                                <h3 class="h1 font-w700 text-white mb-1">(na)zorg Corona</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xl-6 invisible" data-toggle="appear">
                    <a class="
                            block
                            block-transparent
                            block-link-pop
                            w-100
                            h-250
                            d-md-flex
                            align-items-md-stretch
                            bg-image
                            homepage-block
                            left-tile"
                        style="
                        background-image : url(storage/vakken/Vak05.jpg;
                        "
                        href="{{route('vragenlijsten')}}"
                        data-toggle="click-ripple"
                    >
                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom">
                            <div class="ribbon-box">
                                Vragenlijsten
                            </div>
                            <div class="pt-4 pb-6 px-md-3">
                                <h3 class="h1 font-w700 text-white mb-1">Vragenlijsten</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-6 invisible" data-toggle="appear">
                    <a class="
                            block
                            block-transparent
                            block-link-pop
                            w-100
                            h-250
                            d-md-flex
                            align-items-md-stretch
                            bg-image
                            homepage-block
                            right-tile"
                        style="
                        background-image : url(storage/vakken/Vak06.jpg;
                        "
                        href="{{url('articles')}}"
                        data-toggle="click-ripple"
                    >
                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom">
                            <div class="ribbon-box">
                                Inspiratiemateriaal
                            </div>
                            <div class="pt-4 pb-6 px-md-3">
                                <h3 class="h1 font-w700 text-white mb-1">Inspiratiemateriaal</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xl-6 invisible" data-toggle="appear">
                    <a class="
                            block
                            block-transparent
                            block-link-pop
                            w-100
                            h-250
                            d-md-flex
                            align-items-md-stretch
                            bg-image
                            homepage-block
                            left-tile"
                        style="
                        background-image : url(storage/vakken/Vak07.jpg;
                        "
                        href="{{route('goodhabitz')}}"
                        data-toggle="click-ripple"
                    >
                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom">
                            <div class="ribbon-box">
                                GoodHabitz
                            </div>
                            <div class="pt-4 pb-6 px-md-3">
                                <h3 class="h1 font-w700 text-white mb-1">GoodHabitz</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-6 invisible" data-toggle="appear">
                    <a class="
                            block
                            block-transparent
                            block-link-pop
                            w-100
                            h-250
                            d-md-flex
                            align-items-md-stretch
                            bg-image
                            homepage-block
                            right-tile"
                        style="
                        background-image : url(storage/vakken/Vak08.jpg;
                        "
                        href="{{url('topical')}}"
                        data-toggle="click-ripple"
                    >
                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom">
                            <div class="ribbon-box">
                                Thuiswerken
                            </div>
                            <div class="pt-4 pb-6 px-md-3">
                                <h3 class="h1 font-w700 text-white mb-1">Thuiswerken</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
