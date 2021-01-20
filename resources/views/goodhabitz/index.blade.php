@extends('layouts.user')
@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">GoodHabitz</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">GelreEnergiek</li>
                        <li class="breadcrumb-item active" aria-current="page">GoodHabitz</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="content content text-center">
        <div class="row">
            <div class="col-md-12 col-lg-2 col-xl-2 col-12 col-sm-12 col-xs-12 cols-12">

                <a href="javascript:history.back()" class="btn btn-primary">Terug</a>
            </div>
            
            <div class="col-md-12 col-lg-8 col-xl-8 col-12 col-sm-12 col-xs-12">
                <img src="/storage/images/slider-good-habitz.png" class="img-fluid" alt="">
                <h3 class="py-5">GoodHabitz</h3>
            </div>
            <div class="col-md-12 col-lg-2 col-xl-2 col-12 col-sm-12 col-xs-12 cols-12">
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12 col-lg-2 col-xl-2 col-12 col-sm-12 col-xs-12 cols-12">
            </div>
            <div class="col-md-12 col-lg-8 col-xl-8 col-12 col-sm-12 col-xs-12">
                <alinea class="text-center">
                    <p>Voor onlinetrainingen waar je nooit genoeg van krijgt kun je gaan naar de omgeving van
                        GoodHabitz. Je vindt hier van toffe documentaires tot interessante magazines en van inspirerende
                        experts tot uitdagende opdrachten. Je luistert, kijkt of doet allen de onderdelen die passen bij
                        jouw manier van leren. Alles mag, niets moet: je leert zoals jij dat wilt!
                        <br />
                        <br />
                        Je moet op deze pagina eerst inloggen. Heb je nog geen account, dan kun je deze via leerhuis@gelre.nl opvragen.
                    </p>
                </alinea>
            </div>
            <div class="col-md-12 col-lg-2 col-xl-2 col-12 col-sm-12 col-xs-12 cols-12">
            </div>
        </div>
        <div class="row py-5">
            <div class="col-md-4 col-lg-4 col-xl-4 col-4 col-sm-4 col-xs-4">
            </div>
            <div class="col-md-4 col-lg-4 col-xl-4 col-4 col-sm-4 col-xs-4">
                <div class="text-center">
                    <a href="https://my.goodhabitz.com/nl-be/login.html" target="_blank" class="btn btn-primary">Ga naar
                        GoodHabitz</a>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-xl-4 col-4 col-sm-4 col-xs-4">
            </div>
        </div>

        <div class="row content content-full text-center">
            <div class="col-sm-6 col-lg-2">
            </div>
            <div class="col-sm-6 col-lg-4">
                <img src="/storage/images/goodhabitz-left.png" class="img-fluid">
            </div>
            <div class="col-sm-6 col-lg-4">
                <img src="/storage/images/goodhabitz-right.png" class="img-fluid">
            </div>
            <div class="col-sm-6 col-lg-2">
            </div>
        </div>
       
        
       
    </div>
@endsection
