@extends('layouts.user')

@section('content')
    <!-- Hero -->
    <div class="bg-body-white">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center bravis-logo">
                <img src="/storage/logo/logo.jpg" height="70">
                <a href="/verhalen">
                    <i class="fas fa-feather-alt "> Verhalen van medewerkers</i>
                </a>
            </div>
        </div>
    </div>
    
    <div class="content content-boxed">
        <dashboard></dashboard>
    </div>
@endsection
