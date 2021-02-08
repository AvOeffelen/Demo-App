@extends('layouts.user')
@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Browser Update</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Browser Update</li>
                        <li class="breadcrumb-item active" aria-current="page">Browser Update</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="content content-boxed">
        <div class="row">
            <div class="col-md-12 col-lg-2 col-xl-2 col-12 col-sm-12 col-xs-12 cols-12">
            </div>
            <div class="col-md-12 col-lg-8 col-xl-8 col-12 col-sm-12 col-xs-12">
                <alinea class="text-center">
                    <h1 class="alert alert-danger" role="alert">Uw browser is verouderd!</h1>  
                </alinea>
            </div>
            <div class="col-md-12 col-lg-2 col-xl-2 col-12 col-sm-12 col-xs-12 cols-12">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-lg-2 col-xl-2 col-2 col-sm-2 col-xs-2">
            </div>
            <div class="col-md-8 col-lg-8 col-xl-8 col-8 col-sm-8 col-xs-8">
                <b>Om te profiteren van alle mogelijkheden in ons portaal, raden we je aan om altijd de nieuwste versie van een browser te gebruiken. Update daarom altijd je browser als er een nieuwe versie beschikbaar is. Of installeer een andere browser. Voorbeelden van bekende browsers zijn Google Chrome, Firefox en Opera</b>
            </div>
            <div class="col-md-2 col-lg-2 col-xl-2 col-2 col-sm-2 col-xs-2">
            </div>
        </div>
        <div class="row py-5">
            <div class="col-md-2 col-lg-2 col-xl-2 col-2 col-sm-2 col-xs-2">
            </div>
            <div class="col-md-8 col-lg-8 col-xl-8 col-8 col-sm-8 col-xs-8">
                <h2>Update je browser</h2>
                <p>We raden je aan om altijd de nieuwste versie van een browser te gebruiken. Installeer daarom in een paar stappen de nieuwste versie van:</p>
                <ul class="list-group">
                    <li class="list-group-item"><a href="https://www.google.com/intl/nl_ALL/chrome/">Download Google Chrome</a></li>
                    <li class="list-group-item"><a href="https://www.mozilla.org/nl/firefox/new/">Download Firefox</a></li>
                    <li class="list-group-item"><a href="https://www.opera.com">Download Opera</a></li>
                </ul>
            </div>
            <div class="col-md-2 col-lg-2 col-xl-2 col-2 col-sm-2 col-xs-2">
            </div>
        </div>
    </div>
@endsection
