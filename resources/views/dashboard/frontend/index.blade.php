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
                <div class="col-md-12 col-xl-6 col-lg-6 col-12 col-xs-12 order-xl-1 order-lg-1 order-md-1 order-sm-1 order-1" data-toggle="appear">
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
                        data-toggle="click-ripple"
                    >
                       <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-250">
                            <!-- <div class="ribbon-box">
                                Activiteitenkalender.
                            </div> -->
                            <div class="pt-4 pb-6 px-md-3">
                                <h3 class="h1 font-w700 text-white mb-1 text-center">Kalender Gelre Energiek</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-12 col-xl-6 col-lg-6 col-12 col-xs-12 order-xl-2 order-lg-2 order-md-5 order-sm-5 order-5" data-toggle="appear">
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
                        <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-250">
                            <!-- <div class="ribbon-box">
                                Workshops.
                            </div> -->
                            <div class="pt-4 pb-6 px-md-3">
                                <h3 class="h1 font-w700 text-white mb-1 text-center">Workshops</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-12 col-xl-6 col-lg-6 col-12 col-xs-12 order-xl-3 order-lg-3 order-md-2 order-sm-2 order-2" data-toggle="appear">
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
                        <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-250">
                            <!-- <div class="ribbon-box">
                                Persoonlijke begeleiding
                            </div> -->
                            <div class="pt-4 pb-6 px-md-3">
                                <h3 class="h1 font-w700 text-white mb-1 text-center">Persoonlijke begeleiding</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-12 col-xl-6 col-lg-6 col-12 col-xs-12 order-xl-4 order-lg-4 order-md-6 order-sm-6 order-6" data-toggle="appear">
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
                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-250">
                            <!-- <div class="ribbon-box">
                                (na)zorg Corona
                            </div> -->
                            <div class="pt-4 pb-6 px-md-3">
                                <h3 class="h1 font-w700 text-white mb-1 text-center">(na)zorg Corona</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-12 col-xl-6 col-lg-6 col-12 col-xs-12 order-xl-5 order-lg-5 order-md-3 order-sm-3 order-3" data-toggle="appear">
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
                        <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-250">
                            <!-- <div class="ribbon-box">
                                Vragenlijsten
                            </div> -->
                            <div class="pt-4 pb-6 px-md-3">
                                <h3 class="h1 font-w700 text-white mb-1 text-center">Vragenlijsten</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-12 col-xl-6 col-lg-6 col-12 col-xs-12 order-xl-6 order-lg-6 order-md-7 order-sm-7 order-7" data-toggle="appear">
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
                        <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-250">
                            <!-- <div class="ribbon-box">
                                Inspiratiemateriaal
                            </div> -->
                            <div class="pt-4 pb-6 px-md-3">
                                <h3 class="h1 font-w700 text-white mb-1 text-center">Inspiratiemateriaal</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-12 col-xl-6 col-lg-6 col-12 col-xs-12 order-xl-7 order-lg-7 order-md-4 order-sm-4 order-4" data-toggle="appear">
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
                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-250">
                            <!-- <div class="ribbon-box">
                                GoodHabitz
                            </div> -->
                            <div class="pt-4 pb-6 px-md-3">
                                <h3 class="h1 font-w700 text-white mb-1 text-center">GoodHabitz</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-12 col-xl-6 col-lg-6 col-12 col-xs-12 order-xl-8 order-lg-8 order-md-8 order-sm-8 order-8" data-toggle="appear">
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
                        <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-250">
                            <!-- <div class="ribbon-box">
                                Thuiswerken
                            </div> -->
                            <div class="pt-4 pb-6 px-md-3">
                                <h3 class="h1 font-w700 text-white mb-1 text-center">Thuiswerken</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
