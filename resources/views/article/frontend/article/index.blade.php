@extends('layouts.user')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <show-article :article="{{$article}}"></show-article>
    </div>
    <!-- END Page Content -->
@endsection
@section('js_after')
