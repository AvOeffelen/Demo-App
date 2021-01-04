@extends('layouts.user')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <workshop :workshop="{{$workshop}}"></workshop>
    </div>
    <!-- END Page Content -->
@endsection
@section('js_after')
@endsection
