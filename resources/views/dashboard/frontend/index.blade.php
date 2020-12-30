@extends('layouts.user')

@section('content')
    <!-- Hero -->
    <div class="bg-body-white">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <img src="https://www.krijgsmansolutions.nl/wp-content/uploads/2020/12/bravis.jpg" height="70">
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
                        background-image : url(https://thumbs-eu-west-1.myalbum.io/photo/1k0/07f7ce55-59a8-4258-8953-77297e548315.jpg;
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
                        background-image : url(https://thumbs-eu-west-1.myalbum.io/photo/1k0/8bb7de1a-94be-4029-987c-6fae99e7ac84.jpg);
                        background-position: center;
                        background-repeat: none;
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
                            bg-image"
                        style="
                        background-image : url(https://thumbs-eu-west-1.myalbum.io/photo/1k0/2df52bb4-ff1a-42ef-a213-b9b94a5aaa11.jpg);
                        background-position: center;
                        background-repeat: none;
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
                            bg-image"
                        style="
                        background-image : url(https://thumbs-eu-west-1.myalbum.io/photo/1k0/9426e193-2028-4cf0-b849-cbccc8ba1934.jpg);
                        background-position: center;
                        background-repeat: none;
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
                            bg-image"
                        style="
                        background-image : url(https://thumbs-eu-west-1.myalbum.io/photo/1k0/b89c2eb1-d6ba-4f02-ba21-b46877d8e9fc.jpg);
                        background-position: center;
                        background-repeat: none;
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
                            bg-image"
                        style="
                        background-image : url(https://thumbs-eu-west-1.myalbum.io/photo/1k0/20bff521-5578-4ad3-9eda-9bb64df67c87.jpg);
                        background-position: center;
                        background-repeat: none;
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
                            bg-image"
                        style="
                        background-image : url(https://thumbs-eu-west-1.myalbum.io/photo/1k0/5ff06581-93fd-4424-8580-ad9d7ed150bf.jpg);
                        background-position: center;
                        background-repeat: none;
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
                            bg-image"
                        style="
                        background-image : url(https://thumbs-eu-west-1.myalbum.io/photo/1k0/c1a53a4c-2287-40c5-be20-0aa83ae662f9.jpg);
                        background-position: center;
                        background-repeat: none;
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
