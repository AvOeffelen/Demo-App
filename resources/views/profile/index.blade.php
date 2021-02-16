@extends('layouts.user')
@section('content')
    <div class="content content-full">
        <profile :user="{{auth()->user()}}"></profile>
    </div>
@endsection
@section('js_after')
@endsection
