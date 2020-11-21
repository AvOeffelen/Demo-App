@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content content-full">
        <workshop :workshop="{{$workshop}}"></workshop>
    </div>
    <!-- END Page Content -->
@endsection
@section('js_after')
@endsection
