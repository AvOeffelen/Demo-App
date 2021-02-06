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
                            <p class="text-uppercase font-w700 font-size-sm text-muted py-3">Verifiëer uw email</p>
                        </div>
                    </div>
                    <div class="row no-gutters justify-content-center">
                        <div class="col-sm-10 col-xl-8">
                            <div class="row no-gutters justify-content-center">
                                <div class="col-sm-10 col-xl-8">
                                    @if (session('resent'))
                                        <div class="alert alert-success" role="alert">
                                            Een nieuwe email met daar in een verificatie link is naar u verstuurd!
                                        </div>
                                    @endif

                                    Voordat u verder kunt dient u uw email eerst te verifiëren.
                                    Als u geen email ontvangen heeft kunt u die hieronder opnieuw aanvragen.
                                    <form class="d-inline text-center" method="POST" action="{{ route('verification.resend') }}">
                                        @csrf
                                        <button type="submit"
                                                class="btn btn-sm btn-light d-block d-lg-inline-block mb-1">
                                            <i class="fa fa-paper-plane text-muted mr-1"></i>
                                            Verificatie email versturen
                                        </button>
                                    </form>
                                </div>
                                <!-- END Sign In Form -->
                            </div>
                        </div>
                    </div>
                    <!-- END Sign In Form -->
                </div>
            </div>
            <!-- END Main Section -->
            <!-- Meta Info Section -->
            <div class="hero-static col-md-6 d-none d-md-flex align-items-md-center justify-content-md-center text-md-center bg-gd-xbrvs">
                <div class="p-3">
                    <p class="display-4 font-w700 text-xbrvs-lighter mb-3">
                        Leg de lat op jouw hoogte!
                    </p>
                    <p class="font-size-lg font-w600 text-xbrvs-lighter mb-0">
                        Copyright &copy; <span data-toggle="year-copy"></span>
                    </p>
                </div>
            </div>
            <!-- END Meta Info Section -->
        </div>
    </div>
@endsection
