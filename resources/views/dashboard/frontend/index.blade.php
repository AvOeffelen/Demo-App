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
                <div class="col-md-6 col-xl-6 col-lg-6 col-12 col-xs-12 invisible" data-toggle="appear">
                   <a class="
                            block
                            block-transparent
                            block-link-pop
                            w-100
                            h-250
                            d-md-flex
                            align-items-md-stretch
                            bg-image"
                        style="
                        background-image : url(https://www.krijgsmansolutions.nl/wp-content/uploads/2020/12/Vak_01.jpg); 
                        background-position: center; 
                        background-repeat: none;
                        "
                        href="{{route('download.calender')}}"
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
                            bg-image"
                        style="
                        background-image : url(https://www.krijgsmansolutions.nl/wp-content/uploads/2020/12/WORKSHOPS_Bravis_KlantSamenVitaal.nl_V1.png); 
                        background-position: center; 
                        background-repeat: none;
                        "
                        href="{{url('workshop')}}"
                        target="_blank"
                        data-toggle="click-ripple"
                    >
                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom">
                            <div class="ribbon-box">
                                Workshops.
                            </div>
                            <div class="pt-4 pb-6 px-md-3">
                                <h3 class="h1 font-w700 text-white mb-1"></h3>
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
                            bg-image"
                        style="
                        background-image : url(https://www.krijgsmansolutions.nl/wp-content/uploads/2020/12/Vak_03.jpg); 
                        background-position: center; 
                        background-repeat: none;
                        "
                        href="{{url('one-on-one')}}"
                        target="_blank"
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
                            bg-image"
                        style="
                        background-image : url(https://www.krijgsmansolutions.nl/wp-content/uploads/2020/12/COVID-19_Bravis_KlantSamenVitaal.nl_V1.png); 
                        background-position: center; 
                        background-repeat: none;
                        "
                        href="{{url('covid')}}"
                        target="_blank"
                        data-toggle="click-ripple"
                    >
                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom">
                            <div class="ribbon-box">
                                (na)zorg Corona
                            </div>
                            <div class="pt-4 pb-6 px-md-3">
                                <h3 class="h1 font-w700 text-white mb-1"></h3>
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
                            bg-image"
                        style="
                        background-image : url(https://www.krijgsmansolutions.nl/wp-content/uploads/2020/12/Vak_05.jpg); 
                        background-position: center; 
                        background-repeat: none;
                        "
                        href="{{url('https://app.johan.nl/login')}}"
                        target="_blank"
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
                            bg-image"
                        style="
                        background-image : url(https://www.krijgsmansolutions.nl/wp-content/uploads/2020/12/INSPIRATIEMATERIAAL_Bravis_KlantSamenVitaal.nl_V1.png); 
                        background-position: center; 
                        background-repeat: none;
                        "
                        href="{{url('articles')}}"
                        target="_blank"
                        data-toggle="click-ripple"
                    >
                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom">
                            <div class="ribbon-box">
                                Inspiratiemateriaal
                            </div>
                            <div class="pt-4 pb-6 px-md-3">
                                <h3 class="h1 font-w700 text-white mb-1"></h3>
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
                            bg-image"
                        style="
                        background-image : url(https://www.krijgsmansolutions.nl/wp-content/uploads/2020/12/Vak_07.jpg); 
                        background-position: center; 
                        background-repeat: none;
                        "
                        href="{{url('https://my.goodhabitz.com/nl-be/login.html')}}" 
                        target="_blank"
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
                            bg-image"
                        style="
                        background-image : url(https://www.krijgsmansolutions.nl/wp-content/uploads/2020/12/ACTUEEL_Bravis_KlantSamenVitaal.nl_V1.png); 
                        background-position: center; 
                        background-repeat: none;
                        "
                        href="{{url('topical')}}"
                        target="_blank"
                        data-toggle="click-ripple"
                    >
                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom">
                            <div class="ribbon-box">
                                Actueel
                            </div>
                            <div class="pt-4 pb-6 px-md-3">
                                <h3 class="h1 font-w700 text-white mb-1"></h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
