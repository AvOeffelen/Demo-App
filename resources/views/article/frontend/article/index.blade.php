@extends('layouts.user')

@section('content')
    <!-- Page Content -->
    <div class="content">
        @if(auth()->check())

            <show-article :user="{{auth()->user()}}" :article="{{$article}}"></show-article>
        @else
            <show-article :article="{{$article}}"></show-article>
        @endif
    </div>
    <!-- END Page Content -->
@endsection
