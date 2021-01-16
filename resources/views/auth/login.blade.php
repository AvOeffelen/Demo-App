@extends('layouts.login')

@section('content')
    <div class="bg-image">
        <div class="row no-gutters bg-primary-op">
            <!-- Main Section -->
            <div class="hero-static col-md-6 d-flex align-items-center bg-white">
                <div class="p-3 w-100">
                    <!-- Header -->
                    <div class="mb-3 text-center">
                        <div class="mb-3 text-center">
                             <a>
                                 <img src="storage/logo/logo.jpg" height="150">
                            </a>
                            <p class="text-uppercase font-w700 font-size-sm text-muted py-3">Log in</p>
                        </div>
                        <a tabindex="0" class="btn btn-lg btn-danger" role="button" data-toggle="popover" data-trigger="focus" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">Dismissible popover</a>
                        <!-- <button type="button" class="btn btn-sm btn-primary" data-trigger="focus" data-toggle="popover" title="Waarom inloggen?" data-placement="bottom" data-content="Je kunt hier een account aanmaken wanneer je dat graag wil.
Wanneer biedt dit voor jou toegevoegde waarde? Dat is wanneer je het leuk vindt dat er een overzicht voor je wordt bijgehouden van welke workshops je gebruik hebt gemaakt, een overzicht van je favorieten. Of wanneer je het prettig vindt dat je op de hoogte wordt gebracht van de nieuwste workshops of de nieuwste artikelen. Dan heb je de mogelijkheid om een persoonlijk dashboard aan te maken waarvoor wij dan wel je mailadres nodig hebben. 
">Waarom inloggen?</button> -->
                    </div>
                    <div class="row no-gutters justify-content-center">
                        <div class="col-sm-8 col-xl-6">
                            <form method="POST" action="{{ url('/login') }}">
                                @csrf
                                <div class="py-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-lg form-control-alt" id="login-username" name="email" placeholder="E-mail">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-lg form-control-alt" id="login-password" name="password" placeholder="Password">
                                    </div>
                                </div>
                                <button class="btn btn-block btn-hero-lg btn-hero-primary">
                                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Log in
                                </button>
                            </form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                                            <a class="btn btn-sm btn-light d-block d-lg-inline-block mb-1" href="#">
                                                <i class="fa fa-exclamation-triangle text-muted mr-1"></i> Forgot password
                                            </a>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 text-right">
                                    <div class="form-group">
                                        <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                                                <a class="btn btn-sm btn-light d-block d-lg-inline-block mb-1" href="/register">
                                                    <i class="fa fa-user-plus text-muted mr-1"></i> Registreren
                                                </a>
                                            </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Sign In Form -->
                </div>
            </div>
            <!-- END Main Section -->
            <!-- Meta Info Section -->
            <div class="hero-static col-md-6 d-none d-md-flex align-items-md-center justify-content-md-center text-md-center bg-gd-xksv">
                <div class="p-3">
                    <p class="display-4 font-w700 text-xksv-lighter mb-3">
                        Uw slogan hier!
                    </p>
                    <p class="font-size-lg font-w600 text-xksv-lighter mb-0">
                        Copyright &copy; <span data-toggle="year-copy"></span>
                    </p>
                </div>
            </div>
            <!-- END Meta Info Section -->
        </div>
    </div>
@endsection
