@extends('layouts.user')

@section('content')
    <!-- Page Content -->
    <div class="content">
        @if(auth()->check())
            <workshop :user="{{auth()->user()}}" :workshop="{{$workshop}}"></workshop>
        @else
            <workshop :workshop="{{$workshop}}"></workshop>
        @endif
    </div>
    <!-- END Page Content -->
@endsection
@section('js_after')
@endsection
