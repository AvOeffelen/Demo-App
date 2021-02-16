@extends('layouts.user')

@section('content')
    <!-- Hero -->
    <div class="bg-body-white">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <img src="/storage/logo/logo.png" height="">
                <marquee width="60%" direction="left">Tip of the week: Keep exercising. Even if you move in the workplace.</marquee>
                <a href="/topical">
                    <i class="fas fa-feather-alt "> Stories & Articles</i>
                </a>
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
