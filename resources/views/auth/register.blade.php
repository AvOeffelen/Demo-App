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
                            <p class="text-uppercase font-w700 font-size-sm text-muted py-3">Registreren</p>
                        </div>
                    </div>
                    <div class="row no-gutters justify-content-center">
                        <div class="col-sm-8 col-xl-6">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="py-2">
                                    <div class="form-group">
                                        <label for="name">Voornaam <span class="text-danger">*</span></label>
                                        <input type="text"
                                               class="form-control form-control-alt form-control-lg {{ $errors->has('firstname') ? 'is-invalid' : '' }}"
                                               id="name" name="firstname" placeholder="Voornaam" value="{{ old('firstname') }}">
                                        @if ($errors->has('firstname'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('firstname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="addition">Tussenvoegsel</label>
                                        <input type="text"
                                               class="form-control form-control-alt form-control-lg {{ $errors->has('infix') ? 'is-invalid' : '' }}"
                                               id="addition" name="infix" value="{{ old('infix') }}"
                                               placeholder="Tussenvoegsel">
                                        @if ($errors->has('infix'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('infix') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname">Achternaam <span class="text-danger">*</span></label>
                                        <input type="text"
                                               class="form-control form-control-alt form-control-lg {{ $errors->has('lastname') ? 'is-invalid' : '' }}"
                                               id="name" name="lastname" placeholder="Achternaam"
                                               value="{{ old('lastname') }}">
                                        @if ($errors->has('lastname'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('lastname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-mail <span class="text-danger">*</span></label>
                                        <input type="email"
                                               class="form-control form-control-lg form-control-alt {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                               id="email" name="email" placeholder="E-mail" value="{{ old('email') }}">
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                            </span>
                                    @endif
                                    <div class="form-group">
                                        <label for="lastname">Geslacht <span class="text-danger">*</span></label>
                                            <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}"
                                                    id="gender-select"
                                                    name="gender">
                                                <option value="woman" selected>Vrouw</option>
                                                <option value="man">Man</option>
                                                <option value="different">Anders</option>
                                                <option value="not_disclosed">Zeg ik liever niet</option>
                                            </select>
                                        @if ($errors->has('gender'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('gender') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Wachtwoord <span class="text-danger">*</span></label>
                                        <input type="password"
                                               class="form-control form-control-lg form-control-alt {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                               id="password" name="password"
                                               placeholder="Password">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="password-confirm">Herhaal wachtwoord <span
                                                class="text-danger">*</span></label>
                                        <input type="password"
                                               class="form-control form-control-lg form-control-alt {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                               id="password-confirm" name="password_confirmation"
                                               placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-block btn-hero-lg btn-hero-primary"  type="submit">
                                        <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Registreer
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END Sign In Form -->
                </div>
            </div>
            <!-- END Main Section -->

            <!-- Meta Info Section -->
            <div class="hero-static col-md-6 d-none d-md-flex align-items-md-center justify-content-md-center text-md-center bg-gd-xdsv">
                <div class="p-3">
                    <p class="display-4 font-w700 text-xdsv-lighter mb-3">
                         Uw slogan hier!
                    </p>
                    <p class="font-size-lg font-w600 text-xdsv-lighter mb-0">
                        Copyright &copy; <span data-toggle="year-copy"></span>
                    </p>
                </div>
            </div>
            <!-- END Meta Info Section -->
        </div>
    </div>
@endsection
