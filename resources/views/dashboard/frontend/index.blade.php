@extends('layouts.user')

@section('content')
    <!-- Hero -->
    <div class="bg-body-white">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center bravis-logo">
                <img src="/storage/logo/logo.jpg" height="70">
                <div class="text-center justify-content-center" height="70">
                    <i class="fas fa-exclamation text-primary"></i>  Deze Bravis Samen Vitaal omgeving is uitsluitend bestemd voor medewerkers van het Bravis ziekenhuis.
                </div>
                <div class=""></div>
            </div>
        </div>
    </div>
    <div class="content content-boxed">
        @if (Auth()->check())
            <default :user="{{Auth()->user()}}"></default>
        @else
            <default></default>
        @endif
    </div>
@endsection
