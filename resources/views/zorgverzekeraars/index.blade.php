@extends('layouts.user')
@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Aanbod zorgverzekeraars</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">KLANTSAMENVITAAL</li>
                        <li class="breadcrumb-item active text-primary" aria-current="page">Aanbod zorgverzekeraars</li>
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
                
                <h3>Aanbod zorgverzekeraars</h3>
            </div>
            <div class="col-md-12 col-lg-2 col-xl-2 col-12 col-sm-12 col-xs-12 cols-12">
            </div>
        </div>
       
        <div class="row content content-full text-center">
            <div class="col-sm-6 col-lg-2">
            </div>
            <div class="col-sm-6 col-lg-4">
                <img src="storage/images/cz-tijdlijn.png" class="img-fluid">
                <h5 class="py-4">VGZ</h5>
                <P>Samen werken aan een gezonder Nederland. Dat is de missie van VGZ. Daarom juichen we u van harte toe als u uw gezondheid of leefstijl wilt verbeteren. Maar we zwaaien niet alleen vanaf de zijlijn. We helpen u ook graag. Met kwalitatief goede services waarmee u echt een verschil kunt maken. Waarmee u beter kunt ontspannen of optimistischer in het leven kunt staan. We zijn er voor iedereen. Ook als u prima gezond bent, want ook dan kunt u verbetering wensen. Succes met uw voornemens. We wensen u alle gezondheid toe.</P>
                <a class="btn btn-primary" href="https://www.vgzvoordezorg.nl/gezond-leven" role="button" target="_blank">Ga naar VGZ</a>
            </div>
            <div class="col-sm-6 col-lg-4">
                <img src="storage/images/fitzme-tijdlijn.gif" class="img-fluid">
                <h5 class="py-4">CZ</h5>
                <p>Vitaliteit, gezondheid en leefstijl als inspiratie
Het FitzMe portal is in de basis een platform dat bezoekers inspireert om de regie in eigen handen te nemen rondom thema's als vitaliteit, gezondheid en leefstijl.  De content inspireert en verleidt je tot gezonde keuzes.</p>
                <a class="btn btn-primary" href="https://fitzme.nl/cz/home" role="button" target="_blank">Ga naar CZ</a>
            </div>
            <div class="col-sm-6 col-lg-2">
            </div>
        </div>
    </div>
@endsection
