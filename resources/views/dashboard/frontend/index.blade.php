@extends('layouts.user')

@section('content')
    <!-- Hero -->
    <div class="bg-body-white">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <img src='/storage/logo/logo.gif' height="100px">
                <marquee width="60%" direction="left">Tip van de dag: Dit is een tip van de dag</marquee>
                <a href="/verhalen">
                    <i class="fas fa-feather-alt "> Verhalen van medewerkers</i>
                </a>
            </div>
        </div>
    </div>
    
    <div class="wrapper py-5">
  <input type="checkbox">
  <div class="showvideo-video">
    <video src="https://www.robmillsarchitects.com/files/land/city/RMA_Web_land_city_1.mp4" loop muted autoplay></video>
  </div>
  <div class="showvideo-text">
    <span data-text="Klik hier voor de instructievideo"></span>
  </div>
</div>
    <div class="content content-boxed">
        <dashboard></dashboard>
    </div>
@endsection
