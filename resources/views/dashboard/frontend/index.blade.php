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
                            h-300
                            d-md-flex
                            align-items-md-stretch
                            bg-image"
                        style="
                        background-image : url(https://www.krijgsmansolutions.nl/wp-content/uploads/2020/12/Activiteitenkalender_online-12082020-845x684-1-300x243-1.png); 
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
                            h-300
                            d-md-flex
                            align-items-md-stretch
                            bg-image"
                        style="
                        background-image : url(https://www.krijgsmansolutions.nl/wp-content/uploads/2020/12/istockphoto-847172346-1024x1024-1.jpg); 
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
                            h-300
                            d-md-flex
                            align-items-md-stretch
                            bg-image"
                        style="
                        background-image : url(https://www.krijgsmansolutions.nl/wp-content/uploads/2020/12/istockphoto-1205480426-1024x1024-1.jpg); 
                        background-position: center; 
                        background-repeat: none;
                        "
                        href="{{url('one-on-one')}}"
                        target="_blank"
                        data-toggle="click-ripple"
                    >
                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom">
                            <div class="ribbon-box">
                                1 op 1
                            </div>
                            <div class="pt-4 pb-6 px-md-3">
                                <h3 class="h1 font-w700 text-white mb-1">1 op 1</h3>
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
                            h-300
                            d-md-flex
                            align-items-md-stretch
                            bg-image"
                        style="
                        background-image : url(https://www.krijgsmansolutions.nl/wp-content/uploads/2020/12/istockphoto-1216081971-1024x1024-1.jpg); 
                        background-position: center; 
                        background-repeat: none;
                        "
                        href="{{url('covid')}}"
                        target="_blank"
                        data-toggle="click-ripple"
                    >
                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom">
                            <div class="ribbon-box">
                                Covid-19
                            </div>
                            <div class="pt-4 pb-6 px-md-3">
                                <h3 class="h1 font-w700 text-white mb-1">Covid-19</h3>
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
                            h-300
                            d-md-flex
                            align-items-md-stretch
                            bg-image"
                        style="
                        background-image : url(https://www.krijgsmansolutions.nl/wp-content/uploads/2020/12/istockphoto-1203097687-1024x1024-1.jpg); 
                        background-position: center; 
                        background-repeat: none;
                        "
                        href="{{url('https://app.johan.nl/login')}}"
                        target="_blank"
                        data-toggle="click-ripple"
                    >
                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom">
                            <div class="ribbon-box">
                                vragenlijsten
                            </div>
                            <div class="pt-4 pb-6 px-md-3">
                                <h3 class="h1 font-w700 text-white mb-1">vragenlijsten</h3>
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
                            h-300
                            d-md-flex
                            align-items-md-stretch
                            bg-image"
                        style="
                        background-image : url(https://www.krijgsmansolutions.nl/wp-content/uploads/2020/12/iStock-1175309338-scaled.jpg); 
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
                            h-300
                            d-md-flex
                            align-items-md-stretch
                            bg-image"
                        style="
                        background-image : url(https://www.krijgsmansolutions.nl/wp-content/uploads/2020/12/be-1.png); 
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
                            h-300
                            d-md-flex
                            align-items-md-stretch
                            bg-image"
                        style="
                        background-image : url(https://www.krijgsmansolutions.nl/wp-content/uploads/2020/12/istockphoto-1209693436-1024x1024-1.jpg); 
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
                                <h3 class="h1 font-w700 text-white mb-1">Actueel</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
