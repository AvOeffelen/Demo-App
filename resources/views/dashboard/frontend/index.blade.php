@extends('layouts.user')

@section('content')
    <!-- Hero -->
    <div class="bg-body-white">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center bravis-logo">
                <img src="/storage/logo/logo.jpg" height="70">
                <marquee width="100%" direction="left">Tip van de week: Vermijd koffie als je hoofdpijn hebt.</marquee>
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
